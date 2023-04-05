# action()

handle not-GET request

```jsx
import { useActionData } from '@remix-run/react';

export default function ItemsPage() {
    // get data returning from action()
    const actionData = useActionData();
}

export async function action({request}) {
    const formData = request.formData();

    // 1. get each form field
    const title = formData.get('title');
    const body = formData.get('body');

    // 2. get all form fields
    const data = Object.fromEntries(formData);

    data.title;
    data.body;

    // validation
    if (title.length < 5) {
        return {
            message: 'too short',
        };
    }
}
```
