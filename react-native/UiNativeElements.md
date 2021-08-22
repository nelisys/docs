# UI : React Native Elements

## Installation

```
yarn add react-native-elements
```

## jsx

```jsx
import React from 'react';
import { View } from 'react-native';
import { Button, CheckBox, Icon, Input, ListItem } from 'react-native-elements'

const App = () => {
    const students = [
        {id: 1, name: 'Alice'},
        {id: 2, name: 'Bob'},
    ];

    return (
        <View style={{ marginTop: 50, flex: 1 }}>
            <Input
                placeholder='name...'
            />

            <CheckBox
                title='Click Here'
                checked={true}
            />

            <Button
                title="Solid"
            />

            {students.map(s => (
                <ListItem key={s.id} bottomDivider>
                    <Icon type="font-awesome" name="cogs" />
                    <ListItem.Content>
                        <ListItem.Title>{s.id}</ListItem.Title>
                        <ListItem.Subtitle>{s.name}</ListItem.Subtitle>
                    </ListItem.Content>
                    <ListItem.Chevron />
                </ListItem>
                ))
            }
        </View>
    );
}

export default App;
```
