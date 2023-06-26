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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\PageCallToActionFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionAndroidDestinationTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionIphoneDestinationTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionWebDestinationTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class PageCallToAction extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @return PageCallToActionFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\PageCallToActionFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['AndroidDestinationType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionAndroidDestinationTypeValues::getInstance()->getValues();
        $ref_enums['IphoneDestinationType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionIphoneDestinationTypeValues::getInstance()->getValues();
        $ref_enums['Type'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionTypeValues::getInstance()->getValues();
        $ref_enums['WebDestinationType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionWebDestinationTypeValues::getInstance()->getValues();
        return $ref_enums;
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
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\PageCallToAction(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\PageCallToAction::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('android_app_id' => 'int', 'android_destination_type' => 'android_destination_type_enum', 'android_package_name' => 'string', 'android_url' => 'string', 'email_address' => 'string', 'intl_number_with_plus' => 'string', 'iphone_app_id' => 'int', 'iphone_destination_type' => 'iphone_destination_type_enum', 'iphone_url' => 'string', 'type' => 'type_enum', 'web_destination_type' => 'web_destination_type_enum', 'web_url' => 'string');
        $enums = array('android_destination_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionAndroidDestinationTypeValues::getInstance()->getValues(), 'iphone_destination_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionIphoneDestinationTypeValues::getInstance()->getValues(), 'type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionTypeValues::getInstance()->getValues(), 'web_destination_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PageCallToActionWebDestinationTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\PageCallToAction(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\PageCallToAction::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
