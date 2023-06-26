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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdImageStatusValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdImage extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'adimages';
    }
    /**
     * @return AdImageFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['Status'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdImageStatusValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdImage(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdImage::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    /**
     * Uploads images from a zip file and returns a cursor of results
     *
     * @param string $file_path
     * @param string $account_id
     * @param array $params
     * @param Api $api
     * @return array
     */
    public static function createFromZip($file_path, $account_id, array $params = array(), \PYS_PRO_GLOBAL\FacebookAds\Object\Api $api = null)
    {
        $image = new \PYS_PRO_GLOBAL\FacebookAds\Object\AdImage(null, $account_id, $api);
        $image->{\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME} = $file_path;
        return $image->arrayFromZip($params);
    }
    /**
     * @return string
     */
    protected function getNodePath()
    {
        return '/' . $this->assureParentId() . '/' . $this->getEndpoint();
    }
    /**
     * Create function for the object.
     *
     * @param array $params Additional parameters to include in the request
     * @return $this
     * @throws \Exception
     * @throws \RuntimeException
     */
    public function create(array $params = array())
    {
        if ($this->data[static::FIELD_ID]) {
            throw new \Exception("Object has already an ID");
        }
        if ($this->isZipFile($this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME])) {
            throw new \RuntimeException("use AdImage::createFromZip to create zip files");
        }
        $data = $this->exportData();
        $filename = $data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME];
        unset($data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME]);
        $params = \array_merge($data, $params);
        $request = $this->getApi()->prepareRequest('/' . $this->assureParentId() . '/' . $this->getEndpoint(), \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, $params);
        $request->getFileParams()->offsetSet(\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME, $filename);
        $response = $this->getApi()->executeRequest($request);
        $this->clearHistory();
        $content = $response->getContent();
        $data = $content['images'][\basename($this->{\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME})];
        $this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH] = $data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH];
        $this->data[static::FIELD_ID] = \substr($this->getParentId(), 4) . ':' . $this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH];
        return $this;
    }
    /**
     * Uploads images from a zip file and returns a cursor of results
     *
     * @param array $params
     * @return array
     * @throws \RuntimeException
     */
    protected function arrayFromZip($params = array())
    {
        if (!$this->isZipFile($this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME])) {
            throw new \RuntimeException($this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME] . " doesn't resolve to a zip file");
        }
        $data = $this->exportData();
        $filename = $data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME];
        unset($data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME]);
        $params = \array_merge($data, $params);
        $request = $this->getApi()->prepareRequest('/' . $this->assureParentId() . '/' . $this->getEndpoint(), \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, $params);
        $request->getFileParams()->offsetSet(\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::FILENAME, $filename);
        $response = $this->getApi()->executeRequest($request);
        $result = array();
        $content = $response->getContent();
        foreach ($content['images'] as $image) {
            $adimage = new \PYS_PRO_GLOBAL\FacebookAds\Object\AdImage(\substr($this->getParentId(), 4) . ':' . $image[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH], $this->getParentId(), $this->getApi());
            $adimage->{\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH} = $image[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH];
            $result[] = $adimage;
        }
        return $result;
    }
    /**
     * Checks if a given path is a zip file
     *
     * @param string $file_path
     * @return bool
     */
    protected function isZipFile($file_path)
    {
        $finfo = \finfo_open(\FILEINFO_MIME_TYPE);
        $file_mime_type = \finfo_file($finfo, $file_path);
        return $file_mime_type == 'application/zip' || $file_mime_type == 'multipart/x-zip';
    }
    /**
     * Read object data from the graph
     *
     * @param string[] $fields Fields to request
     * @param array $params Additional request parameters
     * @return $this
     */
    public function read(array $fields = array(), array $params = array())
    {
        $fields = \implode(',', $fields ?: static::getDefaultReadFields());
        if ($fields) {
            $params['fields'] = $fields;
        }
        $params['hashes'] = array(\explode(':', $this->assureId())[1]);
        $response = $this->getApi()->call($this->getNodePath(), \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, $params);
        $content = $response->getContent();
        $data = $content['data'];
        if ($data) {
            $this->setDataWithoutValidation((array) $data[0]);
        }
        $this->clearHistory();
        return $this;
    }
    /**
     * Delete this object from the graph
     *
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public function deleteSelf(array $params = array())
    {
        if (!$this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH]) {
            throw new \Exception("AdImage hash is required to delete");
        }
        $params = \array_merge($params, array('hash' => $this->data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdImageFields::HASH]));
        $this->getApi()->call($this->getNodePath(), \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_DELETE, $params);
    }
}
