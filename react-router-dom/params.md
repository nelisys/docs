# useParams

`path: 'products/:id'`

## component

```js
import { useParams } from 'react-router-dom';

function ProductShow() {
    const params = useParams();

    // params.id
}
```

## loader()

```js
export async function loader({params}) {
    // params.id
}
```
