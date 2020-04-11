# NuxtJS Installation

## Installation

```console
$ cd ~/Sites

$ mkdir my-nuxt

$ cd my-nuxt

$ vi package.json
{
    "name": "my-nuxt",
    "scripts": {
        "dev": "nuxt"
    }
}

$ npm install --save nuxt
```

## Create index page

```console
$ mkdir pages
```

Create `pages/index.vue`

```javascript
<template>
    <h1>Hello World!</h1>
</template>
```

```console
$ npm run dev

> my-nuxt@ dev /Users/supasin/Sites/my-nuxt
> nuxt

   ╭─────────────────────────────────────────────╮
   │                                             │
   │   Nuxt.js v2.12.2                           │
   │   Running in development mode (universal)   │
   │                                             │
   │   Listening on: http://localhost:3000/      │
   │                                             │
   ╰─────────────────────────────────────────────╯
...
```
