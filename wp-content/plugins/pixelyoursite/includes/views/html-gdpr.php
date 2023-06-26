<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<!-- Consent Magic -->
<div class="card card-static">
    <div class="card-header">
        Consent Magic - Recommended
    </div>
    <div class="card-body">
        <?php if (isConsentMagicPluginInstalled()) : ?>
            <?php if (isConsentMagicPluginActivated()) : ?>
                <div class="row">
                    <div class="col">
                        Manage your consent settings with
                        <?php if (isConsentMagicPluginLicenceActivated()) { ?>
                            <a href="<?=admin_url("admin.php?page=consent-magic")?>">Consent Magic.</a>
                        <?php } else { ?>
                        <a href="<?=admin_url("admin.php?page=cs-license")?>">Consent Magic.</a>
                        <?php } ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col">
                        You have Consent Magic installed, but it’s not activated yet. Go to the Plugins page and activate
                        <a href="<?=admin_url("plugins.php")?>">Consent Magic.</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
        <div class="row">
            <div class="col">
                <p>Ask for consent the right way, block scripts and cookies when required.</p>
                <p><strong>Manage different type of consent:</strong></p>
                <ul class="pys_list">
                    <li><strong>Ask before tracking:</strong> show a consent message and block the tracking scripts before the
                        visitor expresses consent - ideal for GDPR.</li>
                    <li><strong>Inform and opt out:</strong> show a consent message, and block the tracking scripts if the visitor
                        doesn’t agree to tracking - ideal for CCPA.</li>
                    <li><strong>Just inform:</strong> show a non-intrusive message informing your visitors about tracking.</li>
                </ul>
                <p><strong>Use geo-targeted rules:</strong></p>
                <p>Target your visitors with the right rule based on their location. Rules can have different consent types
                    and different content. The plugin comes with the ready-made rules:</p>
                <ul class="pys_list">
                    <li><strong>GDPR rule:</strong> targets visitors from GDPR countries, and uses Ask before tracking consent
                        type.</li>
                    <li><strong>CCPA rule:</strong> targets visitors from California, and uses Inform and opt-out consent type.</li>
                    <li><strong>Rest of the world rule:</strong> targets visitors from other locations and uses Just inform consent
                        type</li>
                    <li><strong>Your own rule:</strong> create any rules you need, target any countries, and use custom text for them.</li>
                </ul>
            </div>

        </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <a href="https://www.pixelyoursite.com/plugins/consentmagic/?utm_source=pixelyoursite-free&utm_medium=pixelyoursite-free&utm_campaign=pixelyoursite-free&utm_content=pixelyoursite-free&utm_term=pixelyoursite-free" target="_blank" class="btn btn-sm pys_btn_orange">
                        Lean more about Consent Magic
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Video -->
<div class="card card-static">
    <div class="card-header">
        Recommended Consent Videos:
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p><a href="https://www.youtube.com/watch?v=uXTpgFu2V-E" target="_blank">The biggest problem with consent messages (7:02 min) - watch now</a></p>
                <p><a href="https://www.youtube.com/watch?v=ZOlNbIPS_Uc" target="_blank">Target your visitors with the right consent rule (12:29 min) - watch now</a></p>
                <p><a href="https://www.youtube.com/watch?v=P8CLxslSPDk" target="_blank">The right to change your mind (2:46 min) - watch now</a></p>
                <p><a href="https://www.youtube.com/watch?v=PsKdCkKNeLU" target="_blank">Facebook Conversion API and the Consent Problem (9:25 min) - watch now</a></p>
            </div>
        </div>
    </div>
</div>

<h2 class="section-title">Other consent plugins:</h2>

<!-- Cookiebot -->
<div class="card">
    <div class="card-header">
        <?php if ( ! isCookiebotPluginActivated() ) : ?>
            Cookiebot <span class="text-danger">[not detected]</span><?php cardCollapseBtn(); ?>
        <?php else: ?>
            Cookiebot <span class="text-success">[detected]</span><?php cardCollapseBtn(); ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>This is a complete premium solution that also offers a free plan for websites with under 100 pages.
                    For implementation, we suggest you follow their documentation.</p>
                <p class="mb-0">Website: <a href="https://cookiebot.com" target="_blank">https://cookiebot.com</a></p>
                <p class="mb-0">Plugin: <a href="https://wordpress.org/plugins/cookiebot/" target="_blank">https://wordpress.org/plugins/cookiebot/</a></p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
			    <?php PYS()->render_switcher_input( 'gdpr_cookiebot_integration_enabled', false,
				    ! isCookiebotPluginActivated() ); ?>
                <h4 class="switcher-label">Enable Cookiebot integration</h4>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label class="label-inline">Meta Pixel (formerly Facebook Pixel) consent category:</label>
            </div>
            <div class="col-4">
                <?php PYS()->render_text_input( 'gdpr_cookiebot_facebook_consent_category',
                    'Enter consent category', ! isCookiebotPluginActivated() ); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label class="label-inline">Google Analytics consent category:</label>
            </div>
            <div class="col-4">
			    <?php PYS()->render_text_input( 'gdpr_cookiebot_analytics_consent_category',
                    'Enter consent category', ! isCookiebotPluginActivated() ); ?>
            </div>
            <div class="col-4">
                * If you have advertising features enabled, enter "marketing"
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label class="label-inline">Google Ads consent category:</label>
            </div>
            <div class="col-4">
			    <?php PYS()->render_text_input( 'gdpr_cookiebot_google_ads_consent_category',
				    'Enter consent category', ! isCookiebotPluginActivated() ); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label class="label-inline">Pinterest Tag consent category:</label>
            </div>
            <div class="col-4">
			    <?php PYS()->render_text_input( 'gdpr_cookiebot_pinterest_consent_category',
                    'Enter consent category', ! isCookiebotPluginActivated() ); ?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <label class="label-inline">Bing consent category:</label>
            </div>
            <div class="col-4">
                <?php PYS()->render_text_input( 'gdpr_cookiebot_bing_consent_category',
                    'Enter consent category', ! isCookiebotPluginActivated() ); ?>
            </div>
        </div>
    </div>
