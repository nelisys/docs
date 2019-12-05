# tk

```python
import tkinter as tk
import sys

def _exit():
    root.quit()
    root.destroy()
    sys.exit(0)

root = tk.Tk()
root.title('My Title')
root.configure(background='Green')
root.attributes('-fullscreen', True)

# menu bar
menu_bar = tk.Menu(root)
root.config(menu=menu_bar)

file_menu = tk.Menu(menu_bar, tearoff=0)
file_menu.add_command(label='Exit', command=_exit)
menu_bar.add_cascade(label='File', menu=file_menu)

root.mainloop()
```
