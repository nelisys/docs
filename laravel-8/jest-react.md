# Jest React

## Installation

Install `jest`

```
$ npm install --save-dev jest
```

Modify `package.json`

```
package.json
    "scripts": {
        ...
        "test": "jest"
```

Create `babel.config.js`

```
module.exports = {
    presets: ['@babel/preset-env', '@babel/preset-react'],
};
```

## Example

```javascript
// resources/js/StudentList.js
import React from 'react';

function StudentList(props) {
    let students_count = props.students.length;

    if (students_count == 0) {
        return (
            <div>Student List : no students.</div>
        );
    }

    return (
        <div>Student List : {students_count} students.</div>
    );
}
```

```javascript
// resources/js/StudentList.test.js
import React from 'react';
import { render, unmountComponentAtNode } from 'react-dom';
import { act } from 'react-dom/test-utils';

import StudentList from './StudentList';

let container = null;

beforeEach(() => {
    container = document.createElement('div');
    document.body.appendChild(container);
});

afterEach(() => {
    unmountComponentAtNode(container);
    container.remove();
    container = null;
});

it('renders no students.', () => {
    act(() => {
        render(<StudentList students={[]} />, container);
    });
    expect(container.textContent).toBe('Student List : no students.');
});

it('renders list of students.', () => {
    const students = [
        { id: 1, name: 'Alice' },
        { id: 2, name: 'Bob' },
        { id: 3, name: 'Bob' },
    ];

    act(() => {
        render(<StudentList students={students} />, container);
    });

    expect(container.textContent).toBe('Student List : 3 students.');
});
```
