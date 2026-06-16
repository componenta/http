<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 429 Too Many Requests
 *
 * Rate limiting - too many requests in a given time period.
 */
class TooManyRequestsException extends HttpException
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

    public int $statusCode {
        get => 429;
    }

    protected string $defaultMessage {
        get => 'Too Many Requests';
    }
}
