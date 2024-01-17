# json

```py
import json
```

## encode

```py
json.dumps(object)
```

## decode, parse

```py
json_data = '{"name": "Alice", "age": 25, "city": "Bangkok"}'

parsed_data = json.loads(json_data)

print('Name:', parsed_data['name'])
```
