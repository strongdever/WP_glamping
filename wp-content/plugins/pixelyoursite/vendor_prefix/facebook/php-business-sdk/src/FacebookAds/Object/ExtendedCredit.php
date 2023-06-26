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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ExtendedCreditFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ExtendedCreditAllocationConfigLiabilityTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ExtendedCreditAllocationConfigPartitionTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ExtendedCreditAllocationConfigSendBillToValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class ExtendedCredit extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @return ExtendedCreditFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\ExtendedCreditFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        return $ref_enums;
    }
    public function getExtendedCreditInvoiceGroups(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/extended_credit_invoice_groups', new \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditInvoiceGroup(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditInvoiceGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createExtendedCreditInvoiceGroup(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('emails' => 'list<string>', 'name' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/extended_credit_invoice_groups', new \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditInvoiceGroup(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditInvoiceGroup::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getOwningCreditAllocationConfigs(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('receiving_business_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/owning_credit_allocation_configs', new \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditAllocationConfig(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditAllocationConfig::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createOwningCreditAllocationConfig(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('amount' => 'Object', 'liability_type' => 'liability_type_enum', 'partition_type' => 'partition_type_enum', 'receiving_business_id' => 'string', 'send_bill_to' => 'send_bill_to_enum');
        $enums = array('liability_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ExtendedCreditAllocationConfigLiabilityTypeValues::getInstance()->getValues(), 'partition_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ExtendedCreditAllocationConfigPartitionTypeValues::getInstance()->getValues(), 'send_bill_to_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ExtendedCreditAllocationConfigSendBillToValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/owning_credit_allocation_configs', new \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditAllocationConfig(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCreditAllocationConfig::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createWhatsappCreditSharingAndAttach(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('waba_currency' => 'string', 'waba_id' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/whatsapp_credit_sharing_and_attach', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCredit(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\ExtendedCredit::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
