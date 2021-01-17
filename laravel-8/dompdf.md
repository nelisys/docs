# Laravel DomPdf

## Install

```
$ composer require barryvdh/laravel-dompdf
```

## Add Facade

Add facade 'PDF' in `config/app.php`

```php
    'aliases' => [
        // ...
        'PDF' => Barryvdh\DomPDF\Facade::class,
```

## Create view file

Create test view file `resources/views/hello.blade.php`

```php
<h1>Hello {{ $name }}</h1>
```

## Add route file

Add test pdf route in `routes/web.php`

```php
// ...
Route::get('pdf', function() {
    $name = 'Alice';
    $pdf = PDF::loadView('hello', compact('name'));
    return $pdf->stream();
});
```
