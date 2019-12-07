# process

## pid

```javascript
console.log('process.pid = ' + process.pid);
```

## argv

```javascript
// test.js
console.log(process.argv);
```

```console
$ ./test.js --use http
[ '/usr/local/bin/node',
  '/Users/alice/apps/test.js',
  '--use',
  'http' ]
```
