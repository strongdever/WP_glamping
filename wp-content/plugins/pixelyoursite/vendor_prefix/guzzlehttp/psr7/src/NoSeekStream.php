<?php

declare (strict_types=1);
namespace PYS_PRO_GLOBAL\GuzzleHttp\Psr7;

use PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface;
/**
 * Stream decorator that prevents a stream from being seeked.
 */
final class NoSeekStream implements \PYS_PRO_GLOBAL\Psr\Http\Message\StreamInterface
{
    use StreamDecoratorTrait;
    /** @var StreamInterface */
    private $stream;
    public function seek($offset, $whence = \SEEK_SET) : void
    {
        throw new \RuntimeException('Cannot seek a NoSeekStream');
    }
    public function isSeekable() : bool
    {
        return \false;
    }
}
