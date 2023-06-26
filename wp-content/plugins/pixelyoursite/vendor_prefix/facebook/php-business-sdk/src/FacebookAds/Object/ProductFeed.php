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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductFeedFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedDelimiterValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedEncodingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedFeedTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedIngestionSourceTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedItemSubTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedOverrideTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedQuotedFieldsModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedRuleRuleTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorPriorityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class ProductFeed extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'product_feeds';
    }
    /**
     * @return ProductFeedFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductFeedFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['Delimiter'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedDelimiterValues::getInstance()->getValues();
        $ref_enums['IngestionSourceType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedIngestionSourceTypeValues::getInstance()->getValues();
        $ref_enums['QuotedFieldsMode'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedQuotedFieldsModeValues::getInstance()->getValues();
        $ref_enums['Encoding'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedEncodingValues::getInstance()->getValues();
        $ref_enums['FeedType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedFeedTypeValues::getInstance()->getValues();
        $ref_enums['ItemSubType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedItemSubTypeValues::getInstance()->getValues();
        $ref_enums['OverrideType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedOverrideTypeValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getAutomotiveModels(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/automotive_models', new \PYS_PRO_GLOBAL\FacebookAds\Object\AutomotiveModel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AutomotiveModel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getDestinations(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/destinations', new \PYS_PRO_GLOBAL\FacebookAds\Object\Destination(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Destination::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getFlights(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/flights', new \PYS_PRO_GLOBAL\FacebookAds\Object\Flight(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Flight::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getHomeListings(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/home_listings', new \PYS_PRO_GLOBAL\FacebookAds\Object\HomeListing(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\HomeListing::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getHotels(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/hotels', new \PYS_PRO_GLOBAL\FacebookAds\Object\Hotel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Hotel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProducts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'error_priority' => 'error_priority_enum', 'error_type' => 'error_type_enum', 'filter' => 'Object');
        $enums = array('error_priority_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorPriorityValues::getInstance()->getValues(), 'error_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/products', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getRules(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/rules', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedRule(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedRule::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createRule(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('attribute' => 'string', 'params' => 'map', 'rule_type' => 'rule_type_enum');
        $enums = array('rule_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedRuleRuleTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/rules', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedRule(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedRule::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createSupplementaryFeedAssoc(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('assoc_data' => 'list<map>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/supplementary_feed_assocs', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getUploadSchedules(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/upload_schedules', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedSchedule(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedSchedule::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createUploadSchedule(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('upload_schedule' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/upload_schedules', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getUploads(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/uploads', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedUpload(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedUpload::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createUpload(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('fbe_external_business_id' => 'string', 'file' => 'file', 'password' => 'string', 'update_only' => 'bool', 'url' => 'string', 'username' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/uploads', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedUpload(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeedUpload::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getVehicleOffers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/vehicle_offers', new \PYS_PRO_GLOBAL\FacebookAds\Object\VehicleOffer(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\VehicleOffer::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getVehicles(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'filter' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/vehicles', new \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('default_currency' => 'string', 'deletion_enabled' => 'bool', 'delimiter' => 'delimiter_enum', 'encoding' => 'encoding_enum', 'migrated_from_feed_id' => 'string', 'name' => 'string', 'quoted_fields_mode' => 'quoted_fields_mode_enum', 'schedule' => 'string', 'update_schedule' => 'string');
        $enums = array('delimiter_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedDelimiterValues::getInstance()->getValues(), 'encoding_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedEncodingValues::getInstance()->getValues(), 'quoted_fields_mode_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedQuotedFieldsModeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
