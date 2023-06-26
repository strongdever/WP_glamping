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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\VehicleFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleAvailabilityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleBodyStyleValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleConditionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleDrivetrainValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleFuelTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleImageFetchStatusValues;
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
class Vehicle extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'vehicles';
    }
    /**
     * @return VehicleFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\VehicleFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['ImageFetchStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleImageFetchStatusValues::getInstance()->getValues();
        $ref_enums['Availability'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleAvailabilityValues::getInstance()->getValues();
        $ref_enums['BodyStyle'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleBodyStyleValues::getInstance()->getValues();
        $ref_enums['Condition'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleConditionValues::getInstance()->getValues();
        $ref_enums['Drivetrain'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleDrivetrainValues::getInstance()->getValues();
        $ref_enums['FuelType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleFuelTypeValues::getInstance()->getValues();
        $ref_enums['StateOfVehicle'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleStateOfVehicleValues::getInstance()->getValues();
        $ref_enums['Transmission'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleTransmissionValues::getInstance()->getValues();
        $ref_enums['VehicleType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleVehicleTypeValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getAugmentedRealitiesMetadata(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/augmented_realities_metadata', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getChannelsToIntegrityStatus(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/channels_to_integrity_status', new \PYS_PRO_GLOBAL\FacebookAds\Object\CatalogItemChannelsToIntegrityStatus(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CatalogItemChannelsToIntegrityStatus::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getVideosMetadata(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/videos_metadata', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('address' => 'map', 'applinks' => 'Object', 'availability' => 'availability_enum', 'body_style' => 'body_style_enum', 'condition' => 'condition_enum', 'currency' => 'string', 'date_first_on_lot' => 'string', 'dealer_id' => 'string', 'dealer_name' => 'string', 'dealer_phone' => 'string', 'description' => 'string', 'drivetrain' => 'drivetrain_enum', 'exterior_color' => 'string', 'fb_page_id' => 'string', 'fuel_type' => 'fuel_type_enum', 'images' => 'list<Object>', 'interior_color' => 'string', 'make' => 'string', 'mileage' => 'map', 'model' => 'string', 'price' => 'unsigned int', 'state_of_vehicle' => 'state_of_vehicle_enum', 'title' => 'string', 'transmission' => 'transmission_enum', 'trim' => 'string', 'url' => 'string', 'vehicle_type' => 'vehicle_type_enum', 'vin' => 'string', 'year' => 'unsigned int');
        $enums = array('availability_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleAvailabilityValues::getInstance()->getValues(), 'body_style_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleBodyStyleValues::getInstance()->getValues(), 'condition_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleConditionValues::getInstance()->getValues(), 'drivetrain_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleDrivetrainValues::getInstance()->getValues(), 'fuel_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleFuelTypeValues::getInstance()->getValues(), 'state_of_vehicle_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleStateOfVehicleValues::getInstance()->getValues(), 'transmission_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleTransmissionValues::getInstance()->getValues(), 'vehicle_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\VehicleVehicleTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\Vehicle::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
