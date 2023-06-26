<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @param Plugin|Settings $plugin
 *
 * This is used strictly for add-on updates, NOT for updating the core plugin itself (PixelYourSite).
 * If you decide to download and install free or paid add-ons from our site (Pinterest Tag, Bing Tag), we will perform checks for updates.
 * If you hold a valid license for the add-on, we will download the update from our server.
 *
 */
function updatePlugin( $plugin ) {

	if ( ! class_exists( 'PixelYourSite\Plugin_Updater' ) ) {
		require_once 'class-plugin-updater.php';
	}

	$license_key = $plugin->getOption( 'license_key' );

	new Plugin_Updater( 'https://www.pixelyoursite.com', $plugin->getPluginFile(), array(
			'version'   => $plugin->getPluginVersion(),
			'license'   => $license_key,
			'item_name' => $plugin->getPluginName(),
			'author'    => 'PixelYourSite'
		)
	);

}