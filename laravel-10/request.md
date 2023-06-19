# request

```php
$request->cookies->all();

$request->headers->all();
```

```php
$request->header('User-Agent');

$request->header('Referer');

$request->header('X-Real-IP');
// public_ip ex: "1.2.3.4"

$request->header('X-Forwarded-For');
// private_ip public_ip ex: "192.168.1.10, 1.2.3.4"
```

```php
// http://example.com/products?name=abc
$request->url();  // http://example.com

$request->fullUrl();  // http://example.com/products?name=abc

$request->path();  // products

$request->getQueryString();  // name=abc
```
