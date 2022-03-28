# next/router

## import

```javascript
import { useRouter } from 'next/router';

const router = useRouter();
```

## Get [id]

```javascript
// /pages/products/[id].js

// http://example.com/products/5
router.query.id;     // 5
```

## Navigate

```javascript
router.push('/products/7');
```

or

```javascript
router.push({
    pathname: '/products/[id]',
    query: {
        id: 7
    }
});
```

## Get Query Parameters

Ex: http://localhost:3000/?q=alice

```js
import { useEffect } from 'react';
import { useRouter } from 'next/router';

function HomePage() {
    const router = useRouter();

    useEffect(() => {
        if (router.isReady) {
            console.log(router.query);
            // {q: 'alice'}
        }
    }, [router]);

    return (
        <>...</>
    );
}
```
