<?php

declare (strict_types=1);
namespace PYS_PRO_GLOBAL\GuzzleHttp\Psr7;

use PYS_PRO_GLOBAL\Psr\Http\Message\RequestFactoryInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ResponseFactoryInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ServerRequestFactoryInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\ServerRequestInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\StreamFactoryInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\UploadedFileFactoryInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\UploadedFileInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\UriFactoryInterface;
use PYS_PRO_GLOBAL\Psr\Http\Message\UriInterface;
/**
 * Implements all of the PSR-17 interfaces.
 *
 * Note: in consuming code it is recommended to require the implemented interfaces
 * and inject the instance of this class multiple times.
 */
final class HttpFactory implements \PYS_PRO_GLOBAL\Psr\Http\Message\RequestFactoryInterface, \PYS_PRO_GLOBAL\Psr\Http\Message\ResponseFactoryInterface, \PYS_PRO_GLOBAL\Psr\Http\Message\ServerRequestFactoryInterface, \PYS_PRO_GLOBAL\Psr\Http\Message\StreamFactoryInterface, \PYS_PRO_GLOBAL\Psr\Http\Message\UploadedFileFactoryInterface, \PYS_PRO_GLOBAL\Psr\Http\Message\UriFactoryInterface
{
    public function createUploadedFile(\PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface $stream, int $size = null, int $error = \UPLOAD_ERR_OK, string $clientFilename = null, string $clientMediaType = null) : \PYS_PRO_GLOBAL\Psr\Http\Message\UploadedFileInterface
    {
        if ($size === null) {
            $size = $stream->getSize();
        }
        return new \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\UploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }
    public function createStream(string $content = '') : \PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface
    {
        return \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Utils::streamFor($content);
    }
    public function createStreamFromFile(string $file, string $mode = 'r') : \PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface
    {
        try {
            $resource = \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Utils::tryFopen($file, $mode);
        } catch (\RuntimeException $e) {
            if ('' === $mode || \false === \in_array($mode[0], ['r', 'w', 'a', 'x', 'c'], \true)) {
                throw new \InvalidArgumentException(\sprintf('Invalid file opening mode "%s"', $mode), 0, $e);
            }
            throw $e;
        }
        return \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Utils::streamFor($resource);
    }
    public function createStreamFromResource($resource) : \PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface
    {
        return \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Utils::streamFor($resource);
    }
    public function createServerRequest(string $method, $uri, array $serverParams = []) : \PYS_PRO_GLOBAL\Psr\Http\Message\ServerRequestInterface
    {
        if (empty($method)) {
            if (!empty($serverParams['REQUEST_METHOD'])) {
                $method = $serverParams['REQUEST_METHOD'];
            } else {
                throw new \InvalidArgumentException('Cannot determine HTTP method');
            }
        }
        return new \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\ServerRequest($method, $uri, [], null, '1.1', $serverParams);
    }
    public function createResponse(int $code = 200, string $reasonPhrase = '') : \PYS_PRO_GLOBAL\Psr\Http\Message\ResponseInterface
    {
        return new \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Response($code, [], null, '1.1', $reasonPhrase);
    }
    public function createRequest(string $method, $uri) : \PYS_PRO_GLOBAL\Psr\Http\Message\RequestInterface
    {
        return new \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Request($method, $uri);
    }
    public function createUri(string $uri = '') : \PYS_PRO_GLOBAL\Psr\Http\Message\UriInterface
    {
        return new \PYS_PRO_GLOBAL\GuzzleHttp\Psr7\Uri($uri);
    }
}
