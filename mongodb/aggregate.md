# Aggregate


```
db.students.aggregate([
  {
    $match: {
      'room': 1
    }
  },
  {
    $group: {
      _id: '$gender'
    }
  }
])
```