</div>

<!-- Cookie Notice -->
<div class="card ">
    <div class="card-header">
		<?php if ( ! isCookieNoticePluginActivated() ) : ?>
            Cookie Notice <span class="text-danger">[not detected]</span><?php cardCollapseBtn(); ?>
		<?php else: ?>
            Cookie Notice <span class="text-success">[detected]</span><?php cardCollapseBtn(); ?>
		<?php endif; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Free plugin with various features, including the option to store negative consent.</p>
                <p class="mb-0">Plugin: <a href="https://wordpress.org/plugins/cookie-notice/" target="_blank">https://wordpress.org/plugins/cookie-notice/</a>
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
				<?php PYS()->render_switcher_input( 'gdpr_cookie_notice_integration_enabled', false,
					! isCookieNoticePluginActivated() ); ?>
                <h4 class="switcher-label">Cookie Notice integration</h4>
            </div>
        </div>
    </div>
</div>

<!-- Cookie Law Info -->
<div class="card">
    <div class="card-header">
		<?php if ( ! isCookieLawInfoPluginActivated() ) : ?>
            GDPR Cookie Consent <span class="text-danger">[not detected]</span><?php cardCollapseBtn(); ?>
		<?php else: ?>
            GDPR Cookie Consent <span class="text-success">[detected]</span><?php cardCollapseBtn(); ?>
		<?php endif; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Free plugin useful features, including the option to store negative consent.</p>
                <p class="mb-0">Plugin: <a href="https://wordpress.org/plugins/cookie-law-info/" target="_blank">https://wordpress.org/plugins/cookie-law-info/</a>
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
				<?php PYS()->render_switcher_input( 'gdpr_cookie_law_info_integration_enabled', false,
					! isCookieLawInfoPluginActivated() ); ?>
                <h4 class="switcher-label">GDPR Cookie Consent integration</h4>
            </div>
        </div>
    </div>
</div>

<!-- Real Cookie Banner -->
<div class="card">
    <div class="card-header">
        <?php if ( ! isRealCookieBannerPluginActivated() ) : ?>
            Real Cookie Banner <span class="text-danger">[not detected]</span><?php cardCollapseBtn(); ?>
        <?php else: ?>
            Real Cookie Banner <span class="text-success">[detected]</span><?php cardCollapseBtn(); ?>
        <?php endif; ?>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>Real Cookie Banner is an opt-in cookie and consent management plugin</p>
                <p class="mb-0">Plugin: <a href="https://wordpress.org/plugins/real-cookie-banner/" target="_blank">https://wordpress.org/plugins/real-cookie-banner/</a>
                </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <?php PYS()->render_switcher_input( 'gdpr_real_cookie_banner_integration_enabled', false,
                    ! isRealCookieBannerPluginActivated() ); ?>
                <h4 class="switcher-label">GDPR Cookie Consent integration</h4>
            </div>
        </div>
    </div>
</div>

<div class="card card-static">
    <div class="card-header">
        Note
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>These solutions are not perfect or easy to implement especially for a non-technical person. Contact
                    THEIR support if you need any help. The free plugins might not cover every aspect of the GDPR
                    legislation.</p>
                <p class="mb-0">We are aware of the shortcomings and we try to offer more easy to use integrations in
                    the feature.</p>
            </div>
        </div>
    </div>
</div>

<!-- API -->
<div class="card card-static">
    <div class="card-header">
        For Developers
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col">
                <?php PYS()->render_switcher_input( 'gdpr_ajax_enabled' ); ?>
                <h4 class="switcher-label">Enable AJAX filter values update</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Use <code>pys_gdpr_ajax_enabled</code>filter to by-pass option above.</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Use following filters to control each pixel:
                    <code>pys_disable_by_gdpr</code>, <code>pys_disable_facebook_by_gdpr</code>,
                    <code>pys_disable_analytics_by_gdpr</code>, <code>pys_disable_google_ads_by_gdpr</code>,
                    <code>pys_disable_pinterest_by_gdpr</code> or <code>pys_disable_bing_by_gdpr</code>.
                </p>
                <p class="mb-0">First filter will disable all pixels, other can be used to disable particular pixel.
                    Simply pass <code>TRUE</code> value to disable a pixel.
                </p>
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