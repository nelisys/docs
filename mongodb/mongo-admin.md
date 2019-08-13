# Mongo Admin

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

