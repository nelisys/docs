# react-query

## installation

```
# v5
npm i -D @tanstack/react-query@rc
```

## App.jsx

```jsx
import { QueryClient, QueryClientProvider } from '@tanstack/react-query';

const queryClient = new QueryClient();

createRoot(document.getElementById('root')).render(
    <QueryClientProvider client={queryClient}>
        <AppContextProvider>
            <RouterProvider ... />
        </AppContextProvider>
    </QueryClientProvider>
);
```

## Component.jsx

```jsx
import { useQuery } from '@tanstack/react-query';

function Component() {
    const { data, isLoading, isError, error } = useQuery({
        queryKey: ['products'],
        queryFn: getProducts,
    });

    return (
        <>
            { isLoading && 'loading..' }
            {! isLoading && (
                <>
                    { data }
                </>
            )}
        </>
    );
```
