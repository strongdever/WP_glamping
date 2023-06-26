<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

?>

<h2 class="section-title">Super Pack Settings</h2>

<!-- General -->
<div class="card card-static">
    <div class="card-header">
        General <?php renderSpBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable Super Pack</h4>
            </div>
        </div>
    </div>
</div>

<!-- Additional Pixel IDs -->
<div class="card card-static">
    <div class="card-header">
        Additional Pixel IDs <?php renderSpBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Add additional Facebook, Google Analytics and Pinterest pixel IDs on the same site.</p>
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable additional pixel IDs</h4>
            </div>
        </div>
    </div>
</div>

<!-- Dynamic Params -->
<div class="card card-static">
    <div class="card-header">
        Dynamic Parameters for Events <?php renderSpBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Use page title, post ID, category or tags as your dynamic events parameters.</p>
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable dynamic params</h4>
            </div>
        </div>
    </div>
</div>

<!-- Custom Thank You Page -->
<div class="card card-static">
    <div class="card-header">
        Custom Thank You Pages <?php renderSpBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Define custom thank you pages (general or for a particular product) and fire the
                    Meta Pixel (formerly Facebook Pixel) on it.</p>
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable Custom Thank You Pages</h4>
            </div>
        </div>
        <?php if ( isWooCommerceActive() ) : ?>
            <div class="row mt-3">
                <div class="col">
                    <h4>WooCommerce</h4>
                    <p>You can set up a global WooCommerce Thank You Page here. If you need to, you can also
                        define Custom Thank You Pages for each product (edit the product and you will find this option
                        in the
                        right side menu).</p>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php renderDummySwitcher(); ?>
                    <h4 class="switcher-label">Enable WooCommerce Global Thank You Page</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <div class="my-3">
                        <label>Global Custom Page URL:</label>
                        <?php renderDummyTextInput( 'Enter URL' ); ?>
                    </div>
                    <div>
                        <label>Order Details:</label>
                        <div class="custom-controls-stacked">
                            <?php renderDummyRadioInput( 'Hidden', true ); ?>
                            <?php renderDummyRadioInput( 'After page content' ); ?>
                            <?php renderDummyRadioInput( 'Before page content' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    
        <?php if ( isEddActive() ) : ?>
            <div class="row mt-3">
                <div class="col">
                    <h4>Easy Digital Downloads</h4>
                    <p>You can set up a global Easy Digital Downloads Thank You Page here. If you need to,
                        you can also define Custom Thank You Pages for each product (edit the product and you will find
                        this
                        option in the right side menu).</p>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php renderDummySwitcher(); ?>
                    <h4 class="switcher-label">Enable Easy Digital Downloads Global Thank You Page</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <div class="my-3">
                        <label>Global Custom Page URL:</label>
                        <?php renderDummyTextInput( 'Enter URL' ); ?>
                    </div>
                    <div>
                        <label>Order Details:</label>
                        <div class="custom-controls-stacked">
                            <?php renderDummyRadioInput( 'Hidden', true ); ?>
                            <?php renderDummyRadioInput( 'After page content' ); ?>
                            <?php renderDummyRadioInput( 'Before page content' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Remove Pixel -->
<div class="card card-static">
    <div class="card-header">
        Remove Pixel from Pages <?php renderSpBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Remove Facebook, Google Analytics or Pinterest pixels from a particular page or post.</p>
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable remove pixel from pages</h4>
            </div>
        </div>
    </div>
</div>

<!-- AMP -->
<div class="card card-static">
    <div class="card-header">
        AMP Support <?php renderSpBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Fire Facebook, Google Analytics or Pinterest pixels on AMP pages.</p>
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable AMP integration</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="indicator indicator-off">OFF</div>
                <h4 class="indicator-label">AMP by <a href="https://wordpress.org/plugins/amp/"
                                                      target="_blank">WordPress.com VIP, XWP, Google, and
                        contributors</a></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="indicator indicator-off">OFF</div>
                <h4 class="indicator-label">Accelerated Mobile Pages by <a
                            href="https://wordpress.org/plugins/accelerated-mobile-pages/"
                            target="_blank">Ahmed Kaludi, Mohammed Kaludi</a></h4>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row justify-content-center">
    <div class="col-4">
        <button class="btn btn-block btn-save">Save Settings</button>
    </div>
</div>
