<?php

namespace PYS_PRO_GLOBAL\GuzzleHttp\Exception;

use PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface;
/**
 * Exception when an HTTP error occurs (4xx or 5xx error)
 */
class BadResponseException extends \PYS_PRO_GLOBAL\GuzzleHttp\Exception\RequestException
{
    public function __construct(string $message, \PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface $request, \PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface $response, \Throwable $previous = null, array $handlerContext = [])
    {
        parent::__construct($message, $request, $response, $previous, $handlerContext);
    }
    /**
     * Current exception and the ones that extend it will always have a response.
     */
    public function hasResponse() : bool
    {
        return \true;
    }
    /**
     * This function narrows the return type from the parent class and does not allow it to be nullable.
     */
    public function getResponse() : \PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface
    {
        /** @var ResponseInterface */
        return parent::getResponse();
    }
}
