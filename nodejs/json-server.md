# json-server

## installation

```console
$ npm install json-server
```

`package.json`

```json
{
    "scripts": {
        "start": "json-server -p 3001 -w db.json"
    },
    "dependencies": {
        "json-server": "^0.16.1"
    }
}
```

`db.json`

```json
{
    "students": [
        {
            "id": 1,
            "name": "Alice"
        },
        {
            "id": 2,
            "name": "Bob"
        },
        {
            "id": 3,
            "name": "Chris"
        }
    ]
}
```

## start

```console
$ npm run start

> @ start /Users/supasin/Sites/json-server
> json-server -p 3001 -w db.json


  \{^_^}/ hi!

  Loading db.json
  Done

  Resources
  http://localhost:3001/students

  Home
  http://localhost:3001

  Type s + enter at any time to create a snapshot of the database
  Watching...
```

## index

```console
$ curl http://127.0.0.1:3001/students?q=i
[
  {
    "id": 1,
    "name": "Alice"
  },
  {
    "id": 3,
    "name": "Chris"
  }
]
```
