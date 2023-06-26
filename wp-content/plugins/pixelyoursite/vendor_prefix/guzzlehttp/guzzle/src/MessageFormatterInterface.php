<?php

namespace PYS_PRO_GLOBAL\GuzzleHttp;

use PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface;
interface MessageFormatterInterface
{
    /**
     * Returns a formatted message string.
     *
     * @param RequestInterface       $request  Request that was sent
     * @param ResponseInterface|null $response Response that was received
     * @param \Throwable|null        $error    Exception that was received
     */
    public function format(\PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface $request, ?\PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface $response = null, ?\Throwable $error = null) : string;
}
