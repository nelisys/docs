# Row Number

```sql
SET @row_number := 0;
SET @current_doc_id := 0;

SELECT doc_id id, number,
       @row_number := CASE
           WHEN @current_doc_id = doc_id
               THEN @row_number + 1
           ELSE 1
       END AS new_number,
       @current_doc_id := doc_id
  FROM records AS r
 ORDER BY doc_id, id;
```
