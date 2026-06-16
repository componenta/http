<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 503 Service Unavailable
 *
 * The server is currently unavailable (overloaded or down for maintenance).
 */
class ServiceUnavailableException extends HttpException
{
    public function __construct(
        public private(set) readonly ?int $retryAfter = null,
        string                            $message = '',
        ?Throwable                        $previous = null,
    )
    {
        parent::__construct($message, $previous);

        if ($this->retryAfter !== null) {
            $this->withHeader('Retry-After', (string) $this->retryAfter);
        }
    }

    /**
     * Creates exception for scheduled maintenance
     */
    public static function maintenance(\DateTimeInterface $until, string $message = ''): static
    {
        $retryAfter = $until->getTimestamp() - time();

        return new static(
            max(0, $retryAfter),
            $message !== '' ? $message : 'Service is under maintenance',
        );
    }

    public int $statusCode {
        get => 503;
    }

    protected string $defaultMessage {
        get => 'Service Unavailable';
    }
}
