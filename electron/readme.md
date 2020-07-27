# Electron

## Install Quick Start

```
$ git clone https://github.com/electron/electron-quick-start

$ cd electron-quick-start/

$ npm install

$ npm start
```

## Install `nodemon`

```
$ npm i -D nodemon
```

add `watch` in `package.json`

```
...
  "scripts": {
    "start": "electron .",
    "watch": "nodemon --exec 'electron .'"
  },
...
```
