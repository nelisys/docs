# PDO

## connect

```php
$db = new PDO("mysql:host={$db_host};dbname=db;charset=utf8", $db_username, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

For large results, if found `PHP Fatal error:  Allowed memory size of 134217728 bytes exhausted`

Tips: Use `memory_get_usage()` to show memory usage.

```php
$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
```

## query

```php
$stmt = $db->query("SELECT * FROM students");

echo $stmt->rowCount() . "\n";

while($row = $stmt->fetch()) {
    // ex: $row->id
}
```

## prepare and execute

```php

$stmt = $db->prepare("INSERT INTO students (name, age) VALUES (:name, :age)");

$stmt->execute([
    'name' => 'Alice',
    'age' => 15,
]);
```

get last insert id

```php
$db->lastInsertId();
```

## exec

```php
$affected_rows = $db->exec("DELETE FROM students");
```

## count

```php
$count = $db->query("SELECT count(*) FROM items")->fetchColumn();
```
