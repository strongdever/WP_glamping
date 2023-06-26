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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdSetFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdActivityCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdAsyncRequestStatusesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCampaignDeliveryEstimateOptimizationGoalValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetBidStrategyValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetBillingEventValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetConfiguredStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDestinationTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetEffectiveStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetExecutionOptionsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetFullFunnelExplorationModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetMultiOptimizationGoalWeightValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOperatorValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOptimizationGoalValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOptimizationSubEventValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetStatusOptionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetTuneForCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ContentDeliveryReportPlatformValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ContentDeliveryReportPositionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Traits\AdLabelAwareCrudObjectTrait;
use PYS_PRO_GLOBAL\FacebookAds\Object\Traits\ObjectValidation;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdSet extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractArchivableCrudObject implements \PYS_PRO_GLOBAL\FacebookAds\Object\CanRedownloadInterface
{
    use AdLabelAwareCrudObjectTrait;
    use ObjectValidation;
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'adsets';
    }
    /**
     * @return AdSetFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdSetFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['BidStrategy'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetBidStrategyValues::getInstance()->getValues();
        $ref_enums['BillingEvent'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetBillingEventValues::getInstance()->getValues();
        $ref_enums['ConfiguredStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetConfiguredStatusValues::getInstance()->getValues();
        $ref_enums['EffectiveStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetEffectiveStatusValues::getInstance()->getValues();
        $ref_enums['OptimizationGoal'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOptimizationGoalValues::getInstance()->getValues();
        $ref_enums['Status'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetStatusValues::getInstance()->getValues();
        $ref_enums['DatePreset'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDatePresetValues::getInstance()->getValues();
        $ref_enums['DestinationType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDestinationTypeValues::getInstance()->getValues();
        $ref_enums['ExecutionOptions'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetExecutionOptionsValues::getInstance()->getValues();
        $ref_enums['FullFunnelExplorationMode'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetFullFunnelExplorationModeValues::getInstance()->getValues();
        $ref_enums['MultiOptimizationGoalWeight'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetMultiOptimizationGoalWeightValues::getInstance()->getValues();
        $ref_enums['OptimizationSubEvent'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOptimizationSubEventValues::getInstance()->getValues();
        $ref_enums['TuneForCategory'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetTuneForCategoryValues::getInstance()->getValues();
        $ref_enums['Operator'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOperatorValues::getInstance()->getValues();
        $ref_enums['StatusOption'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetStatusOptionValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getActivities(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('after' => 'string', 'business_id' => 'string', 'category' => 'category_enum', 'limit' => 'int', 'since' => 'datetime', 'uid' => 'int', 'until' => 'datetime');
        $enums = array('category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdActivityCategoryValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/activities', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdActivity(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdActivity::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getAdCreatives(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adcreatives', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdCreative(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdCreative::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteAdLabels(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adlabels' => 'list<Object>', 'execution_options' => 'list<execution_options_enum>');
        $enums = array('execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetExecutionOptionsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/adlabels', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAdLabel(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adlabels' => 'list<Object>', 'execution_options' => 'list<execution_options_enum>');
        $enums = array('execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetExecutionOptionsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/adlabels', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAdRulesGoverned(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('pass_evaluation' => 'bool');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adrules_governed', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdRule(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdRule::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAds(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('date_preset' => 'date_preset_enum', 'effective_status' => 'list<string>', 'time_range' => 'Object', 'updated_since' => 'int');
        $enums = array('date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdDatePresetValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ads', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAsyncAdRequests(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('statuses' => 'list<statuses_enum>');
        $enums = array('statuses_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdAsyncRequestStatusesValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/asyncadrequests', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAsyncRequest(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAsyncRequest::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getContentDeliveryReport(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('end_date' => 'datetime', 'platform' => 'platform_enum', 'position' => 'position_enum', 'start_date' => 'datetime', 'summary' => 'bool');
        $enums = array('platform_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ContentDeliveryReportPlatformValues::getInstance()->getValues(), 'position_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ContentDeliveryReportPositionValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/content_delivery_report', new \PYS_PRO_GLOBAL\FacebookAds\Object\ContentDeliveryReport(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ContentDeliveryReport::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCopies(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('date_preset' => 'date_preset_enum', 'effective_status' => 'list<effective_status_enum>', 'is_completed' => 'bool', 'time_range' => 'Object');
        $enums = array('date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDatePresetValues::getInstance()->getValues(), 'effective_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetEffectiveStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/copies', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCopy(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('campaign_id' => 'string', 'create_dco_adset' => 'bool', 'deep_copy' => 'bool', 'end_time' => 'datetime', 'rename_options' => 'Object', 'start_time' => 'datetime', 'status_option' => 'status_option_enum');
        $enums = array('status_option_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetStatusOptionValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/copies', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getDeliveryEstimate(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('optimization_goal' => 'optimization_goal_enum', 'promoted_object' => 'Object', 'targeting_spec' => 'Targeting');
        $enums = array('optimization_goal_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCampaignDeliveryEstimateOptimizationGoalValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/delivery_estimate', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdCampaignDeliveryEstimate(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdCampaignDeliveryEstimate::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getInsights(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('action_attribution_windows' => 'list<action_attribution_windows_enum>', 'action_breakdowns' => 'list<action_breakdowns_enum>', 'action_report_time' => 'action_report_time_enum', 'breakdowns' => 'list<breakdowns_enum>', 'date_preset' => 'date_preset_enum', 'default_summary' => 'bool', 'export_columns' => 'list<string>', 'export_format' => 'string', 'export_name' => 'string', 'fields' => 'list<string>', 'filtering' => 'list<Object>', 'level' => 'level_enum', 'product_id_limit' => 'int', 'sort' => 'list<string>', 'summary' => 'list<string>', 'summary_action_breakdowns' => 'list<summary_action_breakdowns_enum>', 'time_increment' => 'string', 'time_range' => 'Object', 'time_ranges' => 'list<Object>', 'use_account_attribution_setting' => 'bool', 'use_unified_attribution_setting' => 'bool');
        $enums = array('action_attribution_windows_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues::getInstance()->getValues(), 'action_breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues::getInstance()->getValues(), 'action_report_time_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues::getInstance()->getValues(), 'breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues::getInstance()->getValues(), 'date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues::getInstance()->getValues(), 'level_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues::getInstance()->getValues(), 'summary_action_breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/insights', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdsInsights(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdsInsights::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getInsightsAsync(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('action_attribution_windows' => 'list<action_attribution_windows_enum>', 'action_breakdowns' => 'list<action_breakdowns_enum>', 'action_report_time' => 'action_report_time_enum', 'breakdowns' => 'list<breakdowns_enum>', 'date_preset' => 'date_preset_enum', 'default_summary' => 'bool', 'export_columns' => 'list<string>', 'export_format' => 'string', 'export_name' => 'string', 'fields' => 'list<string>', 'filtering' => 'list<Object>', 'level' => 'level_enum', 'product_id_limit' => 'int', 'sort' => 'list<string>', 'summary' => 'list<string>', 'summary_action_breakdowns' => 'list<summary_action_breakdowns_enum>', 'time_increment' => 'string', 'time_range' => 'Object', 'time_ranges' => 'list<Object>', 'use_account_attribution_setting' => 'bool', 'use_unified_attribution_setting' => 'bool');
        $enums = array('action_attribution_windows_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues::getInstance()->getValues(), 'action_breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues::getInstance()->getValues(), 'action_report_time_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues::getInstance()->getValues(), 'breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues::getInstance()->getValues(), 'date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues::getInstance()->getValues(), 'level_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues::getInstance()->getValues(), 'summary_action_breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/insights', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdReportRun(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdReportRun::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getTargetingSentenceLines(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/targetingsentencelines', new \PYS_PRO_GLOBAL\FacebookAds\Object\TargetingSentenceLine(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\TargetingSentenceLine::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array('am_call_tags' => 'map', 'date_preset' => 'date_preset_enum', 'from_adtable' => 'bool', 'time_range' => 'Object');
        $enums = array('date_preset_enum' => array('data_maximum', 'last_14d', 'last_28d', 'last_30d', 'last_3d', 'last_7d', 'last_90d', 'last_month', 'last_quarter', 'last_week_mon_sun', 'last_week_sun_sat', 'last_year', 'maximum', 'this_month', 'this_quarter', 'this_week_mon_today', 'this_week_sun_today', 'this_year', 'today', 'yesterday'));
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('account_id' => 'string', 'adlabels' => 'list<Object>', 'adset_schedule' => 'list<Object>', 'attribution_spec' => 'list<map>', 'bid_adjustments' => 'Object', 'bid_amount' => 'int', 'bid_constraints' => 'map<string, Object>', 'bid_strategy' => 'bid_strategy_enum', 'billing_event' => 'billing_event_enum', 'campaign_spec' => 'Object', 'creative_sequence' => 'list<string>', 'daily_budget' => 'unsigned int', 'daily_imps' => 'unsigned int', 'daily_min_spend_target' => 'unsigned int', 'daily_spend_cap' => 'unsigned int', 'date_format' => 'string', 'destination_type' => 'destination_type_enum', 'end_time' => 'datetime', 'execution_options' => 'list<execution_options_enum>', 'existing_customer_budget_percentage' => 'unsigned int', 'full_funnel_exploration_mode' => 'full_funnel_exploration_mode_enum', 'lifetime_budget' => 'unsigned int', 'lifetime_imps' => 'unsigned int', 'lifetime_min_spend_target' => 'unsigned int', 'lifetime_spend_cap' => 'unsigned int', 'multi_optimization_goal_weight' => 'multi_optimization_goal_weight_enum', 'name' => 'string', 'optimization_goal' => 'optimization_goal_enum', 'optimization_sub_event' => 'optimization_sub_event_enum', 'pacing_type' => 'list<string>', 'promoted_object' => 'Object', 'rb_prediction_id' => 'string', 'rf_prediction_id' => 'string', 'start_time' => 'datetime', 'status' => 'status_enum', 'targeting' => 'Targeting', 'time_based_ad_rotation_id_blocks' => 'list<list<unsigned int>>', 'time_based_ad_rotation_intervals' => 'list<unsigned int>', 'time_start' => 'datetime', 'time_stop' => 'datetime', 'tune_for_category' => 'tune_for_category_enum', 'upstream_events' => 'map');
        $enums = array('bid_strategy_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetBidStrategyValues::getInstance()->getValues(), 'billing_event_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetBillingEventValues::getInstance()->getValues(), 'destination_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDestinationTypeValues::getInstance()->getValues(), 'execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetExecutionOptionsValues::getInstance()->getValues(), 'full_funnel_exploration_mode_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetFullFunnelExplorationModeValues::getInstance()->getValues(), 'multi_optimization_goal_weight_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetMultiOptimizationGoalWeightValues::getInstance()->getValues(), 'optimization_goal_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOptimizationGoalValues::getInstance()->getValues(), 'optimization_sub_event_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetOptimizationSubEventValues::getInstance()->getValues(), 'status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetStatusValues::getInstance()->getValues(), 'tune_for_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetTuneForCategoryValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
