# mysql

## Install

```
$ sudo apt install -y mysql-server
```

```
$ systemctl status mysql
```

##

```
$ sudo mysql_secure_installation -u root
```

```
$ sudo mysql -u root
```

## Configuration


```
# `/etc/mysql/mysql.conf.d/mysqld.cnf`
...
innodb_buffer_pool_size = 4G
```

```
# /etc/mysql/mysql.conf.d/mysql.cnf

[mysql]
prompt="\u@\d> "
```
