# React Navigation

## Installation

```
yarn add @react-navigation/native

expo install react-native-screens react-native-safe-area-context

yarn add @react-navigation/native-stack
```

## jsx

```jsx
import React from 'react';
import { Button, Text, View } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

const HomeScreen = (props) => {
    return (
        <View>
            <Text>Home Screen...</Text>
            <Button
                title="Go to Details"
                onPress={() => {
                    props.navigation.navigate('Details', {
                        id: 1,
                        name: 'Alice',
                    })
                }}
            />
        </View>
    );
}

const DetailsScreen = (props) => {
    const { id, name } = props.route.params;

    return (
        <View>
            <Text>Details Screen : {id} {name}</Text>
            <Button
                title="Go back"
                onPress={() => props.navigation.goBack()}
            />
        </View>
    )
}

const Stack = createNativeStackNavigator();

const App = () => {
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName="Home">
                <Stack.Screen
                    name="Home"
                    component={HomeScreen}
                    options={{
                        title: 'Overview',
                        headerStyle: {
                            backgroundColor: '#f4511e',
                        },
                        headerTintColor: '#fff',
                        headerTitleStyle: {
                            fontWeight: 'bold',
                        },
                        headerRight: () => (
                            <Button
                                onPress={() => alert('This is a button!')}
                                title="+"
                                color="#fff"
                            />
                        ),
                    }}
                />
                <Stack.Screen
                    name="Details"
                    component={DetailsScreen}
                    options={({ route }) => ({
                        title: `Details : ${route.params.name}`,
                    })}
                />
            </Stack.Navigator>
        </NavigationContainer>
    );
}

export default App;
```
