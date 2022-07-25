# axios

```
npm install axios
```

## Instance

```js
import axios from 'axios';

const http = axios.create({
    baseURL: '',
    timeout: 5000,
    withCredentials: true,
    headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
});

export default http;
```
