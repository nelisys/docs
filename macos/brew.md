# brew

## list services

```console
$ brew services list
Name      Status  User    Plist
php@7.2   started root    /Library/LaunchDaemons/homebrew.mxcl.php@7.2.plist
```

## restart service

```console
$ sudo brew services restart php@7.2
```

## php.ini

```console
$ vi /usr/local/etc/php/7.2/php.ini
...
max_execution_time = 300
```
