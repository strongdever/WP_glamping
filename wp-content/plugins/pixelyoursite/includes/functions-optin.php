<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

add_action( 'admin_notices', 'PixelYourSite\adminRenderOptinNotices' );
function adminRenderOptinNotices() {
    
    if ( ! current_user_can( 'manage_pys' ) ) {
        return;
    }
    
    $user = wp_get_current_user();
    $user_id = $user->ID;

    // never show again for opted-in users
    if ( get_user_meta( $user_id, 'pys_core_opted_in_dismissed_at', true ) ) {
        return;
    }
    
    $second_time_dismissed_at = get_user_meta( $user_id, 'pys_core_optin_second_time_dismissed_at', true );
    $first_time_dismissed_at = get_user_meta( $user_id, 'pys_core_optin_first_time_dismissed_at', true );
    
    if ( get_user_meta( $user_id, 'pys_core_optin_third_time_dismissed_at', true ) ) {
        return; // was dismissed 3 times
    } elseif ( $second_time_dismissed_at ) {
        $month_ago = time() - MONTH_IN_SECONDS;
        
        if ( $month_ago < $second_time_dismissed_at ) {
            return; // hide if dismissed less then month ago
        }
    
        $header = 'Free PIXELYOURSITE HACKS: Improve your ads return and website tracking - LAST CALL';
        $dismiss_key = 'optin_third_time';
    } elseif ( $first_time_dismissed_at ) {
        $week_ago = time() - WEEK_IN_SECONDS;
        
        if ( $week_ago < $first_time_dismissed_at ) {
            return; // hide if dismissed less then week ago
        }
        
        $header = 'PIXELYOURSITE HACKS: Improve your ads return and website tracking with FREE Facebook, Google and Pinterest hacks';
        $dismiss_key = 'optin_second_time';
        
    } else { // was never dismissed
        $header = 'Free PIXELYOURSITE HACKS: Improve your ads return and website tracking';
        $dismiss_key = 'optin_first_time';
    }
    
    // hide close button on PYS pages
    $dismissable = empty( $_REQUEST['page'] ) || $_REQUEST['page'] != 'pixelyoursite';
    
    // on PYS pages message always same
    if ( ! $dismissable ) {
        $header = 'Free PIXELYOURSITE HACKS: Improve your ads return and website tracking';
        $dismiss_key = '';
    }
    
    ?>
    
    <style type="text/css">
        .notice.pys-notice-wrapper {
            display: flex;
            align-items: center;
            padding-top: 15px;
            padding-bottom: 15px;
        }
        .pys-notice-content h4 {
            margin-bottom: 10px;
        }
        .pys-notice-logo {
            margin-right: 15px;
            width: 50px;
            max-width: 50px;
            height: auto;
        }
        .pys-notice-wrapper h4 {
            margin-top: 0;
        }
        .pys-form-text,
        .pys-notice-label {
            display: block;
            margin-top: 4px;
            font-size: 12px;
            font-weight: 400;
            color: #495057 !important;
        }
        .pys-notice-form-group:not(:last-child) {
            margin-right: 12px;
        }
    </style>

    <div class="notice <?php echo $dismissable ? 'is-dismissible' : ''; ?> pys-optin-notice pys-notice-wrapper">
        <img src="<?php echo PYS_FREE_URL . '/dist/images/pys-square-logo-small.png'; ?>" class="pys-notice-logo">
        <div class="pys-notice-content">
            <h4><?php echo $header; ?></h4>
            <form style="display: flex;">
                <div class="pys-notice-form-group">
                    <input type="text" name="name" placeholder="Your name"
                    value="<?php esc_attr_e( $user->first_name ); ?>">
                </div>
                <div class="pys-notice-form-group">
                    <input type="email" name="email" required
                           placeholder="Your e-mail" value="<?php esc_attr_e( $user->user_email ); ?>">
                </div>
                <?php if ( isWooCommerceActive() ) : ?>
                    <div class="pys-notice-form-group">
                        <label class="pys-notice-label">
                            <input type="checkbox" name="tag[]" value="with-woo" checked>I use WooCommerce
                        </label>
                    </div>
                <?php endif; ?>
                <?php if ( isEddActive() ) : ?>
                    <div class="pys-notice-form-group">
                        <label class="pys-notice-label">
                            <input type="checkbox" name="tag[]" value="with-edd" checked>I use Easy Digital Downloads
                        </label>
                </div>
                <?php endif; ?>
                <div class="pys-notice-form-group">
                    <button class="button button-primary" style="margin-top: -2px;">SEND ME FREE HACKS</button>
                </div>
                <div class="pys-notice-form-group">
                    <small class="pys-form-text">No spam. You can unsubscribe at any time.</small>
                </div>
            </form>
        </div>
    </div>
    
    <script type="application/javascript">
        jQuery(document).on('click', '.pys-optin-notice .notice-dismiss', function () {
            jQuery.ajax({
                url: ajaxurl,
                data: {
                    action: 'pys_notice_dismiss',
                    nonce: '<?php esc_attr_e( wp_create_nonce( 'pys_notice_dismiss' ) ); ?>',
                    user_id: '<?php esc_attr_e( $user_id ); ?>',
                    addon_slug: 'core',
                    meta_key: '<?php esc_attr_e( $dismiss_key ); ?>'
                }
            })
        });

        jQuery(document).on('submit', '.pys-optin-notice form', function (e) {
            e.preventDefault();
            
            var $form = jQuery(this),
                name = $form.find('input[name="name"]').val(),
                email = $form.find('input[name="email"]').val(),
                $tags = $form.find('input[name="tag[]"]:checked'),
                tags = [];
            
            $tags.each(function (i, elem) {
                tags.push(jQuery(elem).val());
            });
            
            jQuery.ajax({
                url: 'https://pixelyoursite.com/wp-admin/admin-ajax.php',
                method: 'POST',
                crossDomain: true,
                data: {
                    action: 'pys_optin_add',
                    name: name,
                    email: email,
                    tags: tags
                },
                beforeSend: function () {
                    $form.find('input, button').attr('disabled', true);
                },
                success: function (resp) {
                    console.log(resp);
                    $form.closest('.pys-notice-wrapper').fadeOut();
                    if (resp.success) {
                        setOptedInMeta();
                    }
                }
            });
           
            var setOptedInMeta = function () {
                jQuery.ajax({
                    url: ajaxurl,
                    method: 'POST',
                    data: {
                        action: 'pys_notice_dismiss',
                        nonce: '<?php esc_attr_e( wp_create_nonce( 'pys_notice_dismiss' ) ); ?>',
                        user_id: '<?php esc_attr_e( $user_id ); ?>',
                        addon_slug: 'core',
                        meta_key: 'opted_in'
                    }
                });
            };
        });
    </script>
    
    <?php
}