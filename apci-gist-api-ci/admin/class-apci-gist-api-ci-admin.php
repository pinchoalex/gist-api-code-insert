<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Apci_Gist_Api_Ci
 * @subpackage Apci_Gist_Api_Ci/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Apci_Gist_Api_Ci
 * @subpackage Apci_Gist_Api_Ci/admin
 * @author     Alex Pinkevych <pinchoalex@gmail.com>
 */
class Apci_Gist_Api_Ci_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apci_Gist_Api_Ci_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apci_Gist_Api_Ci_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apci-gist-api-ci-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Apci_Gist_Api_Ci_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Apci_Gist_Api_Ci_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apci-gist-api-ci-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * @param $buttons
     * @return array
     */
    public function add_code_insert_btn($buttons) {
        $newBtn = array(
            'apciCodeInsertBtn'
        );
        $buttons = array_merge( $buttons, $newBtn );

        return $buttons;
    }

    /**
     * @param $plugin_array
     * @return mixed
     */
    public function add_code_insert_btn_script($plugin_array) {
        $plugin_array['apciCodeInsertBtn'] = plugins_url( $this->plugin_name.'/admin/editor/apci-code-insert-btn.js' );
        return $plugin_array;
    }

    public function code_insert_btn_modal() {
        @ob_clean();

        include plugin_dir_path( __FILE__ ) . 'editor/insert-btn-modal.php';

        die();
    }
}
