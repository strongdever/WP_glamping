<?php

namespace PixelYourSite;

use PixelYourSite\Events;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if(isset( $_REQUEST['id'] )) {
    $id = sanitize_key($_REQUEST['id']);
    $event = CustomEventFactory::getById($id );
} else {
    $event =  new CustomEvent();
}
$serverUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

?>

<div class="panel">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <span class="mt-2">With the pro version, you can fire events on clicks, mouse over and page
                    scroll:</span>
                <a target="_blank" class="btn btn-sm btn-primary float-right" href="https://www.pixelyoursite.com/facebook-pixel-plugin/buy-pixelyoursite-pro?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-upgrade-blue">UPGRADE</a>
            </div>
        </div>
    </div>
</div>

<?php wp_nonce_field( 'pys_update_event' ); ?>
<input type="hidden" name="action" value="update">
<?php Events\renderHiddenInput( $event, 'post_id' ); ?>

<div class="card card-static">
	<div class="card-header">
		General
	</div>
	<div class="card-body">
        <div class="row mb-3">
            <div class="col">
				<?php Events\renderSwitcherInput( $event, 'enabled' ); ?>
                <h4 class="switcher-label">Enable event</h4>
            </div>
        </div>
		<div class="row">
			<div class="col">
				<?php Events\renderTextInput( $event, 'title', 'Enter event title' ); ?>
                <small class="form-text">For internal use only. Something that will help you remember the event.</small>
			</div>
		</div>
	</div>
</div>

