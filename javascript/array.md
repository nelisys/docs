# JavaScript Array

## create array

let a = Array(3);
// [ <3 empty items> ]

## fill array

a.fill(1);
// [ 1, 1, 1 ]

## map

```javascript
let a = [1, 2, 3];

a.map(x => x * 2)
// [ 2, 4, 6 ]
```

## filter

```javascript
let students = [
    { name: 'Alice', age: 14 },
    { name: 'Bob', age: 16 },
    { name: 'Chris', age: 18 },
];

console.log(students.filter(student => {
    return student.age > 15;
}));

// [ { name: 'Bob', age: 16 }, { name: 'Chris', age: 18 } ]
```

## find

```javascript
const students = [
  { id: 1, name: 'Alice' },
  { id: 2, name: 'Bob' },
  { id: 3, name: 'Chris' },
];

console.log(students.find(student => student.id == 2));

// { id: 2, name: 'Bob' }
```

## in array

### indexOf() ES5

```javascript
let students = ['Alice', 'Bob', 'Chris', 'Dan'];

console.log(students.indexOf('Chris'));
// 2

console.log(students.indexOf('Eric'));
// -1
```

### includes() ES7

```javascript
let students = ['Alice', 'Bob', 'Chris', 'Dan'];

students.includes('Bob');
// true

students.includes('Dan');
// false
```

## sort array

```javascript
let students = ['Dan', 'Alice', 'Bob', 'Chris'];

students.sort();
// [ 'Alice', 'Bob', 'Chris', 'Dan' ]
```

## sort array of object

```javascript
let students = [
    {name: 'Bob'},
    {name: 'Dan'},
    {name: 'Eric'},
    {name: 'Alice'},
    {name: 'Chris'},
];

students.sort((b, a) => {
    if (a.name < b.name) {
        return 1;
    }

    if (a.name > b.name) {
        return -1;
    }

    return 0;
});

// students
//     {name: "Alice"}
//     {name: "Bob"}
//     {name: "Chris"}
//     {name: "Dan"}
//     {name: "Eric"}
```

## splice

```javascript
let students = ['Alice', 'Bob', 'Chris', 'Dan'];

students.splice(2, 1);

console.log(students);
// [ 'Alice', 'Bob', 'Dan' ]
```

## concat

```javascript
let a = [1, 2, 3];
let b = [4, 5];

console.log(a.concat(b));
// [ 1, 2, 3, 4, 5 ]
```

## explode

```javascript
let a = '1 2 3';

a.split(' ');
// [1, 2, 3];
```

split by multiple spaces

```javascript
a.split(/\s+/);
```

## implode

```javascript
let students = ['Alice', 'Bob', 'Chris', 'Dan'];

students.join(', ');
// Alice, Bob, Chris, Dan
```

## Adding Element

### push()

```javascript
const students = ['Alice', 'Bob'];

students.push('Chris');
console.log(students);
// [ 'Alice', 'Bob', 'Chris' ]
```

### ... : no mutation

```javascript
const students = ['Alice', 'Bob'];

console.log([...students, 'Chris']);
// [ 'Alice', 'Bob', 'Chris' ]

console.log(students);
// [ 'Alice', 'Bob' ]
```

## Updating Element

### [index]

```javascript
const students = ['Alice', 'Bob', 'Chris'];

students[1] = 'NewBob';
console.log(students);
// [ 'Alice', 'NewBob', 'Chris' ]
```

### map() : no mutation

```javascript
const students = ['Alice', 'Bob', 'Chris'];

console.log(students.map(student => student === 'Bob' ? 'NewBob' : student));
[ 'Alice', 'NewBob', 'Chris' ]

console.log(students);
[ 'Alice', 'Bob', 'Chris' ]
```

## Removing Element

### pop()

```javascript
const students = ['Alice', 'Bob', 'Chris'];

students.pop();
console.log(students);
// [ 'Alice', 'Bob' ]
```

### filter() : no mutation

```javascript
const students = ['Alice', 'Bob', 'Chris'];

console.log(students.filter(student => student != 'Bob'));
// [ 'Alice', 'Chris' ]

console.log(students);
// [ 'Alice', 'Bob', 'Chris' ]
```
