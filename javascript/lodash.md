# lodash

## import

```
const _ = require('lodash');
```

## _.set()

```javascript
let students = [];

_.set(students, '0.name', 'Alice');
_.set(students, '0.address.country', 'Thailand');

_.set(students, '1.name', 'Bob');

students;
// [
//   { name: 'Alice', address: { country: 'Thailand' } },
//   { name: 'Bob' }
// ]
```

## get()

`path` can be in dot notation format.

```javascript
const students = [
  { name: 'Alice', address: { country: 'Thailand' } },
  { name: 'Bob' }
];

_.get(students, '0.address.country');
// Thailand

_.get(students, '0.unknown', 'default');
// default
```
