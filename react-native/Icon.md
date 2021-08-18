# Icon

```jsx
import React from 'react';
import { View } from 'react-native';
import { Feather } from '@expo/vector-icons';

export default function App() {
    return (
        <View style={{ marginTop: 50 }}>
            <Feather
                name="search"
                style={{fontSize: 30}}
            />
        </View>
    );
}
```
