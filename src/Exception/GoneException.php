<?php

namespace Componenta\Http\Exception;

/**
 * 410 Gone
 *
 * The resource was permanently removed and will not be available again.
 * Unlike 404, this is intentional and permanent.
 */
class GoneException extends HttpException
{
    public int $statusCode {
        get => 410;
    }

    protected string $defaultMessage {
        get => 'Gone';
    }
}