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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdsPixelFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelAutomaticMatchingFieldsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelDataUseSettingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelFirstPartyCookieStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelSortByValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelStatsResultAggregationValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelTasksValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\DACheckConnectionMethodValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdsPixel extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'adspixels';
    }
    /**
     * @return AdsPixelFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdsPixelFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['SortBy'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelSortByValues::getInstance()->getValues();
        $ref_enums['AutomaticMatchingFields'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelAutomaticMatchingFieldsValues::getInstance()->getValues();
        $ref_enums['DataUseSetting'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelDataUseSettingValues::getInstance()->getValues();
        $ref_enums['FirstPartyCookieStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelFirstPartyCookieStatusValues::getInstance()->getValues();
        $ref_enums['Tasks'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelTasksValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getAssignedUsers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/assigned_users', new \PYS_PRO_GLOBAL\FacebookAds\Object\AssignedUser(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AssignedUser::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAssignedUser(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('tasks' => 'list<tasks_enum>', 'user' => 'int');
        $enums = array('tasks_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelTasksValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/assigned_users', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getDaChecks(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('checks' => 'list<string>', 'connection_method' => 'connection_method_enum');
        $enums = array('connection_method_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\DACheckConnectionMethodValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/da_checks', new \PYS_PRO_GLOBAL\FacebookAds\Object\DACheck(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\DACheck::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createEvent(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('data' => 'list<string>', 'namespace_id' => 'string', 'partner_agent' => 'string', 'platforms' => 'list<map>', 'test_event_code' => 'string', 'trace' => 'unsigned int', 'upload_id' => 'string', 'upload_source' => 'string', 'upload_tag' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/events', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createShadowTrafficHelper(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/shadowtraffichelper', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteSharedAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('account_id' => 'string', 'business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/shared_accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSharedAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/shared_accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createSharedAccount(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('account_id' => 'string', 'business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/shared_accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSharedAgencies(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/shared_agencies', new \PYS_PRO_GLOBAL\FacebookAds\Object\Business(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Business::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getStats(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('aggregation' => 'aggregation_enum', 'end_time' => 'datetime', 'event' => 'string', 'event_source' => 'string', 'start_time' => 'datetime');
        $enums = array('aggregation_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelStatsResultAggregationValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/stats', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixelStatsResult(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixelStatsResult::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createTelemetry(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/telemetry', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('automatic_matching_fields' => 'list<automatic_matching_fields_enum>', 'data_use_setting' => 'data_use_setting_enum', 'enable_automatic_matching' => 'bool', 'first_party_cookie_status' => 'first_party_cookie_status_enum', 'name' => 'string', 'server_events_business_ids' => 'list<string>');
        $enums = array('automatic_matching_fields_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelAutomaticMatchingFieldsValues::getInstance()->getValues(), 'data_use_setting_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelDataUseSettingValues::getInstance()->getValues(), 'first_party_cookie_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsPixelFirstPartyCookieStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsPixel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    /**
     * @param int $business_id
     * @param string $account_id
     */
    public function sharePixelWithAdAccount($business_id, $account_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_accounts', \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, array('business' => $business_id, 'account_id' => $account_id));
    }
    /**
     * @param $business_id
     * @param $account_id
     */
    public function unsharePixelWithAdAccount($business_id, $account_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_accounts', \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, array('business' => $business_id, 'account_id' => $account_id));
    }
    /**
     * @param int $business_id
     * @param int $agency_id
     */
    public function sharePixelWithAgency($business_id, $agency_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_agencies', 'POST', array('business' => $business_id, 'agency_id' => $agency_id));
    }
    /**
     * @param int $business_id
     * @param int $agency_id
     */
    public function unsharePixelWithAgency($business_id, $agency_id)
    {
        $this->getApi()->call('/' . $this->assureId() . '/shared_agencies', 'DELETE', array('business' => $business_id, 'agency_id' => $agency_id));
    }
}
