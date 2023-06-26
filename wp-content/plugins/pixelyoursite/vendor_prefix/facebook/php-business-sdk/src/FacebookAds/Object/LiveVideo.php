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
use PYS_PRO_GLOBAL\FacebookAds\Object\Fields\LiveVideoFields;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentFilterValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentLiveFilterValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\CommentOrderValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoBroadcastStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoLiveCommentModerationSettingValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoPersistentStreamKeyStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoProjectionValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSourceValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSpatialAudioFormatValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStatusValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStereoscopicModeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStreamTypeValues;
use PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProfileTypeValues;
/**
 * This class is auto-generated.
 *
 * For any issues or feature requests related to this class, please let us know
 * on github and we'll fix in our codegen framework. We'll not be able to accept
 * pull request for this class.
 *
 */
class LiveVideo extends \PYS_PRO_GLOBAL\FacebookAds\Object\AbstractCrudObject
{
    /**
     * @return LiveVideoFields
     */
    public static function getFieldsEnum()
    {
        return \PYS_PRO_GLOBAL\FacebookAds\Object\Fields\LiveVideoFields::getInstance();
    }
    protected static function getReferencedEnums()
    {
        $ref_enums = array();
        $ref_enums['Projection'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoProjectionValues::getInstance()->getValues();
        $ref_enums['SpatialAudioFormat'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSpatialAudioFormatValues::getInstance()->getValues();
        $ref_enums['Status'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStatusValues::getInstance()->getValues();
        $ref_enums['StereoscopicMode'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStereoscopicModeValues::getInstance()->getValues();
        $ref_enums['StreamType'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStreamTypeValues::getInstance()->getValues();
        $ref_enums['BroadcastStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoBroadcastStatusValues::getInstance()->getValues();
        $ref_enums['Source'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoSourceValues::getInstance()->getValues();
        $ref_enums['LiveCommentModerationSetting'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoLiveCommentModerationSettingValues::getInstance()->getValues();
        $ref_enums['PersistentStreamKeyStatus'] = \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoPersistentStreamKeyStatusValues::getInstance()->getValues();
        return $ref_enums;
    }
    public function getBlockedUsers(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('uid' => 'Object');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/blocked_users', new \PYS_PRO_GLOBAL\FacebookAds\Object\User(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\User::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getCrosspostedBroadcasts(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/crossposted_broadcasts', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function getErrors(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/errors', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideoError(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideoError::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function createInputStream(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array();
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/input_streams', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideoInputStream(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideoInputStream::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
    public function getReactions(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('type' => 'type_enum');
        $enums = array('type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\ProfileTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/reactions', new \PYS_PRO_GLOBAL\FacebookAds\Object\Profile(), 'EDGE', \PYS_PRO_GLOBAL\FacebookAds\Object\Profile::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
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
        $param_types = array('target_token' => 'string');
        $enums = array();
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_GET, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
    public function updateSelf(array $fields = array(), array $params = array(), $pending = \false)
    {
        $this->assureId();
        $param_types = array('allow_bm_crossposting' => 'bool', 'content_tags' => 'list<string>', 'cross_share_to_group_ids' => 'list<string>', 'crossposting_actions' => 'list<map>', 'custom_labels' => 'list<string>', 'description' => 'string', 'direct_share_status' => 'unsigned int', 'embeddable' => 'bool', 'end_live_video' => 'bool', 'event_params' => 'Object', 'is_audio_only' => 'bool', 'is_manual_mode' => 'bool', 'live_comment_moderation_setting' => 'list<live_comment_moderation_setting_enum>', 'master_ingest_stream_id' => 'string', 'og_icon_id' => 'string', 'og_phrase' => 'string', 'persistent_stream_key_status' => 'persistent_stream_key_status_enum', 'place' => 'Object', 'planned_start_time' => 'datetime', 'privacy' => 'string', 'published' => 'bool', 'schedule_custom_profile_image' => 'file', 'schedule_feed_background_image' => 'file', 'sponsor_id' => 'string', 'sponsor_relationship' => 'unsigned int', 'status' => 'status_enum', 'stream_type' => 'stream_type_enum', 'tags' => 'list<int>', 'targeting' => 'Object', 'title' => 'string');
        $enums = array('live_comment_moderation_setting_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoLiveCommentModerationSettingValues::getInstance()->getValues(), 'persistent_stream_key_status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoPersistentStreamKeyStatusValues::getInstance()->getValues(), 'status_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStatusValues::getInstance()->getValues(), 'stream_type_enum' => \PYS_PRO_GLOBAL\FacebookAds\Object\Values\LiveVideoStreamTypeValues::getInstance()->getValues());
        $request = new \PYS_PRO_GLOBAL\FacebookAds\ApiRequest($this->api, $this->data['id'], \PYS_PRO_GLOBAL\FacebookAds\Http\RequestInterface::METHOD_POST, '/', new \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo(), 'NODE', \PYS_PRO_GLOBAL\FacebookAds\Object\LiveVideo::getFieldsEnum()->getValues(), new \PYS_PRO_GLOBAL\FacebookAds\TypeChecker($param_types, $enums));
        $request->addParams($params);
        $request->addFields($fields);
        return $pending ? $request : $request->execute();
    }
}
