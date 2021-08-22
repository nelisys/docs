# Notifications

## Install

```
expo install expo-notifications

expo install expo-permissions
```

## Edit app.json for Android

```json
{
  "expo": {
    ...
    "android": {
      ...
      "useNextNotificationsApi": true
    },
```

## jsx

```jsx
import React, { useEffect } from 'react';
import { Button, View } from 'react-native';
import * as Notifications from 'expo-notifications';
import * as Permissions from 'expo-permissions';

Notifications.setNotificationHandler({
    handleNotification: async () => {
        return {
            shouldShowAlert: true,
        };
    }
})

export default function App() {
    useEffect(() => {
        Permissions.getAsync(Permissions.NOTIFICATIONS)
            .then((statusObj) => {
                console.log(statusObj.status);

                if (statusObj.status !== 'granted') {
                    return Permissions.askAsync(Permissions.NOTIFICATIONS);
                }

                return statusObj;
            })
            .then((statusObj) => {
                if (statusObj.status !== 'granted') {
                    return;
                }
            })
    }, []);

    const notifyHandler = () => {
        Notifications.scheduleNotificationAsync({
            content: {
                title: 'Title',
                body: 'Body',
            },
            trigger: {
                seconds: 10,
            }
        })
    }

    return (
        <View style={{marginTop: 50}}>
            <Button
                title="notify"
                onPress={notifyHandler}
            />
        </View>
    );
}
```
