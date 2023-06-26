<?php

namespace PYS_PRO_GLOBAL\GuzzleHttp;

use PYS_PRO_GLOBAL\Psr\Http\Message\MessageInterface;
interface BodySummarizerInterface
{
    /**
     * Returns a summarized message body.
     */
    public function summarize(\PYS_PRO_GLOBAL\Psr\Http\Message\MessageInterface $message) : ?string;
}
