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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdBidTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdConfiguredStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdEffectiveStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdExecutionOptionsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdOperatorValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdPreviewAdFormatValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdPreviewRenderTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStatusOptionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Traits\AdLabelAwareCrudObjectTrait;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class Ad extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractArchivableCrudObject implements \PYS_PRO_GLOBAL\FacebookAds\Object\CanRedownloadInterface
{
    use AdLabelAwareCrudObjectTrait;
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'ads';
    }
    /**
     * @return AdFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['BidType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdBidTypeValues::getInstance()->getValues();
        $ref_enums['ConfiguredStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdConfiguredStatusValues::getInstance()->getValues();
        $ref_enums['EffectiveStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdEffectiveStatusValues::getInstance()->getValues();
        $ref_enums['Status'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStatusValues::getInstance()->getValues();
        $ref_enums['DatePreset'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdDatePresetValues::getInstance()->getValues();
        $ref_enums['ExecutionOptions'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdExecutionOptionsValues::getInstance()->getValues();
        $ref_enums['Operator'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdOperatorValues::getInstance()->getValues();
        $ref_enums['StatusOption'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStatusOptionValues::getInstance()->getValues();
        return $ref_enums;
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
    public function createAdLabel(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adlabels' => 'list<Object>', 'execution_options' => 'list<execution_options_enum>');
        $enums = array('execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdExecutionOptionsValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/adlabels', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getCopies(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('date_preset' => 'date_preset_enum', 'effective_status' => 'list<string>', 'time_range' => 'Object', 'updated_since' => 'int');
        $enums = array('date_preset_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdDatePresetValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/copies', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCopy(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adset_id' => 'string', 'rename_options' => 'Object', 'status_option' => 'status_option_enum');
        $enums = array('status_option_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStatusOptionValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/copies', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getLeads(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/leads', new \PYS_PRO_GLOBAL\FacebookAds\Object\Lead(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Lead::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPreviews(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('ad_format' => 'ad_format_enum', 'dynamic_asset_label' => 'string', 'dynamic_creative_spec' => 'Object', 'dynamic_customization' => 'Object', 'end_date' => 'datetime', 'height' => 'unsigned int', 'locale' => 'string', 'place_page_id' => 'int', 'post' => 'Object', 'product_item_ids' => 'list<string>', 'render_type' => 'render_type_enum', 'start_date' => 'datetime', 'width' => 'unsigned int');
        $enums = array('ad_format_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdPreviewAdFormatValues::getInstance()->getValues(), 'render_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdPreviewRenderTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/previews', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdPreview(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdPreview::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array('am_call_tags' => 'map', 'date_preset' => 'date_preset_enum', 'from_adtable' => 'bool', 'review_feedback_breakdown' => 'bool', 'time_range' => 'Object');
        $enums = array('date_preset_enum' => array('data_maximum', 'last_14d', 'last_28d', 'last_30d', 'last_3d', 'last_7d', 'last_90d', 'last_month', 'last_quarter', 'last_week_mon_sun', 'last_week_sun_sat', 'last_year', 'maximum', 'this_month', 'this_quarter', 'this_week_mon_today', 'this_week_sun_today', 'this_year', 'today', 'yesterday'));
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adlabels' => 'list<Object>', 'adset_spec' => 'AdSet', 'audience_id' => 'string', 'bid_amount' => 'int', 'conversion_domain' => 'string', 'creative' => 'AdCreative', 'display_sequence' => 'unsigned int', 'draft_adgroup_id' => 'string', 'engagement_audience' => 'bool', 'execution_options' => 'list<execution_options_enum>', 'include_demolink_hashes' => 'bool', 'name' => 'string', 'priority' => 'unsigned int', 'status' => 'status_enum', 'tracking_specs' => 'Object');
        $enums = array('execution_options_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdExecutionOptionsValues::getInstance()->getValues(), 'status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdStatusValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
