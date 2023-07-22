# mysqldump

## password

```
export MYSQL_PWD=your_mysql_password
```

## tablespaces

```
mysqldump: Error: 'Access denied; you need (at least one of) the PROCESS privilege(s) for this operation' when trying to dump tablespaces
```

```
$ mysqldump --no-tablespaces -u user -p
```
