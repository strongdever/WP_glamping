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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdVideoFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoBackdatedTimeGranularityValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContainerTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContentCategoryValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoFormattingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoOriginalProjectionTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoSwapModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUnpublishedContentTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUploadPhaseValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentCommentPrivacyValueValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentFilterValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentLiveFilterValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentOrderValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\InsightsResultPeriodValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Traits\CannotDelete;
use PYS_PRO_GLOBAL\FacebookAds\Object\Traits\CannotUpdate;
use PYS_PRO_GLOBAL\FacebookAds\Object\Traits\FieldValidation;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class AdVideo extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @deprecated getEndpoint function is deprecated
     */
    protected function getEndpoint()
    {
        return 'advideos';
    }
    /**
     * @return AdVideoFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdVideoFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['ContainerType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContainerTypeValues::getInstance()->getValues();
        $ref_enums['ContentCategory'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContentCategoryValues::getInstance()->getValues();
        $ref_enums['Formatting'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoFormattingValues::getInstance()->getValues();
        $ref_enums['OriginalProjectionType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoOriginalProjectionTypeValues::getInstance()->getValues();
        $ref_enums['SwapMode'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoSwapModeValues::getInstance()->getValues();
        $ref_enums['UnpublishedContentType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUnpublishedContentTypeValues::getInstance()->getValues();
        $ref_enums['UploadPhase'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoUploadPhaseValues::getInstance()->getValues();
        $ref_enums['Type'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoTypeValues::getInstance()->getValues();
        $ref_enums['BackdatedTimeGranularity'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoBackdatedTimeGranularityValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getCaptions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/captions', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createCaption(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('captions_file' => 'file', 'default_locale' => 'string', 'locales_to_delete' => 'list<string>');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/captions', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getComments(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('filter' => 'filter_enum', 'live_filter' => 'live_filter_enum', 'order' => 'order_enum', 'since' => 'datetime');
        $enums = array('filter_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentFilterValues::getInstance()->getValues(), 'live_filter_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentLiveFilterValues::getInstance()->getValues(), 'order_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentOrderValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/comments', new \PYS_PRO_GLOBAL\FacebookAds\Object\Comment(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Comment::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createComment(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('attachment_id' => 'string', 'attachment_share_url' => 'string', 'attachment_url' => 'string', 'comment_privacy_value' => 'comment_privacy_value_enum', 'facepile_mentioned_ids' => 'list<string>', 'feedback_source' => 'string', 'is_offline' => 'bool', 'message' => 'string', 'nectar_module' => 'string', 'object_id' => 'string', 'parent_comment_id' => 'Object', 'text' => 'string', 'tracking' => 'string');
        $enums = array('comment_privacy_value_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentCommentPrivacyValueValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/comments', new \PYS_PRO_GLOBAL\FacebookAds\Object\Comment(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Comment::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getCrosspostSharedPages(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/crosspost_shared_pages', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createGamingClipCreate(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('duration_seconds' => 'float');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/gaming_clip_create', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getLikes(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/likes', new \PYS_PRO_GLOBAL\FacebookAds\Object\Profile(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Profile::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createLike(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('feedback_source' => 'string', 'nectar_module' => 'string', 'notify' => 'bool', 'tracking' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/likes', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPollSettings(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/poll_settings', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getPolls(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/polls', new \PYS_PRO_GLOBAL\FacebookAds\Object\VideoPoll(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\VideoPoll::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createPoll(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('close_after_voting' => 'bool', 'correct_option' => 'unsigned int', 'default_open' => 'bool', 'options' => 'list<string>', 'question' => 'string', 'show_gradient' => 'bool', 'show_results' => 'bool');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/polls', new \PYS_PRO_GLOBAL\FacebookAds\Object\VideoPoll(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\VideoPoll::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getSponsorTags(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/sponsor_tags', new \PYS_PRO_GLOBAL\FacebookAds\Object\Page(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Page::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getTags(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/tags', new \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject(), 'EDGE', array(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createTag(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('tag_uid' => 'int', 'uid' => 'int', 'vid' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/tags', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getThumbnails(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/thumbnails', new \PYS_PRO_GLOBAL\FacebookAds\Object\VideoThumbnail(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\VideoThumbnail::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createThumbnail(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('is_preferred' => 'bool', 'source' => 'file');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/thumbnails', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getVideoInsights(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('metric' => 'list<Object>', 'period' => 'period_enum', 'since' => 'datetime', 'until' => 'datetime');
        $enums = array('period_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\InsightsResultPeriodValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/video_insights', new \PYS_PRO_GLOBAL\FacebookAds\Object\InsightsResult(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\InsightsResult::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('ad_breaks' => 'list', 'allow_bm_crossposting' => 'bool', 'allow_crossposting_for_pages' => 'list<Object>', 'backdated_time' => 'datetime', 'backdated_time_granularity' => 'backdated_time_granularity_enum', 'call_to_action' => 'Object', 'content_category' => 'content_category_enum', 'content_tags' => 'list<string>', 'custom_labels' => 'list<string>', 'description' => 'string', 'direct_share_status' => 'unsigned int', 'embeddable' => 'bool', 'expiration' => 'Object', 'expire_now' => 'bool', 'increment_play_count' => 'bool', 'name' => 'string', 'preferred_thumbnail_id' => 'string', 'privacy' => 'string', 'publish_to_news_feed' => 'bool', 'publish_to_videos_tab' => 'bool', 'published' => 'bool', 'scheduled_publish_time' => 'unsigned int', 'social_actions' => 'bool', 'sponsor_id' => 'string', 'sponsor_relationship' => 'unsigned int', 'tags' => 'list<string>', 'target' => 'string', 'universal_video_id' => 'string');
        $enums = array('backdated_time_granularity_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoBackdatedTimeGranularityValues::getInstance()->getValues(), 'content_category_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\AdVideoContentCategoryValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\AdVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    use FieldValidation;
    public function create(array $params = array())
    {
        $data = $this->exportData();
        $source = null;
        if (\array_key_exists(\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdVideoFields::SOURCE, $data)) {
            $source = $data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdVideoFields::SOURCE];
            unset($data[\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdVideoFields::SOURCE]);
        }
        $params = \array_merge($data, $params);
        $request = $this->getApi()->prepareRequest('/' . $this->assureParentId() . '/' . $this->getEndpoint(), \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, $params);
        $request->setLastLevelDomain('graph-video');
        if ($source) {
            $request->getFileParams()->offsetSet(\PYS_PRO_GLOBAL\FacebookAds\Object\Fields\AdVideoFields::SOURCE, $source);
        }
        $response = $this->getApi()->executeRequest($request);
        $data = $response->getContent();
        $this->data[static::FIELD_ID] = \is_string($data) ? $data : (string) $data[static::FIELD_ID];
        return $this;
    }
    /**
     * @param array $fields
     * @param array $params
     * @return Cursor
     */
    public function getVideoThumbnails(array $fields = array(), array $params = array())
    {
        return $this->getManyByConnection(\PYS_PRO_GLOBAL\FacebookAds\Object\VideoThumbnail::className(), $fields, $params, 'thumbnails');
    }
}
