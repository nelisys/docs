# test

## get response output from getJson()

```php
$response = $this->getJson('/api/products');

$response->json();

$response->getContent();
```

## set headers

```php
$this->withHeaders([
        // 'X-Lang' => 'th',
    ])
    ->postJson('/api/login', $login_data)
```
