# Mongo Admin

## show dbs

```
> show dbs
admin     0.000GB
config    0.000GB
inventory 0.042GB
```

## show collection

```
> use inventory
switched to db inventory

> show collections
products
users
```

## drop collection

```
> show dbs
admin     0.000GB
config    0.000GB
inventory 0.042GB

> use inventory
switched to db inventory

> show collections
products
users

> db.products.drop()
true

> show collections
users
```

## drop database

```
> show dbs;
admin     0.000GB
config    0.000GB
inventory 0.042GB

> use inventory
switched to db inventory

> db.dropDatabase();
{ "dropped" : "inventory", "ok" : 1 }

> show dbs
admin    0.000GB
config   0.000GB
```

## backup db

```console
$ mongodump --db inventory
2019-08-14T23:36:27.206+0700    writing inventory.products to
2019-08-14T23:36:27.207+0700    writing inventory.users to
2019-08-14T23:36:27.212+0700    done dumping inventory.users (1 document)
2019-08-14T23:36:27.213+0700    done dumping inventory.products (1 document)

$ ls -l
drwxr-xr-x  3 supasin  staff  96 Aug 14 23:36 dump

$ ls -l dump/
drwxr-xr-x  6 supasin  staff  192 Aug 14 23:36 inventory

$ ls -l dump/inventory/
-rw-r--r--  1 supasin  staff   36 Aug 14 23:36 products.bson
-rw-r--r--  1 supasin  staff  132 Aug 14 23:36 products.metadata.json
-rw-r--r--  1 supasin  staff   42 Aug 14 23:36 users.bson
-rw-r--r--  1 supasin  staff  129 Aug 14 23:36 users.metadata.json
```

## backup collection

```console
$ mongodump --db inventory --collection products
2019-08-14T23:39:04.691+0700    writing inventory.products to
2019-08-14T23:39:04.691+0700    done dumping inventory.products (1 document)

$ ls -l dump/
drwxr-xr-x  4 supasin  staff  128 Aug 14 23:39 inventory

$ ls -l dump/inventory/
-rw-r--r--  1 supasin  staff   36 Aug 14 23:39 products.bson
-rw-r--r--  1 supasin  staff  132 Aug 14 23:39 products.metadata.json
```

## restore

```console
$ ls -l
drwxr-xr-x  3 supasin  staff  96 Aug 15 13:39 dump

$ mongorestore
```

restore collection

```console
$ mongorestore --db inventory --collection products products.bson
```
