# React

## Install Laravel

```
$ laravel new laravel-react

$ cd laravel-react/
```

## Install Laravel UI

```console
$ composer require laravel/ui
```

## Create front-end

```console
$ php artisan ui react
React scaffolding installed successfully.
Please run "npm install && npm run dev" to compile your fresh scaffolding.

$ npm install && npm run dev
```

```javascript
// resources/js/app.js
...
require('./components/Example');
```

```javascript
// resources/js/components/Example.js
import React from 'react';
import ReactDOM from 'react-dom';

function Example() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">Example Component</div>

                        <div className="card-body">I'm an example component!</div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
```

## Test example

```php
// routes/web.php
...
Route::view('example', 'example');
```

`resources/views/example.blade.php`

```
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div id="example"></div>
<script src="/js/app.js"></script>
</body>
</html>
```
