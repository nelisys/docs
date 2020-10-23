# React Component Package

## Init

```
mkdir hello-react-component

cd hello-react-component
```

Init `package.json` with `scope`

```
npm init -y --scope=@your-npm-username
```

Modify `package.json`

```json
{
  "name": "@your-npm-username/hello-react-component",
  "version": "0.0.1",
  "description": "Hello React Component",
  "main": "dist/index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "keywords": [],
  "author": "Your Name",
  "license": "MIT"
}
```

## Add Babel

```
npm install @babel/cli @babel/core --save-dev

npm install @babel/preset-env @babel/preset-react --save-dev
```

Create `.babelrc`

```
{
    "presets": [
        "@babel/preset-env",
        "@babel/preset-react"
    ]
}
```

Modify `scripts` in `package.json`

```json
  ...
  "scripts": {
    "build": "babel src --out-file dist/index.js"
  },
```

## Add React

```
npm install react --save-dev
```

Add `peerDependencies` in `package.json`

```json
  ...
  "peerDependencies": {
    "react": "^17.0.1"
  },
```

```
mkdir src/
```

Create `src/index.js`

```javascript
// src/index.js
import React from 'react';

class Hello extends React.Component {
    render() {
        return (
            <div>
                Hello World
            </div>
        );
    }
}

export default Hello;
```

Final `package.json`

```json
{
  "name": "@your-npm-username/hello-react-component",
  "version": "0.0.1",
  "description": "Hello React Component",
  "main": "dist/index.js",
  "scripts": {
    "build": "babel src --out-file dist/index.js"
  },
  "keywords": [],
  "author": "Your Name",
  "license": "MIT",
  "devDependencies": {
    "@babel/cli": "^7.12.1",
    "@babel/core": "^7.12.3",
    "@babel/preset-env": "^7.12.1",
    "@babel/preset-react": "^7.12.1",
    "react": "^17.0.1"
  },
  "peerDependencies": {
    "react": "^17.0.1"
  }
}
```

## Build

```
npm run build

ls -1 dist/
index.js
````

## Git

Create `.gitignore`

```
node_modules
package-lock.json
```

```
git add .

git commit -m 'init'
```

## Publish

```
npm login

npm publish --access public
```

## Usage

```
npm install @your-npm-username/hello-react-component
```
