# json

## stringify

```javascript
var a = ['a', 'b', 'c'];

JSON.stringify(a);
// ["a","b","c"]
```

```js
// add indent with 2 spaces
JSON.stringify(a, null, 2);
```

## parse

```javascript
var s = '["a","b","c"]';

JSON.parse(s);
// ["a", "b", "c"]
```
