# Window Function

## SUM OVER

```sql
SELECT id, amount,
       SUM(amount) OVER (ORDER BY id) AS incremental_sum
FROM transactions;
```
