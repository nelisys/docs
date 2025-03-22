# React Bootstrap

## Remove tailwindcss

```
npm remove @tailwindcss/vite tailwindcss
```

## Install

```
npm install -D react-bootstrap bootstrap
```

## vite.config.js

add `app.scss`

```js
...
import path from 'path';
...

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',  // <--
                'resources/js/app.jsx',
            ],
        }),
        react(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        },
    },
});

```

## app.blade.php

add `app.scss`

```php
<head>
...
@viteReactRefresh
@vite([
    'resources/sass/app.scss',
    'resources/js/app.jsx',
])
</head>
```

## app.scss

```scss
@import '~bootstrap/scss/bootstrap';
```
