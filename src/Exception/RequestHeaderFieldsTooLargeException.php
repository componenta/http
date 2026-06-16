<?php

namespace Componenta\Http\Exception;

/**
 * 431 Request Header Fields Too Large
 *
 * Request headers exceed server limits.
 */
class RequestHeaderFieldsTooLargeException extends HttpException
{
    public int $statusCode {
        get => 431;
    }

    protected string $defaultMessage {
        get => 'Request Header Fields Too Large';
    }
}