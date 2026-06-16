# Componenta HTTP

Минимальные HTTP-примитивы, общие для HTTP-пакетов Componenta.

Этот пакет намеренно не содержит реализацию PSR-7, фабрики PSR-17, промежуточные обработчики, построитель ответов, создание запроса, отправку ответа клиенту, роутер или рантайм приложения. Эти части вынесены в отдельные пакеты, чтобы `componenta/http` оставался пакетом без зависимостей.

## Граница пакета

| Есть в этом пакете | Находится в другом пакете |
|---|---|
| Объект значения `Componenta\Http\HttpMethod`. | Реализации PSR-7 подключаются через интеграционные пакеты `componenta/http-psr-*`. |
| Константы `Componenta\Http\Header`. | Создание PSR-запроса находится в `componenta/http-psr`. |
| HTTP-исключения и `HttpExceptionFactory`. | Построение ответов находится в `componenta/http-responder`. |
| Нет рантайм-связки и конфигурационного провайдера. | Отправка ответа клиенту находится в `componenta/http-emitter`. |
|  | Промежуточные обработчики разделены между `componenta/http-body-parsing-middleware`, `componenta/http-cors-middleware`, `componenta/http-csrf-middleware`, `componenta/http-throttle-middleware` и `componenta/http-trusted-proxy-middleware`. |
|  | Построение URL пагинации находится в `componenta/http-pagination`. |

## Установка

```bash
composer require componenta/http
```

## Требования

- PHP `^8.4`

У пакета нет Composer-зависимостей.

## HTTP-метод

`HttpMethod` нормализует имя метода и даёт свойства для решений в роутинге и промежуточных обработчиках.

```php
use Componenta\Http\HttpMethod;

$method = HttpMethod::from('post');

$method->value;        // POST
$method->isSafe;       // false
$method->isIdempotent; // false
$method->isCacheable;  // false
$method->requiresBody; // true
```

Для стандартных методов есть готовые фабрики:

```php
HttpMethod::get();
HttpMethod::post();
HttpMethod::put();
HttpMethod::delete();
HttpMethod::patch();
```

Пользовательские непустые методы разрешены и нормализуются к верхнему регистру. Используйте `HttpMethod::tryFrom()`, если пустое значение должно вернуть `null`, а не выбросить исключение.

## Заголовки

`Header` группирует распространённые имена HTTP-заголовков в константы и содержит списки заголовков запроса, ответа, безопасности, кеша и CORS.

```php
use Componenta\Http\Header;

$response = $response->withHeader(Header::CONTENT_TYPE, 'application/json');

Header::isRequestHeader(Header::AUTHORIZATION); // true
Header::getSecurityHeaders();                   // list<string>
```

Класс является статическим помощником и не предназначен для создания экземпляров.

## HTTP-исключения

Все исключения под конкретные статусы наследуют `Componenta\Http\Exception\HttpException`.

```php
use Componenta\Http\Exception\NotFoundException;

throw new NotFoundException('Post not found');
```

`HttpException` предоставляет:

| API | Значение |
|---|---|
| `$exception->statusCode` | HTTP-статус. |
| `$exception->headers` | Заголовки, которые генератор HTTP-ответа об ошибке может перенести в ответ. |
| `withHeader(string $name, string|array $value)` | Добавляет заголовок ответа и возвращает тот же экземпляр исключения. |

Используйте `HttpExceptionFactory::fromStatusCode()`, если статус известен только во время выполнения.

```php
use Componenta\Http\Exception\HttpExceptionFactory;

$exception = HttpExceptionFactory::fromStatusCode(409, 'Revision conflict');
```

`HttpExceptionFactory::isClientError()` и `HttpExceptionFactory::isServerError()` классифицируют существующие экземпляры `HttpException`.

Часть исключений под конкретные статусы хранит данные, которые нужны для корректного HTTP-ответа:

| Исключение | Дополнительное поведение |
|---|---|
| `UnauthorizedException::basic()` / `UnauthorizedException::bearer()` | Добавляет заголовок `WWW-Authenticate`. |
| `MethodNotAllowedException` | Принимает список разрешённых методов и добавляет заголовок `Allow`. |
| `ContentTooLargeException`, `TooManyRequestsException`, `ServiceUnavailableException` | Принимают необязательную задержку повтора и добавляют `Retry-After`. |
| `ServiceUnavailableException::maintenance()` | Вычисляет `Retry-After` по времени окончания технических работ. |
| `RangeNotSatisfiableException` | Принимает полный размер ресурса и добавляет `Content-Range`. |
| `UpgradeRequiredException` | Принимает целевой протокол и добавляет `Upgrade`. |

`HttpExceptionFactory::fromStatusCode()` создаёт общие экземпляры. Если ответ должен содержать эти заголовки, лучше использовать конкретные конструкторы из таблицы выше.

## Связанные пакеты

| Пакет | Ответственность |
|---|---|
| [`componenta/http-psr`](../http-psr/README.ru.md) | Создаёт PSR-7 серверные запросы через настроенные фабрики. |
| [`componenta/http-responder`](../http-responder/README.ru.md) | Создаёт PSR-7 ответы из распространённых PHP-значений. |
| [`componenta/http-emitter`](../http-emitter/README.ru.md) | Отправляет PSR-7 ответы в выходной поток PHP. |
| [`componenta/app-http`](../app-http/README.ru.md) | Запускает HTTP-приложения Componenta. |
