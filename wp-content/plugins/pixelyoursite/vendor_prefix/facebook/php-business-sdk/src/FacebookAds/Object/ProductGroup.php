<?php

/**
 * Copyright (c) 2015-present, Facebook, Inc. All rights reserved.
 *
 * You are hereby granted a non-exclusive, worldwide, royalty-free license to
 * use, copy, modify, and distribute this software in source code or binary
 * form for use in connection with the web services and APIs provided by
 * Facebook.
 *
 * As with any software that integrates with the Facebook platform, your use
 * of this software is subject to the Facebook Developer Principles and
 * Policies [http://developers.facebook.com/policy/]. This copyright notice
 * shall be included in all copies or substantial portions of the software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 * DEALINGS IN THE SOFTWARE.
 *
 */
namespace PYS_PRO_GLOBAL\FacebookAds\Object;

use PYS_PRO_GLOBAL\FacebookAds\ApiRequest;
use PYS_PRO_GLOBAL\FacebookAds\Cursor;
use PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface;
use PYS_PRO_GLOBAL\FacebookAds\TypeChecker;
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductGroupFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class ProductGroup extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'product_groups';
    }
    /**
     * @return ProductGroupFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductGroupFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        return $ref_enums;
    }
    public function getProducts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/products', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createProduct(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('additional_image_urls' => 'list<string>', 'additional_variant_attributes' => 'map', 'android_app_name' => 'string', 'android_class' => 'string', 'android_package' => 'string', 'android_url' => 'string', 'availability' => 'availability_enum', 'brand' => 'string', 'category' => 'string', 'checkout_url' => 'string', 'color' => 'string', 'commerce_tax_category' => 'commerce_tax_category_enum', 'condition' => 'condition_enum', 'currency' => 'string', 'custom_data' => 'map', 'custom_label_0' => 'string', 'custom_label_1' => 'string', 'custom_label_2' => 'string', 'custom_label_3' => 'string', 'custom_label_4' => 'string', 'custom_number_0' => 'unsigned int', 'custom_number_1' => 'unsigned int', 'custom_number_2' => 'unsigned int', 'custom_number_3' => 'unsigned int', 'custom_number_4' => 'unsigned int', 'description' => 'string', 'expiration_date' => 'string', 'fb_product_category' => 'string', 'gender' => 'gender_enum', 'gtin' => 'string', 'image_url' => 'string', 'inventory' => 'unsigned int', 'ios_app_name' => 'string', 'ios_app_store_id' => 'unsigned int', 'ios_url' => 'string', 'ipad_app_name' => 'string', 'ipad_app_store_id' => 'unsigned int', 'ipad_url' => 'string', 'iphone_app_name' => 'string', 'iphone_app_store_id' => 'unsigned int', 'iphone_url' => 'string', 'launch_date' => 'string', 'manufacturer_part_number' => 'string', 'marked_for_product_launch' => 'marked_for_product_launch_enum', 'material' => 'string', 'mobile_link' => 'string', 'name' => 'string', 'offer_price_amount' => 'unsigned int', 'offer_price_end_date' => 'datetime', 'offer_price_start_date' => 'datetime', 'ordering_index' => 'unsigned int', 'pattern' => 'string', 'price' => 'unsigned int', 'product_type' => 'string', 'quantity_to_sell_on_facebook' => 'unsigned int', 'retailer_id' => 'string', 'return_policy_days' => 'unsigned int', 'sale_price' => 'unsigned int', 'sale_price_end_date' => 'datetime', 'sale_price_start_date' => 'datetime', 'short_description' => 'string', 'size' => 'string', 'start_date' => 'string', 'url' => 'string', 'visibility' => 'visibility_enum', 'windows_phone_app_id' => 'string', 'windows_phone_app_name' => 'string', 'windows_phone_url' => 'string');
        $enums = array('availability_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues::getInstance()->getValues(), 'commerce_tax_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues::getInstance()->getValues(), 'condition_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues::getInstance()->getValues(), 'gender_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues::getInstance()->getValues(), 'marked_for_product_launch_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues::getInstance()->getValues(), 'visibility_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/products', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('deletion_method' => 'deletion_method_enum');
        $enums = array('deletion_method_enum' => array('DELETE_ITEMS', 'ONLY_IF_EMPTY'));
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'NODE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('default_product_id' => 'string', 'variants' => 'list<Object>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
