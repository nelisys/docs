# FlatList

```jsx
import React from 'react';
import { FlatList, StyleSheet, Text } from 'react-native';

export default function App() {
    const friends = [
        { id: 1, name: 'Alice' },
        { id: 2, name: 'Bob' },
        { id: 3, name: 'Chris' },
    ];

    return (
        <FlatList
            data={friends}
            renderItem={({item}) => {
                return <Text style={styles.textStyle}>
                    {item.name}
                </Text>;
            }}
        />
    );
}

const styles = StyleSheet.create({
    textStyle: {
        marginVertical: 50,
    }
});
```
