<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 426 Upgrade Required
 *
 * The client should switch to a different protocol.
 */
class UpgradeRequiredException extends HttpException
{
    public function __construct(
        public private(set) readonly string $protocol,
        string                              $message = '',
        ?Throwable                          $previous = null,
    )
    {
        parent::__construct($message, $previous);

        $this->withHeader('Upgrade', $this->protocol);
    }

    public int $statusCode {
        get => 426;
    }

    protected string $defaultMessage {
        get => 'Upgrade Required';
    }
}
