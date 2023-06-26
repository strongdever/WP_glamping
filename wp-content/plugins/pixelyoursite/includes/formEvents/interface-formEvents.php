<?php
namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

interface FormEventsFactory {


    public function getSlug();
    public function getName();

    public function isEnabled();
    public function isActivePlugin();
    public function getOptions();
    public function getForms();
}