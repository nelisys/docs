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
