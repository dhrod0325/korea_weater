<?php

/*
Plugin Name: KoreaWeather
Plugin URI:
Description:
Author:
Version: 1.0
Author URI:
*/

require_once dirname( __FILE__ ) . '/classes/loader.php';


add_action( 'wp_head', function () {

	$service = new KW_KmaWeatherService();
	$service->setClient( new KW_WpHttpClient() );
	$service->zone = '5011065000';

	$response = $service->getWeather();

	var_dump( $response[0]->temp );
} );