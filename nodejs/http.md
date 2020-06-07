# HTTP

## createServer

```javascript
// test-http.js
const http = require('http');

http.createServer((req, res) => {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write('Hello World!\n');
    res.write('req.url = ' + req.url);
    res.end();
}).listen(8000);
```

```console
$ curl -i 'http://127.0.0.1:8000/students?name=alice'
HTTP/1.1 200 OK
Content-Type: text/html
Date: Sun, 07 Jun 2020 03:02:11 GMT
Connection: keep-alive
Transfer-Encoding: chunked

Hello World!
req.url = /students?name=alice
```

## request data

```javascript
const http = require('http');

http.createServer((req, res) => {
    req.on('data', (chunk) => {
        let str = chunk.toString();

        res.writeHead(200, {'Content-Type': 'text/html'});
        res.write(`data = ${str}`);
    });

    req.on('end', () => {
        res.end();
    });
}).listen(8000);
```

```console
$ curl -d 'id=1&name=alice' http://127.0.0.1:8000
data = id=1&name=alice
```
