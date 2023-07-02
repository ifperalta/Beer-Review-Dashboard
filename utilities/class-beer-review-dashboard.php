<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://ianperalta.dev
 * @since      1.0.0
 *
 * @package    Beer_Review_Dashboard
 * @subpackage Beer_Review_Dashboard/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Beer_Review_Dashboard
 * @subpackage Beer_Review_Dashboard/includes
 * @author     Ian Peralta <ifransperalta@gmail.com>
 */
class Beer_Review_Dashboard {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		if ( defined( 'BEER_REVIEW_DASHBOARD_VERSION' ) ) {
			$this->version = BEER_REVIEW_DASHBOARD_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'beer-review-dashboard';

		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		$this->loader = new Beer_Review_Dashboard_Loader();
	}

	private function define_admin_hooks() {
		$plugin_admin = new Beer_Review_Dashboard_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	}
	
	private function define_public_hooks() {
		$plugin_public = new Beer_Review_Dashboard_Public( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_loader() {
		return $this->loader;
	}

	public function get_version() {
		return $this->version;
	}

}
