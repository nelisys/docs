# cors

- Laravel http://localhost:8000
- NextJS http://localhost:3000

## NextJS

```js
const http = axios.create({
    baseURL: 'http://localhost:8000',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
    withCredentials: true,
});

http.get('/sanctum/csrf-cookie')
    .then(response => {
        console.log(response);
    });
```

## Laravel cors.php #1

```php
// config/cors.php
    'paths' => [],
    'allowed_origins' => [],
```

Chrome Console

```
Access to XMLHttpRequest at 'http://localhost:8000/sanctum/csrf-cookie' from origin 'http://localhost:3000' has been blocked by CORS policy: Response to preflight request doesn't pass access control check: No 'Access-Control-Allow-Origin' header is present on the requested resource.
```


## Laravel cors.php #2

```php
// config/cors.php
    'paths' => ['sanctum/csrf-cookie'],
    'allowed_origins' => ['http://localhost:3000'],
```

Chrome Console

```
Access to XMLHttpRequest at 'http://localhost:8000/sanctum/csrf-cookie' from origin 'http://localhost:3000' has been blocked by CORS policy: Response to preflight request doesn't pass access control check: The value of the 'Access-Control-Allow-Credentials' header in the response is '' which must be 'true' when the request's credentials mode is 'include'. The credentials mode of requests initiated by the XMLHttpRequest is controlled by the withCredentials attribute.
```

## Laravel cors.php #3

```php
// config/cors.php
    'supports_credentials' => true,
```

Chrome Console

```
// axios.response
{data: '', status: 204, statusText: 'No Content',
```

Chrome -> Application -> Cookies

http://localhost
- laravel_session
- XSRF-TOKEN

