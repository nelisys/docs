# Next.js modules

## Link

```javascript
import Link from 'next/link';

//
<Link href="/">
    <a className="btn btn-primary">
        home
    </a>
</Link>
```

## useRouter

```javascript
// /pages/events/[id].js
import { useRouter } from 'next/router';

// http://example.com/events/5
const router = useRouter();
const id = router.query.id;     // 5
```
