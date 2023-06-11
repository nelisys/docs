# Remix / Laravel Sanctum

```jsx
import { redirect } from '@remix-run/node';
import { Form, useLoaderData } from '@remix-run/react';
import axios from 'axios';

const http = axios.create({
    baseURL: 'http://api.example.test',
    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Origin': 'http://web.example.test',
    },
    withCredentials: true,
});

export default function Index() {
    const { error, user } = useLoaderData();

    return (
        <div>
            <h3>Remix / Laravel</h3>

            {user ? (
                <Form method="DELETE">
                    <button type="submit">
                        logout
                    </button>
                </Form>
            ) : (
                <Form method="POST">
                    <button type="submit">
                        login
                    </button>
                </Form>
            )}

            <hr />
            <div>
                user = { JSON.stringify(user) }
            </div>
            <div>
                get user error = { JSON.stringify(error) }
            </div>
        </div>
    );
}

export async function loader({request}) {
    try {
        // must send cookie
        http.interceptors.request.use(async (config) => {
            const requestCookies = getCookiesFromRequest(request);
            config.headers['X-XSRF-TOKEN'] = requestCookies['X-XSRF-TOKEN'];
            config.headers['Cookie'] = requestCookies['laravel_session'];
            return config;
        });

        const userResponse = await http.get('/api/user');

        return {
            error: null,
            user: userResponse.data,
        };
    } catch (error) {
        return {
            error: error.message,
            user: null,
        }
    }

    return [];
}

export async function action({request}) {
    if (request.method == 'POST') {
        return actionLogin({request})
    }

    return actionLogout({request});
}

async function actionLogin({request}) {
    console.log('*** actionLogin ***');

    try {
        // GET /sanctum/csrf-cookie
        const csrfResponse = await http.get('/sanctum/csrf-cookie');
        const csrfCookies = getCookiesFromResponse(csrfResponse);

        http.interceptors.request.use(async (config) => {
            config.headers['X-XSRF-TOKEN'] = csrfCookies['X-XSRF-TOKEN'];
            config.headers['Cookie'] = csrfCookies['laravel_session'];

            return config;
        });

        // POST /api/login with XSRF-TOKEN response from above
        const loginData = {
            email: 'alice@example.com',
            password: 'secret',
        };

        const loginResponse = await http.post('/api/login', loginData);
        const loginCookies = getCookiesFromResponse(loginResponse);

        // set cookie back to browser
        const headers = new Headers();
        headers.append('Set-Cookie', loginCookies['laravel_session']);
        headers.append('Set-Cookie', loginCookies['XSRF-TOKEN']);

        return redirect('/', {
            headers
        })
    } catch (error) {
        console.log(error.message);
    }

    return null;
}

async function actionLogout({request}) {
    // POST /api/logout
    http.interceptors.request.use(async (config) => {
        const requestCookies = getCookiesFromRequest(request);
        config.headers['X-XSRF-TOKEN'] = requestCookies['X-XSRF-TOKEN'];
        config.headers['Cookie'] = requestCookies['laravel_session'];
        return config;
    });

    try {
        await http.post('/api/logout')

        const headers = new Headers();
        headers.append('Set-Cookie', 'XSRF-TOKEN=; Max-Age=0; domain=.example.test;');
        headers.append('Set-Cookie', 'laravel_session=; Max-Age=0; domain=.example.test;');

        return redirect('/', {
            headers
        });
    } catch (error) {
        console.log(error.message);
    }

    return null;
}

function getCookiesFromResponse(response) {
    const headers = response.headers['set-cookie'];

    let cookies = {};

    for (let i = 0; i < headers.length; i++) {
        const [cookieName] = headers[i].split('=');
        cookies[cookieName] = headers[i];

        if (cookieName == 'XSRF-TOKEN') {
            cookies['X-XSRF-TOKEN'] = decodeURIComponent(headers[i].split(';')[0]
                .replace('XSRF-TOKEN=', ''));
        }
    }

    return cookies;
}

function getCookiesFromRequest(request) {
    const headers = request.headers.get('Cookie') || '';
    const cookieStrings = headers.split(';');

    let cookies = {};

    for (let i = 0; i < cookieStrings.length; i++) {
        let [cookieName, cookieValue] = cookieStrings[i].trim().split('=');
        cookieValue = decodeURIComponent(cookieValue);
        cookies[cookieName] = `${cookieName}=${cookieValue}`;

        if (cookieName == 'XSRF-TOKEN') {
            cookies['X-XSRF-TOKEN'] = cookieValue;
        }
    }

    return cookies;
}
```
