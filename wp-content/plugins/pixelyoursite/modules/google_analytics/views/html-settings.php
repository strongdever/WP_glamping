<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

use PixelYourSite\GA\Helpers;

?>

<h2 class="section-title">Google Analytics Settings</h2>

<!-- General -->
<div class="card card-static">
	<div class="card-header">
		General
	</div>
	<div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <?php GA()->render_switcher_input( 'enabled' ); ?>
                <h4 class="switcher-label">Enable Google Analytics</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php GA()->render_switcher_input( 'enhance_link_attribution' ); ?>
                <h4 class="switcher-label">Enable Enhance Link Attribution</h4>
            </div>
        </div>

            <div class="row">
                <div class="col">
                    <?php GA()->render_switcher_input( 'disable_advertising_features' ); ?>
                    <h4 class="switcher-label">Disable all advertising features</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php GA()->render_switcher_input( 'disable_advertising_personalization' ); ?>
                    <h4 class="switcher-label">Disable advertising personalization</h4>
                </div>
            </div>


        <div class="row">
            <div class="col">
				<?php GA()->render_switcher_input( 'anonimize_ip' ); ?>
                <h4 class="switcher-label">Anonimize IP</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-11 col-offset-left">
                <div class="indicator indicator-off">OFF</div>
                <h4 class="indicator-label">Tracking Custom Dimensions</h4>
            </div>
            <div class="col-1">
		        <?php renderExternalHelpIcon( 'https://www.pixelyoursite.com/documentation/google-analytics-custom-dimensions?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-analytics-settings' ); ?>
            </div>
        </div>
	</div>
</div>

<!-- Google Optimize -->
<div class="card card-static">
    <div class="card-header">
        Google Optimize <?php renderProBadge( 'https://www.pixelyoursite.com/google-analytics?utm_source=pys-free-plugin&utm_medium=pro-badge&utm_campaign=pro-feature' ); ?>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <?php renderDummySwitcher(); ?>
                <h4 class="switcher-label">Enable Google Optimize</h4>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <?php renderDummyTextInput('Enter Optimize ID'); ?>
            </div>
        </div>
        <div class="row ">
            <div class="col">
                <p>
                    Learn how to configure Google Optimize:
                    <a href="https://www.youtube.com/watch?v=a5jPcLbdgy0" target="_blank">watch
                        video</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Cross-Domain Tracking -->
<!-- @link: https://developers.google.com/analytics/devguides/collection/gtagjs/cross-domain -->
<div class="card card-static">
    <div class="card-header">
        Cross-Domain Tracking
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-11">
                <?php GA()->render_switcher_input( 'cross_domain_enabled' ); ?>
                <h4 class="switcher-label">Enable Cross-Domain Tracking</h4>
            </div>
            <div class="col-1">
                <?php renderPopoverButton( 'ga_cross_domain_tracking' ); ?>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col col-offset-left">
                <?php GA()->render_switcher_input( 'cross_domain_accept_incoming' ); ?>
                <h4 class="switcher-label">Accept incoming</h4>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-5 col-offset-left">
                <?php Helpers\renderCrossDomainDomain( 0 ); ?>
            </div>
        </div>

        <?php foreach ( GA()->getOption('cross_domain_domains') as $index => $domain ) : ?>

            <?php

            if ( $index === 0 ) {
                continue; // skip default ID
            }

            ?>

            <div class="row mt-3">
                <div class="col-5 col-offset-left">
                    <?php Helpers\renderCrossDomainDomain( $index ); ?>
                </div>
                <div class="col-2">
                    <button type="button" class="btn btn-sm remove-row">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

        <?php endforeach; ?>

        <div class="row mt-3" id="pys_ga_cross_domain_domain" style="display: none;">
            <div class="col-5 col-offset-left">
                <input type="text" name="" id="" value="" placeholder="Enter domain" class="form-control">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-sm remove-row">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-5 col-offset-left">
                <button class="btn btn-sm btn-block btn-primary" type="button"
                        id="pys_ga_add_cross_domain_domain">
                    Add Extra Domain
                </button>
            </div>
        </div>
    </div>
</div>

<div class="panel">
    <div class="row">
        <div class="col text-center">
            <p class="mb-0">Track more actions with the PRO version.
                <br><a href="https://www.pixelyoursite.com/google-analytics?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-analytics-settings"
                        target="_blank">Find more about the Google Analytics pro implementation</a></p>
        </div>
    </div>
</div>

<hr>
<div class="row justify-content-center">
	<div class="col-4">
		<button class="btn btn-block btn-save">Save Settings</button>
	</div>
</div>

<script type="application/javascript">
    jQuery(document).ready(function ($) {

        $('#pys_ga_add_cross_domain_domain').click(function (e) {

            e.preventDefault();

            var $row = $('#pys_ga_cross_domain_domain').clone()
                .insertBefore('#pys_ga_cross_domain_domain')
                .attr('id', '')
                .css('display', 'flex');

            $('input[type="text"]', $row)
                .attr('name', 'pys[ga][cross_domain_domains][]');

        });

        $(document).on('click', '.remove-row', function () {
            $(this).closest('.row').remove();
        });

    });
</script>