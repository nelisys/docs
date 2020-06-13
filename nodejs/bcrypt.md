# bcrypt

## npm installation

```console
$ npm install bcryptjs
```

## salt & hash

```javascript
const bcrypt = require('bcryptjs');

const password = 'secret';

bcrypt.genSalt(10)
    .then(salt => {
        console.log('salt = ' + salt);

        bcrypt.hash(password, salt)
            .then(hash => {
                console.log('hash = ' + hash);
            });
    });

// salt = $2a$10$Nak0.K71lpax.ofWSh/RXv
// hash = $2a$10$Nak0.K71lpax.ofWSh/RXvlBDKHZL2wzZCTmwmnZdDHZ38WXao3wq
```

## verify

```javascript
const bcrypt = require('bcryptjs');

const password = 'secret';

const hash = '$2a$10$Nak0.K71lpax.ofWSh/RXvlBDKHZL2wzZCTmwmnZdDHZ38WXao3wq';

bcrypt.compare(password, hash)
    .then(isMatch => {
        console.log(isMatch);
    });

// true
```
