# cluster

## fork Workers in the same file

```javascript
// test-cluster.js
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

## split Master and Workers files

```javascript
// master.js
const cluster = require('cluster');
const os = require('os')

const CPUS = os.cpus().length;

cluster.setupMaster({
    exec: 'worker',
    args: ['-u', 'http']
});

for (let i = 0; i < CPUS; i++) {
    cluster.fork();
}

console.log(`Master pid: ${process.pid} is running`);
```

```javascript
// worker.js
console.log(` - Worker pid: ${process.pid} started`);
```

```console
$ node master.js
Master pid: 2203 is running
 - Worker pid: 2204 started
 - Worker pid: 2205 started
 - Worker pid: 2206 started
 - Worker pid: 2210 started
 - Worker pid: 2209 started
 - Worker pid: 2208 started
 - Worker pid: 2207 started
 - Worker pid: 2211 started
```
