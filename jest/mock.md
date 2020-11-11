# Mock

```javascript
const os = require('os');

jest.mock('os');
os.type.mockReturnValue('hello');

console.log(os.type());
// hello
```
