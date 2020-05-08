# INNER JOIN

## UPDATE

```sql
UPDATE docs
 INNER JOIN
     (
       SELECT doc_id, SUM(quantity * unit_price) sum_total
         FROM records
        GROUP BY doc_id
     ) q
    ON q.doc_id = docs.id
   SET docs.sub_total = q.sum_total
```
