<?php

/**
 * Copyright (c) 2014-present, Facebook, Inc. All rights reserved.
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
namespace PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide;

use PYS_PRO_GLOBAL\FacebookAds\Api;
use PYS_PRO_GLOBAL\GuzzleHttp\Client;
use PYS_PRO_GLOBAL\GuzzleHttp\HandlerStack;
use PYS_PRO_GLOBAL\GuzzleHttp\Handler\CurlHandler;
class AsyncClient extends \PYS_PRO_GLOBAL\FacebookAds\Object\ServerSide\Singleton
{
    protected $client = null;
    public function __construct()
    {
        $handler_stack = \PYS_PRO_GLOBAL\GuzzleHttp\HandlerStack::create(new \PYS_PRO_GLOBAL\GuzzleHttp\Handler\CurlHandler(['options' => [\CURLOPT_CONNECTTIMEOUT => 10, \CURLOPT_TIMEOUT => 60, \CURLOPT_RETURNTRANSFER => \true, \CURLOPT_HEADER => \true, \CURLOPT_CAINFO => \PYS_PRO_GLOBAL\FacebookAds\Api::instance()->getHttpClient()->getCaBundlePath()]]));
        $this->client = new \PYS_PRO_GLOBAL\GuzzleHttp\Client(['handler' => $handler_stack]);
    }
    public function getClient()
    {
        return $this->client;
    }
}
