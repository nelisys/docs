# Performance Tuning

## innodb_buffer_pool_size

- reduce run time for `DELETE FROM TABLE`

```
mysql> show variables where variable_name = 'innodb_buffer_pool_size';
```
