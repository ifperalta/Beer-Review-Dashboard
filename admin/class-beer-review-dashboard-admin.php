<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ianperalta.dev
 * @since      1.0.0
 *
 * @package    Beer_Review_Dashboard
 * @subpackage Beer_Review_Dashboard/admin
*/

class Beer_Review_Dashboard_Admin {


	private $plugin_name;	
	private $version;

	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/beer-review-dashboard-admin.css', array(), $this->version, 'all' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/beer-review-dashboard-admin.js', array( 'jquery' ), $this->version, false );

	}

}
