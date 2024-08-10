# Nova

```php
Text::make('Title', 'title')
    ->sortable()
    ->rules('required', 'string', 'min:1', 'max:255')
    ->creationRules('unique:books,title')
    ->updateRules('unique:books,title,{{resourceId}}'),
```
