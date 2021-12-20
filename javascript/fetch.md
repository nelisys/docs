# fetch()

## GET


```javascript
const response = await fetch('/api/items');

const data = await response.json();
```

## POST

```javascript
const response = await fetch('/api/items', {
    method: 'POST',
    body: JSON.stringify({
        name: '....',
    }),
    headers: {
        'Content-Type': 'application/json',
    },
});

if (! response.ok) {
    throw new Error(data.message || 'error');
}

const data = await response.json();
```

