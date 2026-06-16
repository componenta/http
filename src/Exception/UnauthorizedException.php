<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 401 Unauthorized
 *
 * Authentication is required and has failed or not been provided.
 * Should include WWW-Authenticate header.
 */
class UnauthorizedException extends HttpException
{
    public function __construct(
        string                                $message = '',
        public private(set) readonly ?string  $scheme = null,
        public private(set) readonly ?string  $realm = null,
        ?Throwable                            $previous = null,
    )
    {
        parent::__construct($message, $previous);

        if ($this->scheme !== null) {
            $value = $this->realm !== null
                ? "{$this->scheme} realm=\"{$this->realm}\""
                : $this->scheme;

            $this->withHeader('WWW-Authenticate', $value);
        }
    }

    /**
     * Creates exception for Basic authentication
     */
    public static function basic(string $realm = 'Restricted', string $message = ''): static
    {
        return new static($message, 'Basic', $realm);
    }

    /**
     * Creates exception for Bearer token authentication
     */
    public static function bearer(string $realm = 'API', string $message = ''): static
    {
        return new static($message, 'Bearer', $realm);
    }

    public int $statusCode {
        get => 401;
    }

    protected string $defaultMessage {
        get => 'Unauthorized';
    }
}
