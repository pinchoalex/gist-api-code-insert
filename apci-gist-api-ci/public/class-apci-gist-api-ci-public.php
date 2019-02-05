<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Apci_Gist_Api_Ci
 * @subpackage Apci_Gist_Api_Ci/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Apci_Gist_Api_Ci
 * @subpackage Apci_Gist_Api_Ci/public
 * @author     Alex Pinkevych <pinchoalex@gmail.com>
 */
class Apci_Gist_Api_Ci_Public {

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

	protected $gist_api_request;

	protected $gist_api_response;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this->load_dependencies();
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( 'prism-css', plugin_dir_url( __FILE__ ) . 'css/prism.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/apci-gist-api-ci-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( 'prism-js', plugin_dir_url( __FILE__ ) . 'js/prism.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/apci-gist-api-ci-public.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * load public dependencies
     */
    private function load_dependencies() {
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-apci-gist-api-request.php';

        $this->gist_api_request = new Apci_Gist_Api_Request();

        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-apci-gist-api-nice-response.php';

        $this->gist_api_response = new Apci_Gist_Api_Nice_Response();
    }

    /**
     * @param $atts
     * @return mixed
     */
	public function Apci_code_insert_from_gist_api($atts)
    {
        extract( shortcode_atts( array(
            'id' => '',
            'file' => '',
            'raw' => 'yes',
        ), $atts ) );

        // gist api request
        $this->gist_api_request->set_id($id);
        $this->gist_api_request->set_file_name($file);
        $files = $this->gist_api_request->get_gist_files();

        // prepare nice response
        $this->gist_api_response->set_files($files);
        $this->gist_api_response->set_raw($raw);

        $nice_files = $this->gist_api_response->get_code_files_html();

        return $nice_files;
    }

}
