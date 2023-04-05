# loader()

handle GET request

```jsx
import { useLoaderData } from '@remix-run/react';

export default function ItemsPage() {
    const items = useLoaderData();
}

export async function loader({params}) {
    // params from dynamic route
    // ex: /routes/items/$itemId.jsx
    params.itemId

    const items = await getItems();
    return items;

    // throw text, catched by 'ErrorBoundary()'
    throw 'Some Error';

    // throw json, catched by 'CatchBoundary()'
    throw json(
        {
            message: 'could not be found.',
        },
        {
            status: 404,
            statusText: 'Not Found',
        },
    );
}
```
