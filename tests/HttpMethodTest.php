<?php

declare(strict_types=1);

namespace Componenta\Http\Tests;

use Componenta\Http\HttpMethod;
use PHPUnit\Framework\TestCase;

final class HttpMethodTest extends TestCase
{
    public function testNormalizesAndClassifiesStandardMethods(): void
    {
        $method = new HttpMethod(' get ');

        self::assertSame('GET', $method->value);
        self::assertSame('GET', (string) $method);
        self::assertTrue($method->isSafe);
        self::assertTrue($method->isIdempotent);
        self::assertTrue($method->isCacheable);
        self::assertFalse($method->requiresBody);
        self::assertTrue($method->isStandard);
        self::assertFalse($method->isCustom);
    }

    public function testClassifiesBodyMethods(): void
    {
        $method = HttpMethod::post();

        self::assertFalse($method->isSafe);
        self::assertFalse($method->isIdempotent);
        self::assertFalse($method->isCacheable);
        self::assertTrue($method->requiresBody);
    }

    public function testSupportsCustomMethods(): void
    {
        $method = HttpMethod::from('purge');

        self::assertSame('PURGE', $method->value);
        self::assertFalse($method->isStandard);
        self::assertTrue($method->isCustom);
        self::assertTrue($method->equals('PURGE'));
    }

    public function testTryFromReturnsNullForEmptyMethod(): void
    {
        self::assertNull(HttpMethod::tryFrom('   '));
    }
}
