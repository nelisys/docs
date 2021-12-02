# React Redux

## install

```
$ npx create-react-app counter

$ cd counter/

$ npm install redux react-redux
```

## create store

Use `createStore`

```javascript
// store/index.js
import { createStore } from 'redux';

const initialState = { counter: 0, showCounter: true };

const counterReducer = (state = initialState, action) => {
    if (action.type === 'increment') {
        return {
            ...state,
            counter: state.counter + 1,
        }
    }

    if (action.type === 'increase') {
        return {
            ...state,
            counter: state.counter + action.amount,
        }
    }

    if (action.type === 'decrement') {
        return {
            ...state,
            counter: state.counter - 1,
        }
    }

    if (action.type === 'toggle') {
        return  {
            ...state,
            showCounter: ! state.showCounter,
        }
    }

    return state;
}

const store = createStore(counterReducer);

export default store;
```

## Wrap App with Provider

Use `Provider` to wrap `<App />`

```
// index.js
import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';

import App from './App';
import store from './store/index';

ReactDOM.render(
    <Provider store={store}>
        <App />
    </Provider>,
    document.getElementById('root')
);
```

## components

- Use `useDispath` to call dispatch function
- Use `useSelector` to access store's state

```
import React from 'react';
import { useSelector, useDispatch } from 'react-redux';

function Counter() {
    const dispatch = useDispatch();
    const counter = useSelector(state => state.counter);
    const showCounter = useSelector(state => state.showCounter);

    function incrementHandler() {
        dispatch({ type: 'increment' });
    }

    function increaseHandler() {
        dispatch({ type: 'increase', amount: 5 });
    }

    function decrementHandler() {
        dispatch({ type: 'decrement' });
    }

    function toggleHandler() {
        dispatch({ type: 'toggle' });
    }

    return (
        <>
            <h1>Counter</h1>
            {showCounter && (
                <div>{counter}</div>
            )}
            <button onClick={incrementHandler}>
                increment
            </button>{' '}
            <button onClick={increaseHandler}>
                increase by 5
            </button>{' '}
            <button onClick={decrementHandler}>
                decrement
            </button>{' '}
            <button onClick={toggleHandler}>
                toggle
            </button>
        </>
    );
}

export default Counter;
```
