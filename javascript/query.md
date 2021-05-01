# Query Params

## new object

```javascript
// from location.search
const params = new URLSearchParams('q=alice&name=bob');
```

## loop all keys

```javascript
for (let p of params) {
    console.log(p);
}

// ["q", "alice"]
// ["name", "bob"]
```

## has() & get()

```javascript
params.has('q');    // true
params.has('foo');  // false

params.get('q');    // alice
params.get('foo');  // null
```

## set()

```javascript
params.set('q', 'chris');
params.toString();          // q=chris&name=bob

params.set('age', 15);
params.toString();          // q=chris&name=bob&age=15
```

## delete()

```javascript
params.delete('name');
params.toString();          // q=chris&age=15
```
