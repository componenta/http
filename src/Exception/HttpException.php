<?php

declare(strict_types=1);

namespace Componenta\Http\Exception;

use Throwable;

/**
 * Base HTTP exception
 *
 * All HTTP exceptions extend this class and provide:
 * - HTTP status code
 * - Optional headers to include in response
 * - Standard exception message and previous exception support
 */
abstract class HttpException extends \RuntimeException
{
    /** @var array<string, string|list<string>> */
    private array $responseHeaders = [];

    abstract public int $statusCode { get; }

    abstract protected string $defaultMessage { get; }

    /** @var array<string, string|list<string>> */
    public array $headers {
        get => $this->responseHeaders;
    }

    public function __construct(
        string $message = '',
        ?Throwable $previous = null,
    ) {
        parent::__construct(
            $message !== '' ? $message : $this->defaultMessage,
            $this->statusCode,
            $previous,
        );
    }

    /**
     * Adds a header to include in response
     *
     * @return $this
     */
    public function withHeader(string $name, string|array $value): static
    {
        $this->responseHeaders[$name] = $value;

        return $this;
    }
}
