<?php

namespace PixelYourSite;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * @property int    post_id
 * @property string title
 * @property bool   enabled
 *
 * @property int    delay
 * @property array  triggers
 * @property string trigger_type
 *
 * @property bool   facebook_enabled
 * @property string facebook_event_type
 * @property string facebook_custom_event_type
 * @property bool   facebook_params_enabled
 * @property array  facebook_params
 * @property array  facebook_custom_params
 *
 * @property bool   pinterest_enabled
 * @property string pinterest_event_type
 * @property string pinterest_custom_event_type
 * @property bool   pinterest_params_enabled
 * @property array  pinterest_custom_params
 * @property array  ga_custom_params
 * @property array  ga_params
 *
 * @property bool   ga_enabled
 * @property string ga_event_action
 * @property string ga_custom_event_action
 * @property string ga_event_category
 * @property string ga_event_label
 * @property string ga_event_value
 * @property bool   ga_non_interactive
 *
 * @property bool   bing_enabled
 * @property string bing_event_action
 * @property string bing_event_category
 * @property string bing_event_label
 * @property string bing_event_value
 */
class CustomEvent {

	private $post_id;

	private $title = 'Untitled';

	private $enabled = true;

    public $GAEvents = array(
        "" => array("CustomEvent"=>array()),
        "All Properties"    => array(
            "earn_virtual_currency" => array("virtual_currency_name","value"),
            "join_group" => array("group_id"),
            "login" => array("method"),
            "purchase" => array("transaction_id",'value','currency','tax','shipping','items','coupon'),
            "refund" => array("transaction_id",'value','currency','tax','shipping','items'),
            "search" => array("search_term"),
            "select_content" => array("content_type",'item_id'),
            "share" => array("content_type",'item_id'),
            "sign_up" => array("method"),
            "spend_virtual_currency" => array("item_name",'virtual_currency_name','value'),
            "tutorial_begin" => array(),
            "tutorial_complete" => array(),
        ),
        "Retail/Ecommerce"  => array(
            'add_payment_info'  => array('coupon','currency','items','payment_type','value'),
            'add_shipping_info' => array('coupon','currency','items','shipping_tier','value'),
            'add_to_cart'  => array('currency', 'items', 'value'),
            'add_to_wishlist'  => array('currency', 'items', 'value'),
            'begin_checkout'  => array('coupon','currency', 'items', 'value'),
            'generate_lead'  => array('value', 'currency'),
            'purchase'  => array('affiliation', 'coupon', 'currency', 'items', 'transaction_id', 'shipping', 'tax', 'value'),
            'refund'  => array('affiliation', 'coupon', 'currency', 'items', 'transaction_id', 'shipping', 'tax', 'value'),
            'remove_from_cart'  => array('currency', 'items', 'value'),
            'select_item'  => array('items', 'item_list_name', 'item_list_id'),
            'select_promotion'  => array('items', 'promotion_id', 'promotion_name', 'creative_name', 'creative_slot', 'location_id'),
            'view_cart'  => array('currency', 'items', 'value'),
            'view_item'  => array('currency', 'items', 'value'),
            'view_item_list'  => array('items', 'item_list_name', 'item_list_id'),
            'view_promotion'  => array('items', 'promotion_id', 'promotion_name', 'creative_name', 'creative_slot', 'location_id')
        ),
        "Jobs, Education, Local Deals, Real Estate"  => array(
            'add_payment_info'  =>  array("coupon", 'currency', 'items', 'payment_type', 'value'),
            'add_shipping_info'  =>  array('coupon', 'currency', 'items', 'shipping_tier', 'value'),
            'add_to_cart'  =>  array('currency', 'items', 'value'),
            'add_to_wishlist'  =>  array('currency', 'items', 'value'),
            'begin_checkout'  =>  array('coupon','currency', 'items', 'value'),
            'purchase'  =>  array('affiliation', 'coupon', 'currency', 'items', 'transaction_id', 'shipping', 'tax', 'value'),
            'refund'  =>  array('affiliation', 'coupon', 'currency', 'items', 'transaction_id', 'shipping', 'tax', 'value'),
            'remove_from_cart'  =>  array('currency', 'items', 'value'),
            'select_item'  =>  array('items', 'item_list_name', 'item_list_id'),
            'select_promotion'  =>  array('items', 'promotion_id', 'promotion_name', 'creative_name', 'creative_slot', 'location_id'),
            'view_cart'  =>  array('currency', 'items', 'value'),
            'view_item'  =>  array('currency', 'items', 'value'),
            'view_item_list'  =>  array('items', 'item_list_name', 'item_list_id'),
            'view_promotion'  =>  array('items', 'promotion_id', 'promotion_name', 'creative_name', 'creative_slot', 'location_id')
        ),
        "Travel (Hotel/Air)"  => array(
            'add_payment_info'  =>  array("coupon", 'currency', 'items', 'payment_type', 'value'),
            'add_shipping_info'  =>  array('coupon', 'currency', 'items', 'shipping_tier', 'value'),
            'add_to_cart'  =>  array('currency', 'items', 'value'),
            'add_to_wishlist'  =>  array('currency', 'items', 'value'),
            'begin_checkout'  =>  array('coupon','currency', 'items', 'value'),
            'generate_lead' => array('value', 'currency'),
            'purchase' => array('affiliation', 'coupon', 'currency', 'items', 'transaction_id', 'shipping', 'tax', 'value'),
            'refund' => array('affiliation', 'coupon', 'currency', 'items', 'transaction_id', 'shipping', 'tax', 'value'),
            'remove_from_cart'  =>  array('currency', 'items', 'value'),
            'select_item'  =>  array('items', 'item_list_name', 'item_list_id'),
            'select_promotion'  =>  array('items', 'promotion_id', 'promotion_name', 'creative_name', 'creative_slot', 'location_id'),
            'view_cart'  =>  array('currency', 'items', 'value'),
            'view_item'  =>  array('currency', 'items', 'value'),
            'view_item_list'  =>  array('items', 'item_list_name', 'item_list_id'),
            'view_promotion'  =>  array('items', 'promotion_id', 'promotion_name', 'creative_name', 'creative_slot', 'location_id')
        ),
        "Games" => array(
            'earn_virtual_currency'  => array('virtual_currency_name', 'value'),
            'join_group'  => array('group_id'),
            'level_end'  => array('level_name', 'success'),
            'level_start'  => array('level_name'),
            'level_up'  => array('character', 'level'),
            'post_score'  => array('level', 'character', 'score'),
            'select_content'  => array('content_type', 'item_id'),
            'spend_virtual_currency'  => array('item_name', 'virtual_currency_name', 'value'),
            'tutorial_begin'  => array(),
            'tutorial_complete'  => array(),
            'unlock_achievement'  => array('achievement_id'),
        )
    );

