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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\UserFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStudyTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContainerTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContentCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoFormattingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoOriginalProjectionTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoSwapModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUnpublishedContentTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUploadPhaseValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\BusinessSurveyBusinessTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\BusinessVerticalValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\EventTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\FundraiserPersonToCharityFundraiserTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\GameItemActionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoBroadcastStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoProjectionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSpatialAudioFormatValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStereoscopicModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStreamTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PermissionStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PhotoBackdatedTimeGranularityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PhotoTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PhotoUnpublishedContentTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostBackdatedTimeGranularityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostCheckinEntryPointValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostFormattingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostPlaceAttachmentSettingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostPostSurfacesBlacklistValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostPostingToRedspaceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostTargetSurfaceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostUnpublishedContentTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProfilePictureSourceBreakingChangeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProfilePictureSourceTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserFilteringValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserLocalNewsMegaphoneDismissStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserLocalNewsSubscriptionStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class User extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @return UserFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\UserFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['LocalNewsMegaphoneDismissStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserLocalNewsMegaphoneDismissStatusValues::getInstance()->getValues();
        $ref_enums['LocalNewsSubscriptionStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserLocalNewsSubscriptionStatusValues::getInstance()->getValues();
        $ref_enums['Filtering'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserFilteringValues::getInstance()->getValues();
        $ref_enums['Type'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserTypeValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function deleteAccessTokens(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/access_tokens', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAccessToken(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business_app' => 'int', 'page_id' => 'string', 'scope' => 'list<Permission>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/access_tokens', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('is_place' => 'bool', 'is_promotable' => 'bool');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAccount(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('about' => 'string', 'address' => 'string', 'category' => 'int', 'category_enum' => 'string', 'category_list' => 'list<string>', 'city_id' => 'string', 'coordinates' => 'Object', 'cover_photo' => 'Object', 'description' => 'string', 'ignore_coordinate_warnings' => 'bool', 'location' => 'Object', 'name' => 'string', 'phone' => 'string', 'picture' => 'string', 'website' => 'string', 'zip' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAdStudies(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ad_studies', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdStudy(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdStudy::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAdStudy(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('cells' => 'list<Object>', 'client_business' => 'string', 'confidence_level' => 'float', 'cooldown_start_time' => 'int', 'description' => 'string', 'end_time' => 'int', 'name' => 'string', 'objectives' => 'list<Object>', 'observation_end_time' => 'int', 'start_time' => 'int', 'type' => 'type_enum', 'viewers' => 'list<int>');
        $enums = array('type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStudyTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/ad_studies', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdStudy(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdStudy::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAdAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adaccounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAlbums(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/albums', new \PYS_PRO_GLOBAL\FacebookAds\Object\Album(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Album::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createApplication(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business_app' => 'int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/applications', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAppRequestFormerRecipients(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/apprequestformerrecipients', new \PYS_PRO_GLOBAL\FacebookAds\Object\AppRequestFormerRecipient(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AppRequestFormerRecipient::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAppRequests(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/apprequests', new \PYS_PRO_GLOBAL\FacebookAds\Object\AppRequest(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AppRequest::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAssignedAdAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/assigned_ad_accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAssignedBusinessAssetGroups(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('contained_asset_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/assigned_business_asset_groups', new \PYS_PRO_GLOBAL\FacebookAds\Object\BusinessAssetGroup(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\BusinessAssetGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAssignedPages(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/assigned_pages', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAssignedProductCatalogs(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/assigned_product_catalogs', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getBusinessUsers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/business_users', new \PYS_PRO_GLOBAL\FacebookAds\Object\BusinessUser(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\BusinessUser::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteBusinesses(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/businesses', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getBusinesses(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/businesses', new \PYS_PRO_GLOBAL\FacebookAds\Object\Business(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Business::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createBusiness(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('child_business_external_id' => 'string', 'email' => 'string', 'name' => 'string', 'primary_page' => 'string', 'sales_rep_email' => 'string', 'survey_business_type' => 'survey_business_type_enum', 'survey_num_assets' => 'unsigned int', 'survey_num_people' => 'unsigned int', 'timezone_id' => 'unsigned int', 'vertical' => 'vertical_enum');
        $enums = array('survey_business_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\BusinessSurveyBusinessTypeValues::getInstance()->getValues(), 'vertical_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\BusinessVerticalValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/businesses', new \PYS_PRO_GLOBAL\FacebookAds\Object\Business(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Business::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getConversations(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('folder' => 'string', 'tags' => 'list<string>', 'user_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/conversations', new \PYS_PRO_GLOBAL\FacebookAds\Object\UnifiedThread(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\UnifiedThread::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCustomLabels(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/custom_labels', new \PYS_PRO_GLOBAL\FacebookAds\Object\PageUserMessageThreadLabel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\PageUserMessageThreadLabel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getEvents(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('include_canceled' => 'bool', 'type' => 'type_enum');
        $enums = array('type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\EventTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/events', new \PYS_PRO_GLOBAL\FacebookAds\Object\Event(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Event::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getFeed(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('include_hidden' => 'bool', 'q' => 'string', 'show_expired' => 'bool', 'since' => 'datetime', 'until' => 'datetime', 'with' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/feed', new \PYS_PRO_GLOBAL\FacebookAds\Object\Post(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Post::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createFeed(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('actions' => 'Object', 'adaptive_type' => 'string', 'album_id' => 'string', 'android_key_hash' => 'string', 'animated_effect_id' => 'unsigned int', 'application_id' => 'string', 'asked_fun_fact_prompt_id' => 'unsigned int', 'asset3d_id' => 'unsigned int', 'associated_id' => 'string', 'attach_place_suggestion' => 'bool', 'attached_media' => 'list<Object>', 'audience_exp' => 'bool', 'backdated_time' => 'datetime', 'backdated_time_granularity' => 'backdated_time_granularity_enum', 'call_to_action' => 'Object', 'caption' => 'string', 'checkin_entry_point' => 'checkin_entry_point_enum', 'child_attachments' => 'list<Object>', 'client_mutation_id' => 'string', 'composer_entry_picker' => 'string', 'composer_entry_point' => 'string', 'composer_entry_time' => 'unsigned int', 'composer_session_events_log' => 'string', 'composer_session_id' => 'string', 'composer_source_surface' => 'string', 'composer_type' => 'string', 'connection_class' => 'string', 'content_attachment' => 'string', 'coordinates' => 'Object', 'cta_link' => 'string', 'cta_type' => 'string', 'description' => 'string', 'direct_share_status' => 'unsigned int', 'expanded_height' => 'unsigned int', 'expanded_width' => 'unsigned int', 'feed_targeting' => 'Object', 'formatting' => 'formatting_enum', 'fun_fact_prompt_id' => 'unsigned int', 'fun_fact_toastee_id' => 'unsigned int', 'has_nickname' => 'bool', 'height' => 'unsigned int', 'holiday_card' => 'string', 'home_checkin_city_id' => 'Object', 'image_crops' => 'map', 'implicit_with_tags' => 'list<int>', 'instant_game_entry_point_data' => 'string', 'ios_bundle_id' => 'string', 'is_backout_draft' => 'bool', 'is_boost_intended' => 'bool', 'is_explicit_location' => 'bool', 'is_explicit_share' => 'bool', 'is_group_linking_post' => 'bool', 'is_photo_container' => 'bool', 'link' => 'string', 'location_source_id' => 'string', 'manual_privacy' => 'bool', 'message' => 'string', 'multi_share_end_card' => 'bool', 'multi_share_optimized' => 'bool', 'name' => 'string', 'nectar_module' => 'string', 'object_attachment' => 'string', 'offer_like_post_id' => 'unsigned int', 'og_action_type_id' => 'string', 'og_hide_object_attachment' => 'bool', 'og_icon_id' => 'string', 'og_object_id' => 'string', 'og_phrase' => 'string', 'og_set_profile_badge' => 'bool', 'og_suggestion_mechanism' => 'string', 'page_recommendation' => 'string', 'picture' => 'string', 'place' => 'Object', 'place_attachment_setting' => 'place_attachment_setting_enum', 'place_list' => 'string', 'place_list_data' => 'list', 'post_surfaces_blacklist' => 'list<post_surfaces_blacklist_enum>', 'posting_to_redspace' => 'posting_to_redspace_enum', 'privacy' => 'string', 'prompt_id' => 'string', 'prompt_tracking_string' => 'string', 'properties' => 'Object', 'proxied_app_id' => 'string', 'publish_event_id' => 'unsigned int', 'published' => 'bool', 'quote' => 'string', 'react_mode_metadata' => 'string', 'ref' => 'list<string>', 'referenceable_image_ids' => 'list<string>', 'referral_id' => 'string', 'scheduled_publish_time' => 'datetime', 'source' => 'string', 'sponsor_id' => 'string', 'sponsor_relationship' => 'unsigned int', 'suggested_place_id' => 'Object', 'tags' => 'list<int>', 'target_surface' => 'target_surface_enum', 'targeting' => 'Object', 'text_format_metadata' => 'string', 'text_format_preset_id' => 'string', 'text_only_place' => 'string', 'throwback_camera_roll_media' => 'string', 'thumbnail' => 'file', 'time_since_original_post' => 'unsigned int', 'title' => 'string', 'tracking_info' => 'string', 'unpublished_content_type' => 'unpublished_content_type_enum', 'user_selected_tags' => 'bool', 'video_start_time_ms' => 'unsigned int', 'viewer_coordinates' => 'Object', 'width' => 'unsigned int');
        $enums = array('backdated_time_granularity_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostBackdatedTimeGranularityValues::getInstance()->getValues(), 'checkin_entry_point_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostCheckinEntryPointValues::getInstance()->getValues(), 'formatting_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostFormattingValues::getInstance()->getValues(), 'place_attachment_setting_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostPlaceAttachmentSettingValues::getInstance()->getValues(), 'post_surfaces_blacklist_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostPostSurfacesBlacklistValues::getInstance()->getValues(), 'posting_to_redspace_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostPostingToRedspaceValues::getInstance()->getValues(), 'target_surface_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostTargetSurfaceValues::getInstance()->getValues(), 'unpublished_content_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PostUnpublishedContentTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/feed', new \PYS_PRO_GLOBAL\FacebookAds\Object\Post(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Post::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getFriends(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('uid' => 'int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/friends', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getFundraisers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/fundraisers', new \PYS_PRO_GLOBAL\FacebookAds\Object\FundraiserPersonToCharity(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\FundraiserPersonToCharity::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createFundraiser(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('charity_id' => 'string', 'cover_photo' => 'file', 'currency' => 'string', 'description' => 'string', 'end_time' => 'int', 'external_event_name' => 'string', 'external_event_start_time' => 'int', 'external_event_uri' => 'string', 'external_fundraiser_uri' => 'string', 'external_id' => 'string', 'fundraiser_type' => 'fundraiser_type_enum', 'goal_amount' => 'int', 'name' => 'string', 'page_id' => 'string');
        $enums = array('fundraiser_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\FundraiserPersonToCharityFundraiserTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/fundraisers', new \PYS_PRO_GLOBAL\FacebookAds\Object\FundraiserPersonToCharity(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\FundraiserPersonToCharity::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createGameItem(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('action' => 'action_enum', 'app_id' => 'string', 'drop_table_id' => 'string', 'ext_id' => 'string', 'item_id' => 'string', 'quantity' => 'unsigned int');
        $enums = array('action_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\GameItemActionValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/game_items', new \PYS_PRO_GLOBAL\FacebookAds\Object\GameItem(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\GameItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createGameTime(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('action' => 'action_enum');
        $enums = array('action_enum' => array('END', 'HEARTBEAT', 'START'));
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/game_times', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getGroups(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('admin_only' => 'bool', 'parent' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/groups', new \PYS_PRO_GLOBAL\FacebookAds\Object\Group(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Group::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getIdsForApps(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('app' => 'int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ids_for_apps', new \PYS_PRO_GLOBAL\FacebookAds\Object\UserIDForApp(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\UserIDForApp::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getIdsForBusiness(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('app' => 'int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ids_for_business', new \PYS_PRO_GLOBAL\FacebookAds\Object\UserIDForApp(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\UserIDForApp::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getIdsForPages(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('page' => 'int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ids_for_pages', new \PYS_PRO_GLOBAL\FacebookAds\Object\UserIDForPage(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\UserIDForPage::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getLikes(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('target_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/likes', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getLiveVideos(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('broadcast_status' => 'list<broadcast_status_enum>', 'source' => 'source_enum');
        $enums = array('broadcast_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoBroadcastStatusValues::getInstance()->getValues(), 'source_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSourceValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/live_videos', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createLiveVideo(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('content_tags' => 'list<string>', 'description' => 'string', 'enable_backup_ingest' => 'bool', 'encoding_settings' => 'string', 'event_params' => 'Object', 'fisheye_video_cropped' => 'bool', 'front_z_rotation' => 'float', 'is_audio_only' => 'bool', 'is_spherical' => 'bool', 'original_fov' => 'unsigned int', 'planned_start_time' => 'int', 'privacy' => 'string', 'projection' => 'projection_enum', 'published' => 'bool', 'schedule_custom_profile_image' => 'file', 'spatial_audio_format' => 'spatial_audio_format_enum', 'status' => 'status_enum', 'stereoscopic_mode' => 'stereoscopic_mode_enum', 'stop_on_delete_stream' => 'bool', 'stream_type' => 'stream_type_enum', 'title' => 'string');
        $enums = array('projection_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoProjectionValues::getInstance()->getValues(), 'spatial_audio_format_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSpatialAudioFormatValues::getInstance()->getValues(), 'status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStatusValues::getInstance()->getValues(), 'stereoscopic_mode_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStereoscopicModeValues::getInstance()->getValues(), 'stream_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStreamTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/live_videos', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getMusic(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('target_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/music', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createNotification(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('filtering' => 'list<filtering_enum>', 'href' => 'Object', 'notif_ids' => 'list<string>', 'read' => 'bool', 'ref' => 'string', 'seen' => 'bool', 'template' => 'Object', 'type' => 'type_enum');
        $enums = array('filtering_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserFilteringValues::getInstance()->getValues(), 'type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/notifications', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPaymentTransactions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/payment_transactions', new \PYS_PRO_GLOBAL\FacebookAds\Object\PaymentEnginePayment(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\PaymentEnginePayment::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deletePermissions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('permission' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/permissions', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPermissions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('permission' => 'string', 'status' => 'status_enum');
        $enums = array('status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PermissionStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/permissions', new \PYS_PRO_GLOBAL\FacebookAds\Object\Permission(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Permission::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPersonalAdAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/personal_ad_accounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPhotos(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('type' => 'type_enum');
        $enums = array('type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PhotoTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/photos', new \PYS_PRO_GLOBAL\FacebookAds\Object\Photo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Photo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createPhoto(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('aid' => 'string', 'allow_spherical_photo' => 'bool', 'alt_text_custom' => 'string', 'android_key_hash' => 'string', 'application_id' => 'string', 'attempt' => 'unsigned int', 'audience_exp' => 'bool', 'backdated_time' => 'datetime', 'backdated_time_granularity' => 'backdated_time_granularity_enum', 'caption' => 'string', 'composer_session_id' => 'string', 'direct_share_status' => 'unsigned int', 'feed_targeting' => 'Object', 'filter_type' => 'unsigned int', 'full_res_is_coming_later' => 'bool', 'initial_view_heading_override_degrees' => 'unsigned int', 'initial_view_pitch_override_degrees' => 'unsigned int', 'initial_view_vertical_fov_override_degrees' => 'unsigned int', 'ios_bundle_id' => 'string', 'is_explicit_location' => 'bool', 'is_explicit_place' => 'bool', 'manual_privacy' => 'bool', 'message' => 'string', 'name' => 'string', 'no_story' => 'bool', 'offline_id' => 'unsigned int', 'og_action_type_id' => 'string', 'og_icon_id' => 'string', 'og_object_id' => 'string', 'og_phrase' => 'string', 'og_set_profile_badge' => 'bool', 'og_suggestion_mechanism' => 'string', 'place' => 'Object', 'privacy' => 'string', 'profile_id' => 'int', 'proxied_app_id' => 'string', 'published' => 'bool', 'qn' => 'string', 'scheduled_publish_time' => 'unsigned int', 'spherical_metadata' => 'map', 'sponsor_id' => 'string', 'sponsor_relationship' => 'unsigned int', 'tags' => 'list<Object>', 'target_id' => 'int', 'targeting' => 'Object', 'time_since_original_post' => 'unsigned int', 'uid' => 'int', 'unpublished_content_type' => 'unpublished_content_type_enum', 'url' => 'string', 'user_selected_tags' => 'bool', 'vault_image_id' => 'string');
        $enums = array('backdated_time_granularity_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PhotoBackdatedTimeGranularityValues::getInstance()->getValues(), 'unpublished_content_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\PhotoUnpublishedContentTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/photos', new \PYS_PRO_GLOBAL\FacebookAds\Object\Photo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Photo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPicture(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('breaking_change' => 'breaking_change_enum', 'height' => 'int', 'redirect' => 'bool', 'type' => 'type_enum', 'width' => 'int');
        $enums = array('breaking_change_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProfilePictureSourceBreakingChangeValues::getInstance()->getValues(), 'type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProfilePictureSourceTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/picture', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProfilePictureSource(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProfilePictureSource::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPioneerData(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/pioneer_data', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createPioneerDatum(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('json_data' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/pioneer_data', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPosts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('include_hidden' => 'bool', 'q' => 'string', 'show_expired' => 'bool', 'since' => 'datetime', 'until' => 'datetime', 'with' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/posts', new \PYS_PRO_GLOBAL\FacebookAds\Object\Post(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Post::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getRichMediaDocuments(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('query' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/rich_media_documents', new \PYS_PRO_GLOBAL\FacebookAds\Object\Canvas(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Canvas::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createStagingResource(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('file' => 'file');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/staging_resources', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getVideos(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('type' => 'type_enum');
        $enums = array('type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/videos', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createVideo(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adaptive_type' => 'string', 'animated_effect_id' => 'unsigned int', 'application_id' => 'string', 'asked_fun_fact_prompt_id' => 'unsigned int', 'audio_story_wave_animation_handle' => 'string', 'composer_entry_picker' => 'string', 'composer_entry_point' => 'string', 'composer_entry_time' => 'unsigned int', 'composer_session_events_log' => 'string', 'composer_session_id' => 'string', 'composer_source_surface' => 'string', 'composer_type' => 'string', 'container_type' => 'container_type_enum', 'content_category' => 'content_category_enum', 'creative_tools' => 'string', 'description' => 'string', 'direct_share_status' => 'unsigned int', 'embeddable' => 'bool', 'end_offset' => 'unsigned int', 'fbuploader_video_file_chunk' => 'string', 'file_size' => 'unsigned int', 'file_url' => 'string', 'fisheye_video_cropped' => 'bool', 'formatting' => 'formatting_enum', 'fov' => 'unsigned int', 'front_z_rotation' => 'float', 'fun_fact_prompt_id' => 'unsigned int', 'fun_fact_toastee_id' => 'unsigned int', 'guide' => 'list<list<unsigned int>>', 'guide_enabled' => 'bool', 'has_nickname' => 'bool', 'holiday_card' => 'string', 'initial_heading' => 'unsigned int', 'initial_pitch' => 'unsigned int', 'instant_game_entry_point_data' => 'string', 'is_boost_intended' => 'bool', 'is_explicit_share' => 'bool', 'is_group_linking_post' => 'bool', 'is_voice_clip' => 'bool', 'location_source_id' => 'string', 'manual_privacy' => 'bool', 'no_story' => 'bool', 'offer_like_post_id' => 'unsigned int', 'og_action_type_id' => 'string', 'og_icon_id' => 'string', 'og_object_id' => 'string', 'og_phrase' => 'string', 'og_suggestion_mechanism' => 'string', 'original_fov' => 'unsigned int', 'original_projection_type' => 'original_projection_type_enum', 'privacy' => 'string', 'publish_event_id' => 'unsigned int', 'react_mode_metadata' => 'string', 'referenced_sticker_id' => 'string', 'replace_video_id' => 'string', 'slideshow_spec' => 'map', 'source' => 'string', 'source_instagram_media_id' => 'string', 'spherical' => 'bool', 'sponsor_id' => 'string', 'start_offset' => 'unsigned int', 'swap_mode' => 'swap_mode_enum', 'text_format_metadata' => 'string', 'throwback_camera_roll_media' => 'string', 'thumb' => 'file', 'time_since_original_post' => 'unsigned int', 'title' => 'string', 'transcode_setting_properties' => 'string', 'unpublished_content_type' => 'unpublished_content_type_enum', 'upload_phase' => 'upload_phase_enum', 'upload_session_id' => 'string', 'upload_setting_properties' => 'string', 'video_file_chunk' => 'string', 'video_id_original' => 'string', 'video_start_time_ms' => 'unsigned int', 'waterfall_id' => 'string');
        $enums = array('container_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContainerTypeValues::getInstance()->getValues(), 'content_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContentCategoryValues::getInstance()->getValues(), 'formatting_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoFormattingValues::getInstance()->getValues(), 'original_projection_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoOriginalProjectionTypeValues::getInstance()->getValues(), 'swap_mode_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoSwapModeValues::getInstance()->getValues(), 'unpublished_content_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUnpublishedContentTypeValues::getInstance()->getValues(), 'upload_phase_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUploadPhaseValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/videos', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('emoji_color_pref' => 'unsigned int', 'firstname' => 'string', 'lastname' => 'string', 'local_news_megaphone_dismiss_status' => 'local_news_megaphone_dismiss_status_enum', 'local_news_subscription_status' => 'local_news_subscription_status_enum', 'name' => 'string', 'password' => 'string');
        $enums = array('local_news_megaphone_dismiss_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserLocalNewsMegaphoneDismissStatusValues::getInstance()->getValues(), 'local_news_subscription_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\UserLocalNewsSubscriptionStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
