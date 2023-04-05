# useTransition

```jsx
import { useTransition as useNavigation } from '@remix-run/react';

function ItemForm() {
    const transition = useNavigation();
    const isSubmitting = navigation.state === 'submitting';

    return (
        <Form>
            <button
                type="submit"
                disabled={isSubmitting}
            >
                submit
            </button>
        </Form>
    );
}

transition.state
// - 'submitting';
// - 'idle'
```
