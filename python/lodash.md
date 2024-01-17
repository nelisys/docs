# lodash like

```py
def _get(data, path, default_value = None):
    try:
        paths = path.split('.')

        for p in paths:
            data = data[p]

        return data
    except Exception as ex:
        return default_value
```
