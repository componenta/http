<?php

declare(strict_types=1);

namespace Componenta\Http\Exception;

use InvalidArgumentException;

/**
 * Factory for creating HTTP exceptions from status codes
 */
final class HttpExceptionFactory
{
    /**
     * Creates an HTTP exception from status code
     *
     * @throws InvalidArgumentException If status code is not a valid error code
     */
    public static function fromStatusCode(int $statusCode, string $message = ''): HttpException
    {
        return match ($statusCode) {
            // 4xx Client Errors
            400 => new BadRequestException($message),
            401 => new UnauthorizedException($message),
            402 => new PaymentRequiredException($message),
            403 => new ForbiddenException($message),
            404 => new NotFoundException($message),
            405 => new MethodNotAllowedException([], $message),
            406 => new NotAcceptableException($message),
            407 => new ProxyAuthenticationRequiredException($message),
            408 => new RequestTimeoutException($message),
            409 => new ConflictException($message),
            410 => new GoneException($message),
            411 => new LengthRequiredException($message),
            412 => new PreconditionFailedException($message),
            413 => new ContentTooLargeException($message),
            414 => new UriTooLongException($message),
            415 => new UnsupportedMediaTypeException($message),
            416 => new RangeNotSatisfiableException(0, $message),
            417 => new ExpectationFailedException($message),
            418 => new ImATeapotException($message),
            421 => new MisdirectedRequestException($message),
            422 => new UnprocessableEntityException([], $message),
            423 => new LockedException($message),
            424 => new FailedDependencyException($message),
            425 => new TooEarlyException($message),
            426 => new UpgradeRequiredException('HTTP/2', $message),
            428 => new PreconditionRequiredException($message),
            429 => new TooManyRequestsException(message: $message),
            431 => new RequestHeaderFieldsTooLargeException($message),
            451 => new UnavailableForLegalReasonsException($message),

            // 5xx Server Errors
            500 => new InternalServerErrorException($message),
            501 => new NotImplementedException($message),
            502 => new BadGatewayException($message),
            503 => new ServiceUnavailableException(message: $message),
            504 => new GatewayTimeoutException($message),
            505 => new HttpVersionNotSupportedException($message),
            506 => new VariantAlsoNegotiatesException($message),
            507 => new InsufficientStorageException($message),
            508 => new LoopDetectedException($message),
            510 => new NotExtendedException($message),
            511 => new NetworkAuthenticationRequiredException($message),

            default => throw new InvalidArgumentException(
                "Unknown HTTP error status code: {$statusCode}",
            ),
        };
    }

    /**
     * Checks if exception is a client error (4xx)
     */
    public static function isClientError(HttpException $exception): bool
    {
        $code = $exception->statusCode;

        return $code >= 400 && $code < 500;
    }

    /**
     * Checks if exception is a server error (5xx)
     */
    public static function isServerError(HttpException $exception): bool
    {
        $code = $exception->statusCode;

        return $code >= 500 && $code < 600;
    }
}
