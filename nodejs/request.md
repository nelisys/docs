# request

```console
$ npm install request
```

```javascript
const request = require('request');

const options = {
    uri: 'https://api.github.com/users/github',
    method: 'GET',
    headers: {
        'user-agent': 'node.js'
    }
}

request(options, (error, response, body) => {
    if (error) {
        console.log(error);
        return;
    }

    if (response.statusCode != 200) {
        console.log('No github profile found');
        return;
    }

    console.log(body);
});
```
