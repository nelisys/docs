# jwt

## npm installation

```console
$ npm install jsonwebtoken
```

## jwt.sign()

```javascript
const jwt = require('jsonwebtoken');

const payload = {
    user: {
        id: 1,
        name: 'Alice'
    }
};

const jwtSecret = 'secret';
const jwtOptions = {
    expiresIn: 3600,    // 1 hour
};

const jwtCallback = (error, token) => {
    if (error) throw error;

    console.log('token = ' + token);
}

jwt.sign(
    payload,
    jwtSecret,
    jwtOptions,
    jwtCallback,
);

// console.log
// token = eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2...
```

## jwt.verify()

```javascript
const jwt = require('jsonwebtoken');

const jwtSecret = 'secret';
const token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2...'

const decoded = jwt.verify(token, jwtSecret);

console.log(decoded);

// {
//     user: {
//         id: 1,
//         name: 'Alice'
//     },
//     iat: 1592059188,
//     exp: 1592062788
// }
```
