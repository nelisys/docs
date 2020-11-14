# Mongoose

```
$ npm install --save mongoose
```

```javascript
// create-student.js
const mongoose = require('mongoose');

mongoose.connect('mongodb://localhost/sm', { useNewUrlParser: true, useUnifiedTopology: true });

// Model
const StudentSchema = new mongoose.Schema({
    name: {
        type: String,
        required: true,
        trim: true,
    },
});

const Student = mongoose.model('Student', StudentSchema);

// Create
const Alice = new Student({
    name: 'Alice'
});

Alice.save()
    .then(result => {
        console.log(result);

        mongoose.connection.close();
    });
```


```
$ node create-student.js
{ _id: 5faf231a70179e0236813732, name: 'Alice', __v: 0 }
```

```
$ mongo
> db.students.find()
{ "_id" : ObjectId("5faf231a70179e0236813732"), "name" : "Alice", "__v" : 0 }
```
