# cluster

## fork worker

```javascript
const cluster = require('cluster');

if (cluster.isMaster) {
    console.log(`Master pid: ${process.pid} is running`);

    for (let i = 0; i < 4; i++) {
        cluster.fork();
    }
} else {
    console.log(` - Worker pid: ${process.pid} started`);
    process.exit();
}
```

```console
$ node test-cluster.js
Master pid: 2739 is running
 - Worker pid: 2740 started
 - Worker pid: 2741 started
 - Worker pid: 2743 started
 - Worker pid: 2742 started
```
