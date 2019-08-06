# urllib

```
import urllib.parse
import urllib.request

url = 'http://example.com/api'

values = {'name': 'abc'}
data = urllib.parse.urlencode(values)
data = data.encode('ascii') # data should be bytes

req = urllib.request.Request(url, data)
response = urllib.request.urlopen(req)
print(response.read())
```
