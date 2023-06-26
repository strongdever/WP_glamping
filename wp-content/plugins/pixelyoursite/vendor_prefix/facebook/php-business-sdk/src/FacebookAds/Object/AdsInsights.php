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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdsInsightsFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdsInsights extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'insights';
    }
    /**
     * @return AdsInsightsFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdsInsightsFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['ActionAttributionWindows'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionAttributionWindowsValues::getInstance()->getValues();
        $ref_enums['ActionBreakdowns'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionBreakdownsValues::getInstance()->getValues();
        $ref_enums['ActionReportTime'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsActionReportTimeValues::getInstance()->getValues();
        $ref_enums['Breakdowns'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsBreakdownsValues::getInstance()->getValues();
        $ref_enums['DatePreset'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsDatePresetValues::getInstance()->getValues();
        $ref_enums['Level'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsLevelValues::getInstance()->getValues();
        $ref_enums['SummaryActionBreakdowns'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdsInsightsSummaryActionBreakdownsValues::getInstance()->getValues();
        return $ref_enums;
    }
}
