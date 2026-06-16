<?php

namespace Componenta\Http\Exception;

/**
 * 411 Length Required
 *
 * The request did not include Content-Length header.
 */
class LengthRequiredException extends HttpException
{
    public int $statusCode {
        get => 411;
    }

    protected string $defaultMessage {
        get => 'Length Required';
    }
}