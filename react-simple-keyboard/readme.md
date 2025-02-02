# react-simple-keyboard

## Installation

```
npm install -D react-simple-keyboard
```

## React

```jsx
import { useState } from 'react';
import Keyboard from 'react-simple-keyboard';
import 'react-simple-keyboard/build/css/index.css';

export default function MyKeyboard(props) {
    const [layoutName, setLayoutName] = useState('default');

    function onChangeHandler(value) {
        // props.onChange(value);
    }

    function onKeyPressHandler(button) {
        if (button == '{shift}' || button == '{lock}') {
            setLayoutName(layoutName === 'default' ? 'shift' : 'default');
        }
    }

    return (
        <Keyboard
            onChange={onChangeHandler}
            layoutName={layoutName}
            onKeyPress={onKeyPressHandler}
        />
    );
}
```
