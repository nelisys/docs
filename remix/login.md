# Login

## with Laravel Sanctum

```jsx
export async function loader({ request }) {
    const csrf_response = await http.get('/sanctum/csrf-cookie');
    const cookieHeaders = csrf_response.headers['set-cookie'];
    const cookieValues = parseCookieValue(cookieHeaders);

    const headers = new Headers();
    headers.append('Set-Cookie', cookieValues['laravel_session']);
    headers.append('Set-Cookie', cookieValues['XSRF-TOKEN']);

    return redirect('/', {
        headers
    });

    return [1, 2, 3];
}

function parseCookieValue(cookieHeaders) {
    let ret = {};

    for (let i = 0; i < cookieHeaders.length; i++) {
        const values = cookieHeaders[i].split(';');
        const cookieNameString = values[0];
        const [cookieName, value] = cookieNameString.split('=');
        const cookieValue = value.trim().replace('%3D', '=');

        values[0] = cookieValue;
        ret[cookieName] = cookieName + '=' + values.join(';');
    }

    return ret;
}
```
