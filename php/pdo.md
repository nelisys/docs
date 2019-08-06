# PDO

## connect

```php
$db = new PDO("mysql:host={$db_host};dbname=db;charset=utf8", $db_username, $db_password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

## query

```php
$stmt = $db->query("SELECT * FROM students");

echo $stmt->rowCount() . "\n";

while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
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

## exec

```php
$affected_rows = $db->exec("DELETE FROM students");
```

