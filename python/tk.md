# tk

```python
import tkinter as tk
from sys import exit

root = tk.Tk()
root.title('My Title')
root.configure(background='Green')
root.attributes('-fullscreen', True)

# menu bar
menu_bar = tk.Menu(root)
root.config(menu=menu_bar)

file_menu = tk.Menu(menu_bar, tearoff=0)
file_menu.add_command(label='Exit', command=exit)
menu_bar.add_cascade(label='File', menu=file_menu)

root.mainloop()
```
