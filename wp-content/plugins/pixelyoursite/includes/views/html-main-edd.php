<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<h2 class="section-title">EasyDigitalDownloads Settings</h2>

<!-- Enable EDD -->
<div class="card card-static">
    <div class="card-body">
        <div  class="row">
            <div class="col">
                <?php renderDummySwitcher( false); ?>
                <h4 class="switcher-label">Facebook auto-renewals purchase tracking</h4><?php renderProBadge(); ?>
            </div>
        </div>
        <div  class="row">
            <div class="col">
                <?php renderDummySwitcher( false); ?>
                <h4 class="switcher-label">Google Analytics auto-renewals purchase tracking</h4><?php renderProBadge(); ?>
            </div>
        </div>
        <p class="small">
            The plugin will send a purchase event using Facebook and Google Analytics API when auto-renewals take place. This feature is not yet supported for GA4 properties.
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

        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'edd_enabled_save_data_to_orders',false ); ?>
                <h4 class="switcher-label">Save data to orders</h4>
                <small class="form-text">Save the <i>landing page, UTMs, client's browser's time, day, and month, the number of orders, lifetime value, and average order</i>. You can view this data when you edit an order. With the professional version you can view it under the <a href="<?=admin_url("admin.php?page=pixelyoursite_edd_reports")?>">Easy Digital Downloads Reports</a> section.</small>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <?php PYS()->render_switcher_input( 'edd_enabled_save_data_to_user',false,true ); ?>
                <h4 class="switcher-label">Display data to the user's profile</h4>
                <?php renderProBadge(); ?>
                <small class="form-text">Display <i>the number of orders, lifetime value, and average order</i>.</small>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col">
            <p class="mb-0">Use our dedicated plugin to create auto-updating feeds for Facebook Product Catalogs.
                <a href="https://www.pixelyoursite.com/easy-digital-downloads-product-catalog?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-catalog-edd"
                        target="_blank">Click to get Easy Digital Downloads Product Catalog Feed</a></p>
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
                <p>Enhanced Conversions for Google Ads with PixelYourSite (9:14) - <a href="https://www.youtube.com/watch?v=0uuTiOnVw80" target="_blank">watch now</a></p>
                <p>Track Facebook (META) Ads results with Google Analytics 4 (GA4) using UTMs (10:13) - <a href="https://www.youtube.com/watch?v=v3TfmX5H1Ts" target="_blank">watch now</a></p>
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
					<?php PYS()->render_checkbox_input( 'edd_add_to_cart_on_button_click', 'On Add To Cart button clicks' ); ?>
					<?php PYS()->render_checkbox_input( 'edd_add_to_cart_on_checkout_page', 'On Checkout Page' ); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">ID Settings</h2>

