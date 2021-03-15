# React Bootstrap

[Install Bootstrap](bootstrap.md)

```
$ npm install --save-dev react-bootstrap
```

```
// resources/js/app.js
import React from 'react';
import ReactDOM from 'react-dom';
import { Button } from 'react-bootstrap';

function App() {
    return (
        <div>
            <h1>App</h1>
            <Button>Submit</Button>
        </div>
    );
}
```
