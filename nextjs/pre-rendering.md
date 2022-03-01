# Pre-rendering

## Static Generation

- data not changed often

```javascript
export async function getStaticProps(context) {
    // /items/[id].js
    const id = context.params.id;

    const data = [1, 2, 3];

    return {
        props: {
            items: data,
        },
        revalidate: 10, // in seconds for production
        // notFound: true,
        // redirect: {
        //     destination: '/login'    // ex: if not auth
        // },
    };
}

// requires for dynamic path, ex: include [id]
export async function getStaticPaths(context) {
    return {
        paths: [
            { params: { id: '1'} },
            { params: { id: '2'} },
        ],
        fallback: 'blocking', // true, false, 'blocking'
    };
}
```

## Server Side Generation

- data changed every request

```javascript
export async function getServerSideProps(context) {
    const { req, params } = context;

    const response = await fetch(`https://jsonplaceholder.typicode.com/todos/${params.id}`)
    const data = await response.json();

    return {
        props: {
            item: data,
        }
    };
}
```
