# Tailwind CSS

## Installation

```
npm install -D tailwindcss postcss autoprefixer

npx tailwindcss init -p
```

## webpack.mix.js

```
mix.js('resources/js/app.js', 'public/js')
  .postCss('resources/css/app.css', 'public/css', [
    require('tailwindcss'),
  ]);
```

## tailwind.config.js

```
module.exports = {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

## resources/css/app.css

```
@tailwind base;
@tailwind components;
@tailwind utilities;
```

## app.blade.php

```
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
```

