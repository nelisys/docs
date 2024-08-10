# nl2br

```js
function nl2br(str) {
    if (! str) {
        return str;
    }

    if (typeof str != 'string') {
        return str;
    }

    let ret = [];

    const lines = str.split(/(?:\r\n|\r|\n)/g);

    for (let i = 0; i < lines.length; i++) {
        let html = lines[i];

        if (html == '') {
            html = <br />;
        }

        ret.push((
            <div key={i}>
                {html}
            </div>
        ));
    }

    return ret;
}
```
