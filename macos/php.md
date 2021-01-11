# PHP

```
$ brew install php@7.4
```

```
$ brew link php@7.4
```

```
$ brew services start php@7.4
```

## troubelshooting

### memory_limit

```
Fatal error: Allowed memory size of 1610612736 bytes exhausted (tried to allocate 4096 bytes)
```

```
$ vi /usr/local/etc/php/7.4/conf.d/php-memory-limits.ini
...
; Max memory per instance
memory_limit = 2048M
```
