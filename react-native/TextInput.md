# TextInput

```jsx
import React, { useState } from 'react';
import { Keyboard, Text, TextInput, TouchableWithoutFeedback, View } from 'react-native';

export default function App() {
    const [name, setName] = useState('');

    const onEndEditingHandler = (value) => {
        // submit?
    }

    return (
        <TouchableWithoutFeedback
            onPress={() => {Keyboard.dismiss()}}
        >
            <View style={{ marginTop: 50, flex: 1 }}>
                <TextInput
                    value={name}
                    onChangeText={text => setName(text)}
                    onEndEditing={onEndEditingHandler}
                    keyboardType="numeric"
                    maxLength="4"
                    autoCapitalize="none"
                    autoCorrect={false}
                    blurOnSubmit
                    placeholder="Enter ..."
                    style={{
                        borderColor: '#cccccc',
                        borderWidth: 1,
                        height: 50,
                        fontSize: 20,
                    }}
                />
                <Text>Name: {name}</Text>
            </View>
        </TouchableWithoutFeedback>
    );
}
```
