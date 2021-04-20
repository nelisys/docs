# React Testing Library

## Installation

```
npm install --save-dev @testing-library/react @testing-library/jest-dom
```

```javascript
// ./jest.config.js
module.exports = {
    testRegex: 'resources/js/tests/.*.test.js$',
    verbose: false,
    setupFilesAfterEnv: [
        './resources/js/tests/setupTests.js',
    ],
}
```

```javascript
// ./resources/js/tests/setupTests.js
import '@testing-library/jest-dom';
```

## Test File

```javascript
// ./resources/js/tests/App.test.js
import React from 'react';
import { render, screen } from '@testing-library/react';
import App from '../App';

test('renders learn react link', () => {
  render(<App />);
  const linkElement = screen.getByText(/learn react/i);
  expect(linkElement).toBeInTheDocument();
});
```

```
$ jest
```
