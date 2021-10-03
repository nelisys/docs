# Mock Service Worker

## Installation

```
npm install --save-dev msw
```

```javascript
// resources/js/mocks/handlers.js
import { rest } from 'msw';

export const handlers = [
    rest.get('/students', (req, res, ctx) => {
        return res(
            ctx.json([
                { id: 1, name: 'Alice' },
                { id: 2, name: 'Bob' },
                { id: 3, name: 'Chris' },
            ])
        );
    }),
];
```

```javascript
// resources/js/mocks/server.js
import { setupServer } from 'msw/node'
import { handlers } from './handlers'

export const server = setupServer(...handlers)
```

```javascript
// resources/js/setupTests.js
import '@testing-library/jest-dom';

import { server } from './mocks/server.js'

// Establish API mocking before all tests.
beforeAll(() => server.listen());

// Reset any request handlers that we may add during the tests,
// so they don't affect other tests.
afterEach(() => server.resetHandlers());

// Clean up after the tests are finished.
afterAll(() => server.close());
```

## Test Example

```javascript
import React from 'react';
import { render, screen } from '@testing-library/react';
import StudentList from './StudentList';

test('render students', async () => {
    render(<StudentList />);

    const students = await screen.findAllByRole('listitem')

    // 3 = number of students defined in 'handlers.js'
    expect(students).toHaveLength(3);
});
```

```javascript
import React, { useEffect, useState } from 'react';
import axios from 'axios';

function StudentList() {
    const [students, setStudents] = useState([]);

    useEffect(() => {
        axios.get('/students')
            .then(response => {
                setStudents(response.data);
            });
    }, []);

    return (
        <ul>
            {students.map(student => (
                <li key={student.id}>
                    {student.name}
                </li>
            ))}
        </ul>
    );
}

export default StudentList;
```
