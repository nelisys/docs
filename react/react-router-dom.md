# react-router-dom

## index.js

```js
// index.js
import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import App from './App';

ReactDOM.render(
    <BrowserRouter>
        <App />
    </BrowserRouter>,
    document.getElementById('root')
);
```

## App.js

```js
// App.js
import { useLocation } from 'react-router-dom';

function App() {
    const search = new URLSearchParams(useLocation().search);
    const q = search.get('q');

    console.log('q =', q);

    return (
        <>
            q = { q }
        </>
    );
}

export default App;
```

## Output

```
http://localhost:3000/?q=alice
// q = alice
```
