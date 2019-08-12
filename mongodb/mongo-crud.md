# Mongo CRUD

## insert

insert one document

```
> db.students.insertOne({
    name: "Alice",
    status: "A"
})

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

