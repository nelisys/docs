# request

## validation

```php
public function store(BlogRequest $request)
{
    // return array of all input
    $request->all();

    // return array of only rules defined in BlogRequest->rules()
    $request->validated();
```

## ip address

```php
request()->ip();
```
