<?php
namespace PixelYourSite;

use Cartflows_Helper;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
?>

<h2 class="section-title">CartFlows Settings</h2>
<!-- Enable CartFlows -->
<div class="card card-static">
    <div class="card-header">
        General
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>From here you can control the events and parameters fired by PixelYourSite Professional on CartFlos pages and actions.</p>
                <p>To learn more <a href="https://www.pixelyoursite.com/cartflows-and-pixelyoursite" target="_blank">go to this dedicated page and watch the video</a></p>
                <?php PYS()->render_switcher_input( "",false,true );  ?>
                <h4 class="switcher-label">Enable CartFlows set-up</h4>
                <?php renderProBadge(); ?>
            </div>
        </div>
    </div>
</div>

<!-- Dedicated Tracking -->
<div class="card ">
    <div class="card-header">
        Dedicated Tracking IDs (optional) <?php renderProBadge(); cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <?php if ( Facebook()->enabled() ) : ?>
            <div class="plate">
                <div class="row pt-3">
                    <div class="col">
                        <h4 class="mb-3">Meta Pixel (formerly Facebook Pixel)</h4>
                        <h4 class="label">Meta Pixel (formerly Facebook Pixel) ID:</h4>
                        <?php Facebook()->render_text_input( 'wcf_pixel_id', 'Add your pixel ID there',true ); ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h4 class="label">Conversion API:</h4>
                        <?php Facebook()->render_text_area_input( 'wcf_server_access_api_token', 'Add your token there',true ); ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h4 class="label">test_event_code:</h4>
                        <?php Facebook()->render_text_input( 'wcf_test_api_event_code', 'Add your test_event_code there',true ); ?>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col">
                        <h4 class="label">Verify your domain:</h4>
                        <?php Facebook()->render_text_input( 'wcf_verify_meta_tag', 'Add the verification meta-tag there' ,true); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( GA()->enabled() ) : ?>
            <hr>
            <div class="plate">
                <div class="row pt-3 mt-3 pb-3">
                    <div class="col">
                        <h4 class="mb-3">Google Analytics</h4>
                        <h4 class="label">Google Analytics ID:</h4>
                        <?php GA()->render_text_input( 'wcf_pixel_id', 'Add your ID there',true ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if ( Bing()->enabled() ) : ?>
            <hr>
            <div class="plate">
                <div class="row pt-3 mt-3 pb-3">
                    <div class="col">
                        <h4 class="mb-3">Bing Tag</h4>
                        <h4 class="label">Bing Tag ID:</h4>
                        <?php Bing()->render_text_input( 'wcf_pixel_id', 'Add your ID there',true ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Pinterest()->enabled() ) : ?>
            <hr>
            <div class="plate">
                <div class="row pt-3 mt-3">
                    <div class="col">
                        <h4 class="mb-3">Pinterest Pixel</h4>
                        <h4 class="label">Pinterest Pixel ID:</h4>
                        <?php Pinterest()->render_text_input( 'wcf_pixel_id', 'Add your ID there',true ); ?>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col">
                        <h4 class="label">Verify your domain:</h4>
                        <?php Pinterest()->render_text_input( 'wcf_verify_meta_tag', 'Add the verification meta-tag there',true ); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

<h2 class="section-title">Standard Events Settings</h2>

<!-- Purchase -->
<div class="card ">
    <div class="card-header">
        Purchase settings <?php renderProBadge(); cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>You have additional options for this event on the plugins WooCommerce page</p>
                <div class="custom-controls-stacked mb-3">
                    <?php PYS()->render_radio_input( 'wcf_purchase_on', 'all', 'Fire a Purchase event for each Upsale and Downsale step',true ); ?>
                    <?php PYS()->render_radio_input( 'wcf_purchase_on', 'last', 'Fire a single Purchase event for all Upsale or Downsale steps. <strong>Caution</strong>: if the client abandons a step, we wont\'t track the transaction ' ,true ); ?>
                </div>
                <?php PYS()->render_switcher_input( 'wcf_purchase_on_optin_enabled',false,true ); ?>
                <h4 class="switcher-label">Fire the event Optin offers</h4>
            </div>
        </div>
    </div>
</div>

<!-- AddToCart -->
<div class="card ">
    <div class="card-header">
        AddToCart settings <?php renderProBadge();  cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>You have additional options for this event on the plugins WooCommerce page</p>
                <?php PYS()->render_switcher_input( 'wcf_add_to_cart_on_bump_click_enabled',false,true ); ?>
                <h4 class="switcher-label">Fire the event for order bumps</h4>
            </div>
        </div>
    </div>
</div>

<!-- Lead -->
<div class="card ">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input( 'wcf_lead_enabled',false,true  ); ?> Lead <?php renderProBadge(); cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                Fire a Lead event when a Optin offer is accepted
            </div>
        </div>
    </div>
</div>

<!-- ViewContent -->
<div class="card ">
    <div class="card-header">
        ViewContent settings <?php renderProBadge(); cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>You have additional options for this event on the plugins WooCommerce page</p>
                <p>The event is always fired on page</p>
                <?php PYS()->render_switcher_input( 'wcf_sell_step_view_content_enabled' ,false,true ); ?>
                <h4 class="switcher-label">Fire the event on Upsale and Downsale steps</h4>
            </div>
        </div>
    </div>
</div>



<h2 class="section-title">Custom Events</h2>

<!-- CartFlows -->
<div class="card ">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input( 'wcf_cart_flows_event_enabled',false,true ); ?> CartFlows Event <?php renderProBadge();  cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <p>Fire this event for all CartFlows pages.</p>
                    <?php Facebook()->render_switcher_input( 'wcf_cart_flows_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Facebook</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( GA()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php GA()->render_switcher_input( 'wcf_cart_flows_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Google Analytics</h4>
                </div>
            </div>
        <?php endif; ?>



        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'wcf_cart_flows_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Pinterest</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'wcf_cart_flows_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Bing</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- step event -->
<div class="card ">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input( 'wcf_step_event_enabled',false,true ); ?> Track Steps <?php renderProBadge();  cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <p>Fire CartFlows_Landing, CartFlows_Upsale, CartFlows_Downsale, CartFlows_Checkout, CartFlows_ThankYou,CartFlows_Optin</p>
                    <?php Facebook()->render_switcher_input( 'wcf_step_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Facebook</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( GA()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php GA()->render_switcher_input( 'wcf_step_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Google Analytics</h4>
                </div>
            </div>
        <?php endif; ?>


        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'wcf_step_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Pinterest</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'wcf_step_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Bing</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- step event -->
<div class="card ">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input( 'wcf_bump_event_enabled',false,true ); ?> Track Order Bumps <?php renderProBadge(); cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <p>Fire CartFlows_order_bump, when an order bump is accepted</p>
                    <?php Facebook()->render_switcher_input( 'wcf_bump_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Facebook</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( GA()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php GA()->render_switcher_input( 'wcf_bump_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Google Analytics</h4>
                </div>
            </div>
        <?php endif; ?>


        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'wcf_bump_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Pinterest</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'wcf_bump_event_enabled',false,true ); ?>
                    <h4 class="switcher-label">Bing</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<h2 class="section-title">CartFlows Events Parameters</h2>

<div class="card ">
    <div class="card-header">
        Control the CartFlows Parameters <?php renderProBadge(); cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'wcf_global_cartflows_parameter_enabled',false,true ); ?>
                <h4 class="switcher-label">CartFlows</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'wcf_global_cartflows_flow_parameter_enabled',false,true ); ?>
                <h4 class="switcher-label">CartFlows_flow</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'wcf_global_cartflows_step_parameter_enabled',false,true ); ?>
                <h4 class="switcher-label">CartFlows_step</h4>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-4">
        <button class="btn btn-block btn-sm btn-save">Save Settings</button>
    </div>
</div>