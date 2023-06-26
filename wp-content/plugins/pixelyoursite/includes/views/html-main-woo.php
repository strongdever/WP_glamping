<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use PixelYourSite\Facebook\Helpers;

?>

<h2 class="section-title">WooCommerce Settings</h2>

<!-- Enable WooCommerce -->
<div class="card card-static">
    <div class="card-body">
        <div  class="row">
            <div class="col">
                <?php renderDummySwitcher( false); ?>
                <h4 class="switcher-label">Facebook Advanced Purchase Tracking</h4><?php renderProBadge(); ?>
            </div>
        </div>
        <div  class="row">
            <div class="col">
                <?php renderDummySwitcher( false); ?>
                <h4 class="switcher-label">Google Analytics Advanced Purchase Tracking</h4><?php renderProBadge(); ?>
            </div>
        </div>
        <p class="small">
            If the Purchase event doesn't fire for a transaction when the order is placed by your client, the plugin will send it to Facebook and Google Analytics Universal (not yet supported for GA4) when the order's status changes to Complete.
        </p>
    </div>
</div>
<div class="card card-static">
    <div class="card-header">
        General
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Fire e-commerce related events. On Facebook, the events will be Dynamic Ads Ready. Enhanced Ecommerce
                    will be enabled for Google Analytics.</p>
            </div>
        </div>


        <div class="row mt-2">
            <div class="col">
                <?php PYS()->render_switcher_input( 'woo_enabled_save_data_to_orders',false ); ?>
                <h4 class="switcher-label">Save data to orders</h4>
                <small class="form-check">Save the <i>landing page, UTMs, client's browser's time, day, and month, the number of orders, lifetime value, and average order</i>. You can view this data when you edit an order. With the professional version you can view it under the <a href="<?=admin_url("admin.php?page=pixelyoursite_woo_reports")?>">WooCommerce Reports</a> section.</small>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col">
                <?php PYS()->render_switcher_input('woo_add_enrich_to_admin_email'); ?>
                <h4 class="switcher-label">Send reports data to the New Order email</h4>
                <small class="form-text">You will see the landing page, UTMs, client's browser's time, day, and month, the number of orders, lifetime value, and average order in your WooCommerce's default "New Order" email.
                    Your clients will NOT get this info.</small>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <?php PYS()->render_switcher_input( 'woo_enabled_save_data_to_user',false,true ); ?>
                <h4 class="switcher-label">Display data to the user's profile</h4> <?php renderProBadge(); ?>
                <small class="form-text">Display <i>the number of orders, lifetime value, and average order</i>.</small>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col">
            <p>Use our dedicated plugin to create auto-updating feeds for Facebook Product Catalogs, Google Merchant,
                or Google Ads Custom vertical.
                <a href="https://www.pixelyoursite.com/product-catalog-facebook?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-catalogs-woo-tab"
                        target="_blank">Click to get Product Catalog Feed Pro</a></p>
            <p class="mb-0">Automatically add your WooCommerce products to a Facebook Product Catalog when someone
                visits them.
                <a href="https://www.pixelyoursite.com/opengraph-plugin?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-catalogs-woo-tab" target="_blank">Click to get the
                    Smart OpenGraph plugin</a></p>
        </div>
    </div>
</div>

<!-- video -->
<div class="card card-static">
    <div class="card-header">
        Recommended Videos:
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>WooCommerce AddToCart Event FIX (4:46 min) - <a href="https://www.youtube.com/watch?v=oZoAu8a0PNg" target="_blank">watch now</a></p>
                <p>Improve WooCommerce Facebook Ads performance with OFFLINE CONVERSIONS (11:38) - <a href="https://www.youtube.com/watch?v=vNsiWh0cakA" target="_blank">watch now</a></p>
                <p>Enhanced Conversions for Google Ads with PixelYourSite (9:14) - <a href="https://www.youtube.com/watch?v=0uuTiOnVw80" target="_blank">watch now</a></p>
                <p>Google Analytic 4 (GA4) & WooCommerce: Transaction Reports (6:51) - <a href="https://www.youtube.com/watch?v=zLtXHbp_DDU" target="_blank">watch now</a></p>
                <p>Google Analytics 4 (GA4) FUNNELS for WooCommerce (6:13)  - <a href="https://www.youtube.com/watch?v=c6L1XMYzuMM" target="_blank">watch now</a></p>
                <p>Same Facebook (Meta) pixel or Google tag on multiple WooCommerce websites? (4:43) - <a href="https://www.youtube.com/watch?v=3Ugwlq1EVO4" target="_blank">watch now</a></p>
                <p>WooCommerce First-Party Reports: Track UTMs, Traffic Source, Landing Page (13:15) - <a href="https://www.youtube.com/watch?v=4VpVf9llfkU" target="_blank">watch video</a></p>
                <p>Find out your ads PROFIT - Meta, Google, TikTok, Pinterest, etc (5:48) - <a href="https://www.youtube.com/watch?v=ydqyp-iW9Ko" target="_blank">watch video</a></p>
            </div>
        </div>
    </div>
