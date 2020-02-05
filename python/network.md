# network

## get mac address

```python
print(hex(uuid.getnode()))

# example output
# 0x001122334455
```

```python
def getMacAddress():
    tmp = hex(uuid.getnode())
    return tmp[2:4] + ':' + tmp[4:6] + ':' + tmp[6:8] + ':' + tmp[8:10] + ':' + tmp[10:12] + ':' + tmp[12:14]

# example output
# 00:11:22:33:44:55
```
