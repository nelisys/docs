# string

## replace

```javascript
let a = 'hello world';

a.replace('hello ', '');
// world
```

with regular expression

```javascript
'hello'.replace(/lo$/, '');
```

## upper case

```javascript
str.toUpperCase();
```

## match

```javascript
const txt = 'Hello World';

console.log(txt.match(/Ello/));
// null

console.log(txt.match(/El.o/i));
// [ 'ello', index: 1, input: 'Hello World', groups: undefined ]
```
