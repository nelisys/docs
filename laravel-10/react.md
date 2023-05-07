# Laravel 10 : react / vite

## Install

```
$ npm install --save-dev react react-dom @vitejs/plugin-react
```

## vite.config.js

```javascript
// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.jsx',
        }),
        react(),
    ],
});
```

## app.jsx

```javascript
// resources/js/app.jsx
import { useState } from 'react';
import { createRoot } from 'react-dom/client';

function App() {
    return (
        <div>Hello, App</div>
    );
}

let container = null;

document.addEventListener('DOMContentLoaded', function(event) {
    if (! container) {
        container = document.getElementById('root');
        const root = createRoot(container)
        root.render(<App />);
    }
});
```

## app.blade.php

```php
// resources/views/app.blade.php
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>App</title>
@viteReactRefresh
@vite('resources/js/app.jsx')
</head>
<body>
<div id="root"></div>
</body>
</html>
```

## routes/web.php

```
// routes/web.php
Route::view('/{any?}', 'app')
    ->where('any', '.*');
```

## npm run

```
npm run dev
```

```
npm run build
```
