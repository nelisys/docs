# Cumulative Sum

## MySQL < 8

```mysql
SET @c_sum := 0;

SELECT issued_at, direction, quantity,
    IF (direction = 'buy',
        @c_sum := @c_sum + quantity,
        @c_sum := @c_sum - quantity
       ) AS c_sum
  FROM records
 WHERE product_id = 1
   AND direction IN ('buy', 'sell')
 ORDER BY concat(issued_at, direction)
```

## MySQL 8

```mysql
SELECT issued_at, direction, quantity,
   SUM(IF(direction = 'buy', quantity, -quantity)) OVER (
        PARTITION BY product_id
            ORDER BY concat(issued_at, direction, id)
     ) AS c_sum
  FROM records
 WHERE product_id = 1
   AND direction IN ('buy', 'sell')
 ORDER BY CONCAT(issued_at, direction)
```

## Results

```
+------------+-----------+----------+-------+
| issued_at  | direction | quantity | c_sum |
+------------+-----------+----------+-------+
| 2021-02-01 | buy       |       10 |    10 |
| 2021-02-01 | sell      |        7 |     3 |
| 2021-02-03 | buy       |        5 |     8 |
| 2021-02-04 | sell      |       10 |    -2 |
+------------+-----------+----------+-------+
```

