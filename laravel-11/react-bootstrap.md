# React Bootstrap

## Install

```
$ npm install --save-dev react-bootstrap bootstrap
```

## vite.config.js

add `app.scss`

```js
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
// $theme-colors: (
//     'primary': tomato,
//     'danger': teal
// );

@import 'bootstrap';
```
