# subprocess

```python
from subprocess import PIPE, Popen

with Popen(['hostname', '-I'], stdout=PIPE) as proc:
    ip = proc.stdout.read().decode()
```
