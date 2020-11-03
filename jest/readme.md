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
