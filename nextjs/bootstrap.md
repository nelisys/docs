# Bootstrap

Install Bootstrap

```
$ npm install --save bootstrap
```

Edit `pages/_app.js`

```javascript
import 'bootstrap/dist/css/bootstrap.css'

function MyApp({ Component, pageProps }) {
  return <Component {...pageProps} />
}

export default MyApp
```
