# hello world

## welcome


$ vi routes/web.php
...
Route::get('/', function () {
    return view('welcome');
});


$ vi resources/views/welcome.blade.php
...
            <div class="content">
                odiv class="title m-b-md">
                    Hello Laravel 7
                </div>

## add Route

$ vi routes/web.php
...

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 'Hello Laravel 7';
});


http://blog.test/hello

## add Controller

$ vi routes/web.php
...

Route::get('hello', 'PageController@hello');

$ php artisan make:controller PageController
Controller created successfully.

$ vi app/Http/Controllers/PageController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
}

$ vi app/Http/Controllers/PageController.php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function hello()
    {
        return 'Hello from Controller';
    }
}


http://blog.test/hello

## add view

$ vi app/Http/Controllers/PageController.php
...
    public function hello()
    {
        return view('hello');
    }


$ vi resources/views/hello.blade.php
Hello from blade
