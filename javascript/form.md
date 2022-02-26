# form

## basic form submit

```html
<form id="form" action="/products" method="POST" onsubmit="onSubmit(event)">
    name: <input type="text" id="name" name="name" autofocus>
    <span id="feedback" style="color: red"></span>
    <button type="submit">submit</button>
</form>

<script>
function onSubmit(event) {
    event.preventDefault();

    const name = document.getElementById('name');

    if (name.value == '') {
        const feedback = document.getElementById('feedback');
        feedback.innerText = 'required!';
        return false;
    }

    // form.submit
    const form = document.getElementById('form');
    form.submit()
}
</script>
```

## onchange submit

```javascript
<select onchange="this.form.submit()">
    ...
</select>
```
