# URL

## parse_url

```php
$url = 'https://example.com?id=1&name=Alice#tag1';

$components = parse_url($url);

// [
//     "scheme" => "https"
//     "host" => "example.com"
//     "query" => "id=1&name=Alice"
//     "fragment" => "tag1"
// ]
```

## parse_url

```php
parse_str($components['query'], $queries);

// [
//     "id" => "1"
//     "name" => "Alice"
// ]
```

## http_build_query()

```php
http_build_query([
    'id' => 1,
    'name' => 'Alice',
]);

// id=1&name=Alice
```
