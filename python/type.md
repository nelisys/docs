# Type

```python
a = 12
b = 'hello'
c = b'world'

print(type(a))  # int
print(type(b))  # str
print(type(c))  # bytes

print(type(b.encode('ascii'))) # str -> bytes
print(type(c.decode('ascii'))) # bytes -> str
```
