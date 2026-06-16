<?php

namespace Componenta\Http\Exception;

/**
 * 409 Conflict
 *
 * The request conflicts with current state of the resource.
 * Common for concurrent modifications or business logic conflicts.
 */
class ConflictException extends HttpException
{
    public int $statusCode {
        get => 409;
    }

    protected string $defaultMessage {
        get => 'Conflict';
    }
}