<?php if ( Facebook()->enabled() ) : ?>
    
    <!-- Facebook ID -->
    <div class="card">
        <div class="card-header">
            Facebook ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>content_id</label>
                    <?php Facebook()->render_select_input( 'edd_content_id',
                        array(
                            'download_id' => 'Download ID',
                            'download_sku' => 'Download SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>content_id prefix</label><?php Facebook()->render_text_input( 'edd_content_id_prefix', '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left form-inline">
                    <label>content_id suffix</label><?php Facebook()->render_text_input( 'edd_content_id_suffix', '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
    
<?php endif; ?>

<?php if ( GA()->enabled() ) : ?>

    <div class="card" id="pys-section-ga-id">
        <div class="card-header">
            Google Analytics ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ecomm_prodid</label>
                    <?php GA()->render_select_input( 'edd_content_id',
                        array(
                            'download_id' => 'Download ID',
                            'download_sku'   => 'Download SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ecomm_prodid prefix</label><?php GA()->render_text_input( 'edd_content_id_prefix', '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left form-inline">
                    <label>ecomm_prodid suffix</label><?php GA()->render_text_input( 'edd_content_id_suffix', '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


    <div class="card card-static card-disabled">
        <div class="card-header">
            Google Ads ID Settings
            <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics?utm_source=pys-free-plugin&utm_medium=pro-badg
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
                <div class="col col-offset-left form-inline">
                    <label>ID</label>
                    <?php Pinterest()->render_select_input( 'edd_content_id',
                        array(
                            'download_id' => 'Download ID',
                            'download_sku'   => 'Download SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-11 col-offset-left form-inline">
                    <label>ID prefix</label><?php Pinterest()->render_text_input( 'edd_content_id_prefix',
                        '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-11 col-offset-left form-inline">
                    <label>ID suffix</label><?php Pinterest()->render_text_input( 'edd_content_id_suffix',
                        '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card card-static card-disabled" id="pys-section-ga-id">
        <div class="card-header">
            Pinterest Tag ID setting
            <?php renderProBadge("https://www.pixelyoursite.com/pinterest-tag?utm_source=pys-free-plugin&utm_medium=pinterest-badge&utm_campaign=requiere-free-add-on",
            "Requires paid add-on"); ?>
        </div>
    </div>
<?php endif; ?>

<?php if ( Bing()->enabled() ) : ?>
    <div class="card">
        <div class="card-header">
            Bing ID setting<?php cardCollapseBtn(); ?>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col col-offset-left form-inline">
                    <label>ID</label>
                    <?php Bing()->render_select_input( 'edd_content_id',
                        array(
                            'download_id' => 'Download ID',
                            'download_sku'   => 'Download SKU',
                        )
                    ); ?>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-11 col-offset-left form-inline">
                    <label>ID prefix</label><?php Bing()->render_text_input( 'edd_content_id_prefix',
                        '(optional)' ); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-11 col-offset-left form-inline">
                    <label>ID suffix</label><?php Bing()->render_text_input( 'edd_content_id_suffix',
                        '(optional)' ); ?>
                </div>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="card card-static card-disabled">
        <div class="card-header">
            Bing Tag ID setting
            <?php renderProBadge( 'https://www.pixelyoursite.com/bing-tag?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-bing',
                "Requires paid add-on"); ?>
        </div>
    </div>
<?php endif; ?>


<hr>
<!-- Google Dynamic Remarketing Vertical -->
<div class="card  card-disabled">
    <div class="card-header">
        Google Dynamic Remarketing Vertical <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics' ); ?> <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-11">
                <div class="custom-controls-stacked">
                    <?php renderDummyRadioInput( 'Use Retail Vertical  (select this if you have access to Google Merchant)', true ); ?>
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
<div class="card  card-disabled">
    <div class="card-header">
        Event Value Settings <?php renderProBadge(); ?> <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <div class="custom-controls-stacked">
                    <?php renderDummyRadioInput( 'Use EasyDigitalDownloads price settings', true ); ?>
                    <?php renderDummyRadioInput( 'Customize Tax' ); ?>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col col-offset-left form-inline">
                <?php renderDummySelectInput( 'Include Tax' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4 class="label">Lifetime Customer Value</h4>
                <?php renderDummyTagsFields( array( 'Complete' ) ); ?>
            </div>
        </div>
    </div>
</div>
<hr>


<!-- Purchase -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('edd_purchase_enabled');?>Track Purchases <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <div class="row mb-1">
            <div class="col-11">
                <?php renderDummyCheckbox( 'Fire the event on transaction only', true ); ?>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'edd_purchase_on_transaction' ); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <?php renderDummyCheckbox( "Don't fire the event for 0 value transactions", true ); ?>
            </div>
        </div>
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'edd_purchase_enabled' ); ?>
                    <h4 class="switcher-label">Enable the Purchase event on Facebook (required for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'edd_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the Checkout event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'edd_purchase_enabled' ); ?>
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
                <?php renderPopoverButton( 'edd_purchase_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div>
                    <div class="collapse-inner">
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'edd_purchase_value_option', 'price',
                                'Downloads price (total)' ); ?>
                            <?php renderDummyRadioInput( 'Percent of downloads value (total)' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'edd_purchase_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'edd_purchase_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'edd_purchase_enabled' ); ?>
                    <h4 class="switcher-label">Enable the purchase event on Google Analytics</h4>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'edd_purchase_non_interactive',
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
                <p class="mb-0">*This event will be fired on the order-received, the default Easy Digital Downloads
                    "thank you page". If you use PayPal, make sure that auto-return is ON. If you want to use "custom
                    thank you pages", you must configure them with our
                    <a href="https://www.pixelyoursite.com/super-pack" target="_blank">Super Pack</a>.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- InitiateCheckout -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('edd_initiate_checkout_enabled');?>Track the Checkout Page <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'edd_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the InitiateCheckout event on Facebook</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'edd_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the InitiateCheckout on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'edd_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the InitiateCheckout on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row my-3">
            <div class="col-11 col-offset-left">
                <?php PYS()->render_switcher_input( 'edd_initiate_checkout_value_enabled', true ); ?>
                <h4 class="indicator-label">Event value on Facebook and Pinterest</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'edd_initiate_checkout_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div <?php renderCollapseTargetAttributes( 'edd_initiate_checkout_value_enabled', PYS() ); ?>>
                    <div class="collapse-inner pt-0">
                        <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'edd_initiate_checkout_value_option', 'price',
                                'Downloads price (subtotal)' ); ?>
                            <?php renderDummyRadioInput( 'Percent of downloads value (subtotal)' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'edd_initiate_checkout_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'edd_initiate_checkout_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'edd_initiate_checkout_enabled' ); ?>
                    <h4 class="switcher-label">Enable the begin_checkout event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'edd_initiate_checkout_non_interactive',
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

<!-- AddToCart -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('edd_add_to_cart_enabled');?>Track add to cart <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'edd_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the AddToCart event on Facebook (required for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'edd_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the AddToCart event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'edd_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the AddToCart event on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row my-3">
            <div class="col-11 col-offset-left">
                <?php PYS()->render_switcher_input( 'edd_add_to_cart_value_enabled', true ); ?>
                <h4 class="indicator-label">Tracking Value</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'edd_add_to_cart_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div <?php renderCollapseTargetAttributes( 'edd_add_to_cart_value_enabled', PYS() ); ?>>
                    <div class="collapse-inner pt-0">
                        <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'edd_add_to_cart_value_option', 'price',
                                'Downloads price (subtotal)' ); ?>
                            <?php renderDummyRadioInput( 'Percent of downloads value (subtotal)' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'edd_add_to_cart_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'edd_add_to_cart_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'edd_add_to_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the add_to_cart event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'edd_add_to_cart_non_interactive',
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
        <?php PYS()->render_switcher_input('edd_view_content_enabled');?>Track product pages <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'edd_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewContent on Facebook (required for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'edd_page_visit_enabled' ); ?>
                    <h4 class="switcher-label">Enable the PageVisit event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'edd_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the PageVisit event on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row my-3">
            <div class="col col-offset-left form-inline">
                <label>Delay</label>
                <?php PYS()->render_number_input( 'edd_view_content_delay' ); ?>
                <label>seconds</label>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-11 col-offset-left">
                <?php PYS()->render_switcher_input( 'edd_view_content_value_enabled', true ); ?>
                <h4 class="indicator-label">Tracking Value</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'edd_view_content_event_value' ); ?>
            </div>
        </div>
        <div class="row">
            <div class="col col-offset-left">
                <div <?php renderCollapseTargetAttributes( 'edd_view_content_value_enabled', PYS() ); ?>>
                    <div class="collapse-inner pt-0">
                        <label class="label-inline">Facebook and Pinterest value parameter settings:</label>
                        <div class="custom-controls-stacked">
                            <?php PYS()->render_radio_input( 'edd_view_content_value_option', 'price', 'Download price'
                            ); ?>
                            <?php renderDummyRadioInput( 'Percent of downloads price' ); ?>
                            <div class="form-inline">
                                <?php renderDummyTextInput( 0 ); ?>
                            </div>
                            <?php PYS()->render_radio_input( 'edd_view_content_value_option', 'global',
                                'Use Global value' ); ?>
                            <div class="form-inline">
                                <?php PYS()->render_number_input( 'edd_view_content_value_global' ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'edd_view_content_enabled' ); ?>
                    <h4 class="switcher-label">Enable the view_item event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'edd_view_content_non_interactive',
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
        <?php PYS()->render_switcher_input('edd_view_category_enabled');?>Track product category pages <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        
        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'edd_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewCategory event on Facebook Analytics (used for DPA)</h4>
                </div>
            </div>
        <?php endif; ?>
        
        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'edd_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the view_item_list event on Google Analytics</h4>
                </div>
            </div>
            <div class="row">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'edd_view_category_non_interactive',
                        'Non-interactive event' ); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable the view_item_list event on Google Ads</h4>
                <?php renderProBadge(); ?>
            </div>
        </div>
        <?php renderDummyGoogleAdsConversionLabelInputs(); ?>
        
        <?php if ( Pinterest()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Pinterest()->render_switcher_input( 'edd_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewCategory event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( Bing()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Bing()->render_switcher_input( 'edd_view_category_enabled' ); ?>
                    <h4 class="switcher-label">Enable the ViewCategory event on Bing</h4>
                    <?php Bing()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</div>

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
<hr>
<!-- RemoveFromCart -->
<div class="card">
    <div class="card-header has_switch">
        <?php PYS()->render_switcher_input('edd_remove_from_cart_enabled');?>Track remove from cart <?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">

        <?php if ( Facebook()->enabled() ) : ?>
            <div class="row">
                <div class="col">
                    <?php Facebook()->render_switcher_input( 'edd_remove_from_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the RemoveFromCart event on Facebook</h4>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( GA()->enabled() ) : ?>
            <div class="row mb-1">
                <div class="col">
                    <?php GA()->render_switcher_input( 'edd_remove_from_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the remove_from_cart event on Google Analytics</h4>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col col-offset-left">
                    <?php GA()->render_checkbox_input( 'edd_remove_from_cart_non_interactive',
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
                    <?php Pinterest()->render_switcher_input( 'edd_remove_from_cart_enabled' ); ?>
                    <h4 class="switcher-label">Enable the RemoveFromCart event on Pinterest</h4>
                    <?php Pinterest()->renderAddonNotice(); ?>
                </div>
            </div>
        <?php endif; ?>

        <!--        --><?php //if ( Bing()->enabled() ) : ?>
        <!--            <div class="row">-->
        <!--                <div class="col">-->
        <!--                    --><?php //Bing()->render_switcher_input( 'edd_remove_from_cart_enabled' ); ?>
        <!--                    <h4 class="switcher-label">Enable the RemoveFromCart event on Bing</h4>-->
        <!--                    --><?php //Bing()->renderAddonNotice(); ?>
        <!--                </div>-->
        <!--            </div>-->
        <!--        --><?php //endif; ?>

    </div>
</div>

<!-- About EDD Events Parameters -->
<div class="card card-static">
    <div class="card-header">
        About EDD Events Parameters
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>All events get the following parameters for all the tags: <i>page_title, post_type, post_id, event_URL, user_role, plugin, landing_page (pro), event_time (pro), event_day (pro), event_month (pro), traffic_source (pro), UTMs (pro).</i></p>
                <p>The Purchase event will have the following extra-parameters: <i>category_name, num_items, tags, total (pro), transactions_count (pro), tax (pro), predicted_ltv (pro), average_order (pro), coupon_used (pro), coupon_code (pro), shipping (pro), shipping_cost (pro).</i></p>
                <p>The Meta Pixel (formerly Facebook Pixel) events are Dynamic Ads ready.</p>
                <p>The Google Analytics events track the data Enhanced Ecommerce or Monetization (GA4).</p>
                <p>The Pinterest events have the required data for Dynamic Remarketing.</p>
            </div>
        </div>
    </div>
</div>

<!-- Control the EDD Parameters -->
<div class="card">
    <div class="card-header">
        Control the EDD Parameters <?php cardCollapseBtn(); ?>
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
                <?php PYS()->render_switcher_input( 'enable_edd_category_name_param' ); ?>
                <h4 class="switcher-label">category_name</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'enable_edd_num_items_param' ); ?>
                <h4 class="switcher-label">num_items</h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php PYS()->render_switcher_input( 'enable_edd_tags_param' ); ?>
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
                <h4 class="switcher-label">coupon (PRO)</h4>
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

<hr>
<div class="row justify-content-center">
    <div class="col-4">
        <button class="btn btn-block btn-save">Save Settings</button>
    </div>
</div>