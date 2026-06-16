# Componenta HTTP

Minimal HTTP primitives shared by Componenta HTTP packages.

This package intentionally has no PSR-7 implementation, PSR-17 factory, middleware, responder, request creator, emitter, router, or application runtime. Those pieces live in separate packages so `componenta/http` can stay dependency-free.

## Package Boundary

| Included here | Provided by another package |
|---|---|
| `Componenta\Http\HttpMethod` value object. | PSR-7 request/response implementations are installed through `componenta/http-psr-*` integration packages. |
| `Componenta\Http\Header` constants. | PSR request creation is in `componenta/http-psr`. |
| HTTP exception classes and `HttpExceptionFactory`. | Response building is in `componenta/http-responder`. |
| No runtime wiring or config provider. | Response emission is in `componenta/http-emitter`. |
|  | Middleware is split into `componenta/http-body-parsing-middleware`, `componenta/http-cors-middleware`, `componenta/http-csrf-middleware`, `componenta/http-throttle-middleware`, and `componenta/http-trusted-proxy-middleware`. |
|  | Pagination URL helpers are in `componenta/http-pagination`. |

## Installation

```bash
composer require componenta/http
```

## Requirements

- PHP `^8.4`

The package has no Composer dependencies.

## HTTP Method

`HttpMethod` normalizes method names and exposes RFC-oriented properties for common routing and middleware decisions.

```php
use Componenta\Http\HttpMethod;

$method = HttpMethod::from('post');

$method->value;        // POST
$method->isSafe;       // false
$method->isIdempotent; // false
$method->isCacheable;  // false
$method->requiresBody; // true
```

Standard helpers are available for common methods:

```php
HttpMethod::get();
HttpMethod::post();
HttpMethod::put();
HttpMethod::delete();
HttpMethod::patch();
```

Custom non-empty methods are allowed and normalized to uppercase. Use `HttpMethod::tryFrom()` when an empty value should return `null` instead of throwing.

## Header Constants

`Header` groups common HTTP header names as constants and includes helper lists for request, response, security, cache, and CORS headers.

```php
use Componenta\Http\Header;

$response = $response->withHeader(Header::CONTENT_TYPE, 'application/json');

Header::isRequestHeader(Header::AUTHORIZATION); // true
Header::getSecurityHeaders();                   // list<string>
```

The class is a static helper and is not meant to be instantiated.

## HTTP Exceptions

All status-specific exceptions extend `Componenta\Http\Exception\HttpException`.

```php
use Componenta\Http\Exception\NotFoundException;

throw new NotFoundException('Post not found');
```

`HttpException` exposes:

| API | Meaning |
|---|---|
| `$exception->statusCode` | HTTP status code. |
| `$exception->headers` | Headers that an HTTP error response generator may copy to the response. |
| `withHeader(string $name, string|array $value)` | Adds a response header and returns the same exception instance. |

Use `HttpExceptionFactory::fromStatusCode()` when the status code is known only at runtime.

```php
use Componenta\Http\Exception\HttpExceptionFactory;

$exception = HttpExceptionFactory::fromStatusCode(409, 'Revision conflict');
```

`HttpExceptionFactory::isClientError()` and `HttpExceptionFactory::isServerError()` classify existing `HttpException` instances.

Some status-specific exceptions also store data that is needed to build a correct HTTP response:

| Exception | Extra behavior |
|---|---|
| `UnauthorizedException::basic()` / `UnauthorizedException::bearer()` | Adds the `WWW-Authenticate` header. |
| `MethodNotAllowedException` | Requires the allowed methods list and adds the `Allow` header. |
| `ContentTooLargeException`, `TooManyRequestsException`, `ServiceUnavailableException` | Accept an optional retry delay and add `Retry-After`. |
| `ServiceUnavailableException::maintenance()` | Calculates `Retry-After` from a maintenance end time. |
| `RangeNotSatisfiableException` | Requires the total resource size and adds `Content-Range`. |
| `UpgradeRequiredException` | Requires the target protocol and adds `Upgrade`. |

`HttpExceptionFactory::fromStatusCode()` creates generic instances. Prefer the concrete constructors above when the response must include these headers.

## Related Packages

| Package | Responsibility |
|---|---|
| [`componenta/http-psr`](../http-psr/README.md) | Creates PSR-7 server requests through configured factories. |
| [`componenta/http-responder`](../http-responder/README.md) | Builds PSR-7 responses from common PHP values. |
| [`componenta/http-emitter`](../http-emitter/README.md) | Emits PSR-7 responses to PHP output. |
| [`componenta/app-http`](../app-http/README.md) | Runs Componenta HTTP applications. |
