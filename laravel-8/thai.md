# Laravel with Thai data

## Migration file

Specify the `string` size to `11`.

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('firstname', 11);
});    
```

## MySQL

`varchar` size is `11`

```mysql
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
  PRIMARY KEY (`id`),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

Insert test data.

```
mysql> select firstname, char_length(firstname), length(firstname) from users;
+-----------+------------------------+-------------------+
| firstname | char_length(firstname) | length(firstname) |
+-----------+------------------------+-------------------+
| alice     |                      5 |                 5 |
| ก         |                      1 |                 3 |
| สม        |                      2 |                 6 |
| ชื่อคำรันต์   |                     11 |                33 |
+-----------+------------------------+-------------------+
```

## FormRequest Validation

```php
$input = [
    'firstname' => 'ชื่อการันต์',
];

$validator = \Illuminate\Support\Facades\Validator::make($input, [
    'firstname' => 'required|max:11',
]);

echo 'mb_strlen = ' . mb_strlen($input['firstname']) . "\n";
echo 'strlen = ' . strlen($input['firstname']) . "\n";
echo 'validator->fails() = ';
dd($validator->fails());

// mb_strlen = 11
// strlen = 33
// validator->fails() = false
```
