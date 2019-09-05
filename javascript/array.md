# JavaScript Array

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
