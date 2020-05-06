# LEFT JOIN

## query prices which item_id not exists in items

```sql
SELECT prices.item_id
  FROM prices
  LEFT JOIN items
    ON prices.item_id = items.item_id
 WHERE items.item_id IS NULL
```

```sql
DELETE prices FROM prices
  LEFT JOIN items
    ON prices.item_id = items.item_id
 WHERE items.item_id IS NULL
```
