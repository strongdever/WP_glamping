<?php

namespace PYS_PRO_GLOBAL\GuzzleHttp\Promise;

final class Is
{
    /**
     * Returns true if a promise is pending.
     *
     * @return bool
     */
    public static function pending(\PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() === \PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface::PENDING;
    }
    /**
     * Returns true if a promise is fulfilled or rejected.
     *
     * @return bool
     */
    public static function settled(\PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() !== \PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface::PENDING;
    }
    /**
     * Returns true if a promise is fulfilled.
     *
     * @return bool
     */
    public static function fulfilled(\PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() === \PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface::FULFILLED;
    }
    /**
     * Returns true if a promise is rejected.
     *
     * @return bool
     */
    public static function rejected(\PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface $promise)
    {
        return $promise->getState() === \PYS_PRO_GLOBAL\GuzzleHttp\Promise\PromiseInterface::REJECTED;
    }
}
