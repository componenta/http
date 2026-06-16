<?php

declare(strict_types=1);

namespace Componenta\Http\Tests;

use Componenta\Http\Exception\HttpExceptionFactory;
use Componenta\Http\Exception\MethodNotAllowedException;
use Componenta\Http\Exception\TooManyRequestsException;
use Componenta\Http\Exception\UnauthorizedException;
use Componenta\Http\Exception\UnprocessableEntityException;
use PHPUnit\Framework\TestCase;

final class HttpExceptionTest extends TestCase
{
    public function testExposesStatusCodeAndHeadersAsProperties(): void
    {
        $exception = new MethodNotAllowedException(['GET', 'POST']);

        self::assertSame(405, $exception->statusCode);
        self::assertSame(405, $exception->getCode());
        self::assertSame(['Allow' => 'GET, POST'], $exception->headers);
    }

    public function testExposesPayloadProperties(): void
    {
        $validation = new UnprocessableEntityException(['email' => ['Invalid email']]);
        $rateLimit = new TooManyRequestsException(retryAfter: 60);
        $auth = UnauthorizedException::basic('Admin');

        self::assertSame(['email' => ['Invalid email']], $validation->errors);
        self::assertSame(60, $rateLimit->retryAfter);
        self::assertSame(['Retry-After' => '60'], $rateLimit->headers);
        self::assertSame('Basic', $auth->scheme);
        self::assertSame('Admin', $auth->realm);
        self::assertSame(['WWW-Authenticate' => 'Basic realm="Admin"'], $auth->headers);
    }

    public function testFactoryUsesStatusCodeProperty(): void
    {
        self::assertTrue(HttpExceptionFactory::isClientError(HttpExceptionFactory::fromStatusCode(404)));
        self::assertTrue(HttpExceptionFactory::isServerError(HttpExceptionFactory::fromStatusCode(503)));
    }
}
