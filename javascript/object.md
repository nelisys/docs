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

## Object destructuring

```javascript
const student = {
    id: 1,
    name: 'Alice',
    age: 15
}

const {name, age} = student;

// name = Alice
// age = 15
```

## Copy Object

### = operator

```javascript
const alice = {
    id: 1,
    name: 'Alice'
};

const bob = alice;

console.log(bob);
// { id: 1, name: 'Alice' }

bob.name = 'Bob';

console.log(bob);
// { id: 1, name: 'Bob' }

console.log(alice);
// { id: 1, name: 'Bob' }
```

### Object.assign()

```javacript
const alice = {
    id: 1,
    name: 'Alice'
};

const bob = Object.assign({}, alice, {id: 2});

console.log(bob);
// { id: 2, name: 'Alice' }

bob.name = 'Bob';

console.log(bob);
// { id: 2, name: 'Bob' }

console.log(alice);
// { id: 1, name: 'Alice' }
```

## Adding Property

### .property

```javascript
const student = { id: 1, name: 'Alice' };

student.age = 15;
console.log(student);
// { id: 1, name: 'Alice', age: 15 }
```

### ... : no mutation

```javascript
const student = { id: 1, name: 'Alice' };

console.log({ ...student, age: 15 });
// { id: 1, name: 'Alice', age: 15 }

console.log(student);
// { id: 1, name: 'Alice' }
```

## Updating Property

### .property

```javascript
const student = { id: 1, name: 'Alice' };

student.name = 'NewAlice';
console.log(student);
// { id: 1, name: 'NewAlice' }
```

### ... : no mutation

```javascript
const student = { id: 1, name: 'Alice' };

console.log({ ...student, name: 'NewAlice' });
// { id: 1, name: 'NewAlice' }

console.log(student);
// { id: 1, name: 'Alice' }
```

## Removing Property

### delete()

```javascript
const student = { id: 1, name: 'Alice' };

delete student.name;
console.log(student);
// { id: 1 }
```

### ... : no mutation

```javascript
const student = { id: 1, name: 'Alice' };

console.log({ ...student, name: undefined });
// { id: 1, name: undefined }

console.log(student);
// { id: 1, name: 'Alice' }
```
