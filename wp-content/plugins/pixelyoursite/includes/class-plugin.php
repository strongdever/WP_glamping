<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

interface Plugin {

	public function getPluginName();

    public function getPluginVersion();

    public function getPluginFile();

    public function adminUpdateLicense();
    
}