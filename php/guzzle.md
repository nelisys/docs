# guzzle

```console
$ composer require guzzlehttp/guzzle
```

```php
<?php
require './vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client([
    'base_uri' => "http://example.com",
]);

$response = $client->get('/', [
    'headers' => [
        'X-Requested-With' => 'XMLHttpRequest',
    ],
    'form_params' => [
        'username' => 'username',
        'password' => 'password',
    ],
]);

$data = json_decode($response->getBody(), true);
```

## JSON POST

```php
$client = new \GuzzleHttp\Client();

$r = $client->post('http://example.com/api, [
    'json' => [
        'name' => 'Alice',
    ],
]);

echo $r->getBody()->getContents();
```
