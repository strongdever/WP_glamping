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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdCreativeLinkDataImageLayerSpecFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecBlendingModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecFrameSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecImageSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecLayerTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecOverlayPositionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecOverlayShapeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecTextFontValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdCreativeLinkDataImageLayerSpec extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractObject
{
    /**
     * @return AdCreativeLinkDataImageLayerSpecFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdCreativeLinkDataImageLayerSpecFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['BlendingMode'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecBlendingModeValues::getInstance()->getValues();
        $ref_enums['FrameSource'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecFrameSourceValues::getInstance()->getValues();
        $ref_enums['ImageSource'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecImageSourceValues::getInstance()->getValues();
        $ref_enums['LayerType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecLayerTypeValues::getInstance()->getValues();
        $ref_enums['OverlayPosition'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecOverlayPositionValues::getInstance()->getValues();
        $ref_enums['OverlayShape'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecOverlayShapeValues::getInstance()->getValues();
        $ref_enums['TextFont'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdCreativeLinkDataImageLayerSpecTextFontValues::getInstance()->getValues();
        return $ref_enums;
    }
}
