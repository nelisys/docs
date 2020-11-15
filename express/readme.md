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

## Handle form submit

```
$ npm install --save body-parser
```

```javascript
const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

app.get('/', (req, res) => {
    res.send(`
    <form action="/" method="POST">
      <input type="text" name="name" value="alice" />
      <input type="text" name="age" value="30" />
      <button type="submit">submit</button>
    </form>
    `);
});

app.post('/', (req, res) => {
    res.send('form submitted');
    console.log('name = ' + req.body.name);
    console.log('age = ' + req.body.age);
});

app.listen(port, () => {
    console.log(`Example app listening at http://localhost:${port}`);
});
```

```
// name = alice
// age = 30
```
