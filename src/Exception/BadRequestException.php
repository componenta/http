<?php

namespace Componenta\Http\Exception;

/**
 * 400 Bad Request
 *
 * The server cannot process the request due to client error
 * (malformed syntax, invalid parameters, etc.)
 */
class BadRequestException extends HttpException
{
    public int $statusCode {
        get => 400;
    }

    protected string $defaultMessage {
        get => 'Bad Request';
    }
}