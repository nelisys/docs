# Object

sample Object data

## Object.keys

```javascript
let student = {
    id: 1,
    name: 'Alice',
    age: 15
}
```

use `Object.keys` to show Object keys

```javascript
console.log(Object.keys(student));

// [ 'id', 'name', 'age' ]

for (let key of keys) {
    console.log(key + ' = ' + student[key]);
}

// id = 1
// name = Alice
// age = 15
```

