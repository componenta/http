<?php

namespace Componenta\Http\Exception;

/**
 * 501 Not Implemented
 *
 * The server does not support the functionality required to fulfill the request.
 */
class NotImplementedException extends HttpException
{
    public int $statusCode {
        get => 501;
    }

    protected string $defaultMessage {
        get => 'Not Implemented';
    }
}