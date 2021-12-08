# React Redux Toolkit

## install

```
$ npx create-react-app counter

$ cd counter/

$ npm install react-redux @reduxjs/toolkit
```

## create Slice

Create each Slice.

```javascript
// store/counterSlice.js
import { createSlice } from '@reduxjs/toolkit';

const counterSlice = createSlice({
    name: 'counter',
    initialState: {
        counter: 0,
        showCounter: true,
    },
    reducers: {
        increment(state) {
            state.counter++;
        },
        increase(state, action) {
            state.counter = state.counter + action.payload;
        },
        decrement(state) {
            state.counter--;
        },
        toggle(state) {
            state.showCounter = !state.showCounter;
        },
    },
});

export const counterActions = counterSlice.actions;
export default counterSlice;
```

## create Store

Combine many Slices to single Store

```javascript
// store/index.js
import { configureStore } from '@reduxjs/toolkit';
import counterSlice from './counterSlice';

const store = configureStore({
    reducer: {
        counter: counterSlice.reducer,
    }
});

export default store;
```

## Wrap App with Provider

Still wrap app with Provider the same.

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

```
// components/Counter.js
import React from 'react';
import { useSelector, useDispatch } from 'react-redux';
import { counterActions } from '../store/counterSlice';

function Counter() {
    const dispatch = useDispatch();
    const counter = useSelector(state => state.counter.counter);
    const showCounter = useSelector(state => state.counter.showCounter);

    function incrementHandler() {
        dispatch(counterActions.increment());
    }

    function increaseHandler() {
        dispatch(counterActions.increase(5));
    }

    function decrementHandler() {
        dispatch(counterActions.decrement());
    }

    function toggleHandler() {
        dispatch(counterActions.toggle());
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
