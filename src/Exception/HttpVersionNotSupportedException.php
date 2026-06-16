<?php

namespace Componenta\Http\Exception;

/**
 * 505 HTTP Version Not Supported
 *
 * The server does not support the HTTP version used in the request.
 */
class HttpVersionNotSupportedException extends HttpException
{
    public int $statusCode {
        get => 505;
    }

    protected string $defaultMessage {
        get => 'HTTP Version Not Supported';
    }
}