</div>

<!--  Transaction ID -->
<div class="card ">
    <div class="card-header">
        Transaction ID <?php renderProBadge(); ?> <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-5 form-inline">
                <label>Prefix: </label><?php renderDummyTextInput("Prefix");?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <p>Consider adding a prefix for transactions IDs if you use the same tags on multiple websites.</p>
            </div>
        </div>
    </div>
</div>
<!-- AddToCart -->
<div class="card">
    <div class="card-header">
        When to fire the add to cart event<?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="custom-controls-stacked">
				    <?php PYS()->render_checkbox_input( 'woo_add_to_cart_on_button_click', 'On Add To Cart button clicks' ); ?>
				    <?php PYS()->render_checkbox_input( 'woo_add_to_cart_on_cart_page', 'On the Cart Page' ); ?>
				    <?php PYS()->render_checkbox_input( 'woo_add_to_cart_on_checkout_page', 'On Checkout Page' ); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col  form-inline">
                <label>Change this if the AddToCart event doesn't fire</label>
                <?php PYS()->render_select_input( 'woo_add_to_cart_catch_method',
                    array('add_cart_hook'=>"WooCommerce hooks",'add_cart_js'=>"Button's classes",) ); ?>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">ID Settings</h2>
<!-- Facebook for WooCommerce -->
<?php if ( Facebook()->enabled() && Helpers\isFacebookForWooCommerceActive() ) : ?>

    <!-- @todo: add notice output -->
    <!-- @todo: add show/hide facebook content id section JS -->
    <div class="card card-static">
        <div class="card-header">
            Facebook for WooCommerce Integration<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <p><strong>It looks like you're using both PixelYourSite and Facebook for WooCommerce Extension. Good, because
                            they can do a great job together!</strong></p>
                    <p>Facebook for WooCommerce Extension is a useful free tool that lets you import your products to a Facebook
                        shop and adds a very basic Meta Pixel (formerly Facebook Pixel) on your site. PixelYourSite is a dedicated plugin that
                        supercharges your Meta Pixel (formerly Facebook Pixel) with extremely useful features.</p>
                    <p>We made it possible to use both plugins together. You just have to decide what ID to use for your events.</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="custom-controls-stacked">
                        <?php Facebook()->render_radio_input( 'woo_content_id_logic', 'facebook_for_woocommerce', 'Use Facebook for WooCommerce extension content_id logic' ); ?>
                        <?php Facebook()->render_radio_input( 'woo_content_id_logic', 'default', 'Use PixelYourSite content_id logic' ); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p><em>* If you plan to use the product catalog created by Facebook for WooCommerce Extension, use the
                            Facebook for WooCommerce Extension ID. If you plan to use older product catalogs, or new ones created
                            with other plugins, it's better to keep the default PixelYourSite settings.</em></p>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php if ( Facebook()->enabled() ) : ?>

    <?php $facebook_id_visibility = Helpers\isDefaultWooContentIdLogic() ? 'block' : 'none'; ?>
    <?php $isShowFbID = Helpers\isFacebookForWooCommerceActive();?>
    
    <div class="card" id="pys-section-facebook-id" style="display: <?php esc_attr_e( $facebook_id_visibility ); ?>;">
        <div class="card-header">
            Facebook ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body <?=$isShowFbID ? "show" : ""?>" style ="<?=$isShowFbID ? "display:block" : ""?>">
            <div class="row mb-3">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_variable_as_simple' ); ?>
                    <h4 class="switcher-label">Treat variable products like simple products</h4>
                    <p class="mt-3">Turn this option ON when your Product Catalog doesn't include the variants for variable
                        products.</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>content_id</label>
                    <?php Facebook()->render_select_input( 'woo_content_id',
                        array(
                            'product_id' => 'Product ID',
                            'product_sku'   => 'Product SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>content_id prefix</label><?php Facebook()->render_text_input( 'woo_content_id_prefix', '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left form-inline">
                    <label>content_id suffix</label><?php Facebook()->render_text_input( 'woo_content_id_suffix', '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php if ( GA()->enabled() ) : ?>

    <div class="card " id="pys-section-ga-id">
        <div class="card-header">
            Google Analytics ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_variable_as_simple' ); ?>
                    <h4 class="switcher-label">Treat variable products like simple products</h4>
                    <p class="mt-3">If you enable this option, the main ID will be used instead of the variation ID.</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ecomm_prodid</label>
                    <?php GA()->render_select_input( 'woo_content_id',
                        array(
                            'product_id' => 'Product ID',
                            'product_sku'   => 'Product SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ecomm_prodid prefix</label><?php GA()->render_text_input( 'woo_content_id_prefix', '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left form-inline">
                    <label>ecomm_prodid suffix</label><?php GA()->render_text_input( 'woo_content_id_suffix', '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- Google Ads Settings -->
<div class="card card-disabled">
    <div class="card-header">
        Google Ads ID Setting <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics?utm_source=pys-free-plugin&utm_medium=pro-badg
e&utm_campaign=pro-feature' ); ?>
    </div>

</div>

<?php if ( Pinterest()->enabled() ) : ?>

    <div class="card" id="pys-section-ga-id">
        <div class="card-header">
            Pinterest Tag ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_variable_as_simple' ); ?>
                    <h4 class="switcher-label">Treat variable products like simple products</h4>
                    <p class="mt-3">If you enable this option, the main ID will be used instead of the variation ID.</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ID</label>
                    <?php Pinterest()->render_select_input( 'woo_content_id',
                        array(
                            'product_id' => 'Product ID',
                            'product_sku'   => 'Product SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ID prefix</label><?php Pinterest()->render_text_input( 'woo_content_id_prefix', '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left form-inline">
                    <label>ID suffix</label><?php Pinterest()->render_text_input( 'woo_content_id_suffix', '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card card-static card-disabled" id="pys-section-ga-id">
        <div class="card-header">
            Pinterest Tag ID setting
            <?php renderProBadge( 'https://www.pixelyoursite.com/pinterest-tag?utm_source=pys-free-plugin&utm_medium=pinterest-badge&utm_campaign=requiere-free-add-on',
                "Requires paid add-on"); ?>
        </div>
    </div>
<?php endif; ?>

<!-- @todo: update UI -->
<!-- @todo: hide for dummy Bing -->
<?php if ( Bing()->enabled() ) : ?>
    <div class="card">
        <div class="card-header">
            Bing Tag ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'woo_variable_as_simple' ); ?>
                    <h4 class="switcher-label">Treat variable products like simple products</h4>
                    <p class="mt-3">If you enable this option, the main ID will be used instead of the variation ID.</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ID</label>
                    <?php Bing()->render_select_input( 'woo_content_id',
                        array(
                            'product_id' => 'Product ID',
                            'product_sku'   => 'Product SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ID prefix</label><?php Bing()->render_text_input( 'woo_content_id_prefix', '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left form-inline">
                    <label>ID suffix</label><?php Bing()->render_text_input( 'woo_content_id_suffix', '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="card card-static card-disabled">
        <div class="card-header">
            Bing Tag ID setting
            <?php renderProBadge( 'https://www.pixelyoursite.com/bing-tag?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-bing',
                "Requires paid add-on"); ?>
        </div>
    </div>
<?php endif; ?>

<!-- Google Dynamic Remarketing Vertical -->
<div class="card card-static card-disabled">
    <div class="card-header">
        Google Dynamic Remarketing Vertical <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics' ); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-11">
                <div class="custom-controls-stacked">
                    <?php renderDummyRadioInput( 'Use Retail Vertical  (select this if you have access to Google Merchant)' , true ); ?>
                    <?php renderDummyRadioInput( 'Use Custom Vertical (select this if Google Merchant is not available for your country)' ); ?>
                </div>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'google_dynamic_remarketing_vertical' ); ?>
            </div>
        </div>
    </div>
</div>



<!-- Event Value -->
<div class="card card-static card-disabled">
    <div class="card-header">
        Event Value Settings <?php renderProBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <div class="custom-controls-stacked">
                    <?php renderDummyRadioInput( 'Use WooCommerce price settings', true ); ?>
                    <?php renderDummyRadioInput( 'Customize Tax and Shipping' ); ?>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col col-offset-left form-inline">
                <?php renderDummySelectInput( 'Include Tax' ); ?>
                <label>and</label>
                <?php renderDummySelectInput( 'Include Shipping' ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h4 class="label">Lifetime Customer Value</h4>
                <?php renderDummyTagsFields( array( 'Pending Payment', 'Processing', 'On Hold', 'Completed' ) ); ?>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">Recommended events</h2>

<!-- Purchase -->
<div class="card">
    <div class="card-header has_switch ">
        <?php PYS()->render_switcher_input('woo_purchase_enabled');?>Track Purchases <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col-11">
                <?php renderDummyCheckbox( 'Fire the event on transaction only', true ); ?>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'woo_purchase_on_transaction' ); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <?php renderDummyCheckbox( "Don't fire the event for 0 value transactions", true ); ?>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <label>Fire the Purchase Event for the following order status: <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?></label>
                <div class="custom-controls-stacked ml-2">
                    <?php
                    $statuses = wc_get_order_statuses();
                    foreach ( $statuses as $status => $status_name) {
                        PYS()->render_checkbox_input( 'woo_order_purchase_status_'.esc_attr( $status ), esc_html( $status_name ),true);
                    }
                    ?>
                </div>
                <label>The Purchase event fires when the client makes a transaction on your website. It won't fire on when the order status is modified afterwards.</label>

            </div>
        </div>

        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_purchase_enabled' ); ?>
                    <h4 class="switcher-label">Enable the Purchase event on Facebook (required for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_purchase_enabled' ); ?>
                    <h4 class="switcher-label">Enable the Checkout event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'woo_purchase_enabled' ); ?>
                    <h4 class="switcher-label">Enable the Purchase event on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mt-3">
            <div class="col-11 col-offset-left">
                <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'woo_purchase_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div>
                    <div class="collapse-inner">
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'woo_purchase_value_option', 'price',
                                'Products price (subtotal)' ); ?>
	                        <?php  if ( !isPixelCogActive() ) { ?>
		                        <?php PYS()->render_radio_input( 'woo_purchase_value_option', 'cog',
			                        'Price minus Cost of Goods', true, true ); ?>
	                        <?php } else { ?>
		                        <?php PYS()->render_radio_input( 'woo_purchase_value_option', 'cog',
			                        'Price minus Cost of Goods', false ); ?>
							<?php } ?>
                            <?php renderDummyRadioInput( 'Percent of products value (subtotal)' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'woo_purchase_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'woo_purchase_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_purchase_enabled' ); ?>
                    <h4 class="switcher-label">Enable the purchase event on Google Analytics</h4>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_purchase_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the purchase event on Google Ads</h4>
                <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?>
            </div>
        </div>
        <?php renderDummyGoogleAdsConversionLabelInputs(); ?>

        <div class="row mt-3">
            <div class="col">
                <p class="mb-0">*This event will be fired on the order-received, the default WooCommerce "thank you
                    page". If you use PayPal, make sure that auto-return is ON. If you want to use "custom thank you
                    pages", you must configure them with our <a href="https://www.pixelyoursite.com/super-pack"
                                                                target="_blank">Super Pack</a>.</p>
            </div>
        </div>
    </div>
</div>

<!-- InitiateCheckout -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('woo_initiate_checkout_enabled');?>Track the Checkout Page <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the InitiateCheckout event on Facebook</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the InitiateCheckout on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'woo_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the InitiateCheckout on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row my-3">
            <div class="col-11 col-offset-left">
                <?php PYS()->render_switcher_input( 'woo_initiate_checkout_value_enabled', true ); ?>
                <h4 class="indicator-label">Event value on Facebook and Pinterest</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'woo_initiate_checkout_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div <?php renderCollapseTargetAttributes( 'woo_initiate_checkout_value_enabled', PYS() ); ?>>
                    <div class="collapse-inner pt-0">
                        <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'woo_initiate_checkout_value_option', 'price',
                                'Products price (subtotal)' ); ?>
	                        <?php  if ( !isPixelCogActive() ) { ?>
		                        <?php PYS()->render_radio_input( 'woo_initiate_checkout_value_option', 'cog',
			                        'Price minus Cost of Goods', true, true ); ?>
	                        <?php } else { ?>
		                        <?php PYS()->render_radio_input( 'woo_initiate_checkout_value_option', 'cog',
			                        'Price minus Cost of Goods', false ); ?>
	                        <?php } ?>
                            <?php renderDummyRadioInput( 'Percent of products value (subtotal)' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'woo_initiate_checkout_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'woo_initiate_checkout_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the begin_checkout event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_initiate_checkout_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the begin_checkout event on Google Ads</h4>
                <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?>
            </div>
        </div>
        <?php renderDummyGoogleAdsConversionLabelInputs(); ?>

    </div>
</div>

<!-- RemoveFromCart -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('woo_remove_from_cart_enabled');?>Track remove from cart <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_remove_from_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the RemoveFromCart event on Facebook</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_remove_from_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the remove_from_cart event on Google Analytics</h4>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_remove_from_cart_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the remove_from_cart event on Google Ads</h4>
                <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?>
            </div>
        </div>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_remove_from_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the RemoveFromCart event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

<!--	    --><?php //if ( Bing()->enabled() ) : ?>
<!--            <div class="row">-->
<!--                <div class="col">-->
<!--				    --><?php //Bing()->render_switcher_input( 'woo_remove_from_cart_enabled' ); ?>
<!--                    <h4 class="switcher-label">Enable the RemoveFromCart event on Bing</h4>-->
<!--				    --><?php //Bing()->renderAddonNotice(); ?>
<!--                </div>-->
<!--            </div>-->
<!--	    --><?php //endif; ?>

    </div>
</div>

<!-- AddToCart -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('woo_add_to_cart_enabled');?>Track add to cart <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the AddToCart event on Facebook (required for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the AddToCart event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'woo_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the AddToCart event on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row my-3">
            <div class="col-11 col-offset-left">
                <?php PYS()->render_switcher_input( 'woo_add_to_cart_value_enabled', true ); ?>
                <h4 class="indicator-label">Tracking Value</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'woo_add_to_cart_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div <?php renderCollapseTargetAttributes( 'woo_add_to_cart_value_enabled', PYS() ); ?>>
                    <div class="collapse-inner pt-0">
                        <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'woo_add_to_cart_value_option', 'price',
                                'Products price (subtotal)' ); ?>
	                        <?php  if ( !isPixelCogActive() ) { ?>
		                        <?php PYS()->render_radio_input( 'woo_add_to_cart_value_option', 'cog',
			                        'Price minus Cost of Goods', true, true ); ?>
	                        <?php } else { ?>
		                        <?php PYS()->render_radio_input( 'woo_add_to_cart_value_option', 'cog',
			                        'Price minus Cost of Goods', false ); ?>
	                        <?php } ?>
                            <?php renderDummyRadioInput( 'Percent of products value (subtotal)' ) ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'woo_add_to_cart_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'woo_add_to_cart_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the add_to_cart event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_add_to_cart_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the add_to_cart event on Google Ads</h4>
                <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?>
            </div>
        </div>
        <?php renderDummyGoogleAdsConversionLabelInputs(); ?>

    </div>
</div>

<!-- ViewContent -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('woo_view_content_enabled');?>Track product pages <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewContent on Facebook (required for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the PageVisit event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'woo_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the PageVisit event on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row my-3">
            <div class="col col-offset-left form-inline">
                <label>Delay</label>
                <?php PYS()->render_number_input( 'woo_view_content_delay' ); ?>
                <label>seconds</label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-11 col-offset-left">
                <?php PYS()->render_switcher_input( 'woo_view_content_value_enabled', true ); ?>
                <h4 class="indicator-label">Tracking Value</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'woo_view_content_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div <?php renderCollapseTargetAttributes( 'woo_view_content_value_enabled', PYS() ); ?>>
                    <div class="collapse-inner pt-0">
                        <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'woo_view_content_value_option', 'price',
                                'Product price' ); ?>
	                        <?php  if ( !isPixelCogActive() ) { ?>
		                        <?php PYS()->render_radio_input( 'woo_view_content_value_option', 'cog',
			                        'Price minus Cost of Goods', true, true ); ?>
	                        <?php } else { ?>
		                        <?php PYS()->render_radio_input( 'woo_view_content_value_option', 'cog',
			                        'Price minus Cost of Goods', false ); ?>
	                        <?php } ?>
                            <?php renderDummyRadioInput( 'Percent of product price' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'woo_view_content_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'woo_view_content_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the view_item event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_view_content_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the view_item event on Google Ads</h4>
                <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?>
            </div>
        </div>
        <?php renderDummyGoogleAdsConversionLabelInputs(); ?>

    </div>
</div>

<!-- ViewCategory -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('woo_view_category_enabled');?>Track product category pages <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewCategory event on Facebook Analytics (used for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the view_item_list event on Google Analytics</h4>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_view_category_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

	    <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
				    <?php Bing()->render_switcher_input( 'woo_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewCategory event on Bing</h4>
				    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
	    <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the view_item_list event on Google Ads</h4>
                <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?>
            </div>
        </div>
        <?php renderDummyGoogleAdsConversionLabelInputs(); ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'woo_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewCategory event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>



<div class="card">
    <div class="card-header">
        Track product list performance on Google Analytics
        <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature' ); ?>
        <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_view_category_enabled_tmp',false,true ); ?>
                    <h4 class="switcher-label">Enable the view_item_list event on Google Analytics(categories, related products, search, shortcodes)</h4>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'woo_view_category_non_interactive_tmp', 'Non-interactive event',true ); ?>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'woo_select_content_enabled_tmp',false,true ); ?>
                    <h4 class="switcher-label">Enable the select_content event on Google Analytics(when a product is clicked on categories, related products, search, shortcodes)</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('woo_complete_registration_enabled');?> CompleteRegistration for the Meta Pixel (formerly Facebook Pixel)<?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php Facebook()->render_checkbox_input( 'woo_complete_registration_fire_every_time',
                        "Fire this event every time a transaction takes place"); ?>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col col-offset-left">
                    <?php Facebook()->render_switcher_input( 'woo_complete_registration_use_custom_value'); ?>
                    <h4 class="switcher-label">Event value on Facebook</h4>
                    <div class="row mt-2">
                        <div class="col col-offset-left">
                            <div class="collapse-inner pt-0">
                                <div class="custom-controls-stacked">
                                    <?php Facebook()->render_radio_input("woo_complete_registration_custom_value","price",
                                        "Order's total") ?>
                                    <?php  if ( !isPixelCogActive() ) { ?>
                                        <?php Facebook()->render_radio_input( 'woo_complete_registration_custom_value', 'cog',
                                            'Price minus Cost of Goods', true, true ); ?>
                                    <?php } else { ?>
                                        <?php Facebook()->render_radio_input( 'woo_complete_registration_custom_value', 'cog',
                                            'Price minus Cost of Goods', false ); ?>
                                    <?php } ?>
                                    <?php Facebook()->render_radio_input("woo_complete_registration_custom_value","percent",
                                        "Percent of the order's total") ?>
                                    <div class="form-inline">
                                        <?php Facebook()->render_number_input( 'woo_complete_registration_percent_value' ); ?>
                                    </div>
                                    <?php Facebook()->render_radio_input("woo_complete_registration_custom_value","global",
                                        "Use global value") ?>
                                    <div class="form-inline">
                                        <?php Facebook()->render_number_input( 'woo_complete_registration_global_value' ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'woo_complete_registration_send_from_server'); ?>
                    <h4 class="switcher-label">Send this from your server only. It won't be visible on your browser.</h4>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<h2 class="section-title">PRO Events</h2>

<h2 class="section-title">Advanced Marketing Events</h2>

<!-- FrequentShopper -->
<div class="card card-disabled">
    <div class="card-header">
        FrequentShopper Event <?php renderProBadge(); ?><?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Facebook</h4>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Analytics</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col col-offset-left">
                <?php renderDummyCheckbox( 'Non-interactive event' ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Ads</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Pinterest</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Bing</h4>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col col-offset-left form-inline">
                <label>Fire this event when the client has at least </label>
			    <?php renderDummyTextInput( 2 ); ?>
                <label>transactions</label>
            </div>
        </div>
    </div>
</div>

<!-- VipClient -->
<div class="card card-disabled">
    <div class="card-header">
        VIPClient Event <?php renderProBadge(); ?><?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Facebook</h4>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Analytics</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col col-offset-left">
                <?php renderDummyCheckbox( 'Non-interactive event' ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Ads</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Pinterest</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Bing</h4>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col col-offset-left form-inline">
                <label>Fire this event when the client has at least</label>
                <?php renderDummyTextInput( 3 ); ?>
                <label>transactions and average order is at least</label>
                <?php renderDummyTextInput( 200 ); ?>
            </div>
        </div>
    </div>
</div>

<!-- BigWhale -->
<div class="card card-disabled">
    <div class="card-header">
        BigWhale Event <?php renderProBadge(); ?><?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Facebook</h4>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Analytics</h4>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col col-offset-left">
                <?php renderDummyCheckbox( 'Non-interactive event' ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Ads</h4>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Pinterest</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Bing</h4>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col col-offset-left form-inline">
                <label>Fire this event when the client has LTV at least</label>
                <?php renderDummyTextInput( 500 ); ?>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">Extra events</h2>

<!-- Affiliate -->
<div class="card card-disabled">
    <div class="card-header">
        Track WooCommerce affiliate button clicks <?php renderProBadge(); ?><?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Facebook</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Pinterest</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Bing</h4>
            </div>
        </div>
        
        <div class="row my-3">
            <div class="col col-offset-left form-inline">
                <label>Event Type:</label>
                <?php renderDummySelectInput( 'Custom' ); ?>
                <?php renderDummyTextInput( 'Enter name' ); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-11 col-offset-left">
                <?php renderDummySwitcher(); ?>
                <h4 class="indicator-label">Tracking Value</h4>
            </div>
            <div class="col-1">
		        <?php renderPopoverButton( 'woo_affiliate_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div class="collapse-inner pt-0">
                    <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                    <div class="custom-controls-stacked">
                        <?php renderDummyRadioInput( 'Product price' ); ?>
                        <?php renderDummyRadioInput( 'Use Global value' ); ?>
                        <div class="form-inline">
                            <?php renderDummyTextInput( 0 ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Analytics</h4>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <?php renderDummyCheckbox( 'Non-interactive event' ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Ads</h4>
            </div>
        </div>
     
    </div>
</div>

<!-- PayPal -->
<div class="card card-disabled">
    <div class="card-header">
        Track WooCommerce PayPal Standard clicks <?php renderProBadge(); ?><?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Facebook</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Pinterest</h4>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Bing</h4>
            </div>
        </div>
        
        <div class="row my-3">
            <div class="col col-offset-left form-inline">
                <label>Event Type:</label>
                <?php renderDummySelectInput( 'Custom' ); ?>
                <?php renderDummyTextInput( 'Enter name' ); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-11 col-offset-left">
                <?php renderDummySwitcher(); ?>
                <h4 class="indicator-label">Tracking Value</h4>
            </div>
            <div class="col-1">
		        <?php renderPopoverButton( 'woo_paypal_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div class="collapse-inner pt-0">
                    <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                    <div class="custom-controls-stacked">
                        <?php renderDummyRadioInput( 'Product price' ); ?>
                        <?php renderDummyRadioInput( 'Use Global value' ); ?>
                        <div class="form-inline">
                            <?php renderDummyTextInput( 0 ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Analytics</h4>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <?php renderDummyCheckbox( 'Non-interactive event' ); ?>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Send the event to Google Ads</h4>
            </div>
        </div>
        
    </div>
</div>

<h2 class="section-title">WooCommerce Parameters</h2>

<!-- About WooCommerce Events -->
<div class="card card-static">
    <div class="card-header">
        About WooCommerce Events Parameters
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>All events get the following Global Parameters for all the tags: <i>page_title, post_type, post_id,
                         event_URL, user_role, plugin,landing_page(pro), event_time (pro),
                        event_day (pro), event_month (pro), traffic_source (pro), UTMs (pro).</i>
                </p>
                <br><br>

                <p>The Meta Pixel (formerly Facebook Pixel) events are Dynamic Ads ready.</p>
                <p>The Google Analytics events track the data Enhanced Ecommerce or Monetization (GA4).</p>
                <p>The Pinterest events have the required data for Dynamic Remarketing.</p>

                <br><br>
                <p>The Purchase event will have the following extra-parameters:
                    <i>category_name, num_items, tags, total (pro), transactions_count (pro), tax (pro),
                        predicted_ltv (pro), average_order (pro), coupon_used (pro), coupon_code (pro), shipping (pro),
                        shipping_cost (pro).</i>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Control the WooCommerce Parameters -->
<div class="card">
    <div class="card-header">
        Control the WooCommerce Parameters <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                You can use these parameters to create audiences, custom conversions, or goals. We recommend keeping them active. If you get privacy warnings about some of these parameters, you can turn them OFF.
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'enable_woo_category_name_param' ); ?>
                <h4 class="switcher-label">category_name</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'enable_woo_num_items_param' ); ?>
                <h4 class="switcher-label">num_items</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'enable_woo_tags_param' ); ?>
                <h4 class="switcher-label">tags</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">total (PRO)</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">tax (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">transactions_count (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">predicted_ltv (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">average_order (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">coupon_used (PRO)</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">coupon_code (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">shipping (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">shipping_cost (PRO)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher( true ); ?>
                <h4 class="switcher-label">content_ids (mandatory for DPA)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher( true ); ?>
                <h4 class="switcher-label">content_type (mandatory for DPA)</h4>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher( true ); ?>
                <h4 class="switcher-label">value (mandatory for purchase, you have more options on event level)</h4>
                <hr>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <span class="mt-2">Track more actions and additional data with the PRO version:</span>
                <a target="_blank" class="btn btn-sm btn-primary float-right" href="https://www.pixelyoursite.com/facebook-pixel-plugin/buy-pixelyoursite-pro?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-upgrade-blue">UPGRADE</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Export transactions as offline conversions - Facebook (Meta)
        <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature' ); ?>
        <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row mb-1">
            <div class="col">
                <p>Learn how to use it: <a href="https://www.youtube.com/watch?v=vNsiWh0cakA" target="_blank">watch video</a></p>
            </div>
        </div>
        <div  class="row mb-4">
            <div class="col  form-inline">

                <label style="margin-bottom: 10px;margin-right: 5px">Order status:</label>
                <?php
                $allStatus = wc_get_order_statuses();
                foreach ($allStatus as $key => $label) :
                    $checked = "";
                    if($key == "wc-completed") {
                        $checked = "checked";
                    } ?>
                    <label style="margin-bottom: 5px;margin-right: 5px">
                        <input style="margin-right: 5px"  type="checkbox" <?=$checked?> class="order_status" value="<?=$key?>" name="order_status[]">
                        <?=$label?></label>

                <?php  endforeach; ?>
            </div>
        </div>

        <div  class="row">
            <div class="col  form-inline">
                <label>Select</label>

                <select class="form-control-sm" id="woo_export_purchase" >
                    <option value="export_last_time" selected="selected">Export from last time</option>
                    <option value="export_by_date">Export by dates</option>
                    <option value="export_all" >Export all orders</option>
                </select>

            </div>
        </div>

        <div  class="row mt-4">
            <div class="col-3">
                <a href="#" target="_blank" class="btn btn-sm btn-block btn-primary disabled" disabled id="woo_generate_export">Create export</a>
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