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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductItemFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAgeGroupValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorPriorityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemImageFetchStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemOriginCountryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemReviewStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemShippingWeightUnitValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemWaComplianceCategoryValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class ProductItem extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'products';
    }
    /**
     * @return ProductItemFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductItemFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['AgeGroup'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAgeGroupValues::getInstance()->getValues();
        $ref_enums['Availability'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues::getInstance()->getValues();
        $ref_enums['Condition'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues::getInstance()->getValues();
        $ref_enums['Gender'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues::getInstance()->getValues();
        $ref_enums['ImageFetchStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemImageFetchStatusValues::getInstance()->getValues();
        $ref_enums['ReviewStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemReviewStatusValues::getInstance()->getValues();
        $ref_enums['ShippingWeightUnit'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemShippingWeightUnitValues::getInstance()->getValues();
        $ref_enums['Visibility'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues::getInstance()->getValues();
        $ref_enums['CommerceTaxCategory'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues::getInstance()->getValues();
        $ref_enums['ErrorPriority'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorPriorityValues::getInstance()->getValues();
        $ref_enums['ErrorType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorTypeValues::getInstance()->getValues();
        $ref_enums['MarkedForProductLaunch'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues::getInstance()->getValues();
        $ref_enums['OriginCountry'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemOriginCountryValues::getInstance()->getValues();
        $ref_enums['WaComplianceCategory'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemWaComplianceCategoryValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getChannelsToIntegrityStatus(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/channels_to_integrity_status', new \PYS_PRO_GLOBAL\FacebookAds\Object\CatalogItemChannelsToIntegrityStatus(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CatalogItemChannelsToIntegrityStatus::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProductSets(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/product_sets', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'NODE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('catalog_id' => 'string', 'image_height' => 'unsigned int', 'image_width' => 'unsigned int', 'override_country' => 'string', 'override_language' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('additional_image_urls' => 'list<string>', 'additional_uploaded_image_ids' => 'list<string>', 'additional_variant_attributes' => 'map', 'android_app_name' => 'string', 'android_class' => 'string', 'android_package' => 'string', 'android_url' => 'string', 'availability' => 'availability_enum', 'brand' => 'string', 'category' => 'string', 'category_specific_fields' => 'map', 'checkout_url' => 'string', 'color' => 'string', 'commerce_tax_category' => 'commerce_tax_category_enum', 'condition' => 'condition_enum', 'currency' => 'string', 'custom_data' => 'map', 'custom_label_0' => 'string', 'custom_label_1' => 'string', 'custom_label_2' => 'string', 'custom_label_3' => 'string', 'custom_label_4' => 'string', 'custom_number_0' => 'unsigned int', 'custom_number_1' => 'unsigned int', 'custom_number_2' => 'unsigned int', 'custom_number_3' => 'unsigned int', 'custom_number_4' => 'unsigned int', 'description' => 'string', 'expiration_date' => 'string', 'fb_product_category' => 'string', 'gender' => 'gender_enum', 'gtin' => 'string', 'image_url' => 'string', 'importer_address' => 'map', 'importer_name' => 'string', 'inventory' => 'unsigned int', 'ios_app_name' => 'string', 'ios_app_store_id' => 'unsigned int', 'ios_url' => 'string', 'ipad_app_name' => 'string', 'ipad_app_store_id' => 'unsigned int', 'ipad_url' => 'string', 'iphone_app_name' => 'string', 'iphone_app_store_id' => 'unsigned int', 'iphone_url' => 'string', 'launch_date' => 'string', 'manufacturer_info' => 'string', 'manufacturer_part_number' => 'string', 'marked_for_product_launch' => 'marked_for_product_launch_enum', 'material' => 'string', 'mobile_link' => 'string', 'name' => 'string', 'offer_price_amount' => 'unsigned int', 'offer_price_end_date' => 'datetime', 'offer_price_start_date' => 'datetime', 'ordering_index' => 'unsigned int', 'origin_country' => 'origin_country_enum', 'pattern' => 'string', 'price' => 'unsigned int', 'product_type' => 'string', 'quantity_to_sell_on_facebook' => 'unsigned int', 'retailer_id' => 'string', 'return_policy_days' => 'unsigned int', 'sale_price' => 'unsigned int', 'sale_price_end_date' => 'datetime', 'sale_price_start_date' => 'datetime', 'short_description' => 'string', 'size' => 'string', 'start_date' => 'string', 'url' => 'string', 'visibility' => 'visibility_enum', 'wa_compliance_category' => 'wa_compliance_category_enum', 'windows_phone_app_id' => 'string', 'windows_phone_app_name' => 'string', 'windows_phone_url' => 'string');
        $enums = array('availability_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues::getInstance()->getValues(), 'commerce_tax_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues::getInstance()->getValues(), 'condition_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues::getInstance()->getValues(), 'gender_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues::getInstance()->getValues(), 'marked_for_product_launch_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues::getInstance()->getValues(), 'origin_country_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemOriginCountryValues::getInstance()->getValues(), 'visibility_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues::getInstance()->getValues(), 'wa_compliance_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemWaComplianceCategoryValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
