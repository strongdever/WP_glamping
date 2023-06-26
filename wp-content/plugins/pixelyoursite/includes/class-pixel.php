<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

interface Pixel {
	
	public function enabled();
	
	public function configured();
	
	/**
	 * Return array of pixel IDs.
	 *
	 * @return array
	 */
	public function getPixelIDs();
	
	/**
	 * Return array of pixel options for front-end.
	 *
	 * @return array
	 */
	public function getPixelOptions();
	
	/**
	 * @param string                 $eventType
	 * @param CustomEvent|array|null $args
	 *
	 * @return array|bool
	 */
	public function getEventData( $eventType, $args = null );
	
	public function outputNoScriptEvents();
	
}