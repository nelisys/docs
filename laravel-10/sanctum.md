# sanctum

## curl stateful

### csrf-cookie

```sh
curl -c cookies.txt \
    -H "Origin: http://web.example.test" \
    -H "X-Requested-With: XMLHttpRequest" \
    http://api.example.test/sanctum/csrf-cookie
```

### login

```sh
XSRF_TOKEN=`cat cookies.txt | grep XSRF-TOKEN | cut -d$'\t' -f 7 | sed 's/\%3D/=/'`

curl -b cookies.txt -c cookies.txt \
    -H "Origin: http://web.example.test" \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "X-XSRF-TOKEN: $XSRF_TOKEN" \
    -X POST \
    -d "email=alice@example.test&password=secret" \
    http://api.example.test/api/login
```

### /api/user

```sh
XSRF_TOKEN=`cat cookies.txt | grep XSRF-TOKEN | cut -d$'\t' -f 7 | sed 's/\%3D/=/'`

curl -b cookies.txt \
    -H "Origin: http://web.example.test" \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "X-XSRF-TOKEN: $XSRF_TOKEN" \
    http://api.example.test/api/user
```

### logout

```sh
curl -b cookies.txt \
    -H "Origin: http://web.example.test" \
    -H "X-Requested-With: XMLHttpRequest" \
    -H "X-XSRF-TOKEN: $XSRF_TOKEN" \
    -X POST \
    http://api.example.test/api/logout
```

## http client stateful

```php
use GuzzleHttp\Cookie\CookieJar;
use Illuminate\Support\Facades\Http;

$loginData = [
    'email' => 'alice@example.test',
    'password' => 'secret',
];

// User::factory()->create($loginData);

$cookieJar = new CookieJar;

// csrf-cookie
$csrf = Http::withOptions([
    'cookies' => $cookieJar,
])->get("http://api.example.test/sanctum/csrf-cookie");

$xsrf_token = $cookieJar->getCookieByName('XSRF-TOKEN')->getValue();
$xsrf_token = urldecode(($xsrf_token));

// /api/login
$login = Http::withOptions([
        'cookies' => $cookieJar,
    ])
    ->withHeaders([
        'Origin' => 'http://web.example.test',
        'X-XSRF-TOKEN' => $xsrf_token,
    ])
    ->post("http://api.example.test/api/login", $loginData);

// /api/user
$user = Http::withOptions([
        'cookies' => $cookieJar,
    ])
    ->withHeaders([
        'Origin' => 'http://web.example.test',
        'X-XSRF-TOKEN' => $xsrf_token,
    ])
    ->get("http://api.example.test/api/user");
```
