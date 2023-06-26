<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

function adminRenderPromoNotice() {
    
    if ( ! current_user_can( 'manage_pys' ) ) {
        return;
    }
    
    $notice = adminGetCurrentPromoNotice();
    
    if ( ! $notice ) {
        return;
    }
    
    $user_id = get_current_user_id();
    
    ?>
    
    <div class="notice notice-warning is-dismissible pys-promo-notice">
        <p><?php echo $notice; ?></p>
    </div>
    <script type='application/javascript'>
        jQuery(document).on('click', '.pys-promo-notice .notice-dismiss', function () {
            jQuery.ajax({
                url: ajaxurl,
                data: {
                    action: 'pys_notice_dismiss',
                    nonce: '<?php esc_attr_e( wp_create_nonce( 'pys_notice_dismiss' ) ); ?>',
                    user_id: '<?php esc_attr_e( $user_id ); ?>',
                    addon_slug: 'free',
                    meta_key: 'promo_notice'
                }
            });
        });
    </script>
    <?php
}

function adminGetCurrentPromoNotice() {
    
    try {
        
        $user_id = get_current_user_id();
        
        /**
         * Determine which promo notices set is currently in use.
         * If meta is not present yet, it can be clean install or update from pre 7.x.
         */
        $meta = get_user_meta( $user_id, 'pys_free_current_promo_notices_set', true );
        
        if ( ! $meta ) {
        
            $meta = get_option( 'pixel_your_site', [] );
            
            if ( empty( $meta ) ) {
                // clean installation
                
                /** @noinspection PhpIncludeInspection */

                
            } else {
                // update from pre 7.x
                
                /** @noinspection PhpIncludeInspection */

                
            }
            
        } else {
    
            $path = PYS_FREE_PATH . '/notices/' . $meta . '.php';
            
            if ( file_exists( $path) ) {
                require_once $path;
            } else {
                return false;
            }
            
        }
    
        /**
         * Get promo notices start time or use current time if was not set before.
         */
        $activation_time = (int) get_option( 'pys_free_promo_notices_start_time', 0 );
    
        if ( ! $activation_time ) {
            $activation_time = time();
            update_option( 'pys_free_promo_notices_start_time', $activation_time );
        }
    
        // calc days passed since notices
        $days_passed = daysPassedFromTime( $activation_time );
        
        /**
         * Load current notices set and select sub set depends on active plugins.
         */
        $set = adminGetPromoNoticesContent();
    
        if ( isWooCommerceActive() && array_key_exists( 'woo', $set ) ) {
            $notices = $set['woo'];
        } elseif ( isEddActive() && array_key_exists( 'edd', $set ) ) {
            $notices = $set['edd'];
        } elseif ( array_key_exists( 'no_woo_no_edd', $set ) ) {
            $notices = $set['no_woo_no_edd'];
        } else {
            return false;
        }

        if (!is_array($notices) || empty($notices)) {
            $next = isset($set['next']) ? $set['next'] : false;

            if (!$next) {
                return false;
            }

            $path = PYS_FREE_PATH . '/notices/' . $next . '.php';
            if (file_exists($path)) {
                update_user_meta( $user_id, 'pys_free_current_promo_notices_set', $next );
            }

            return false;
        }
    
        /**
         * Get current notice.
         */
        $current_notice_key = (int) get_user_meta( $user_id, 'pys_free_current_promo_notice_key', true );
    
        if ( ! $current_notice_key ) {
            $current_notice_key = 0;
            update_user_meta( $user_id, 'pys_free_current_promo_notice_key', $current_notice_key );
        }
        
        return adminGetSinglePromoNoticeContent( $notices, $current_notice_key, $days_passed, $user_id );
        
    } catch ( \Exception $e ) {
        return false;
    }
}

function adminGetSinglePromoNoticeContent($notices, $current_key, $days_passed, $user_id) {
    
    // last notice reached in set
    if ( ! array_key_exists( $current_key, $notices ) ) {
        //@todo: load next set and reset "dismissed" meta
        return false;
    }
    
    $notice = $notices[ $current_key ];
    
    // if notice is disabled, use next one
    if ( array_key_exists( 'disabled', $notice ) && $notice['disabled'] ) {
        return adminGetSinglePromoNoticeContent( $notices, $current_key + 1, $days_passed, $user_id );
    }
    
    // check notice time frame
    $from = array_key_exists( 'from', $notice ) ? (int) $notice['from'] : 0;
    $to = array_key_exists( 'to', $notice ) ? (int) $notice['to'] : PHP_INT_MAX;
    
    // if notice is time is not reached yet
    if ( $days_passed < $from ) {
        return false;
    }
    
    // notice time is passed already, use next one
    if ( $days_passed > $to ) {
        delete_user_meta( $user_id, 'pys_free_promo_notice_dismissed_at' );
        return adminGetSinglePromoNoticeContent( $notices, $current_key + 1, $days_passed, $user_id );
    }
   
    $dismissed = get_user_meta( $user_id, 'pys_free_promo_notice_dismissed_at', true );
    
    if ( $dismissed ) {
        return false;
    }
    
    return array_key_exists( 'content', $notice ) ? $notice['content'] : false;
}

function daysPassedFromTime( $time_to_compare ) {
    
    $now = time();
    
    $time_passed = ( $now - $time_to_compare ) / DAY_IN_SECONDS;
    $time_passed = floor( $time_passed );
    
    return $time_passed;
    
}