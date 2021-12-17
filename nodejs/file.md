# File

## read file

```javascript
const path = require('path');
const fs = require('fs/promises');

const filename = path.join(process.cwd(), 'data.txt');

fs.readFile(filename, 'utf8')
    .then(data => {
        console.log(data);
    })
    .catch(error => {
        console.log(error);
    });
```