	private $data = array(
		'delay'        => null,
		'trigger_type' => 'page_visit',
		'triggers'     => array(),
		
		'facebook_enabled'           => false,
		'facebook_event_type'        => 'ViewContent',
		'facebook_custom_event_type' => null,
		'facebook_params_enabled'    => false,
		'facebook_params'            => array(),
		'facebook_custom_params'     => array(),
		
		'pinterest_enabled'           => false,
		'pinterest_event_type'        => 'ViewContent',
		'pinterest_custom_event_type' => null,
		'pinterest_params_enabled'    => false,
		'pinterest_custom_params'     => array(),
		
		'ga_enabled'             => false,
		'ga_event_action'        => '_custom',
		'ga_custom_event_action' => null,
		'ga_event_category'      => null,
		'ga_event_label'         => null,
		'ga_event_value'         => null,
		'ga_non_interactive'     => true,

        //ver 4
        'ga_params'             => array(),
        'ga_custom_params'      => array(),
        'ga_custom_params_enabled'    => false,


        'bing_enabled' => false,
        'bing_event_action' => null,
        'bing_event_category' => null,
        'bing_event_label' => null,
        'bing_event_value' => null,
	);

	public function __construct( $post_id = null ) {
		$this->initialize( $post_id );
	}

	public function __get( $key ) {

		if ( $key == 'post_id' ) {
			return $this->post_id;
		}

		if ( $key == 'title' ) {
			return $this->title;
		}

		if ( $key == 'enabled' ) {
			return $this->enabled;
		}

		if ( isset( $this->data[ $key ] ) ) {
			return $this->data[ $key ];
		} else {
			return null;
		}

	}

