# User

## Create admin User

```
$ mongo
use admin

db.createUser(
  {
    user: "root",
    pwd: passwordPrompt(),
    roles: [
      {
        role: "userAdminAnyDatabase",
        db: "admin"
      }, "readWriteAnyDatabase" ]
  }
)
```

## Enable security in mongod.conf

```
security:
  authorization: enabled
```

```
$ sudo systemctl restart mongod
```

## Login as admin role

```
$ mongo --port 27017  --authenticationDatabase "admin" -u "root" -p
```

## Add new user

```
use test;

db.createUser(
  {
    user: "test1",
    pwd:  'secret',
    roles: [
      {
        role: "readWrite", db: "test",
      }
    ]
  }
)
```

## Reconnect with user test1

```
$ mongo --port 27017  --authenticationDatabase "test" -u "test1"
```
