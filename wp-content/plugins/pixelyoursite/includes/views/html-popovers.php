<!-- GENERAL -->

<div id="pys-general_event" style="display: none; visibility: hidden">
	<p>The GeneralEvent will track the following parameters:</p>
    <ul>
        <li>content_name</li>
        <li>content_category</li>
        <li>tag</li>
        <li>post_type</li>
        <li>post_id</li>
        <li>domain</li>
        <li>user's role</li>
        <li>domain</li>
        <li>plugin's name</li>
        <li>
            <del>traffic_source</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>UTMs</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>Visitor's browser's time (hour, day, month)</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
    </ul>
	<p>Use it to create Custom Audiences, Custom Conversions, or for Facebook Analytics.</p>
</div>

<div id="pys-search_event" style="display: none; visibility: hidden">
	<p>On Facebook and Pinterest, the event will send these parameters:</p>
	<ul>
        <li>search_string: the exact searched word or phrase</li>
        <li>content_name</li>
        <li>content_category</li>
        <li>tag</li>
        <li>post_type</li>
        <li>post_id</li>
        <li>domain</li>
        <li>user's role</li>
        <li>domain name</li>
        <li>plugin's name</li>
        <li>
            <del>traffic_source</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>UTMs</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>Visitor's browser's time (hour, day, month)</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
	</ul>
	<p>On Google Analytics, the event will have the following structure:</p>
	<ul>
        <li>Event Category: WordPress Search or WooCommerce Search</li>
        <li>Event Action: search</li>
        <li>Event Label: the search string</li>
	</ul>
</div>

<div id="pys-click_event" style="display: none; visibility: hidden">
	<p>The ClickEvent will have the following parameters on Facebook and Pinterest:</p>
	<ul>
		<li>tag_text: the link’s text</li>
		<li>tag_type: a (for HTML links) or button</li>
		<li>content_name</li>
		<li>content_category</li>
		<li>tag</li>
		<li>post_type</li>
		<li>post_id</li>
		<li>domain</li>
		<li>traffic_source</li>
		<li>UTMs</li>
		<li>Visitor's browser's time (hour, day, month)</li>
		<li>user's role</li>
		<li>domain name</li>
		<li>plugin's name</li>
	</ul>
	<p>Use it to create specific Custom Audiences or Custom Conversions.</p>
	<p>On Google Analytics the event will have the following structure:</p>
	<ul>
		<li>Event Category: ClickEvent</li>
		<li>Event Action: the URL link</li>
		<li>Event Label: the link or button text</li>
	</ul>
</div>

<div id="pys-watch_video_event" style="display: none; visibility: hidden">
	<p>The event will have 5 separate triggers:</p>
	<ul>
		<li>play - when the video starts</li>
		<li>10%</li>
		<li>50%</li>
		<li>90%</li>
		<li>100%</li>
	</ul>
	<p>On Facebook and Pinterest it will have the following parameters:</p>
	<ul>
		<li>event_trigger: it can be play, 10%, 50%, 90% or 100%</li>
		<li>video_title</li>
		<li>video_id</li>
		<li>content_name</li>
		<li>content_category</li>
		<li>tag</li>
		<li>post_type</li>
		<li>post_id</li>
		<li>traffic_source</li>
		<li>UTMs</li>
		<li>Visitor's browser's time (hour, day, month)</li>
		<li>user's role</li>
		<li>domain name</li>
		<li>plugin's name</li>
	</ul>
	<p>On Google Analytics it will have:</p>
	<ul>
		<li>Event Category: WatchVideo</li>
		<li>Event Action: play, 10%, 50%, 90%, 100%</li>
		<li>Event Label: the video title</li>
	</ul>
</div>

<div id="pys-complete_registration_event" style="display: none; visibility: hidden">
	<p>On Facebook and Pinterest the event will have the following parameters:</p>
	<ul>
		<li>traffic_source</li>
		<li>UTMs</li>
		<li>Visitor's browser's time (hour, day, month)</li>
		<li>user's role</li>
		<li>domain name</li>
		<li>plugin's name</li>
	</ul>
	<p>On Google Analytics it will have this structure:</p>
	<ul>
		<li>Event Category: engagement</li>
		<li>Event Action: sign_up</li>
		<li>Event Label: user's role</li>
	</ul>
</div>

