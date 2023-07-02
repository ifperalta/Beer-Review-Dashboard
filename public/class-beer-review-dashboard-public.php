<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ianperalta.dev
 * @since      1.0.0
 *
 * @package    Beer_Review_Dashboard
 * @subpackage Beer_Review_Dashboard/public
 */

class Beer_Review_Dashboard_Public {

	private $plugin_name;
	private $version;

	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/beer-review-dashboard-public.css', array(), $this->version, 'all' );

	}

	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/beer-review-dashboard-public.js', array( 'jquery' ), $this->version, false );

	}

}
