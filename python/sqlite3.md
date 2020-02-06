# sqlite3

```python
import sqlite3

conn = sqlite3.connect('data.db')

c = conn.cursor()
c.execute('CREATE TABLE IF NOT EXISTS students (id INTEGER PRIMARY KEY, name TEXT)')
c.execute('INSERT INTO students VALUES (?, ?)', (None, 'Alice'))

conn.commit()
conn.close()
```
