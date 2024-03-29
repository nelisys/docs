# Laravel 8 : react

```
$ npm install --save-dev react react-dom @babel/preset-react
```

```javascript
// webpack.mix.js
mix.js('resources/js/app.js', 'public/js')
    .react()
    .version()
```

```javascript
// resources/js/app.js
import React from 'react';
import ReactDOM from 'react-dom';

function App() {
    return (
        <div>App</div>
    );
}

ReactDOM.render(<App />, document.getElementById('root'));
```

```
$ npm run dev
```

```php
// resources/views/app.blade.php
<!doctype html>
<html>
<body>
<div id="root"></div>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
```

```
// routes/web.php
Route::view('/{any?}', 'app')
    ->where('any', '.*');
```
