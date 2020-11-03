# Jest

## Installation

```
npm install --save-dev jest
```

Edit `package.json`

```json
{
  "scripts": {
    "test": "jest"
  }
}
```

## Basic Test

```javascript
// sum.js
function sum(a, b) {
    return a + b;
}

module.exports = sum;
```

```javascript
// sum.test.js
const sum = require('./sum');

test('adds 1 + 2 to equal 3', () => {
    expect(sum(1, 2)).toBe(3);
});
```

```
$ npm run test
```

## ES6 Import

```
npm install --save-dev babel-jest @babel/core @babel/preset-env
```

Create `babel.config.js` or edit `package.json`;

`babel.config.js`

```javascript
// babel.config.js
module.exports = {
  presets: [
    [
      '@babel/preset-env',
      {
        targets: {
          node: 'current',
        },
      },
    ],
  ],
};
```

Edit `package.json`

```json
{
  "devDependencies": {
    "@babel/core": "^7.12.3",
    "@babel/preset-env": "^7.12.1",
    "babel-jest": "^26.6.2",
    "jest": "^26.6.2"
  },
  "scripts": {
    "test": "jest"
  },
  "babel": {
    "presets": [
      [
        "@babel/preset-env",
        {
          "targets": {
            "node": "current"
          }
        }
      ]
    ]
  }
}
```

Run test.

```
$ npm run test
```

## React

```
$ npm install --save-dev react react-dom

$ npm install --save-dev @babel/preset-react
```

`package.json`

```json
{
  "devDependencies": {
    "@babel/core": "^7.12.3",
    "@babel/preset-env": "^7.12.1",
    "@babel/preset-react": "^7.12.1",
    "babel-jest": "^26.6.2",
    "jest": "^26.6.2",
    "react": "^17.0.1",
    "react-dom": "^17.0.1"
  },
  "scripts": {
    "test": "jest"
  },
  "babel": {
    "presets": ["@babel/preset-env", "@babel/preset-react"]
  }
}
```

```javascript
// Hello.js
import React from 'react';

function Hello(props) {
    if (! props.name) {
        return <span>Hi Guest</span>
    }

    return <span>Hello {props.name}</span>
}

export default Hello;
```

```javascript
// Hello.test.js
import React from 'react';
import { render, unmountComponentAtNode } from "react-dom";
import { act } from 'react-dom/test-utils';

import Hello from './Hello';

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

it('renders Hello', () => {
    // case 1
    act(() => {
        render(<Hello />, container);
    });

    expect(container.textContent).toBe('Hi Guest');

    // case 2
    act(() => {
        render(<Hello name="Alice" />, container);
    });

    expect(container.textContent).toBe('Hello Alice');
});
```

```
$ npm run test
```
