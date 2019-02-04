<?php

/**
 * The file that defines the class to modify gist api response
 *
 *
 * @since      1.0.0
 *
 * @package    Ap_Gist_Api_Ci
 * @subpackage Ap_Gist_Api_Ci/includes
 * @author     Alex Pinkevych <pinchoalex@gmail.com>
 */

class Ap_Gist_Api_Nice_Response {

    protected $files;
    protected $raw;

    /**
     * @param $files
     */
    public function set_files($files) {
        if(empty($files)) {
            $this->files = false;
        } else {
            $this->files = json_decode($files);
        }
    }

    /**
     * @param $raw
     */
    public function set_raw($raw) {
        $this->raw = $raw;
    }

    /**
     * @return string
     */
    public function get_code_files_html()
    {
        $html = '';

        if(false == $this->files) {
            return '<pre>'.
                '<code class="ap-gist-api-code language-plaintext">'
                .__('Can not load code by gist id, please check your shortcode and make sure gist exists', 'ap-gist-api-ci').
                '</code>'.
            '</pre>';
        }

        foreach ($this->files as $file) {

            $raw_link = '';
            if('yes' == $this->raw) {
                $raw_link = '<a href="'.$file->raw_url.'" target="_blank" rel="nofollow"'.
                    'title="'.__('View raw file', 'ap-gist-api-ci').'">'.
                    $file->filename.
                '</a>';

                $raw_link = '<div class="ap-file-head">'.$raw_link.'</div>';
            }

            $html .= $raw_link.
                '<pre class="line-numbers">'.
                    '<code class="ap-gist-api-code language-'.strtolower($file->language).'">'
                    .esc_html($file->content).
                    '</code>'.
                '</pre>';
        }

        return $html;
    }
}