# dom

```py
from xml.dom import minidom

html = '<html><body><p>Hello!</p></body></html>'
dom = minidom.parseString(html)
p = dom.getElementsByTagName('p')[0]

print('p =', p.firstChild.data)
# p = Hello!
```