<div id="pys-form_event" style="display: none; visibility: hidden">
	<p>This event will have the following parameters on Facebook and Pinterest:</p>
	<ul>
		<li>form_class: the CSS class identifying the form</li>
		<li>content_name</li>
		<li>content_category</li>
		<li>tag</li>
		<li>post_type</li>
		<li>post_id</li>
		<li>traffic_source</li>
		<li>UTMs</li>
		<li>Visitor's browser's time (hour, day, month)</li>
		<li>user's role</li>
		<li>domain name</li>
		<li>plugin's name</li>
	</ul>
	<p>On Google Analytics it will have the following structure:</p>
	<ul>
		<li>Event Category: Form</li>
		<li>Event Action: the form page URL</li>
		<li>Event Label: the CSS class identifying the form</li>
	</ul>
</div>

<div id="pys-comment_event" style="display: none; visibility: hidden">
	<p>On Facebook and Pinterest, the event will have the following parameters:</p>
	<ul>
        <li>content_name</li>
        <li>content_category</li>
        <li>tag</li>
        <li>post_type</li>
        <li>post_id</li>
        <li>user's role</li>
        <li>domain name</li>
        <li>plugin's name</li>
        <li>
            <del>traffic_source</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>UTMs</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>Visitor's browser's time (hour, day, month)</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
	</ul>
	<p>On Google Analytics, the event will have this structure:</p>
	<ul>
        <li>Event Category: Comment</li>
        <li>Event Action: the URL where the comment was posted</li>
        <li>Event Label: the page title</li>
	</ul>
</div>

<div id="pys-download_docs_event" style="display: none; visibility: hidden">
	<p>This event will have the following parameters on Facebook and Pinterest:</p>
	<ul>
        <li>download_name: the name of the downloaded file</li>
        <li>download_type: the file format (jpg, png, zip, and so on)</li>
        <li>download_url: the exact URL of the downloaded file</li>
        <li>content_name</li>
        <li>content_category</li>
        <li>tag</li>
        <li>post_type</li>
        <li>post_id</li>
        <li>user's role</li>
        <li>domain name</li>
        <li>plugin's name</li>
        <li>
            <del>traffic_source</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>UTMs</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
        <li>
            <del>Visitor's browser's time (hour, day, month)</del>
            (<a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro</a>)
        </li>
	</ul>
	<p>On Google Analytics it will have the next structure:</p>
	<ul>
        <li>Event Category: Download</li>
        <li>Event Action: the downloaded file URL</li>
        <li>Event Label: the downloaded file name</li>
	</ul>
</div>

<div id="pys-adsense_event" style="display: none; visibility: hidden">
	<p>This event will have the following parameters on Facebook and Pinterest:</p>
	<ul>
		<li>content_name</li>
		<li>content_category</li>
		<li>tag</li>
		<li>post_type</li>
		<li>post_id</li>
		<li>traffic_source</li>
		<li>UTMs</li>
		<li>Visitor's browser's time (hour, day, month)</li>
		<li>user's role</li>
		<li>domain name</li>
		<li>plugin's name</li>
	</ul>
</div>

<!-- WOOCOMMERCE -->

<div id="pys-woo_facebook_am_params" style="display: none; visibility: hidden">
    <p>All the e-commerce events are Dynamic Product Ads ready, having the two required parameters:</p>
    <ul>
        <li>content_type: product or product group</li>
        <li>content_ids</li>
    </ul>
    <p>The following events are used for Dynamic Product Ads:</p>
    <ul>
        <li>ViewContent: on single product pages</li>
        <li>ViewCategory: on WooCommerce category pages</li>
        <li>AddToCart: when a product is added to cart</li>
        <li>Purchase: when a transaction is completed</li>
    </ul>
    <p><strong>IMPORTANT:</strong> in order to run Dynamic Product ads you need a Product Catalog. You can create one
        using our <a href="https://www.pixelyoursite.com/product-catalog-facebook?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup" target="_blank">dedicated
        Product Catalog Feed plugin</a>.</p>
</div>

<div id="pys-woo_facebook_and_pinterest_params" style="display: none; visibility: hidden">
    <p>Your WooCommerce events track a large number of parameters that you can use for Custom Audiences, Custom
        Conversions, or inside Facebook Analytics.</p>
    <ul>
        <li>content_name: the name of the products</li>
        <li>category_name: the product categories</li>
        <li>tags: the product tags</li>
        <li>num_items: the number of products in the cart</li>
        <li>value: the event value</li>
        <li>currency: your store currency</li>
        <li>product_price: the price of the product</li>
        <li>user_role: the type of user firing the event</li>
        <li>domain: the domain name</li>
    </ul>
</div>

