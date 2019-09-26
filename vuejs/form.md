# VueJS form

## checkbox

```html
<input type="checkbox" @click="onClick">

<script>
    methods: {
        onClick() {
            console.log(event.target.checked);
        }
    }
</script>
```

## data attributes

```html
<input type="checkbox"
    data-hour="21"
    @click="onClick">

<script>
    methods: {
        onClick() {
            let hour = event.target.getAttribute('data-hour');
        }
    }
</script>
```

## v-bind:data

```html
<input type="checkbox"
    v-bind:data-hour="21"
    @click="onClick">

<script>
    methods: {
        onClick() {
            let hour = event.target.dataset.hour;
        }
    }
</script>
```
