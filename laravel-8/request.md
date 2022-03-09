# request

```php
public function store(BlogRequest $request)
{
    // return array of all input
    $request->all();

    // return array of only rules defined in BlogRequest->rules()
    $request->validated();
```
