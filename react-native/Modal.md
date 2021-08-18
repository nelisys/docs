# Modal

```jsx
import React from 'react';
import { Modal, Text, View } from 'react-native';

export default function App() {
    return (
        <Modal
            visible
        >
            <View style={{ margin: 50, flex: 1, backgroundColor: '#ccc' }}>
                <Text>Modal Text</Text>
            </View>
        </Modal>
    );
}
```
