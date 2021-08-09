# Http

```php
use Illuminate\Support\Facades\Http;

$response = Http::get('http://example.com');

echo $response->body();

// <!doctype html>
// <html>
// <head>
//     <title>Example Domain</title>
```

## POST with data

```php
$data = [
    'name' => 'Alice',
];

Http::post('http://example.com', $data);
```

## Headers and Options

```php
$headers = [
    'Content-Type' => 'application/json',
];

$options = [
    'debug' => true,
    'curl' => [
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
    ],
];

$response = Http::withOptions($options)
    ->withHeaders($headers)
    ->get('http://example.com');
```
