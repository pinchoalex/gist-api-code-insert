<?php

/**
 * The file that defines the class to work with gist api requests
 *
 *
 * @since      1.0.0
 *
 * @package    Apci_Gist_Api_Ci
 * @subpackage Apci_Gist_Api_Ci/includes
 * @author     Alex Pinkevych <pinchoalex@gmail.com>
 */

class Apci_Gist_Api_Request {

    const CACHE_TIME_HOURS = 2;

    protected $id;

    protected $file_name;

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_file_name($file_name)
    {
        $this->file_name = $file_name;
    }

    public function get_gist_files() {
        $cache = $this->is_cached($this->get_cache_name());

        if( false === $cache ) {
            $request = wp_remote_get("https://api.github.com/gists/{$this->id}");
            if (is_wp_error($request) || wp_remote_retrieve_response_code($request) != 200) {
                return null;
            }

            $body = json_decode(wp_remote_retrieve_body($request));

            $result = array();

            foreach ($body->files as $file_name => $file) {
                if ($file_name == $this->file_name) {
                    $result = array($file);
                } else {
                    $result[] = $file;
                }
            }

            $result = wp_json_encode($result);

            $this->cache($result);

            return $result;
        }

        return $cache;
    }

    private function get_cache_name() {
        return md5($this->id.$this->file_name);
    }

    /**
     *
     * $last_modified = wp_remote_retrieve_header( $request, 'last-modified' );
     *
     * @param $last_modified
     * @return bool
     */
    protected function need_update_by_modified_date($last_modified) {
        $mod_date_time = new DateTime($last_modified);
        $mod_date_time->modify('+'.self::CACHE_TIME_HOURS.' hours');
        $now_date_time = new DateTime();

        $need_update = $mod_date_time > $now_date_time;

        return $need_update;
    }

    protected function is_cached($name) {
        $cache = get_transient( $name );

        return $cache;
    }

    protected function cache($data) {
        set_transient($this->get_cache_name(), $data, self::CACHE_TIME_HOURS * 60 * 60);
    }
}