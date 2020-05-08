# USER

## CREATE USER

```sql
CREATE USER 'alice'@'localhost' IDENTIFIED BY 'secret';
```

## CHANGE USER PASSWORD

```sql
ALTER USER 'alice'@'localhost' IDENTIFIED BY 'new-secret';
```

## DROP USER

```sql
DROP USER 'alice'@'localhost';
```
