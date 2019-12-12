# Laravel React

```console
$ laravel new laravel-react

$ cd laravel-react

$ composer require laravel/ui --dev

$ php artisan ui react

$ npm install

$ npm run dev
```

edit `resources/views/welcome.blade.php`

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="example"></div>
</body>
</html>
```