	private function initialize( $post_id ) {

		if ( $post_id ) {

			$this->post_id = $post_id;
			$this->title   = get_the_title( $post_id );
			
			$data = get_post_meta( $post_id, '_pys_event_data', true );
			$this->data = is_array( $data ) ? $data : array();

			$state = get_post_meta( $post_id, '_pys_event_state', true );
			$this->enabled = $state == 'active' ? true : false;


            if(count(GA()->getPixelIDs()) == 0) {
                $this->data['ga_enabled'] = false;
                $this->clearGa();
            }

		}

	}

	public function update( $args = null ) {

		if ( ! is_array( $args ) ) {
			$args = $this->data;
		}

		/**
		 * GENERAL
		 */

		// title
		wp_update_post( array(
			'ID'         => $this->post_id,
			'post_title' => empty( $args['title'] ) ? $this->title : sanitize_text_field( $args['title'] )
		) );

		// state
		$state = isset( $args['enabled'] ) && $args['enabled'] ? 'active' : 'paused';
		$this->enabled = $state == 'active' ? true : false;
		update_post_meta( $this->post_id, '_pys_event_state', $state );
		
		// trigger type
		$this->data['trigger_type'] = 'page_visit';

		// delay
		$this->data['delay'] = isset( $args['delay'] ) && $args['delay'] ? (int) $args['delay'] : null;

		/**
		 * TRIGGERS
		 */

		// reset old triggers
		$this->data['triggers'] = array();

		// page visit triggers
		if ( $this->trigger_type == 'page_visit' && isset( $args['page_visit_triggers'] )
		     && is_array( $args['page_visit_triggers'] ) ) {

			foreach ( $args['page_visit_triggers'] as $trigger ) {

				if ( ! empty( $trigger['value'] ) ) {

					$this->data['triggers'][] = array(
						'rule'  => $trigger['rule'] == 'contains' ? 'contains' : 'match',
						'value' => $trigger['value'],
					);

				}

			}

		}
		
		// reset old url filters
		$this->data['url_filters'] = array();

		/**
		 * FACEBOOK
		 */

		$facebook_event_types = array(
			'ViewContent',
			'AddToCart',
			'AddToWishlist',
			'InitiateCheckout',
			'AddPaymentInfo',
			'Purchase',
			'Lead',
			'CompleteRegistration',
			
			'Subscribe',
			'CustomizeProduct',
			'FindLocation',
			'StartTrial',
			'SubmitApplication',
			'Schedule',
			'Contact',
			'Donate',
			
			'CustomEvent'
		);

		// enabled
		$this->data['facebook_enabled'] = isset( $args['facebook_enabled'] ) && $args['facebook_enabled'] ? true : false;

		// event type
		$this->data['facebook_event_type'] = isset( $args['facebook_event_type'] ) && in_array( $args['facebook_event_type'], $facebook_event_types )
			? sanitize_text_field( $args['facebook_event_type'] )
			: 'ViewContent';

		// custom event type
		$this->data['facebook_custom_event_type'] = $this->facebook_event_type == 'CustomEvent' && ! empty( $args['facebook_custom_event_type'] )
			? sanitizeKey( $args['facebook_custom_event_type'] )
			: null;

		// params enabled
		$this->data['facebook_params_enabled'] = isset( $args['facebook_params_enabled'] ) && $args['facebook_params_enabled'] ? true : false;

		// params
		if ( $this->facebook_params_enabled && isset( $args['facebook_params'] ) && $this->facebook_event_type !== 'CustomEvent' ) {

			$this->data['facebook_params'] = array(
				'value'            => ! empty( $args['facebook_params']['value'] ) ? sanitize_text_field( $args['facebook_params']['value'] ) : null,
				'currency'         => ! empty( $args['facebook_params']['currency'] ) ? sanitize_text_field( $args['facebook_params']['currency'] ) : null,
				'content_name'     => ! empty( $args['facebook_params']['content_name'] ) ? sanitize_text_field( $args['facebook_params']['content_name'] ) : null,
				'content_ids'      => ! empty( $args['facebook_params']['content_ids'] ) ? sanitize_text_field( $args['facebook_params']['content_ids'] ) : null,
				'content_type'     => ! empty( $args['facebook_params']['content_type'] ) ? sanitize_text_field( $args['facebook_params']['content_type'] ) : null,
				'content_category' => ! empty( $args['facebook_params']['content_category'] ) ? sanitize_text_field( $args['facebook_params']['content_category'] ) : null,
				'num_items'        => ! empty( $args['facebook_params']['num_items'] ) ? (int) $args['facebook_params']['num_items'] : null,
				'order_id'         => ! empty( $args['facebook_params']['order_id'] ) ? sanitize_text_field( $args['facebook_params']['order_id'] ) : null,
				'search_string'    => ! empty( $args['facebook_params']['search_string'] ) ? sanitize_text_field( $args['facebook_params']['search_string'] ) : null,
				'status'           => ! empty( $args['facebook_params']['status'] ) ? sanitize_text_field( $args['facebook_params']['status'] ) : null,
				'predicted_ltv'    => ! empty( $args['facebook_params']['predicted_ltv'] ) ? sanitize_text_field( $args['facebook_params']['predicted_ltv'] ) : null,
			);

			// custom currency
			if ( $this->data['facebook_params']['currency'] == 'custom' && ! empty( $args['facebook_params']['custom_currency'] )) {
				$this->data['facebook_params']['custom_currency'] = sanitize_text_field( $args['facebook_params']['custom_currency'] );
			} else {
				$this->data['facebook_params']['custom_currency'] = null;
			}

		} else {
			
			$this->data['facebook_params'] = array(
				'value'            => null,
				'currency'         => null,
				'custom_currency'  => null,
				'content_name'     => null,
				'content_ids'      => null,
				'content_type'     => null,
				'content_category' => null,
				'num_items'        => null,
				'order_id'         => null,
				'search_string'    => null,
				'status'           => null,
				'predicted_ltv'    => null,
			);

		}

		// reset old custom params
		$this->data['facebook_custom_params'] = array();

		// custom params
		if ( $this->facebook_params_enabled && isset( $args['facebook_custom_params'] ) ) {

			foreach ( $args['facebook_custom_params'] as $custom_param ) {

				if ( ! empty( $custom_param['name'] ) && ! empty( $custom_param['value'] ) ) {

					$this->data['facebook_custom_params'][] = array(
						'name'  => sanitize_text_field( $custom_param['name'] ),
						'value' => sanitize_text_field( $custom_param['value'] ),
					);

				}

			}

		}

		/**
		 * PINTEREST
		 */
		
		$pinterest_event_types = array(
			'pagevisit',
			'viewcategory',
			'search',
			'addtocart',
			'checkout',
			'watchvideo',
			'signup',
			'lead',
			'custom',
			'CustomEvent',
		);
		
		// enabled
		$this->data['pinterest_enabled'] = isset( $args['pinterest_enabled'] ) && $args['pinterest_enabled'] ? true
			: false;
		
		// event type
		$this->data['pinterest_event_type'] = isset( $args['pinterest_event_type'] ) && in_array( $args['pinterest_event_type'],
			$pinterest_event_types )
			? sanitize_text_field( $args['pinterest_event_type'] )
			: 'pagevisit';
		
		// custom event type
		$this->data['pinterest_custom_event_type'] = $this->pinterest_event_type == 'CustomEvent' && ! empty( $args['pinterest_custom_event_type'] )
			? sanitizeKey( $args['pinterest_custom_event_type'] )
			: null;
		
		// params enabled
		$this->data['pinterest_params_enabled'] = isset( $args['pinterest_params_enabled'] ) && $args['pinterest_params_enabled']
			? true : false;
		
		// reset old custom params
		$this->data['pinterest_custom_params'] = array();
		
		// custom params
		if ( $this->pinterest_params_enabled && isset( $args['pinterest_custom_params'] ) ) {
			
			foreach ( $args['pinterest_custom_params'] as $custom_param ) {
				
				if ( ! empty( $custom_param['name'] ) && ! empty( $custom_param['value'] ) ) {
					
					$this->data['pinterest_custom_params'][] = array(
						'name'  => sanitize_text_field( $custom_param['name'] ),
						'value' => sanitize_text_field( $custom_param['value'] ),
					);
					
				}
				
			}
			
		}

		/**
		 * GOOGLE ANALYTICS
		 */
        $this->updateGA($args);

        /**
         * BING
         */

        $this->data['bing_enabled'] = isset($args['bing_enabled']) && $args['bing_enabled'] ? true : false;
        $this->data['bing_event_action'] = !empty($args['bing_event_action']) ? sanitize_text_field($args['bing_event_action']) : null;
        $this->data['bing_event_category'] = !empty($args['bing_event_category']) ? sanitize_text_field($args['bing_event_category']) : null;
        $this->data['bing_event_label'] = !empty($args['bing_event_label']) ? sanitize_text_field($args['bing_event_label']) : null;
        $this->data['bing_event_value'] = !empty($args['bing_event_value']) ? sanitize_text_field($args['bing_event_value']) : null;

        update_post_meta( $this->post_id, '_pys_event_data', $this->data );

	}

