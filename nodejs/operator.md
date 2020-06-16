# Operator

## ...

### Spread

```javascript
let user = {
    id: 1,
    name: 'Alice',
    email: 'alice@example.com'
}

let userProfile = {
    ...user,
    facebook: 'fb.com/alice'
}

console.log(userProfile);
// { id: 1,
//   name: 'Alice',
//   email: 'alice@example.com',
//   facebook: 'alice' }
```
