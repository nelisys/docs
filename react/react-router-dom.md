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

Test with `http://localhost:3000/?q=alice`

```js
// App.js
import { useLocation } from 'react-router-dom';

function App() {
    console.log(useLocation());
    // {pathname: '/', search: '?q=alice', hash: '', state: null, key: 'default'}

    console.log(useLocation().search);
    // ?q=alice

    console.log(new URLSearchParams(useLocation().search));
    // URLSearchParams {}

    const search = new URLSearchParams(useLocation().search);
    console.log(search.get('q'));
    // alice

    return (
        <>
            ...
        </>
    );
}

export default App;
```
