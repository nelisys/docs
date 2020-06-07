# url

```javascript
const url = require('url');

const myHref = 'http://username:password@127.0.0.1:8000/students?room=2&name=alice#hash';
const myParse = url.parse(myHref, true);

console.log(myParse);
// Url {
//   protocol: 'http:',
//   slashes: true,
//   auth: 'username:password',
//   host: '127.0.0.1:8000',
//   port: '8000',
//   hostname: '127.0.0.1',
//   hash: '#hash',
//   search: '?room=2&name=alice',
//   query: [Object: null prototype] { room: '2', name: 'alice' },
//   pathname: '/students',
//   path: '/students?room=2&name=alice',
//   href:
//    'http://username:password@127.0.0.1:8000/students?room=2&name=alice#hash' }

console.log(myParse.query.name);
// alice
```
