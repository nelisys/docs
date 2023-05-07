# Collate

## Illegal mix of collations

```
select new.code, old.code
  from new_db.items as new
 inner join old_db.items as old
    on old.code = new.code
```

`Illegal mix of collations (utf8mb4_unicode_ci,IMPLICIT) and (utf8mb4_0900_ai_ci,IMPLICIT) for operation '='`

```
select new.code, old.code
  from new_db.items as new
 inner join old_db.items as old
    on old.code collate utf8mb4_0900_ai_ci = new.code
```