<div class="card card-static">
    <div class="card-header">
        Event Trigger
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col form-inline">
				<label>Fire event when</label>
	            <?php Events\renderTriggerTypeInput( $event, 'trigger_type' ); ?>
                <div class="triger_post_type form-inline" style="display: none">
                    <?php Events\renderPostTypeSelect( $event, 'post_type_value' ); ?>
                </div>
                <div class="event-delay form-inline">
                    <label>with delay</label>
                    <?php Events\renderNumberInput( $event, 'delay', '0' ); ?>
                    <label>seconds</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col form-inline">
                <?php Events\renderSwitcherInput( $event, 'enable_time_window',true ); ?>
                <label>Fire this event only once in</label>
                <?php Events\renderNumberInput( $event, 'time_window', '24' ); ?>
                <label>hours</label>
                <?php renderProBadge( 'https://www.pixelyoursite.com/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature' ); ?>
            </div>
        </div>


        <div id="page_visit_panel" class="event_triggers_panel" data-trigger_type="page_visit" style="display: none;">
            <div class="row mt-3 event_trigger" data-trigger_id="0" style="display: none;">
                <div class="col">
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control-sm" name="" autocomplete="off" style="width: 100%;">
                                <option value="contains">URL Contains</option>
                                <option value="match">URL Match</option>
                                <option value="param_contains"  disabled="disabled">URL Parameters Contains (PRO)</option>
                                <option value="param_match"  disabled="disabled">URL Parameters Match (PRO)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <input name="" placeholder="Enter URL" class="form-control" type="text">
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm remove-row">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <?php foreach ( $event->getPageVisitTriggers() as $key => $trigger ) : ?>

                <?php $trigger_id = $key + 1; ?>

                <div class="row mt-3 event_trigger" data-trigger_id="<?php echo $trigger_id; ?>">
                    <div class="col">
                        <div class="row">
                            <div class="col-4">
                                <select class="form-control-sm"
                                        name="pys[event][page_visit_triggers][<?php echo $trigger_id; ?>][rule]"
                                        autocomplete="off" style="width: 100%;">
                                    <option value="contains" <?php selected( $trigger['rule'], 'contains' ); ?>>URL Contains</option>
                                    <option value="match"  <?php selected( $trigger['rule'], 'match' ); ?>>URL Match</option>
                                    <option value="param_contains"  disabled="disabled">URL Parameters Contains (PRO)</option>
                                    <option value="param_match"  disabled="disabled">URL Parameters Match (PRO)</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <input type="text" placeholder="Enter URL" class="form-control"
                                       name="pys[event][page_visit_triggers][<?php echo $trigger_id; ?>][value]"
                                       value="<?php esc_attr_e( $trigger['value'] ); ?>">
                            </div>
                            <div class="col-2">
                                <button type="button" class="btn btn-sm remove-row">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

            <div class="insert-marker"></div>

            <div class="row mt-3">
                <div class="col-4">
                    <button class="btn btn-sm btn-block btn-primary add-event-trigger" type="button">Add another
                        URL</button>
                </div>
            </div>
        </div>

        <div id="url_click_panel" class="event_triggers_panel" style="display: none;">
            <div class="row mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <p>This is a PRO trigger. <a
                                        href="https://www.pixelyoursite.com/facebook-pixel-plugin/buy-pixelyoursite-pro?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-pro-trigger"
                                        target="_blank">Upgrade to get all the benefits</a>.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <?php renderDummySelectInput( 'URL Contains', true ); ?>
                        </div>
                        <div class="col-6">
                            <?php renderDummyTextInput( 'Enter URL' ); ?>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-disabled">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-4">
                    <button class="btn btn-sm btn-block btn-disabled" type="button">Add another
                        URL</button>
                </div>
            </div>
        </div>

        <div id="css_click_panel" class="event_triggers_panel" style="display: none;">
            <div class="row mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col-10">
                            <?php renderDummyTextInput( 'Enter CSS selector' ); ?>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-disabled">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-4">
                    <button class="btn btn-sm btn-block btn-disabled" type="button">Add another
                        selector</button>
                </div>
            </div>
        </div>

        <div id="css_mouseover_panel" class="event_triggers_panel" style="display: none;">
            <div class="row mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col-10">
                            <?php renderDummyTextInput( 'Enter CSS selector' ); ?>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-disabled">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-4">
                    <button class="btn btn-sm btn-block btn-disabled" type="button">Add another
                        selector</button>
                </div>
            </div>
        </div>

        <div id="scroll_pos_panel" class="event_triggers_panel" style="display: none;">
            <div class="row mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col-3">
                            <?php renderDummyNumberInput(); ?>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-disabled">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-4">
                    <button class="btn btn-sm btn-block btn-disabled" type="button">Add another
                        threshold</button>
                </div>
            </div>
        </div>
        <?php $eventsFormFactory = apply_filters("pys_form_event_factory",[]);
        foreach ($eventsFormFactory as $activeFormPlugin) : ?>
            <div id="<?php echo $activeFormPlugin->getSlug();?>_panel" class="event_triggers_panel" data-trigger_type="<?php echo $activeFormPlugin->getSlug();?>" style="display: none;">
                <div class="row mt-3 event_trigger" data-trigger_id="0">
                    <div class="col">
                        <?php renderDummySelectInput('Forms');?>
                    </div>

                </div>
                <small class="form-text">Select Forms to Trigger the Event.</small>
            </div>
        <?php
        endforeach;
        ?>
        <div id="url_filter_panel" class="event_triggers_panel" style="display: none;">
            <div class="row mt-3">
                <div class="col">
                    <div class="row">
                        <div class="col-10">
                            <?php renderDummyTextInput( 'Enter URL' ); ?>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-sm btn-disabled">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4">
                    <button class="btn btn-sm btn-block btn-disabled" type="button">Add URL filter</button>
                </div>
            </div>
        </div>

    </div>
</div>

