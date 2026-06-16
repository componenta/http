<?php

namespace Componenta\Http\Exception;

use Throwable;

/**
 * 405 Method Not Allowed
 *
 * The request method is not supported for the resource.
 * Must include Allow header with permitted methods.
 */
class MethodNotAllowedException extends HttpException
{
    /**
     * @param list<string> $allowedMethods Allowed HTTP methods
     */
    public function __construct(
        public private(set) readonly array $allowedMethods,
        string                             $message = '',
        ?Throwable                         $previous = null,
    )
    {
        parent::__construct($message, $previous);

        $this->withHeader('Allow', implode(', ', $this->allowedMethods));
    }

    public int $statusCode {
        get => 405;
    }

    protected string $defaultMessage {
        get => 'Method Not Allowed';
    }
}
