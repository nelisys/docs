# useState

```javascript
import { useState } from 'react';

function ProductCreate() {
    const [isLoading, setIsLoading] = useState(true);

    // ...
    setIsLoading(false);

    return (
        <div>
            {isLoading ? 'loading...' : 'done.'}
        </div>
    );
```
