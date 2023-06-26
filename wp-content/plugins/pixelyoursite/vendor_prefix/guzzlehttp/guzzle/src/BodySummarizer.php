<?php

namespace PYS_PRO_GLOBAL\GuzzleHttp;

use PYS_PRO_GLOBAL\Psr\Http\Message\MessageInterface;
final class BodySummarizer implements \PYS_PRO_GLOBAL\GuzzleHttp\BodySummarizerInterface
{
    /**
     * @var int|null
     */
    private $truncateAt;
    public function __construct(int $truncateAt = null)
    {
        $this->truncateAt = $truncateAt;
    }
    /**
     * Returns a summarized message body.
     */
    public function summarize(\PYS_PRO_GLOBAL\Psr\Http\Message\MessageInterface $message) : ?string
    {
        return $this->truncateAt === null ? \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Message::bodySummary($message) : \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Message::bodySummary($message, $this->truncateAt);
    }
}
