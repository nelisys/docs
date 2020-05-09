# MySQL 5.7

install mysql 5.7 on ubuntu 20.04

```console
# apt install -y libncurses5
```

```console
# vi /etc/my.cnf
[mysqld]
datadir=/var/lib/mysql
socket=/var/lib/mysql/mysql.sock
user=mysql

[mysqld_safe]
log-error=/var/log/mysqld.log

[mysql]
socket=/var/lib/mysql/mysql.sock
```

```console
# cd /usr/local/
# tar zxf mysql-5.7.29-linux-glibc2.12-x86_64.tar
# ln -s mysql-5.7.29-linux-glibc2.12-x86_64 mysql
# cd mysql/

# ./bin/mysqld --initialize --user=mysql 
...
A temporary password is generated for root@localhost: ...

# ./bin/mysql_ssl_rsa_setup

# ./bin/mysqld_safe --user=mysql &

# ./bin/mysql_secure_installation -S /var/lib/mysql/mysql.sock
```

```console
# ./bin/mysql -u root -p

# cd /usr/local/bin/
# sudo ln -s ../mysql/bin/mysql
# sudo ln -s ../mysql/bin/mysqldump
# sudo ln -s ../mysql/bin/mysqladmin
```
