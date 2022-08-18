# urllib

## request

```python
import urllib.parse
import urllib.request

url = 'http://example.com/api'

values = {'name': 'abc'}
data = urllib.parse.urlencode(values)
data = data.encode('ascii') # data should be bytes

headers={'X-Requested-With': 'XMLHttpRequest'}

req = urllib.request.Request(url, data, headers)
response = urllib.request.urlopen(req)

print(response.code)
print(response.read())
```

```python
from urllib.request import urlopen
from urllib.error import HTTPError

def http(url):
    try:
        h = urlopen(url)
        print(h.code)

    except HTTPError as ex:
        print(ex.code)

    except Exception as ex:
        print(str(ex))
```

## query parameters

```python
from urllib import parse

url = "/test?id=123&name=abc"
query = parse.parse_qs(parse.urlsplit(url).query)

print(query['id'])
# ['123']
```

## post

```python
def api_post(url, data):
    data_json = json.dumps(data)
    data_json_bytes = data_json.encode('utf-8')

    try:
        req = Request(url)
        req.add_header('Content-Type', 'application/json')
        res = urlopen(req, data_json_bytes)

        print(res.code)
        print(res.read())
    except HTTPError as ex:
        print(ex.code)
        print(ex)
    except Exception as ex:
        print(ex)
```
