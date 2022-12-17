# root.jsx

## CatchBoundary

- handle 404

```jsx
export function CatchBoundary() {
    const caughtResponse = useCatch();

    caughtResponse.statusText;
    caughtResponse.data.message;
}
```

## ErrorBoundary

- handle `throw`

```jsx
export function ErrorBoundary({error}) {
    error.message;
}
```
