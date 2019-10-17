# sudo

default users in group `wheel` can `sudo`

```console
$ grep wheel /etc/group
wheel:x:10:supasin

$ sudo visudo
...
## Allows people in group wheel to run all commands
%wheel  ALL=(ALL)       ALL

...
```

# allow users to use sudo without entering the password

```console
$ sudo visudo
...
## Allows people in group wheel to run all commands
%wheel  ALL=(ALL)       ALL
supasin ALL=(ALL)       NOPASSWD: ALL

...
```


