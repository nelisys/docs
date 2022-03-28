# Context

## AppContext.js

```jsx
// resources/js/contexts/AppContext.js
import React, { createContext, useState } from 'react';

const AppContext = createContext({
    user: {},
});

export function AppContextProvider(props) {
    const [user, setUser] = useState({id: 1, name: 'Alice'});
    const ctxValue = {
        user: user
    };

    return (
        <AppContext.Provider value={ctxValue}>
            {props.children}
        </AppContext.Provider>
    );
}

export default AppContext;
```

## app.js

```jsx
// resources/js/app.js
import { AppContextProvider } from './contexts/AppContext';

// ...
ReactDOM.render((
    <AppContextProvider>
        <BrowserRouter>
            <App />
        </BrowserRouter>
    </AppContextProvider>
), document.getElementById('root'));
```

## useContext

```jsx
// resources/js/pages/HomePage.js
import React, { useContext } from 'react';
import AppContext from '../contexts/AppContext';

const HomePage = () => {
    const ctx = useContext(AppContext);

    return (
        <div>
            Hi {ctx.user.id} : {ctx.user.name}
        </div>
    );
}

export default HomePage;
```

