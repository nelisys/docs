# UI : Native Paper

## Installation

```
yarn add react-native-paper
```

## jsx

```jsx
import * as React from 'react';
import { AppRegistry, View } from 'react-native';
import { DefaultTheme, Appbar, Provider as PaperProvider, Button, Card, Title, Paragraph, Checkbox } from 'react-native-paper';
import { name as appName } from './app.json';

const theme = {
    ...DefaultTheme,
    roundness: 0,
    colors: {
        ...DefaultTheme.colors,
        primary: '#ff00ff',
    },
};

export default function Main() {
    return (
        <PaperProvider theme={theme}>
            <Appbar.Header>
                <Appbar.BackAction />
                <Appbar.Content title="Title" subtitle="Subtitle" />
                <Appbar.Action icon="magnify" />
                <Appbar.Action icon="dots-vertical" />
            </Appbar.Header>
            <View style={{ marginTop: 50 }}>
                <Checkbox.Item label="Item" status="checked" />
                <Button icon="camera" mode="contained" onPress={() => console.log('Pressed')}>
                    Press me
                </Button>
                <Card>
                    <Card.Content>
                        <Title>Card title</Title>
                        <Paragraph>Card content</Paragraph>
                    </Card.Content>
                    <Card.Actions>
                        <Button>Cancel</Button>
                        <Button>Ok</Button>
                    </Card.Actions>
                </Card>
            </View>
        </PaperProvider>
    );
}

AppRegistry.registerComponent(appName, () => Main);
```
