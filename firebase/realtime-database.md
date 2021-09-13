# Firebase Realtime Database

- Create Project

- Create Database
  Location: Singapore (asia-southeast1)

- Set up database
  (x) Start in test mode

## curl

Set url variable.

```
firebase_url="https://[PROJECT_ID].firebasedatabase.app"
```

### GET ALL

Get all data for specific collection.

```
$ curl "$firebase_url/studens.json"

# null
```

## POST

Create a new record.

```
$ curl -X POST -d '{"name": "Alice"}' \
    "$firebase_url/students.json"

# {
#    "name" : "-MjP8-0001"
# }
```

Get all after create the record.

```
$ curl "$firebase_url/students.json"

# {
#     "-MjP8-0001" : {
#         "name" : "Alice"
#     }
# }
```

Create another record.

```
$ curl -X POST -d '{"name": "Bob", "age": 19}' \
    "$firebase_url/students.json"

# {
#    "name" : "-MjP8-0002"
# }
```

Get all after create another record.

```
$ curl "$firebase_url/students.json"

# {
#    "-MjP8-0001" : {
#       "name" : "Alice"
#    },
#    "-MjP8-0002" : {
#       "age" : 19,
#       "name" : "Bob"
#    }
# }
```

### GET by id

```
$ curl "$firebase_url/students/-MjP8-0002.json"

# {
#    "age" : 19,
#    "name" : "Bob"
# }
```

### PATCH

Patch to change some fields.

```
$ curl -X PATCH -d '{"age": 25}' \
    "$firebase_url/students/-MjP8-0001.json"

# {
#    "age" : 25
# }
```

Get after patch.

```
$ curl "$firebase_url/students/-MjP8-0001.json"

# {
#    "age" : 25,
#    "name" : "Alice"
# }
```

### PUT

Put to replace fields.

```
$ curl -X PUT -d '{"major": "Engineering"}' \
    "$firebase_url/students/-MjP8-0001.json"

# {
#    "major" : "Engineering"
# }
```

Get after put.

```
$ curl "$firebase_url/students/-MjP8-0001.json"

# {
#    "major" : "Engineering"
# }
```

### DELETE

Delete a record.

```
$ curl -X DELETE \
    "$firebase_url/students/-MjP8-0001.json"

# null
```

Get after delete.

```
$ curl "$firebase_url/students.json"

# {
#    "-MjP8-0002" : {
#       "age" : 19,
#       "name" : "Bob"
#    }
# }
```
