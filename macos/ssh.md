# ssh

## ssh to others display warning message

```
macOS ~$ ssh 192.168.1.1
-bash: warning: setlocale: LC_CTYPE: cannot change locale (UTF-8): No such file or directory
```

comment out `Host *` and `SendEnv LANG LC_*` lines

```
$ sudo vi /private/etc/ssh/ssh_config
...
#Host *
#   SendEnv LANG LC_*
```
