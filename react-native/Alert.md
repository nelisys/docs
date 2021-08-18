# Alert

```jsx
import { Alert } from 'react-native';

export default function App() {
    const handler = () => {
        // ...
    }

    Alert.alert(
        'Warning message!',
        'Please check your input.',
        [
            {
                text: 'Ok',
                style: 'destructive',
                onPress: handler,
            }
        ]
    );

    return null;
}
```
