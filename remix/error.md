# Error in root.jsx

## CatchBoundary

- handle 404

```jsx
import { useCatch } from '@remix-run/react';

export function CatchBoundary() {
    const caughtResponse = useCatch();

    caughtResponse.statusText;
    caughtResponse.data.message;
}
```

## ErrorBoundary

- handle `throw`

```jsx
export function ErrorBoundary({error}) {
    return (
        <html>
            <body>
                {error.message}
            </body>
        </html>
    );
}
```
