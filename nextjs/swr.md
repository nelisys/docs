# swr

```
$ npm install swr
```

```js
import useSWR from 'swr';
import axios from 'axios';

function fetcher(url) {
    return axios(url).then(response => {
        return response.data;
    });
}

function HomePage() {
    const { data, error } = useSWR('/api/items', fetcher);

    if (error) {
        return <p>failed</p>;
    }

    if (! data) {
        return <p>loading</p>;
    }

    const items = data.data;

    // ...
}
```
