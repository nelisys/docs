# require

## built-in module or node_modules

```javascript
const os = require('os');
```

## local module

```javascript
const helpers = require('./helpers');
```

## json file

`data.json`

```json
{
    "id": 1,
    "name": "Alice"
}
```

```javascript
// test-data.js
const data = require('./data.json');

console.log(data);
// { id: 1, name: 'Alice' }
```
