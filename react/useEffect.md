# useEffect

```javascript
import axios from 'axios';
import { useState, useEffect } from 'react';

function ProductIndex() {
    const [isLoading, setIsLoading] = useState(true);
    const [products, setProducts] = useState([]);
    const [refresh, setRefresh] = useState(0);

    useEffect(() => {
        setIsLoading(true);

        axios.get('https://jsonplaceholder.typicode.com/todos')
            .then(response => {
                setProducts(response.data);
                setIsLoading(false);
            });
    }, [refresh]);

    function refreshHandler() {
        setRefresh(refresh + 1);
    }

    const renderProducts = products.map(product => {
        return <li key={product.id}>{product.id} : {product.title}</li>
    })

    return (
        <div>
            <h1>ProductIndex</h1>
            <button type="button" onClick={refreshHandler}>Refresh</button>
            {isLoading ? 'loading...' : renderProducts }
        </div>
    );
}

export default ProductIndex;
```
