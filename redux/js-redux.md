# JS Redux

```
$ npm install redux
```

```
const redux = require('redux');

function counterReducer(state = { counter: 0 }, action) {
    if (action.type == 'increment') {
        return { counter: state.counter + 1 };
    }

    return state;
}

const store = redux.createStore(counterReducer);

function counterSubscriber() {
    const latestState = store.getState();
    console.log('latestState =', latestState);
}

store.subscribe(counterSubscriber);

store.dispatch({type: 'increment'});
// latestState = { counter: 1 }

store.dispatch({type: 'increment'});
// latestState = { counter: 2 }
```
