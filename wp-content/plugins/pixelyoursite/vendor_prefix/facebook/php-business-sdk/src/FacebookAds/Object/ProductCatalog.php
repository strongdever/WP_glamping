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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductCatalogFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CheckBatchRequestStatusErrorPriorityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\MediaTitleContentCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogCategoryCategorizationCriteriaValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDataSourceIngestionSourceTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedChannelsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedEntitiesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedFeaturesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupSeveritiesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupTypesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogItemSubTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogPermittedRolesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogPermittedTasksValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogStandardValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogTasksValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogVerticalValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductEventStatBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedDelimiterValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedEncodingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedFeedTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedIngestionSourceTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedItemSubTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedOverrideTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedQuotedFieldsModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorPriorityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemOriginCountryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemWaComplianceCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleAvailabilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleBodyStyleValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleConditionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleDrivetrainValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleFuelTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleStateOfVehicleValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleTransmissionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleVehicleTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class ProductCatalog extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'owned_product_catalogs';
    }
    /**
     * @return ProductCatalogFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ProductCatalogFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['Vertical'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogVerticalValues::getInstance()->getValues();
        $ref_enums['PermittedRoles'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogPermittedRolesValues::getInstance()->getValues();
        $ref_enums['PermittedTasks'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogPermittedTasksValues::getInstance()->getValues();
        $ref_enums['Tasks'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogTasksValues::getInstance()->getValues();
        $ref_enums['Standard'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogStandardValues::getInstance()->getValues();
        $ref_enums['ItemSubType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogItemSubTypeValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function deleteAgencies(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('business' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/agencies', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array('business' => 'string', 'permitted_roles' => 'list<permitted_roles_enum>', 'permitted_tasks' => 'list<permitted_tasks_enum>', 'utm_settings' => 'map');
        $enums = array('permitted_roles_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogPermittedRolesValues::getInstance()->getValues(), 'permitted_tasks_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogPermittedTasksValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/agencies', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getArEffectsBatchStatus(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('handle' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ar_effects_batch_status', new \PYS_PRO_GLOBAL\FacebookAds\Object\AREffectsBatchStatus(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AREffectsBatchStatus::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteAssignedUsers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('user' => 'int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/assigned_users', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
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
        $enums = array('tasks_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogTasksValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/assigned_users', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
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
    public function createBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('allow_upsert' => 'bool', 'fbe_external_business_id' => 'string', 'requests' => 'list<map>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCatalogWebsiteSetting(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('is_allowed_to_crawl' => 'bool');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/catalog_website_settings', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCategories(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('categorization_criteria' => 'categorization_criteria_enum', 'filter' => 'Object');
        $enums = array('categorization_criteria_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogCategoryCategorizationCriteriaValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/categories', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogCategory(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogCategory::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCategory(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('data' => 'list<map>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/categories', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogCategory(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogCategory::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCheckBatchRequestStatus(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('error_priority' => 'error_priority_enum', 'handle' => 'string', 'load_ids_of_invalid_requests' => 'bool');
        $enums = array('error_priority_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CheckBatchRequestStatusErrorPriorityValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/check_batch_request_status', new \PYS_PRO_GLOBAL\FacebookAds\Object\CheckBatchRequestStatus(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CheckBatchRequestStatus::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCollaborativeAdsLsbImageBank(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/collaborative_ads_lsb_image_bank', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCollaborativeAdsShareSettings(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/collaborative_ads_share_settings', new \PYS_PRO_GLOBAL\FacebookAds\Object\CollaborativeAdsShareSettings(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CollaborativeAdsShareSettings::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCpasLsbImageBank(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('ad_group_id' => 'unsigned int', 'agency_business_id' => 'unsigned int', 'backup_image_urls' => 'list<string>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/cpas_lsb_image_bank', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getDataSources(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('ingestion_source_type' => 'ingestion_source_type_enum');
        $enums = array('ingestion_source_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDataSourceIngestionSourceTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/data_sources', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogDataSource(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogDataSource::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getDiagnostics(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('affected_channels' => 'list<affected_channels_enum>', 'affected_entities' => 'list<affected_entities_enum>', 'affected_features' => 'list<affected_features_enum>', 'severities' => 'list<severities_enum>', 'types' => 'list<types_enum>');
        $enums = array('affected_channels_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedChannelsValues::getInstance()->getValues(), 'affected_entities_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedEntitiesValues::getInstance()->getValues(), 'affected_features_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupAffectedFeaturesValues::getInstance()->getValues(), 'severities_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupSeveritiesValues::getInstance()->getValues(), 'types_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogDiagnosticGroupTypesValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/diagnostics', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogDiagnosticGroup(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogDiagnosticGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getEventStats(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('breakdowns' => 'list<breakdowns_enum>');
        $enums = array('breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductEventStatBreakdownsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/event_stats', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductEventStat(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductEventStat::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteExternalEventSources(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('external_event_sources' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/external_event_sources', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getExternalEventSources(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/external_event_sources', new \PYS_PRO_GLOBAL\FacebookAds\Object\ExternalEventSource(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ExternalEventSource::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createExternalEventSource(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('external_event_sources' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/external_event_sources', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function createHomeListing(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('address' => 'Object', 'availability' => 'string', 'currency' => 'string', 'description' => 'string', 'home_listing_id' => 'string', 'images' => 'list<Object>', 'listing_type' => 'string', 'name' => 'string', 'num_baths' => 'float', 'num_beds' => 'float', 'num_units' => 'float', 'price' => 'float', 'property_type' => 'string', 'url' => 'string', 'year_built' => 'unsigned int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/home_listings', new \PYS_PRO_GLOBAL\FacebookAds\Object\HomeListing(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\HomeListing::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getHotelRoomsBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('handle' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/hotel_rooms_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogHotelRoomsBatch(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogHotelRoomsBatch::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createHotelRoomsBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('file' => 'file', 'password' => 'string', 'standard' => 'standard_enum', 'update_only' => 'bool', 'url' => 'string', 'username' => 'string');
        $enums = array('standard_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogStandardValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/hotel_rooms_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function createHotel(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('address' => 'Object', 'applinks' => 'Object', 'base_price' => 'unsigned int', 'brand' => 'string', 'currency' => 'string', 'description' => 'string', 'guest_ratings' => 'list<Object>', 'hotel_id' => 'string', 'images' => 'list<Object>', 'name' => 'string', 'phone' => 'string', 'star_rating' => 'float', 'url' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/hotels', new \PYS_PRO_GLOBAL\FacebookAds\Object\Hotel(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Hotel::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createItemsBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('allow_upsert' => 'bool', 'item_sub_type' => 'item_sub_type_enum', 'item_type' => 'string', 'requests' => 'map');
        $enums = array('item_sub_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogItemSubTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/items_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createLocalizedItemsBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('allow_upsert' => 'bool', 'item_type' => 'string', 'requests' => 'map');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/localized_items_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createMediaTitle(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('applinks' => 'Object', 'content_category' => 'content_category_enum', 'currency' => 'string', 'description' => 'string', 'fb_page_id' => 'string', 'genres' => 'list<string>', 'images' => 'list<Object>', 'kg_fb_id' => 'string', 'media_title_id' => 'string', 'price' => 'unsigned int', 'title' => 'string', 'title_display_name' => 'string', 'url' => 'string');
        $enums = array('content_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\MediaTitleContentCategoryValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/media_titles', new \PYS_PRO_GLOBAL\FacebookAds\Object\MediaTitle(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\MediaTitle::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPricingVariablesBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('handle' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/pricing_variables_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogPricingVariablesBatch(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogPricingVariablesBatch::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createPricingVariablesBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('file' => 'file', 'password' => 'string', 'standard' => 'standard_enum', 'update_only' => 'bool', 'url' => 'string', 'username' => 'string');
        $enums = array('standard_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductCatalogStandardValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/pricing_variables_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProductFeeds(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/product_feeds', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createProductFeed(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('country' => 'string', 'default_currency' => 'string', 'deletion_enabled' => 'bool', 'delimiter' => 'delimiter_enum', 'encoding' => 'encoding_enum', 'feed_type' => 'feed_type_enum', 'file_name' => 'string', 'ingestion_source_type' => 'ingestion_source_type_enum', 'item_sub_type' => 'item_sub_type_enum', 'migrated_from_feed_id' => 'string', 'name' => 'string', 'override_type' => 'override_type_enum', 'override_value' => 'string', 'primary_feed_ids' => 'list<string>', 'quoted_fields_mode' => 'quoted_fields_mode_enum', 'rules' => 'list<string>', 'schedule' => 'string', 'selected_override_fields' => 'list<string>', 'update_schedule' => 'string');
        $enums = array('delimiter_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedDelimiterValues::getInstance()->getValues(), 'encoding_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedEncodingValues::getInstance()->getValues(), 'feed_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedFeedTypeValues::getInstance()->getValues(), 'ingestion_source_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedIngestionSourceTypeValues::getInstance()->getValues(), 'item_sub_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedItemSubTypeValues::getInstance()->getValues(), 'override_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedOverrideTypeValues::getInstance()->getValues(), 'quoted_fields_mode_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductFeedQuotedFieldsModeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/product_feeds', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductFeed::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProductGroups(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/product_groups', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createProductGroup(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('retailer_id' => 'string', 'variants' => 'list<Object>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/product_groups', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProductSets(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('ancestor_id' => 'string', 'has_children' => 'bool', 'parent_id' => 'string', 'retailer_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/product_sets', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createProductSet(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('filter' => 'Object', 'metadata' => 'map', 'name' => 'string', 'ordering_info' => 'list<unsigned int>', 'publish_to_shops' => 'list<map>', 'retailer_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/product_sets', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProductSetsBatch(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('handle' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/product_sets_batch', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogProductSetsBatch(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalogProductSetsBatch::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getProducts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('bulk_pagination' => 'bool', 'error_priority' => 'error_priority_enum', 'error_type' => 'error_type_enum', 'filter' => 'Object', 'return_only_approved_products' => 'bool');
        $enums = array('error_priority_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorPriorityValues::getInstance()->getValues(), 'error_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemErrorTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/products', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createProduct(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('additional_image_urls' => 'list<string>', 'additional_uploaded_image_ids' => 'list<string>', 'additional_variant_attributes' => 'map', 'android_app_name' => 'string', 'android_class' => 'string', 'android_package' => 'string', 'android_url' => 'string', 'availability' => 'availability_enum', 'brand' => 'string', 'category' => 'string', 'category_specific_fields' => 'map', 'checkout_url' => 'string', 'color' => 'string', 'commerce_tax_category' => 'commerce_tax_category_enum', 'condition' => 'condition_enum', 'currency' => 'string', 'custom_data' => 'map', 'custom_label_0' => 'string', 'custom_label_1' => 'string', 'custom_label_2' => 'string', 'custom_label_3' => 'string', 'custom_label_4' => 'string', 'custom_number_0' => 'unsigned int', 'custom_number_1' => 'unsigned int', 'custom_number_2' => 'unsigned int', 'custom_number_3' => 'unsigned int', 'custom_number_4' => 'unsigned int', 'description' => 'string', 'expiration_date' => 'string', 'fb_product_category' => 'string', 'gender' => 'gender_enum', 'gtin' => 'string', 'image_url' => 'string', 'importer_address' => 'map', 'importer_name' => 'string', 'inventory' => 'unsigned int', 'ios_app_name' => 'string', 'ios_app_store_id' => 'unsigned int', 'ios_url' => 'string', 'ipad_app_name' => 'string', 'ipad_app_store_id' => 'unsigned int', 'ipad_url' => 'string', 'iphone_app_name' => 'string', 'iphone_app_store_id' => 'unsigned int', 'iphone_url' => 'string', 'launch_date' => 'string', 'manufacturer_info' => 'string', 'manufacturer_part_number' => 'string', 'marked_for_product_launch' => 'marked_for_product_launch_enum', 'material' => 'string', 'mobile_link' => 'string', 'name' => 'string', 'offer_price_amount' => 'unsigned int', 'offer_price_end_date' => 'datetime', 'offer_price_start_date' => 'datetime', 'ordering_index' => 'unsigned int', 'origin_country' => 'origin_country_enum', 'pattern' => 'string', 'price' => 'unsigned int', 'product_type' => 'string', 'quantity_to_sell_on_facebook' => 'unsigned int', 'retailer_id' => 'string', 'retailer_product_group_id' => 'string', 'return_policy_days' => 'unsigned int', 'sale_price' => 'unsigned int', 'sale_price_end_date' => 'datetime', 'sale_price_start_date' => 'datetime', 'short_description' => 'string', 'size' => 'string', 'start_date' => 'string', 'url' => 'string', 'visibility' => 'visibility_enum', 'wa_compliance_category' => 'wa_compliance_category_enum', 'windows_phone_app_id' => 'string', 'windows_phone_app_name' => 'string', 'windows_phone_url' => 'string');
        $enums = array('availability_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemAvailabilityValues::getInstance()->getValues(), 'commerce_tax_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemCommerceTaxCategoryValues::getInstance()->getValues(), 'condition_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemConditionValues::getInstance()->getValues(), 'gender_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemGenderValues::getInstance()->getValues(), 'marked_for_product_launch_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemMarkedForProductLaunchValues::getInstance()->getValues(), 'origin_country_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemOriginCountryValues::getInstance()->getValues(), 'visibility_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemVisibilityValues::getInstance()->getValues(), 'wa_compliance_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProductItemWaComplianceCategoryValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/products', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductItem::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function createVehicle(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('address' => 'map', 'applinks' => 'Object', 'availability' => 'availability_enum', 'body_style' => 'body_style_enum', 'condition' => 'condition_enum', 'currency' => 'string', 'date_first_on_lot' => 'string', 'dealer_id' => 'string', 'dealer_name' => 'string', 'dealer_phone' => 'string', 'description' => 'string', 'drivetrain' => 'drivetrain_enum', 'exterior_color' => 'string', 'fb_page_id' => 'string', 'fuel_type' => 'fuel_type_enum', 'images' => 'list<Object>', 'interior_color' => 'string', 'make' => 'string', 'mileage' => 'map', 'model' => 'string', 'price' => 'unsigned int', 'state_of_vehicle' => 'state_of_vehicle_enum', 'title' => 'string', 'transmission' => 'transmission_enum', 'trim' => 'string', 'url' => 'string', 'vehicle_id' => 'string', 'vehicle_type' => 'vehicle_type_enum', 'vin' => 'string', 'year' => 'unsigned int');
        $enums = array('availability_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleAvailabilityValues::getInstance()->getValues(), 'body_style_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleBodyStyleValues::getInstance()->getValues(), 'condition_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleConditionValues::getInstance()->getValues(), 'drivetrain_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleDrivetrainValues::getInstance()->getValues(), 'fuel_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleFuelTypeValues::getInstance()->getValues(), 'state_of_vehicle_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleStateOfVehicleValues::getInstance()->getValues(), 'transmission_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleTransmissionValues::getInstance()->getValues(), 'vehicle_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleVehicleTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/vehicles', new \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('allow_delete_catalog_with_live_product_set' => 'bool');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'NODE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('segment_use_cases' => 'list<segment_use_cases_enum>');
        $enums = array('segment_use_cases_enum' => array('AFFILIATE_SELLER_STOREFRONT', 'AFFILIATE_TAGGED_ONLY_DEPRECATED', 'COLLAB_ADS', 'COLLAB_ADS_FOR_MARKETPLACE_PARTNER', 'COLLAB_ADS_SEGMENT_WITHOUT_SEGMENT_SYNCING', 'CREATORS_AS_SELLERS', 'DIGITAL_CIRCULARS', 'FB_LIVE_SHOPPING', 'IG_SHOPPING', 'IG_SHOPPING_SUGGESTED_PRODUCTS', 'MARKETPLACE_SHOPS', 'TEST'));
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('da_display_settings' => 'Object', 'default_image_url' => 'string', 'destination_catalog_settings' => 'map', 'fallback_image_url' => 'string', 'flight_catalog_settings' => 'map', 'name' => 'string', 'partner_integration' => 'map', 'store_catalog_settings' => 'map');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ProductCatalog::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    /**
     * @param int $user_id
     * @param string $role
     */
    public function addUserPermission($user_id, $role)
    {
        $params = array('user' => $user_id, 'role' => $role);
        $this->getApi()->call('/' . $this->assureId() . '/userpermissions', \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, $params);
    }
    /**
     * @param int $user_id
     */
    public function deleteUserPermission($user_id)
    {
        $params = array('user' => $user_id);
        $this->getApi()->call('/' . $this->assureId() . '/userpermissions', \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, $params);
    }
}
