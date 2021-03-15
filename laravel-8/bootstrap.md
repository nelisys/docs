# Bootstrap

```
$ npm install --save-dev bootstrap
```

```javascript
// webpack.mix.js
mix.sass('resources/sass/app.scss', 'public/css')
```

```sass
// resources/sass/app.scss
@import '~bootstrap/scss/bootstrap';
```

```
$ npm run dev
```

```html
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="{{ mix('/css/app.css') }}">
</head>
```