<div id="pys-woo_facebook_and_pinterest_pro_params" style="display: none; visibility: hidden">
    <p>The PRO version will track even more parameters, helping you to create even more Custom Conversions or Audiences.
        The browser's time-related parameters will help you understand when your clients convert (their time).</p>
    <ul>
        <li>traffic_source</li>
        <li>UTMs: the UTMs of the landing URL</li>
        <li>month: the transaction's month, based on the visitor's browser's time</li>
        <li>day: the transaction's day, based on the visitor's browser's time</li>
        <li>hour: the hour interval, based on the visitor's browser's time</li>
    </ul>
</div>

<div id="pys-woo_facebook_and_pinterest_purchase_params" style="display: none; visibility: hidden">
    <p>Your Purchase event tracks important parameters. They can be used for Custom Audiences or Conversions.</p>
    <ul>
        <li>content_type: product</li>
        <li>content_ids: the ids of the purchased events</li>
        <li>value: the event value, as configured inside the plugin</li>
        <li>currency: transaction's currency</li>
        <li>transactions_count: the number of transactions made by the same client</li>
        <li>content_name: the product's numbers</li>
        <li>category_name: the products categories</li>
        <li>num_items: the number of products</li>
        <li>plugin: PixelYourSite</li>
        <li>domain: your domain name</li>
        <li>user_roles: the client user role</li>
        <li>contents: A list of JSON object that contains the product IDs associated with the event as well as
            additional information about the products
        </li>
    </ul>
</div>

<div id="pys-woo_facebook_and_pinterest_purchase_pro_params" style="display: none; visibility: hidden">
    <p>The <a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">PRO version</a> Purchase event will track an extraordinary number of
        extra useful parameters. Use them for your super-focus Custom Audiences or Custom Conversions, and for Facebook
        Analytics reports.</p>
    <ul>
        <li>total: the transaction's total</li>
        <li>lifetime_value: the client lifetime's value</li>
        <li>average_order: the average order of the transactions made by the same client</li>
        <li>payment: payment type</li>
        <li>tax: the tax value</li>
        <li>shipping: shipping option</li>
        <li>shipping_cost: the shipping cost</li>
        <li>coupon_used: use of coupons (yes/no)</li>
        <li>coupon_name: the name of the coupon used</li>
        <li>content_name: the product's numbers</li>
        <li>order_id: the order's id</li>
        <li>hour: the transaction's hour interval, based on the client's browser's time</li>
        <li>day: the transaction's day, based on the client's browser's time</li>
        <li>month: the transaction's month, based on the client's browser's time</li>
        <li>traffic_source: direct</li>
        <li>UTMs: the UMTs of the landing URL</li>
    </ul>
</div>

<div id="pys-woo_ga_enhanced_ecommerce_params" style="display: none; visibility: hidden">
    <p>In-depth e-commerce data will be sent to Google Analytics, like transaction value, tax, shipping, products, and
        product categories. Product views, add to cart, remove from cart, checkout, and purchases are tracked
        automatically and you can analyze and compare the stats inside Google Analytics E-commerce reports.</p>
</div>

<div id="pys-woo_google_ads_enhanced_ecommerce_params" style="display: none; visibility: hidden">
    <p>The <a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro version</a> implements the Google Ads tag (former AdWords). All
        the e-commerce events will be sent to Google Ads. These events can be used for audiences. You can also configure
        "conversions" to track your transactions. The e-commerce events will be Dynamic Remarketing ready. You can
        select between the "Retail" or "Custom" vertical, according to your needs.</p>

</div>

<div id="pys-woo_purchase_on_transaction" style="display: none; visibility: hidden">
	<p>This will make sure that simple page refreshes or reloads won't affect your stats. Disable this option if you
		plan to test the event.</p>
</div>

<div id="pys-woo_purchase_event_value" style="display: none; visibility: hidden">
	<p><strong>Value is mandatory for this event.</strong></p>
	<p>Your Purchase event value for your business might not be the exact value of the products or services, because you
		have all sorts of costs included. You can use the order total, a percent of the total, or a fixed value.</p>
	<p>We also added a "total" parameter for this event that will always reflect the full value of each purchase.</p>
	<p>Note: Some experts think that Facebook will better optimize your ads when conversion value is smaller, making
		sure that you don't overspend. It's a controversial theory, but one you can test yourself.</p>
</div>

<div id="pys-woo_initiate_checkout_event_value" style="display: none; visibility: hidden">
	<p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
		event has for your business.</p>
</div>

