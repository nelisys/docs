# Type

```python
age = 32
name = 'Alice'
mesg = b'Hello'

print(type(age))   # int
print(type(name))  # str
print(type(mesg))  # bytes

print(type(name.encode('ascii'))) # str -> bytes
print(type(mesg.decode('ascii'))) # bytes -> str
```
