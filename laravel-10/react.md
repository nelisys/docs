# Laravel 10 : react / vite / react-bootstrap

## Installation

```sh
npm install --save-dev react react-dom @vitejs/plugin-react

npm install --save-dev react-router-dom

npm install --save-dev sass
```

## vite.config.js

```js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.jsx',
            ],
        }),
        react(),
    ],
});
```

## resources/sass/app.scss

```scss
// resources/sass/app.scss
// @import 'bootstrap';
```

## resources/js/app.jsx

```jsx
import { createRoot } from 'react-dom/client';
import { createBrowserRouter, RouterProvider } from 'react-router-dom';
import routes from './routes';

createRoot(document.getElementById('root')).render(
    <RouterProvider
        router={createBrowserRouter(routes)}
    />
);
```

## resources/js/routes.jsx

```jsx
import { Outlet } from 'react-router-dom';

const routes = [
    {
        path: '/',
        element: <main><Outlet /></main>,
        children: [
            {
                index: true,
                element: <div>Home</div>,
            },
            {
                path: 'contact',
                element: <div>Contact</div>,
            },
        ],
    },
];

export default routes;
```

## app.blade.php

```php
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>App</title>
@viteReactRefresh
@vite([
    'resources/sass/app.scss',
    'resources/js/app.jsx',
])
</head>
<body>
<div id="root"></div>
</body>
</html>
```

## routes/web.php

```php
use Illuminate\Support\Facades\Route;

Route::view('/{any?}', 'app')
    ->where('any', '.*');
```

## npm

```sh
npm run dev
```

```sh
npm run build
```
