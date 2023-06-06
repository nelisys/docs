# progress arrow

```html
<!doctype html>
<html lang="en" data-bs-theme="dark">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Progress Arrow</title>
<style>

#progress {
    list-style-type: none;
    clear: both;
    line-height: 1em;
}

#progress li {
    float: left;
    position: relative;
    width: 10%;
    color: #fff;
    background: #333;
    margin: 0 1px;
    padding: 10px 10px 10px 30px;
    border-top: 1px solid #999;
    border-bottom: 1px solid #999;
}

#progress li:not(:first-child)::before {
    content: '';
    border-top: 18px solid transparent;
    border-left: 18px solid #fff;
    border-bottom: 18px solid transparent;
    position: absolute;
    top: 0;
    left: 0;
}

#progress li:not(:last-child)::after {
    content: '';
    border-top: 18px solid transparent;
    border-left: 18px solid #333;
    border-bottom: 18px solid transparent;
    position: absolute;
    top: 0;
    left: 100%;
    z-index: 1;
}

#progress li.active {
    background: #555;
}

#progress li.active:after {
    border-left-color: #555;
}

</style>
</head>
<body>
<ul id="progress">
    <li>Step 1</li>
    <li class="active">Step 2</li>
    <li>Step 3</li>
    <li>Step 4</li>
</ul>
</body>
</html>
```
