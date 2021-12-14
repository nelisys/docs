# next/router

## router.query

```javascript
// /pages/products/[id].js
import { useRouter } from 'next/router';

// http://example.com/products/5
const router = useRouter();
router.query.id;     // 5
```

## router.push

```
router.push('/products/7');
```

or

```
router.push({
    pathname: '/products/[id]',
    query: {
        id: 7
    }
});
```