<div id="pys-woo_add_to_cart_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<div id="pys-woo_view_content_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<div id="pys-woo_affiliate_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<div id="pys-woo_paypal_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<!-- EDD -->

<div id="pys-edd_facebook_am_params" style="display: none; visibility: hidden">
    <p>All the e-commerce events are Dynamic Product Ads ready, having the two required parameters:</p>
    <ul>
        <li>content_type: product or product group</li>
        <li>content_ids</li>
    </ul>
    <p>The following events are used for Dynamic Product Ads:</p>
    <ul>
        <li>ViewContent: on single product pages</li>
        <li>ViewCategory: on WooCommerce category pages</li>
        <li>AddToCart: when a product is added to cart</li>
        <li>Purchase: when a transaction is completed</li>
    </ul>
    <p><strong>IMPORTANT:</strong> in order to run Dynamic Product ads you need a Product Catalog. You can create one
        using our <a href="https://www.pixelyoursite.com/easy-digital-downloads-product-catalog?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup"
                     target="_blank">dedicated
            Product Catalog Feed plugin</a>.</p>
</div>

<div id="pys-edd_facebook_and_pinterest_params" style="display: none; visibility: hidden">
    <p>Your Easy Digital Downloads events track a large number of parameters that you can use for Custom Audiences, Custom
        Conversions, or inside Facebook Analytics.</p>
    <ul>
        <li>content_name: the name of the products</li>
        <li>category_name: the product categories</li>
        <li>tags: the product tags</li>
        <li>num_items: the number of products in the cart</li>
        <li>value: the event value</li>
        <li>currency: your store currency</li>
        <li>product_price: the price of the product</li>
        <li>user_role: the type of user firing the event</li>
        <li>domain: the domain name</li>
    </ul>
</div>

<div id="pys-edd_facebook_and_pinterest_pro_params" style="display: none; visibility: hidden">
    <p>The PRO version will track even more parameters, helping you to create even more Custom Conversions or Audiences.
        The browser's time-related parameters will help you understand when your clients convert (their time).</p>
    <ul>
        <li>traffic_source</li>
        <li>UTMs: the UTMs of the landing URL</li>
        <li>month: the transaction's month, based on the visitor's browser's time</li>
        <li>day: the transaction's day, based on the visitor's browser's time</li>
        <li>hour: the hour interval, based on the visitor's browser's time</li>
    </ul>
</div>

<div id="pys-edd_facebook_and_pinterest_purchase_params" style="display: none; visibility: hidden">
    <p>Your Purchase event tracks important parameters. They can be used for Custom Audiences or Conversions.</p>
    <ul>
        <li>content_type: product</li>
        <li>content_ids: the ids of the purchased events</li>
        <li>value: the event value, as configured inside the plugin</li>
        <li>currency: transaction's currency</li>
        <li>content_name: the product's numbers</li>
        <li>category_name: the products categories</li>
        <li>num_items: the number of products</li>
        <li>plugin: PixelYourSite</li>
        <li>domain: your domain name</li>
        <li>user_roles: the client user role</li>
        <li>contents: A list of JSON object that contains the product IDs associated with the event as well as
            additional information about the products
        </li>
    </ul>
</div>

<div id="pys-edd_facebook_and_pinterest_purchase_pro_params" style="display: none; visibility: hidden">
    <p>The <a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">PRO version</a> Purchase event will track an extraordinary number of
        extra useful parameters. Use them for your super-focus Custom Audiences or Custom Conversions, and for Facebook
        Analytics reports.</p>
    <ul>
        <li>total: the transaction's total</li>
        <li>lifetime_value: the client lifetime's value</li>
        <li>average_order: the average order of the transactions made by the same client</li>
        <li>payment: payment type</li>
        <li>tax: the tax value</li>
        <li>shipping: shipping option</li>
        <li>shipping_cost: the shipping cost</li>
        <li>coupon_used: use of coupons (yes/no)</li>
        <li>coupon_name: the name of the coupon used</li>
        <li>content_name: the product's numbers</li>
        <li>transaction_id: the order's id</li>
        <li>hour: the transaction's hour interval, based on the client's browser's time</li>
        <li>day: the transaction's day, based on the client's browser's time</li>
        <li>month: the transaction's month, based on the client's browser's time</li>
        <li>traffic_source: direct</li>
        <li>UTMs: the UMTs of the landing URL</li>
    </ul>
</div>

<div id="pys-edd_ga_enhanced_ecommerce_params" style="display: none; visibility: hidden">
    <p>In-depth e-commerce data will be sent to Google Analytics, like transaction value, tax, shipping, products, and
        product categories. Product views, add to cart, remove from cart, checkout, and purchases are tracked
        automatically and you can analyze and compare the stats inside Google Analytics E-commerce reports.</p>
