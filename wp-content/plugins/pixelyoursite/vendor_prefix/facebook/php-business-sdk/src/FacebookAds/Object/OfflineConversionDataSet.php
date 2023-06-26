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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\OfflineConversionDataSetFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceActionSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetPermittedRolesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetRelationshipTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetUploadOrderValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetUploadSortByValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class OfflineConversionDataSet extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'offline_conversion_data_sets';
    }
    /**
     * @return OfflineConversionDataSetFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\OfflineConversionDataSetFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['PermittedRoles'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetPermittedRolesValues::getInstance()->getValues();
        $ref_enums['RelationshipType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetRelationshipTypeValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getAdAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adaccounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAdAccount(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('account_id' => 'string', 'auto_track_for_ads' => 'bool', 'business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/adaccounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAgencies(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/agencies', new \PYS_PRO_GLOBAL\FacebookAds\Object\Business(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Business::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAgency(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business' => 'string', 'other_relationship' => 'string', 'permitted_roles' => 'list<permitted_roles_enum>', 'relationship_type' => 'list<relationship_type_enum>');
        $enums = array('permitted_roles_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetPermittedRolesValues::getInstance()->getValues(), 'relationship_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetRelationshipTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/agencies', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAudiences(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('action_source' => 'action_source_enum', 'ad_account' => 'string');
        $enums = array('action_source_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceActionSourceValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/audiences', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCustomConversions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('ad_account' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/customconversions', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomConversion(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomConversion::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createEvent(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('data' => 'list<string>', 'namespace_id' => 'string', 'progress' => 'Object', 'upload_id' => 'string', 'upload_source' => 'string', 'upload_tag' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/events', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getStats(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('aggr_time' => 'aggr_time_enum', 'end' => 'int', 'granularity' => 'granularity_enum', 'skip_empty_values' => 'bool', 'start' => 'int', 'user_timezone_id' => 'unsigned int');
        $enums = array('aggr_time_enum' => array('event_time', 'upload_time'), 'granularity_enum' => array('daily', 'hourly', 'six_hourly'));
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/stats', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getUploads(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('end_time' => 'datetime', 'order' => 'order_enum', 'sort_by' => 'sort_by_enum', 'start_time' => 'datetime', 'upload_tag' => 'string');
        $enums = array('order_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetUploadOrderValues::getInstance()->getValues(), 'sort_by_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\OfflineConversionDataSetUploadSortByValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/uploads', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSetUpload(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSetUpload::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createUpload(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('upload_tag' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/uploads', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSetUpload(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSetUpload::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createValidate(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('data' => 'list<string>', 'namespace_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/validate', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('auto_assign_to_new_accounts_only' => 'bool', 'description' => 'string', 'enable_auto_assign_to_accounts' => 'bool', 'name' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\OfflineConversionDataSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
