# Font Awesome

## installation

```
$ npm install --save-dev @fortawesome/fontawesome-free
```

## laravel

```
cp -av node_modules/\@fortawesome/fontawesome-free/webfonts public/

cp -av node_modules/\@fortawesome/fontawesome-free/css/all.min.css public/css/fontawesome.min.css
```

`resources/views/app.blade.php`

```php
<link rel="stylesheet" href="/css/fontawesome.min.css">
```
