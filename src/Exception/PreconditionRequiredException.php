<?php

namespace Componenta\Http\Exception;

/**
 * 428 Precondition Required
 *
 * The server requires the request to be conditional
 * (include If-Match or If-Unmodified-Since headers).
 */
class PreconditionRequiredException extends HttpException
{
    public int $statusCode {
        get => 428;
    }

    protected string $defaultMessage {
        get => 'Precondition Required';
    }
}