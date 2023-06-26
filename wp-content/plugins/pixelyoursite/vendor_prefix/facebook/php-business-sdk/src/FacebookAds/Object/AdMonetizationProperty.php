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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdMonetizationPropertyFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultAggregationPeriodValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultMetricsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultOrderingColumnValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultOrderingTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdMonetizationProperty extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @return AdMonetizationPropertyFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdMonetizationPropertyFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        return $ref_enums;
    }
    public function getAdNetworkAnalytics(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('aggregation_period' => 'aggregation_period_enum', 'breakdowns' => 'list<breakdowns_enum>', 'filters' => 'list<map>', 'limit' => 'unsigned int', 'metrics' => 'list<metrics_enum>', 'ordering_column' => 'ordering_column_enum', 'ordering_type' => 'ordering_type_enum', 'since' => 'datetime', 'until' => 'datetime');
        $enums = array('aggregation_period_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultAggregationPeriodValues::getInstance()->getValues(), 'breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultBreakdownsValues::getInstance()->getValues(), 'metrics_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultMetricsValues::getInstance()->getValues(), 'ordering_column_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultOrderingColumnValues::getInstance()->getValues(), 'ordering_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultOrderingTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adnetworkanalytics', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdNetworkAnalyticsSyncQueryResult(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdNetworkAnalyticsSyncQueryResult::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAdNetworkAnalytic(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('aggregation_period' => 'aggregation_period_enum', 'breakdowns' => 'list<breakdowns_enum>', 'filters' => 'list<Object>', 'limit' => 'int', 'metrics' => 'list<metrics_enum>', 'ordering_column' => 'ordering_column_enum', 'ordering_type' => 'ordering_type_enum', 'since' => 'datetime', 'until' => 'datetime');
        $enums = array('aggregation_period_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultAggregationPeriodValues::getInstance()->getValues(), 'breakdowns_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultBreakdownsValues::getInstance()->getValues(), 'metrics_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultMetricsValues::getInstance()->getValues(), 'ordering_column_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultOrderingColumnValues::getInstance()->getValues(), 'ordering_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdNetworkAnalyticsSyncQueryResultOrderingTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/adnetworkanalytics', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdMonetizationProperty(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdMonetizationProperty::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAdNetworkAnalyticsResults(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('query_ids' => 'list<string>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adnetworkanalytics_results', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdNetworkAnalyticsAsyncQueryResult(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdNetworkAnalyticsAsyncQueryResult::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdMonetizationProperty(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdMonetizationProperty::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
