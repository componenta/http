<?php

namespace Componenta\Http\Exception;

/**
 * 412 Precondition Failed
 *
 * Preconditions in request headers (If-Match, If-Unmodified-Since, etc.)
 * evaluated to false.
 */
class PreconditionFailedException extends HttpException
{
    public int $statusCode {
        get => 412;
    }

    protected string $defaultMessage {
        get => 'Precondition Failed';
    }
}