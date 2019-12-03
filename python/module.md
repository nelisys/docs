# module

## custom module

```python
# custom.py
def sayHello():
    print('hello')

name = 'Alice'
age = '25'
```

## import

```python
# main.py
import custom

print(dir(custom))
# ['__builtins__', '__cached__', '__doc__', '__file__', '__loader__', '__name__', '__package__', '__spec__', 'age', 'name', 'sayHello']

custom.sayHello()
# hello

print(custom.name)
# Alice
```

## from import

```python
from custom import sayHello, name as myName

sayHello()
# hello

print(myName)
# Alice
```
