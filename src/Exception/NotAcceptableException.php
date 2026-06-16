<?php

namespace Componenta\Http\Exception;

/**
 * 406 Not Acceptable
 *
 * The resource cannot generate content acceptable according
 * to Accept headers in the request.
 */
class NotAcceptableException extends HttpException
{
    public int $statusCode {
        get => 406;
    }

    protected string $defaultMessage {
        get => 'Not Acceptable';
    }
}