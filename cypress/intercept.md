# intercept

```js
cg.intercept('POST', '/api/products*', {
    status: 201
}).as('createProduct');

// ...
cg.wait('@createProduct');  // make sure intercept work
```