	public function enable() {

		$this->enabled = true;
		update_post_meta( $this->post_id, '_pys_event_state', 'active' );

	}

	public function disable() {

		$this->enabled = false;
		update_post_meta( $this->post_id, '_pys_event_state', 'paused' );

	}

	/**
	 * @return int
	 */
	public function getPostId() {
	    return $this->post_id;
    }

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	public function isEnabled() {
		return $this->enabled;
	}

	public function getTriggerType() {
		return $this->trigger_type;
	}

	public function getDelay() {
		return $this->delay;
	}

	/**
	 * @return array
	 */
	public function getPageVisitTriggers() {
		return $this->trigger_type == 'page_visit' ? $this->triggers : array();
	}
	
	public function isFacebookEnabled() {
		return (bool) $this->facebook_enabled;
	}
	
	public function getFacebookEventType() {
		return $this->facebook_event_type == 'CustomEvent' ? $this->facebook_custom_event_type : $this->facebook_event_type;
	}
	
	public function isFacebookParamsEnabled() {
		return (bool) $this->facebook_params_enabled;
	}
	
	public function getFacebookParam( $key ) {
		return isset( $this->facebook_params[ $key ] ) ? $this->facebook_params[ $key ] : null;
	}
	
	public function getFacebookParams() {
		return $this->facebook_params_enabled ? $this->facebook_params : array();
	}
	
