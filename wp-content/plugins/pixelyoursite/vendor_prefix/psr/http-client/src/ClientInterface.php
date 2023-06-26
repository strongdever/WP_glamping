<?php

namespace PYS_PRO_GLOBAL\Psr\Http\Client;

use PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface;
interface ClientInterface
{
    /**
     * Sends a PSR-7 request and returns a PSR-7 response.
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     *
     * @throws \Psr\Http\Client\ClientExceptionInterface If an error happens while processing the request.
     */
    public function sendRequest(\PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface $request) : \PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface;
}
