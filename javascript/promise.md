# Promise

## new Promise()

```javascript
const timer = (length) => {
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (length > 1000) {
                console.log('reject()');
                reject({'code': 1});
                return;
            }

            console.log('resolve()');
            resolve([1, 2, 3]);
        }, length);
    });
};
```

## resolve()

```javascript
timer(1000).then((response) => {
    console.log('then() response =', response);
}).catch((error) => {
    console.log('catch() error =', error);
});

// resolve()
// then() response = [ 1, 2, 3 ]
```

## reject()

```javascript
timer(2000).then((response) => {
    console.log('then() response =', response);
}).catch((error) => {
    console.log('catch() error =', error);
});

// reject()
// catch() error = { code: 1 }
```

## all()

```javascript
const promise1 = axios.get('/api/customers');
const promise2 = axios.get('/api/products');
const promise3 = axios.get('/api/currencies');

Promise.all([promise1, promise2, promise3])
    .then(function([res1, res2, res3]) {
        console.log(res1);
    });
```
