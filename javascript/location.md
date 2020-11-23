# location

```javascript
location.reload();

location.href = '/';
```

## window.location

http://localhost:3000/items?q=name&page=3#header

```javascript
window.location.href        // http://localhost:3000/items?q=name&page=3#header
window.location.origin      // http://localhost:3000
window.location.pathname    // /items
window.location.search      // ?q=name&page=3
window.location.hash        // #header
```

## set url path

```javascript
window.history.pushState({}, '', '/new-path');
```
