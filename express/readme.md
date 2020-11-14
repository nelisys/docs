# Express

## Installation

```
$ npm install --save express
```

## First page

```javascript
// index.js
const express = require('express');
const app = express();
const port = 3000;

app.get('/', (req, res) => {
    res.send('Hello World');
});

app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`);
});
```

```
$ node index.js
Example app listening at http://localhost:3000
```

```
$ curl http://localhost:3000
Hello World
```
