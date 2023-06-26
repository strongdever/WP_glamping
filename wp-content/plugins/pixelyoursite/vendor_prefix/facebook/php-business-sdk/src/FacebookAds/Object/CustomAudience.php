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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\CustomAudienceFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceActionSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceClaimObjectiveValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceContentTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceCustomerFileSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceSubtypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes;
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\CustomAudienceMultikeySchemaFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\EmailNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\PhoneNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\MadidNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\GenderNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\BirthYearNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\DateNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\FirstNameNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\LastNameNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\FirstNameInitialNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\StateNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\CityNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\ZipNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\CountryNormalizer;
use PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\HashNormalizer;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class CustomAudience extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'customaudiences';
    }
    /**
     * @return CustomAudienceFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\CustomAudienceFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['ClaimObjective'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceClaimObjectiveValues::getInstance()->getValues();
        $ref_enums['ContentType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceContentTypeValues::getInstance()->getValues();
        $ref_enums['CustomerFileSource'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceCustomerFileSourceValues::getInstance()->getValues();
        $ref_enums['Subtype'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceSubtypeValues::getInstance()->getValues();
        $ref_enums['ActionSource'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceActionSourceValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function deleteAdAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adaccounts' => 'list<string>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/adaccounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAdAccounts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('permissions' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/adaccounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdAccount::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createAdAccount(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('adaccounts' => 'list<string>', 'permissions' => 'string', 'relationship_type' => 'list<string>', 'replace' => 'bool');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/adaccounts', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getAds(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('effective_status' => 'list<string>', 'status' => 'list<string>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/ads', new \PYS_PRO_GLOBAL\FacebookAds\Object\Ad(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Ad::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSessions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('session_id' => 'unsigned int');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/sessions', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceSession(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceSession::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSharedAccountInfo(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/shared_account_info', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudiencesharedAccountInfo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudiencesharedAccountInfo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function deleteUsers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('namespace' => 'string', 'payload' => 'Object', 'session' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, '/users', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createUser(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('namespace' => 'string', 'payload' => 'Object', 'session' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/users', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createUsersReplace(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('namespace' => 'string', 'payload' => 'Object', 'session' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/usersreplace', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array('ad_account_id' => 'string', 'target_countries' => 'list<string>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('allowed_domains' => 'list<string>', 'claim_objective' => 'claim_objective_enum', 'content_type' => 'content_type_enum', 'countries' => 'string', 'customer_file_source' => 'customer_file_source_enum', 'description' => 'string', 'enable_fetch_or_create' => 'bool', 'event_source_group' => 'string', 'event_sources' => 'list<map>', 'exclusions' => 'list<Object>', 'inclusions' => 'list<Object>', 'lookalike_spec' => 'string', 'name' => 'string', 'opt_out_link' => 'string', 'parent_audience_id' => 'unsigned int', 'product_set_id' => 'string', 'retention_days' => 'unsigned int', 'rev_share_policy_id' => 'unsigned int', 'rule' => 'string', 'rule_aggregation' => 'string', 'tags' => 'list<string>');
        $enums = array('claim_objective_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceClaimObjectiveValues::getInstance()->getValues(), 'content_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceContentTypeValues::getInstance()->getValues(), 'customer_file_source_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceCustomerFileSourceValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudience::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function addUsers(array $users, $type, array $app_ids = array(), $is_hashed = \false, $pending = \false)
    {
        $params = $this->formatParams($users, $type, $app_ids, $is_hashed);
        return $this->createUser(array(), $params, $pending);
    }
    public function removeUsers(array $users, $type, array $app_ids = array(), $is_hashed = \false, $pending = \false)
    {
        $params = $this->formatParams($users, $type, $app_ids, $is_hashed);
        return $this->deleteUsers(array(), $params, $pending);
    }
    /**
     * Take users and format them correctly for the request
     *
     * @param array $users
     * @param string $type
     * @param array $app_ids
     * @param bool $is_hashed
     * @return array
     */
    protected function formatParams(array $users, $type, array $app_ids = array(), $is_hashed = \false)
    {
        if ($type == \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::EMAIL || $type == \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::PHONE) {
            $normalizer = new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\EmailNormalizer();
            $hash_normalizer = new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\HashNormalizer();
            foreach ($users as &$user) {
                if ($type == \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::EMAIL) {
                    $user = $normalizer->normalize(\PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::EMAIL, $user);
                }
                if (!$is_hashed) {
                    $user = $hash_normalizer->normalize(\PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::EMAIL, $user);
                }
            }
        }
        $payload = array('schema' => $type, 'data' => $users);
        if ($type === \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::ID) {
            if (empty($app_ids)) {
                throw new \InvalidArgumentException("Custom audiences with type " . \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CustomAudienceTypes::ID . " require" . "at least one app_id");
            }
            $payload['app_ids'] = $app_ids;
        }
        return array('payload' => $payload);
    }
    /**
     * @var \ArrayObject
     */
    protected $normalizers;
    /**
     * @return \ArrayObject
     */
    public function getNormalizers()
    {
        if ($this->normalizers === null) {
            $this->normalizers = new \ArrayObject(array(new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\EmailNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\PhoneNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\MadidNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\GenderNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\BirthYearNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\DateNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\FirstNameNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\LastNameNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\FirstNameInitialNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\StateNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\CityNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\ZipNormalizer(), new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\CountryNormalizer()));
        }
        return $this->normalizers;
    }
    /**
     * Add users to the CustomAudiences with multiple keys. There is no max on the
     * total number of users that can be added to an audience, but up to 10000
     * users can be added at a given time.
     *
     * @param array $users
     * @param array $types
     * @param bool $is_hashed
     * @param bool $is_normalized
     * @return array
     */
    public function addUsersMultiKey(array $users, array $types, $is_hashed = \false, $is_normalized = \false)
    {
        $params = $this->formatParamsMultiKey($users, $types, $is_hashed, $is_normalized);
        return $this->getApi()->call('/' . $this->assureId() . '/users', \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, $params)->getContent();
    }
    /**
     * Delete users from AdCustomAudiences with multiple keys
     *
     * @param array $users
     * @param array $types
     * @param bool $is_hashed
     * @param bool $is_normalized
     * @return array
     */
    public function removeUsersMultiKey(array $users, array $types, $is_hashed = \false, $is_normalized = \false)
    {
        $params = $this->formatParamsMultiKey($users, $types, $is_hashed, $is_normalized);
        return $this->getApi()->call('/' . $this->assureId() . '/users', \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, $params)->getContent();
    }
    /**
     * Take users and format them correctly for the request
     *
     * @param array $users
     * @param array $types
     * @param bool $is_hashed
     * @param bool $is_normalized
     * @return array
     */
    protected function formatParamsMultiKey(array $users, array $types, $is_hashed = \false, $is_normalized = \false)
    {
        if (!$is_hashed) {
            if ($is_normalized) {
                $normalizers = new \ArrayObject(array(new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\HashNormalizer()));
            } else {
                $normalizers = clone $this->getNormalizers();
                $normalizers->append(new \PYS_PRO_GLOBAL\FacebookAds\Object\CustomAudienceNormalizers\HashNormalizer());
            }
            foreach ($users as &$user) {
                if (\count($types) != \count($user)) {
                    throw new \InvalidArgumentException("Number of keys in each list in the data should " . "match the number of keys specified in scheme");
                    break;
                }
                foreach ($user as $index => &$key_value) {
                    $key = $types[$index];
                    foreach ($normalizers as $normalizer) {
                        if ($key_value && $key !== \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\CustomAudienceMultikeySchemaFields::EXTERN_ID && $normalizer->shouldNormalize($key, $key_value)) {
                            $key_value = $normalizer->normalize($key, $key_value);
                        }
                    }
                }
            }
        }
        $payload = array('schema' => $types, 'data' => $users);
        return array('payload' => $payload);
    }
}
