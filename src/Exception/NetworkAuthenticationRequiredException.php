<?php

namespace Componenta\Http\Exception;

/**
 * 511 Network Authentication Required
 *
 * The client needs to authenticate to gain network access (captive portal).
 */
class NetworkAuthenticationRequiredException extends HttpException
{
    public int $statusCode {
        get => 511;
    }

    protected string $defaultMessage {
        get => 'Network Authentication Required';
    }
}