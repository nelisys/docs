# laravel & tailwind

## installtion

```bash
npm install tailwindcss --save-dev

npm install laravel-mix-tailwind --save-dev
```

## setup files

```scss
// resources/sass/app.scss
@tailwind base;
@tailwind components;
@tailwind utilities;
```

```javascript
// tailwind.js
module.exports = {
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [],
}
```

```javascript
// webpack.mix.js
const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .tailwind()
   .version();

mix.extract();
```

## compile files

```console
$ npm run dev

$ ls -l public/css/
total 2136
-rw-r--r--  1 supasin  staff  1090218 Feb  9 10:55 app.css
```