</div>

<div id="pys-edd_google_ads_enhanced_ecommerce_params" style="display: none; visibility: hidden">
    <p>The <a href="https://www.pixelyoursite.com/?utm_source=pixelyoursite-free-plugin&utm_medium=plugin&utm_campaign=free-plugin-info-popup">pro version</a> implements the Google Ads tag (former AdWords). All
        the e-commerce events will be sent to Google Ads. These events can be used for audiences. You can also configure
        "conversions" to track your transactions. The e-commerce events will be Dynamic Remarketing ready. You can
        select between the "Retail" or "Custom" vertical, according to your needs.</p>

</div>

<!-- @fixme: update texts -->
<div id="pys-edd_google_ads_enhanced_ecommerce_params" style="display: none; visibility: hidden">
    <p>In-depth e-commerce data will be sent to Google Ads, like transaction value, tax, shipping, products, and
        product categories. Product views, add to cart, remove from cart, checkout, and purchases are tracked
        automatically and you can analyze and compare the stats inside Google Ads E-commerce reports.</p>
</div>

<div id="pys-edd_purchase_on_transaction" style="display: none; visibility: hidden">
    <p>This will make sure that simple page refreshes or reloads won't affect your stats. Disable this option if you
        plan to test the event.</p>
</div>

<div id="pys-edd_purchase_event_value" style="display: none; visibility: hidden">
    <p><strong>Value is mandatory for this event.</strong></p>
    <p>Your Purchase event value for your business might not be the exact value of the products or services, because you
        have all sorts of costs included. You can use the order total, a percent of the total, or a fixed value.</p>
    <p>We also added a "total" parameter for this event that will always reflect the full value of each purchase.</p>
    <p>Note: Some experts think that Facebook will better optimize your ads when conversion value is smaller, making
        sure that you don't overspend. It's a controversial theory, but one you can test yourself.</p>
</div>

<div id="pys-edd_initiate_checkout_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<div id="pys-edd_add_to_cart_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<div id="pys-edd_view_content_event_value" style="display: none; visibility: hidden">
    <p>Value is not mandatory for this event. If you want, you can enable and configure it to reflect the value this
        event has for your business.</p>
</div>

<!-- COMMON -->

<div id="pys-google_dynamic_remarketing_vertical" style="display: none; visibility: hidden">
    <p>All the e-commerce events will have the required parameters for Google Ads Dynamic Remarketing.</p>
    <p><strong>If you have access to Google Merchant</strong>, select the Retail vertical. In this case, the
        following parameters will be added:</p>
    <ul>
        <li>ecomm_prodid</li>
        <li>ecomm_pagetype</li>
        <li>ecomm_totalvalue</li>
    </ul>
    <p>Dynamic Remarketing will be done through Google Merchant.</p>
    <p><strong>If you don't have access to Google Merchant</strong>, select the Custom vertical. In this case,
        the following parameters will be added:</p>
    <ul>
        <li>dynx_itemid</li>
        <li>dynx_pagetype</li>
        <li>dynx_totalvalue</li>
    </ul>
    <p>Dynamic Remarketing will be done using a Custom feed.</p>
</div>

<div id="pys-ads_woo_item_id_prefix" style="display: none; visibility: hidden">
    <p>You can use this option to match the product ID that Google Ads Tag will use for the Dynamic Remarketing
        parameters. The ID should be identical to the one used by your Google Merchant or Custom feed.</p>
</div>

<div id="pys-google_ads_conversion_label" style="display: none; visibility: hidden">
    <p>Transform this event into a Google Ads conversion:</p>
    <p>Create a conversion inside your Google Ads account, copy its label and paste it here.</p>
    <p>If you have more than one Google Tags installed, select the same one where the conversion was created.</p>
    <p><a href="https://www.pixelyoursite.com/documentation/track-google-ads-conversion-on-woocommerce"
          target="_blank">Click here for details</a></p>
</div>

<div id="pys-ga_cross_domain_tracking" style="display: none; visibility: hidden">
    <p>Cross-domain measurement makes it possible for Analytics to see sessions on two related sites (such as an
        ecommerce site and a separate shopping cart site) as a single session.</p>
    <p><a href="https://www.pixelyoursite.com/pixelyoursite-free-version/google-analytics-cross-domain-tracking"
          target="_blank">Click here for help</a></p>
</div>