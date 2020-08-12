# react

## installation

```console
$ npx create-react-app my-react

$ cd my-react/

$ ls -1F
README.md
node_modules/
package.json
public/
src/
yarn.lock

$ yarn start
```

## basic template

```javascript
// src/index.js
import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

ReactDOM.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
  document.getElementById('root')
);
```

```javascript
// src/App.js
import React from 'react';

class App extends React.Component {
    //
    constructor(props) {
        super(props);

        this.state = { id: null, name: '' };
    }

    // or short version
    // state = { id: null, name: '' };

    componentDidMount() {
        this.setState({
            name: 'alice'
        });
    }

    componentDidUpdate() {
        //
    }

    render() {
        return (
            <div>
                <div>id: {this.state.id}</div>
                <div>name: {this.state.name}</div>
            </div>
        );
    }
}

export default App;
```
