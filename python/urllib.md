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
