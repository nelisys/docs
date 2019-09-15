# JavaScript Array

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
