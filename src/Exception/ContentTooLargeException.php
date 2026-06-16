<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 413 Content Too Large (Payload Too Large)
 *
 * The request body exceeds server limits.
 */
class ContentTooLargeException extends HttpException
{
    public function __construct(
        string                                  $message = '',
        public private(set) readonly ?int       $retryAfter = null,
        ?Throwable                              $previous = null,
    )
    {
        parent::__construct($message, $previous);

        if ($this->retryAfter !== null) {
            $this->withHeader('Retry-After', (string) $this->retryAfter);
        }
    }

    public int $statusCode {
        get => 413;
    }

    protected string $defaultMessage {
        get => 'Content Too Large';
    }
}
