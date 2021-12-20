# MongoDB

```javascript
import { MongoClient } from 'mongodb';

const client = MongoClient.connect('...');

const db = client.db();

db.collection('items').insertOne({...});

client.close();
```
