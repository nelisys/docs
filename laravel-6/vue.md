# VueJS

## installation

```bashj
npm install --save-dev vue \
    vue-template-compiler \
    vue-router
```

## setup files

```javascript
// resources/js/App.vue
<template>
    <div>
        <my-nav></my-nav>
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>
```

```javascript
// resources/js/Home.vue
<template>
    <div>
        home
    </div>
</template>
```

```javascript
// resources/js/Nav.vue
<template>
    <nav>
        nav
    </nav>
</template>
```

```javascript
// resources/js/NotFound.vue
<template>
    <div>
        not found
    </div>
</template>
```

```javascript
// resources/js/app.js
require('./bootstrap');

const Vue = require('vue');
const VueRouter = require('vue-router').default;

Vue.use(VueRouter)
Vue.component('my-nav', require('./Nav.vue').default);

let router = new VueRouter({
    mode: 'history',
    linkActiveClass: "active",
    routes: require('./routes.js').default,
})

const app = new Vue({
    el: '#app',
    components: { App: require('./App.vue').default },
    router,
});
```

```javascript
// resources/js/bootstrap.js
window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
```

```javascript
// resources/js/routes.js
const routes = [
    {
        name: 'home',
        path: '/',
        component: require('./Home.vue').default,
    },
    {
        name: 'not_found',
        path: '*',
        component: require('./NotFound.vue').default,
    },
];

export default routes;
```

```javascript
// webpack.mix.js
const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .version();

mix.extract();
```

## compile files

```console
$ npm run dev

$ ls -l public/js/
total 2040
-rw-r--r--  1 supasin  staff    21000 Feb  9 10:08 app.js
-rw-r--r--  1 supasin  staff     6269 Feb  9 10:08 manifest.js
-rw-r--r--  1 supasin  staff  1009688 Feb  9 10:08 vendor.js
```

## change Laravel route file

```php
// routes/web.php
<?php

Route::view('/{any?}', 'app')
    ->where('any', '.*');
```

```php
// resources/views/app.blade.php
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME', 'app') }}</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
<body>
    <div id="app" v-cloak>
        <app></app>
    </div>
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
```