	public function getFacebookCustomParams() {
		return $this->facebook_params_enabled ? $this->facebook_custom_params : array();
	}
	
	public function isPinterestEnabled() {
		return (bool) $this->pinterest_enabled;
	}
	
	public function getPinterestEventType() {
		return $this->pinterest_event_type == 'CustomEvent'
			? $this->pinterest_custom_event_type
			: $this->pinterest_event_type;
	}
	
	public function isPinterestParamsEnabled() {
		return (bool) $this->pinterest_params_enabled;
	}
	
	public function getPinterestCustomParams() {
		return $this->pinterest_params_enabled ? $this->pinterest_custom_params : array();
	}

	public function isGoogleAnalyticsEnabled() {
		return (bool) $this->ga_enabled;
	}

	public function getGoogleAnalyticsAction() {
        return $this->ga_event_action == '_custom' ||
               $this->ga_event_action ==  'CustomEvent' ? $this->ga_custom_event_action : $this->ga_event_action;
	}

    public function isBingEnabled() {
        return (bool) $this->bing_enabled;
    }
    public function isGaV4() {
        $all = GA()->getPixelIDs();
        if(count($all) == 0) {
            return false;
        }
        return strpos($all[0], 'G') === 0;
    }
    private function clearGa() {
        $this->data['ga_params'] = array();
        $this->data['ga_custom_params'] = array();
        $this->data['ga_event_action'] = 'CustomEvent';
        $this->data['ga_custom_event_action']=null;
        $this->data['ga_non_interactive'] =  false;
        // old
        $this->data['ga_event_category'] = null;
        $this->data['ga_event_label'] = null;
        $this->data['ga_event_value'] = null;
    }

