<?php

namespace Componenta\Http\Exception;

/**
 * 407 Proxy Authentication Required
 *
 * Similar to 401, but for proxy authentication.
 */
class ProxyAuthenticationRequiredException extends HttpException
{
    public int $statusCode {
        get => 407;
    }

    protected string $defaultMessage {
        get => 'Proxy Authentication Required';
    }
}