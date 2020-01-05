# apache

## set log X-Forwarded

```
$ sudo vi /etc/httpd/conf/httpd.conf
    ...
    LogFormat "%{X-Forwarded-For}i %l %u %t \"%r\" %>s %b \"%{Referer}i\" \"%{User-Agent}i\"" combined
```