    private function updateGA( $args) {

        $all = GA()->getPixelIDs();

        $this->data['ga_enabled'] = count($all) > 0
            && isset( $args['ga_enabled']  )
            && $args['ga_enabled'];

        if(!$this->data['ga_enabled']) {
            $this->clearGa();
        } else {
            if($this->isGaV4()) {

                    $this->data['ga_event_action'] = isset( $args['ga_event_action'] )
                        ? sanitize_text_field( $args['ga_event_action'] )
                        : 'view_item';

                    $this->data['ga_custom_event_action'] = $this->ga_event_action == '_custom' || $this->ga_event_action == 'CustomEvent' && !empty( $args['ga_custom_event_action'] )
                        ? sanitizeKey( $args['ga_custom_event_action'] )
                        : null;

                    $this->data['ga_params'] = array();


                    foreach ($this->GAEvents as $group) {
                        foreach ($group as $name => $fields) {
                            if($name == $this->data['ga_event_action']) {
                                foreach ($fields as $field) {
                                    $this->data['ga_params'][$field] = isset($args['ga_params'][$field]) ? $args['ga_params'][$field] : "";
                                }
                                break;
                            }
                        }
                    }

                    if ( isset( $args['ga_params'] ) ) {
                        foreach ($args['ga_params'] as $key => $val) {
                            $this->data['ga_params'][$key] = sanitize_text_field( $val );
                        }
                    }

                    // reset old custom params
                    $this->data['ga_custom_params'] = array();

                    // custom params
                    if ( isset( $args['ga_custom_params'] ) ) {

                        foreach ( $args['ga_custom_params'] as $custom_param ) {

                            if ( ! empty( $custom_param['name'] ) && ! empty( $custom_param['value'] ) ) {

                                $this->data['ga_custom_params'][] = array(
                                    'name'  => sanitize_text_field( $custom_param['name'] ),
                                    'value' => sanitize_text_field( $custom_param['value'] ),
                                );

                            }

                        }

                    }
                    $this->data['ga_non_interactive'] = isset( $args['ga_non_interactive'] ) && $args['ga_non_interactive'] ? true : false;



            } else {

                $ga_event_actions = array(
                    '_custom',
                    'add_payment_info',
                    'add_to_cart',
                    'add_to_wishlist',
                    'begin_checkout',
                    'checkout_progress',
                    'generate_lead',
                    'login',
                    'purchase',
                    'refund',
                    'remove_from_cart',
                    'search',
                    'select_content',
                    'set_checkout_option',
                    'share',
                    'sign_up',
                    'view_item',
                    'view_item_list',
                    'view_promotion',
                    'view_search_results',
                );

                // event action
                $this->data['ga_event_action'] = isset( $args['ga_event_action'] ) && in_array( $args['ga_event_action'], $ga_event_actions )
                    ? sanitize_text_field( $args['ga_event_action'] )
                    : 'view_item';

                // custom event type
                $this->data['ga_custom_event_action'] = $this->ga_event_action == '_custom' && !empty( $args['ga_custom_event_action'] )
                    ? sanitizeKey( $args['ga_custom_event_action'] )
                    : null;

                $this->data['ga_event_category']  = ! empty( $args['ga_event_category'] ) ? sanitize_text_field( $args['ga_event_category'] ) : null;
                $this->data['ga_event_label']     = ! empty( $args['ga_event_label'] ) ? sanitize_text_field( $args['ga_event_label'] ) : null;
                $this->data['ga_event_value']     = ! empty( $args['ga_event_value'] ) ? sanitize_text_field( $args['ga_event_value'] ) : null;
                $this->data['ga_non_interactive'] = isset( $args['ga_non_interactive'] ) && $args['ga_non_interactive'] ? true : false;
            }
        }




    }

    public function getGACustomParams() {
        if($this->isGaV4()) {
            if(is_array($this->ga_custom_params)) {
                return $this->ga_custom_params;
            }
            return [];
        }
        $custom = array();
        if($this->ga_event_category) {
            $custom[] = array('name'=>"event_category",'value' => $this->ga_event_category);
        }
        if($this->ga_event_value){
            $custom[] = array('name'=>"value",'value' => $this->ga_event_value);
        }
        if($this->ga_event_label){
            $custom[] = array('name'=>"event_label",'value' => $this->ga_event_label);
        }

        return $custom;
    }

    public function getGaParams() {
        if($this->isGaV4())
            if(is_array($this->ga_params)) {
                return $this->ga_params;
            } else {
                return [];
            }
        $list = array();
        foreach ($this->GAEvents as $group) {
            foreach ($group as $name => $fields) {
                if($name == $this->data['ga_event_action']) {
                    foreach ($fields as $field) {
                        $list[$field] = "";
                    }
                }
            }
        }

        return $list;
    }


}