<?php

namespace PYS_PRO_GLOBAL\GuzzleHttp\Handler;

use PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface;
interface CurlFactoryInterface
{
    /**
     * Creates a cURL handle resource.
     *
     * @param RequestInterface $request Request
     * @param array            $options Transfer options
     *
     * @throws \RuntimeException when an option cannot be applied
     */
    public function create(\PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface $request, array $options) : \PYS_PRO_GLOBAL\GuzzleHttp\Handler\EasyHandle;
    /**
     * Release an easy handle, allowing it to be reused or closed.
     *
     * This function must call unset on the easy handle's "handle" property.
     */
    public function release(\PYS_PRO_GLOBAL\GuzzleHttp\Handler\EasyHandle $easy) : void;
}