<?php if ( Facebook()->enabled() ) : ?>
    <div class="card card-static">
        <div class="card-header">
            Facebook
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <?php Events\renderSwitcherInput( $event, 'facebook_enabled' ); ?>
                    <h4 class="switcher-label">Enable on Facebook</h4>
                </div>
            </div>
            <div id="facebook_panel">
                <div class="row mt-3">
                    <div class="col col-offset-left form-inline">
                        <label>Event type:</label>
                        <?php Events\renderFacebookEventTypeInput( $event, 'facebook_event_type' ); ?>
                        <div class="facebook-custom-event-type form-inline">
                            <?php Events\renderTextInput( $event, 'facebook_custom_event_type', 'Enter name' ); ?>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col col-offset-left">
                        <?php Events\renderSwitcherInput( $event, 'facebook_params_enabled' ); ?>
                        <h4 class="indicator-label">Add Parameters</h4>
                    </div>
                </div>
                <div id="facebook_params_panel">
                    <div class="row mt-3">
                        <div class="col col-offset-left">
        
                            <div class="row mb-3 ViewContent Search AddToCart AddToWishlist InitiateCheckout AddPaymentInfo Purchase Lead CompleteRegistration Subscribe StartTrial">
                                <label class="col-5 control-label">value</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'value' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 ViewContent Search AddToCart AddToWishlist InitiateCheckout AddPaymentInfo Purchase Lead CompleteRegistration Subscribe StartTrial">
                                <label class="col-5 control-label">currency</label>
                                <div class="col-4">
                                    <?php Events\renderCurrencyParamInput( $event, 'currency' ); ?>
                                </div>
                                <div class="col-2 facebook-custom-currency">
                                    <?php Events\renderFacebookParamInput( $event, 'custom_currency' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 ViewContent AddToCart AddToWishlist InitiateCheckout Purchase Lead CompleteRegistration">
                                <label class="col-5 control-label">content_name</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'content_name' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 ViewContent AddToCart AddToWishlist InitiateCheckout Purchase Lead CompleteRegistration">
                                <label class="col-5 control-label">content_ids</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'content_ids' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 ViewContent AddToCart InitiateCheckout Purchase">
                                <label class="col-5 control-label">content_type</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'content_type' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 Search AddToWishlist InitiateCheckout AddPaymentInfo Lead">
                                <label class="col-5 control-label">content_category</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'content_category' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 InitiateCheckout Purchase">
                                <label class="col-5 control-label">num_items</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'num_items' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 Purchase">
                                <label class="col-5 control-label">order_id</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'order_id' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 Search">
                                <label class="col-5 control-label">search_string</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'search_string' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 CompleteRegistration">
                                <label class="col-5 control-label">status</label>
                                <div class="col-4">
                                    <?php Events\renderFacebookParamInput( $event, 'status' ); ?>
                                </div>
                            </div>
                            <div class="row mb-3 Subscribe StartTrial">
                                <label class="col-5 control-label">predicted_ltv</label>
                                <div class="col-4">
			                        <?php Events\renderFacebookParamInput( $event, 'predicted_ltv' ); ?>
                                </div>
                            </div>
        
                            <!-- Custom Facebook Params -->
                            <div class="row mt-3 facebook-custom-param" data-param_id="0" style="display: none;">
                                <div class="col-1"></div>
                                <div class="col-4">
                                    <input name="" placeholder="Enter name" class="form-control custom-param-name" type="text">
                                </div>
                                <div class="col-4">
                                    <input name="" placeholder="Enter value" class="form-control custom-param-value"
                                           type="text">
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-sm remove-row">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
        
                            <?php foreach ( $event->getFacebookCustomParams() as $key => $custom_param ) : ?>
        
                                <?php $param_id = $key + 1; ?>
        
                                <div class="row mt-3 facebook-custom-param" data-param_id="<?php echo $param_id; ?>">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <div class="col-4">
                                                <input type="text" placeholder="Enter name" class="form-control custom-param-name"
                                                       name="pys[event][facebook_custom_params][<?php echo $param_id; ?>][name]"
                                                       value="<?php esc_attr_e( $custom_param['name'] ); ?>">
                                            </div>
                                            <div class="col-4">
                                                <input type="text" placeholder="Enter value" class="form-control custom-param-value"
                                                       name="pys[event][facebook_custom_params][<?php echo $param_id; ?>][value]"
                                                       value="<?php esc_attr_e( $custom_param['value'] ); ?>">
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-sm remove-row">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                            <?php endforeach; ?>
        
                            <div class="insert-marker"></div>
        
                            <div class="row mt-3">
                                <div class="col-5"></div>
                                <div class="col-4">
                                    <button class="btn btn-sm btn-block btn-primary add-facebook-parameter" type="button">Add
                                        Custom Parameter</button>
                                </div>
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ( GA()->enabled() ) : ?>
    <div class="card card-static">
        <div class="card-header">
            Google Analytics
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col">
                    <?php Events\renderSwitcherInput( $event, 'ga_enabled' ); ?>
                    <h4 class="switcher-label">Enable on Google Analytics</h4>
                </div>
            </div>
            <div id="analytics_panel">
                <div class="row mt-3">
                    <div class="col ">
                        <?php
                        if($event->isGaV4()) :
                        ?>
                        <div class="row mb-3">
                            <div class="col col-offset-left form-inline" >
                                <script>
                                    <?php
                                    $fields = array();
                                    foreach ($event->GAEvents as $group => $items) {
                                        foreach ($items as $name => $elements) {
                                            $fields[] = array("name"=>$name,'fields'=>$elements);
                                        }
                                    }

                                    ?>
                                    var ga_fields = <?=json_encode($fields)?>
                                </script>
                                <label class=" control-label">Event</label>

                                <?php  Events\renderGoogleAnalyticsV4ActionInput( $event, 'ga_event_action' ); ?>

                                <div id="ga-custom-action">
                                    <?php Events\renderTextInput( $event, 'ga_custom_event_action', 'Enter name' ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="ga-param-list">
                            <?php
                            foreach($event->getGaParams() as $key=>$val) : ?>
                                <div class="row mb-3 ga_param">
                                    <label class="col-5 control-label"><?=$key?></label>
                                    <div class="col-4">
                                        <?php Events\renderGAParamInput( $key, $val ); ?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="ga-custom-param-list">
                            <?php
                            foreach ( $event->getGACustomParams() as $key => $custom_param ) : ?>
                                <?php $param_id = $key + 1; ?>

                                <div class="row mt-3 ga-custom-param" data-param_id="<?php echo $param_id; ?>">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-1"></div>
                                            <div class="col-4">
                                                <input type="text" placeholder="Enter name" class="form-control custom-param-name"
                                                       name="pys[event][ga_custom_params][<?php echo $param_id; ?>][name]"
                                                       value="<?php esc_attr_e( $custom_param['name'] ); ?>">
                                            </div>
                                            <div class="col-4">
                                                <input type="text" placeholder="Enter value" class="form-control custom-param-value"
                                                       name="pys[event][ga_custom_params][<?php echo $param_id; ?>][value]"
                                                       value="<?php esc_attr_e( $custom_param['value'] ); ?>">
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-sm remove-row">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="row mt-3">
                            <div class="col-5"></div>
                            <div class="col-4">
                                <button class="btn btn-sm btn-block btn-primary add-ga-custom-parameter" type="button">Add
                                    Custom Parameter</button>
                            </div>
                        </div>
                        <div class="row mb">
                            <label class="col-5 control-label">Non-interactive</label>
                            <div class="col-4">
                                <?php Events\renderSwitcherInput( $event, 'ga_non_interactive' ); ?>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                The following parameters are automatically tracked: content_name, event_url, post_id, post_type. The paid version tracks the event_hour, event_month, and event_day.
                            </div>
                                </div>
                            <div class="row mt-3 ga_woo_info" style="display: none">
                                <div class="col-12">
                                    <strong>ATTENTION</strong>:​ the plugin automatically tracks ecommerce specific events for WooCommerce and Easy Digital Downloads. Make sure you really need this event.
                                </div>
                            </div>

                    <?php else:?>
                    <div class="row mb-3">
                        <label class="col-5 control-label">Action</label>
                        <div class="col-4">
                            <?php  Events\renderGoogleAnalyticsActionInput( $event, 'ga_event_action' ); ?>
                        </div>
                        <div class="col-3">
                            <div id="ga-custom-action">
                                <?php Events\renderTextInput( $event, 'ga_custom_event_action', 'Enter name' ); ?>
                            </div>
                        </div>
                            </div>
                    <div class="row mb-3">
                        <label class="col-5 control-label">Category</label>
                        <div class="col-4">
                            <?php Events\renderTextInput( $event, 'ga_event_category' ); ?>
                        </div>
                            </div>
                    <div class="row mb-3">
                        <label class="col-5 control-label">Label</label>
                        <div class="col-4">
                            <?php Events\renderTextInput( $event, 'ga_event_label' ); ?>
                        </div>
                            </div>
                    <div class="row mb-3">
                        <label class="col-5 control-label">Value</label>
                        <div class="col-4">
                            <?php Events\renderTextInput( $event, 'ga_event_value' ); ?>
                        </div>
                    </div>
                        <div class="row mb">
                            <label class="col-5 control-label">Non-interactive</label>
                            <div class="col-4">
                                <?php Events\renderSwitcherInput( $event, 'ga_non_interactive' ); ?>
                            </div>
                        </div>
                    <?php endif?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="card card-disabled">
    <div class="card-header">
        Google Ads <?php renderProBadge('https://www.pixelyoursite.com/google-ads-tag/?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature'); ?><?php cardCollapseBtn(); ?>
    </div>
    <div class="card-body">
        <div class="row mb-2">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable on Google Ads</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col col-offset-left" id="google_ads_params_panel">
                <div class="row mb-3">
                    <label class="col-5 control-label">Conversion ID</label>
                    <div class="col-4">
                        <?php renderDummySelectInput( 'All', true ); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-5 control-label">Conversion Label</label>
                    <div class="col-4">
                        <?php renderDummyTextInput( 'Enter name' ); ?>
                        <small class="form-text">Optional</small>
                    </div>
                </div>

                <!-- Default Params -->
                <div class="row mb-3">
                    <label class="col-5 control-label">Action</label>
                    <div class="col-4">
                        <?php renderDummySelectInput( 'Custom Action', true ); ?>
                    </div>
                    <div class="col-3">
                        <div id="ga-custom-action">
                            <?php renderDummyTextInput( 'Enter name' ); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-5 control-label">Category</label>
                    <div class="col-4">
                        <?php renderDummyTextInput(); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-5 control-label">Label</label>
                    <div class="col-4">
                        <?php renderDummyTextInput(); ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-5 control-label">Value</label>
                    <div class="col-4">
                        <?php renderDummyTextInput(); ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-5"></div>
                    <div class="col-4">
                        <button class="btn btn-sm btn-block btn-secondary" type="button" disabled>Add Custom Parameter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ( Pinterest()->enabled() ) : ?>
    <?php Pinterest()->renderCustomEventOptions( $event ); ?>
<?php endif; ?>

<?php if ( Bing()->enabled() ) : ?>
    <?php Bing()->renderCustomEventOptions( $event ); ?>
<?php endif; ?>

<div class="card card-static card-disabled">
    <div class="card-header">
        Dynamic Parameters Help <?php renderProBadge(); ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <ul class="text-secondary">
                    <li><code>[id]</code> - it will pull the WordPress post ID</li>
                    <li><code>[title]</code> - it will pull the content title</li>
                    <li><code>[content_type]</code> - it will pull the post type (post, product, page and so on)</li>
                    <li><code>[categories]</code> - it will pull the content categories</li>
                    <li><code>[tags]</code> - it will pull the content tags</li>
                    <li><code>[total]</code> - it will pull WooCommerce or EDD order's total when it exists</li>
                    <li><code>[subtotal]</code> - it will pull WooCommerce or EDD orders's subtotal when it exists</li>
                </ul>
                <p><strong class="text-secondary">Track URL parameters:</strong></p>
                <p class="text-secondary"> Use <code>[url_ParameterName]</code> where ParameterName = the name of the parameter. <br/>
                    Example:<br/>
                    This is your URL: <?=$serverUrl?>?ParameterName=123<br/>
                    The parameter value will be 123.<br/>
                </p>
                <p class="text-secondary mb-0"><strong>Note:</strong> if a parameter is missing from a particular
                    page, the event won't include it.</p>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row justify-content-center">
	<div class="col-4">
		<button class="btn btn-block btn-save">Save Event</button>
	</div>
</div>