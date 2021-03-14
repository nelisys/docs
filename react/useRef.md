# useRef

```javascript
import { useRef } from 'react';

function Search() {
    const refYear = useRef();

    function submitHanlder(event) {
        event.preventDefault();
        console.log(refYear.current.value);
    }

    return (
        <form>
            <select id="year" ref={refYear}>
                <option value="">-- select --</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>
        </form>
    );
}
```
