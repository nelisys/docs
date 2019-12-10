# jest

## install

```console
$ echo '{}' > package.json

$ npm install --save-dev jest

$ ls -l
drwxr-xr-x  372 supasin  staff   11904 Dec 10 17:14 node_modules
-rw-r--r--    1 supasin  staff  171069 Dec 10 17:14 package-lock.json
-rw-r--r--    1 supasin  staff      53 Dec 10 17:14 package.json

$ cat package.json
{
  "devDependencies": {
    "jest": "^24.9.0"
  }
}
```

## add scripts test

```console
$ vi package.json
{
  "scripts": {
    "test": "jest"
  },
  "devDependencies": {
    "jest": "^24.9.0"
  }
}
```

create file `sum.js`

```javascript
// sum.js
function sum(a, b) {
    return a + b;
}

module.exports = sum;
```

create file `sum.test.js`

```javascript
const sum = require('./sum');

test('adds 1 + 2 to equal 3', () => {
    expect(sum(1, 2)).toBe(3);
});
```

```console
$ npm run test

> @ test /Users/supasin/Sites/jest
> jest

 PASS  ./sum.test.js
  ✓ adds 1 + 2 = 3 (2ms)

Test Suites: 1 passed, 1 total
Tests:       1 passed, 1 total
Snapshots:   0 total
Time:        0.733s, estimated 1s
Ran all test suites.
```
