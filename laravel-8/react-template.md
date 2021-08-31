# React Template

## Features

- Bootstrap
- Nav
- Routes
- Context

## package.json

```json
{
    ...
    "devDependencies": {
        "@babel/preset-react": "^7.14.5",
        "@popperjs/core": "^2.9.3",
        "axios": "^0.21",
        "bootstrap": "^5.1.0",
        "laravel-mix": "^6.0.6",
        "lodash": "^4.17.19",
        "postcss": "^8.1.14",
        "react": "^17.0.2",
        "react-dom": "^17.0.2",
        "react-router-dom": "^5.2.1",
        "resolve-url-loader": "^4.0.0",
        "sass": "^1.38.2",
        "sass-loader": "^12.1.0"
    }
}
```

## app.js

```jsx
// resources/js/app.js
require('./bootstrap');

import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import { AppContextProvider } from './contexts/AppContext';
import Nav from './Nav';
import Routes from './Routes';

function App() {
    return (
        <>
            <Nav />
            <div className="container-fluid">
                <Routes />
            </div>
        </>
    );
}

ReactDOM.render((
    <AppContextProvider>
        <BrowserRouter>
            <App />
        </BrowserRouter>
    </AppContextProvider>
), document.getElementById('root'));
```

## bootstrap.js

```jsx
// resources/js/bootstrap.js
require('bootstrap');
```

## AppContext.js

```jsx
// resources/js/contexts/AppContext.js
import React, { createContext, useState } from 'react';

const AppContext = createContext({
    user: {},
    onLogin: () => {},
    onLogout: () => {},
});

export const AppContextProvider = (props) => {
    const [user, setUser] = useState({});

    const onLoginHandler = () => {
        setUser({
            id: 1,
            name: 'Alice',
        })
    }

    const onLogoutHandler = () => {
        setUser({});
    }

    const ctxValue = {
        user: user,
        onLogin: onLoginHandler,
        onLogout: onLogoutHandler,
    };

    return (
        <AppContext.Provider value={ctxValue}>
            {props.children}
        </AppContext.Provider>
    );
}

export default AppContext;
```

## Nav.js

```jsx
// resources/js/Nav.js
import React from 'react';
import { Link } from 'react-router-dom';

const Nav = () => {
    return (
        <nav>
            ....
            <Link to="/" className="nav-link">
                home
            </Link>
        </nav>
    );
}

export default Nav;
```

## Routes.js

```jsx
// resources/js/Routes.js
import { Route, Switch } from 'react-router-dom';
import HomePage from './pages/HomePage';
import AboutPage from './pages/AboutPage';
import NotFoundPage from './pages/NotFoundPage';

const Routes = () => {
    return (
        <Switch>
            <Route path="/" exact>
                <HomePage />
            </Route>
            <Route path="/about">
                <AboutPage />
            </Route>
            <Route component={NotFoundPage} />
        </Switch>
    );
}

export default Routes;
```

## HomePage.js

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

## LoginPage.js

```jsx
// resources/js/pages/LoginPage.js
import React, { useContext } from 'react';
import AppContext from '../contexts/AppContext';

const LoginPage = () => {
    const ctx = useContext(AppContext);

    return (
        <div>
            <button type="button" onClick={ctx.onLogin}>
                login
            </button>
        </div>
    );
}

export default LoginPage;
```

## NotFoundPage.js

```jsx
// resources/js/pages/LoginPage.js
import React from 'react';

const NotFoundPage = () => {
    return (
        <div>NotFound!</div>
    );
}

export default NotFoundPage;
```

