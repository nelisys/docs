# LEFT JOIN

## SELECT

```sql
SELECT prices.item_id
  FROM prices
  LEFT JOIN items
    ON prices.item_id = items.item_id
 WHERE items.item_id IS NULL
```
## UPDATE

```sql
UPDATE prices
  LEFT JOIN items
    ON prices.item_id = items.item_id
   SET prices.price_code = items.item_code
 WHERE prices.price_code IS NULL
```

## DELETE

```sql
DELETE prices FROM prices
  LEFT JOIN items
    ON prices.item_id = items.item_id
 WHERE items.item_id IS NULL
```
