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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\CampaignFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetEffectiveStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignBidStrategyValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignConfiguredStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignEffectiveStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignExecutionOptionsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignObjectiveValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignOperatorValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSmartPromotionTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoriesValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoryCountryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignStatusOptionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignStatusValues;
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
class Campaign extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractArchivableCrudObject
{
    use AdLabelAwareCrudObjectTrait;
    use ObjectValidation;
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'campaigns';
    }
    /**
     * @return CampaignFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\CampaignFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['BidStrategy'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignBidStrategyValues::getInstance()->getValues();
        $ref_enums['ConfiguredStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignConfiguredStatusValues::getInstance()->getValues();
        $ref_enums['EffectiveStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignEffectiveStatusValues::getInstance()->getValues();
        $ref_enums['Status'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignStatusValues::getInstance()->getValues();
        $ref_enums['DatePreset'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignDatePresetValues::getInstance()->getValues();
        $ref_enums['ExecutionOptions'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignExecutionOptionsValues::getInstance()->getValues();
        $ref_enums['Objective'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignObjectiveValues::getInstance()->getValues();
        $ref_enums['SmartPromotionType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSmartPromotionTypeValues::getInstance()->getValues();
        $ref_enums['SpecialAdCategories'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoriesValues::getInstance()->getValues();
        $ref_enums['SpecialAdCategoryCountry'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoryCountryValues::getInstance()->getValues();
        $ref_enums['Operator'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignOperatorValues::getInstance()->getValues();
        $ref_enums['SpecialAdCategory'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoryValues::getInstance()->getValues();
        $ref_enums['StatusOption'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignStatusOptionValues::getInstance()->getValues();
        return $ref_enums;
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
    public function createAdLabel(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adlabels' => 'list<Object>', 'execution_options' => 'list<execution_options_enum>');
        $enums = array('execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignExecutionOptionsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/adlabels', new \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getAdSets(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('date_preset' => 'date_preset_enum', 'effective_status' => 'list<effective_status_enum>', 'is_completed' => 'bool', 'time_range' => 'Object');
        $enums = array('date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetDatePresetValues::getInstance()->getValues(), 'effective_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdSetEffectiveStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adsets', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdSet::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getContentDeliveryReport(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('end_date' => 'datetime', 'page_id' => 'unsigned int', 'platform' => 'platform_enum', 'position' => 'position_enum', 'start_date' => 'datetime', 'summary' => 'bool');
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
        $enums = array('date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignDatePresetValues::getInstance()->getValues(), 'effective_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignEffectiveStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/copies', new \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCopy(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('deep_copy' => 'bool', 'end_time' => 'datetime', 'rename_options' => 'Object', 'start_time' => 'datetime', 'status_option' => 'status_option_enum');
        $enums = array('status_option_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignStatusOptionValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/copies', new \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adlabels' => 'list<Object>', 'adset_bid_amounts' => 'map', 'adset_budgets' => 'list<map>', 'bid_strategy' => 'bid_strategy_enum', 'budget_rebalance_flag' => 'bool', 'daily_budget' => 'unsigned int', 'execution_options' => 'list<execution_options_enum>', 'is_skadnetwork_attribution' => 'bool', 'iterative_split_test_configs' => 'list<Object>', 'lifetime_budget' => 'unsigned int', 'name' => 'string', 'objective' => 'objective_enum', 'pacing_type' => 'list<string>', 'promoted_object' => 'Object', 'smart_promotion_type' => 'smart_promotion_type_enum', 'special_ad_categories' => 'list<special_ad_categories_enum>', 'special_ad_category' => 'special_ad_category_enum', 'special_ad_category_country' => 'list<special_ad_category_country_enum>', 'spend_cap' => 'unsigned int', 'start_time' => 'datetime', 'status' => 'status_enum', 'stop_time' => 'datetime', 'upstream_events' => 'map');
        $enums = array('bid_strategy_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignBidStrategyValues::getInstance()->getValues(), 'execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignExecutionOptionsValues::getInstance()->getValues(), 'objective_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignObjectiveValues::getInstance()->getValues(), 'smart_promotion_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSmartPromotionTypeValues::getInstance()->getValues(), 'special_ad_categories_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoriesValues::getInstance()->getValues(), 'special_ad_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoryValues::getInstance()->getValues(), 'special_ad_category_country_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignSpecialAdCategoryCountryValues::getInstance()->getValues(), 'status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CampaignStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\Campaign::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
