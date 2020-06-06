# Module

## exports

`helpers.js`

```javascript
// helpers.js
const name = 'Alice';

function say()
{
    return 'Hello';
}

exports.name = name;
exports.say = say;
```

## module.exports

`helpers.js`

```javascript
// helpers.js
const name = 'Alice';

function say()
{
    return 'Hello';
}

module.exports = {
    name,
    say,
}
```

## module

`helpers.js`

```javascript
// ...

console.log(module);
// Module {
//   id: '.',
//   exports: { name: 'Alice', say: [Function: say] },
//   ...
```

## require

`test-module.js`

```javascript
// test-module.js
const helpers = require('./helpers');

console.log(helpers);
// { name: 'Alice', say: [Function: say] }

console.log(helpers.name);
// Alice

console.log(helpers.say());
// Hello
```
