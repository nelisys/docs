# Bootstrap

## css

Install Bootstrap

```
$ npm install --save bootstrap
```

Edit `pages/_app.js`

```js
import 'bootstrap/dist/css/bootstrap.css'

function MyApp({ Component, pageProps }) {
  return <Component {...pageProps} />
}

export default MyApp
```

## sass

```
$ npm install --save sass
```

```scss
// styles/globals.scss
@import '~bootstrap/scss/bootstrap';

.my-btn {
    @extend .btn;
    @extend .btn-sm;
}
```

```js
// pages/_app.js
import '../styles/globals.scss'

function MyApp({ Component, pageProps }) {
    return <Component {...pageProps} />
}

export default MyApp
```
