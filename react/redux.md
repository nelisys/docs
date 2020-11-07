# React Redux

```
$ npx create-react-app students

$ cd students/

$ npm install --save redux react-redux
```

```
$ mkdir components

$ mkdir actions

$ mkdir Reducers
```

```javascript
// src/index.js
import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider } from 'react-redux';

import App from './components/App';
import reducers from './reducers';

ReactDOM.render(
  <Provider store={createStore(reducers)}>
    <App />
  </Provider>,
  document.getElementById('root')
);
```

```javascript
// src/components/App.js
function App() {
  return (
    <div>
      ...
    </div>
  );
}

export default App;
```

```javascript
// src/reducers/index.js
import { combineReducers } from 'redux';

export default combineReducers({
    dummy: () => 'dummy'
});
```
