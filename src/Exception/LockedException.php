<?php

namespace Componenta\Http\Exception;

/**
 * 423 Locked
 *
 * The resource is currently locked (WebDAV).
 */
class LockedException extends HttpException
{
    public int $statusCode {
        get => 423;
    }

    protected string $defaultMessage {
        get => 'Locked';
    }
}