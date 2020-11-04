# Redux

```
$ npm install --save redux
```

## Actions

```javascript
// actions.js
const addStudent = (name, fee) => {
    return {
        type: 'ADD_STUDENT',
        payload: {
            name: name,
            fee: fee,
        }
    };
};

const removeStudent = (name) => {
    return {
        type: 'REMOVE_STUDENT',
        payload: {
            name: name,
        }
    };
};

module.exports = { addStudent, removeStudent };
```

## Reducers

```javascript
// reducers.js
const students = (listOfStudents = [], action) => {
    if (action.type === 'ADD_STUDENT') {
        return [...listOfStudents, action.payload.name];
    }

    if (action.type === 'REMOVE_STUDENT') {
        return listOfStudents.filter(name => {
            return name !== action.payload.name;
        });
    }

    return listOfStudents;
};

const accounting = (balance = 0, action) => {
    if (action.type === 'ADD_STUDENT') {
        return balance + action.payload.fee;
    }

    return balance;
};

module.exports = { students, accounting };
```

## Redux

```javascript
// index.js
const { createStore, combineReducers } = require('redux');

const { addStudent, removeStudent } = require('./actions');
const { students, accounting } = require('./reducers');

const departments = combineReducers({ students, accounting });
const store = createStore(departments);

console.log(store.getState());
// { students: [], accounting: 0 }

store.dispatch(addStudent('Alice', 100));
console.log(store.getState());
// { students: [ 'Alice' ], accounting: 100 }

store.dispatch(addStudent('Bob', 110));
console.log(store.getState());
// { students: [ 'Alice', 'Bob' ], accounting: 210 }

store.dispatch(removeStudent('Alice'));
console.log(store.getState());
// { students: [ 'Bob' ], accounting: 210 }
```
