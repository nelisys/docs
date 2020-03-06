# Install

```console
$ composer create-project --prefer-dist laravel/laravel my-laravel

$ cd my-laravel/

$ ls -CF
README.md       composer.json   package.json    routes/     vendor/
app/            composer.lock   phpunit.xml     server.php  webpack.mix.js
artisan*        config/         public/         storage/
bootstrap/      database/       resources/      tests/
```

```console
$ php artisan -V
Laravel Framework 6.5.2
```

```console
$ php artisan serve
Laravel development server started: http://127.0.0.1:8000
```

use browser to open the address above
