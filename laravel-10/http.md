# http

## login with sanctum

### login to get token

```php
$headers = [
    'X-Requested-With' => 'XMLHttpRequest',
    'Content-Type' => 'application/json',
];

$loginResponse = Http::withoutVerifying()
    ->withHeaders($headers)
    ->post("http://example.com/api/login", [
        'email' => 'admin',
        'password' => 'password',
    ]);

if (! $loginResponse->successful()) {
    dd('login fail');
}

$loginJson = $loginResponse->json();

$token = $loginJson['data']['user']['token']['plainTextToken'] ?? null;

if (! $token) {
    dd('token fail');
}
```

### using token to get resources

```php
$headers['Authorization'] = "Bearer $token";

$response = Http::withoutVerifying()
    ->withHeaders($headers)
    ->get("http://example.com/api/items");
```
