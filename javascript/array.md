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

## in array

```javascript
let students = ['Alice', 'Bob', 'Chris'];

students.includes('Bob');
// true

students.includes('Dan');
// false
```

## sort

```javascript
let students = ['Dan', 'Alice', 'Bob', 'Chris'];

students.sort();
// [ 'Alice', 'Bob', 'Chris', 'Dan' ]
```

## indexOf()

```javascript
let students = ['Alice', 'Bob', 'Chris', 'Dan'];

console.log(students.indexOf('Chris'));
// 2

console.log(students.indexOf('Eric'));
// -1
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
