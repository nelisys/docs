# Proxy

## Proxy Environment

```
$ export http_proxy=http://192.168.1.1:3128
$ export https_proxy=http://192.168.1.1:3128
```

```
$ curl https://www.google.com
```

## Proxy for apt

```
$ sudo vi /etc/apt/apt.conf.d/99proxy
Acquire::http {
    Proxy "http://192.168.1.1:3128";
};
```

```
$ sudo apt update
```

## install composer via proxy

Use `curl` command to download setup file

```
$ php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
```

to

```
$ curl -o composer-setup.php https://getcomposer.org/installer
```
