# MySQL Replication

Master
- IP 192.168.1.1

Slave
- IP 192.168.1.2

## Master

```
$ sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf
[mysqld]
bind-address    = 0.0.0.0
server-id       = 1
log_bin         = /var/log/mysql/mysql-bin.log
max_binlog_size = 100M
```

```
$ sudo systemctl restart mysql
```

```
mysql> CREATE USER 'repl'@'192.168.1.2' IDENTIFIED BY 'secret';
mysql> GRANT REPLICATION SLAVE ON *.* TO 'repl'@'192.168.1.2';
```

```
mysql> SHOW MASTER STATUS;
+------------------+----------+--------------+------------------+-------------------+
| File             | Position | Binlog_Do_DB | Binlog_Ignore_DB | Executed_Gtid_Set |
+------------------+----------+--------------+------------------+-------------------+
| mysql-bin.000001 |     1272 |              |                  |                   |
+------------------+----------+--------------+------------------+-------------------+
1 row in set (0.00 sec)
```

## Slave

```
mysql> CHANGE REPLICATION SOURCE TO SOURCE_HOST='192.168.1.1',
    SOURCE_LOG_FILE='mysql-bin.000001',
    SOURCE_LOG_POS=1272,
    SOURCE_SSL=1;
```

```
mysql> START REPLICA USER='repl' password='repl1234';
```

```
mysql> SHOW REPLICA STATUS;
```

## Stop

```
mysql> STOP REPLICA;

mysql> RESET REPLICA;
```
