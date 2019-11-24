# os

`os.cpus()` returns all logical CPU core

```javascript
const os = require('os');

os.cpus();
// [
//     {
//         model: 'Intel(R) Xeon(R) .... CPU @ 2.50GHz',
//         speed: 1600,
//         times: {
//             user: 591220,
//             nice: 0,
//             sys: 433720,
//             idle: 7493930,
//             irq: 0
//         }
//     },
// 
//     ...
```
