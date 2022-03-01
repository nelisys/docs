# api

```javascript
// /pages/api/items.js

async function handler(req, res) {
    if (req.method == 'POST') {
        const data = req.body;

        // ...

        res.status(201)
            .json({
                message: '',
            });
    }
}

export default handler;
```
