# Mongo CRUD

## use database

```
> use testing
switched to db testing
```

## insert

insert one document

```
> db.students.insertOne(
    {
        name: "Alice",
        status: "A"
    }
)

{
    "acknowledged" : true,
    "insertedId" : ObjectId("5d513cad0584f63efd88ceb0")
}
```

insert many documents

```
> db.students.insertMany([
    {
        name: "Bob",
        status: "A"
    },
    {
        name: "Chris",
        status: "D"
    }
])

{
    "acknowledged" : true,
    "insertedIds" : [
        ObjectId("5d513d100584f63efd88ceb1"),
        ObjectId("5d513d100584f63efd88ceb2")
    ]
}
```

## find

find

```
> db.students.find({})

{ "_id" : ObjectId("5d513cad0584f63efd88ceb0"), "name" : "Alice", "status" : "A" }
{ "_id" : ObjectId("5d513d350584f63efd88ceb3"), "name" : "Bob", "status" : "A" }
{ "_id" : ObjectId("5d513d350584f63efd88ceb4"), "name" : "Chris", "status" : "D" }
```

find with condition
```
> db.students.find(
    {
        status: "A"
    }
)

{ "_id" : ObjectId("5d513cad0584f63efd88ceb0"), "name" : "Alice", "status" : "A" }
{ "_id" : ObjectId("5d513d350584f63efd88ceb3"), "name" : "Bob", "status" : "A" }
```

## update

```
> db.students.updateOne(
    {
        name: "Alice"
    },
    {
        $set: {
            name: "Alice New"
        }
    }
)

{ "acknowledged" : true, "matchedCount" : 1, "modifiedCount" : 1 }
```

```
> db.students.find()
{ "_id" : ObjectId("5d53a25bb152d7bc83744ec5"), "name" : "Alice New", "status" : "A" }
{ "_id" : ObjectId("5d53a261b152d7bc83744ec6"), "name" : "Bob", "status" : "A" }
{ "_id" : ObjectId("5d53a261b152d7bc83744ec7"), "name" : "Chris", "status" : "D" }
```

## delete

```
> db.students.deleteOne(
    {
        _id: ObjectId("5d53a261b152d7bc83744ec6")
    }
)

{ "acknowledged" : true, "deletedCount" : 1 }
```

```
{ "_id" : ObjectId("5d53a25bb152d7bc83744ec5"), "name" : "Alice New", "status" : "A" }
{ "_id" : ObjectId("5d53a261b152d7bc83744ec7"), "name" : "Chris", "status" : "D" }
```
