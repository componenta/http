<?php

namespace Componenta\Http\Exception;

/**
 * 403 Forbidden
 *
 * The server understood the request but refuses to authorize it.
 * Authentication will not help.
 */
class ForbiddenException extends HttpException
{
    public int $statusCode {
        get => 403;
    }

    protected string $defaultMessage {
        get => 'Forbidden';
    }
}