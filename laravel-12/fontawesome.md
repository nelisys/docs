# Font Awesome

## Install

```
npm install -D @fortawesome/fontawesome-free
```

## vite.config.js

```js
...
import path from 'path';
...

export default defineConfig({
    ...
    resolve: {
        alias: {
            ...
            '~fontawesome': path.resolve(__dirname, 'node_modules/@fortawesome/fontawesome-free'),
        },
    },
});

```


## app.scss

```scss
...

$fa-font-path: '~fontawesome/webfonts';
@import '~fontawesome/scss/fontawesome';
@import '~fontawesome/scss/brands';
@import '~fontawesome/scss/regular';
@import '~fontawesome/scss/solid';
```
