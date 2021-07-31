# JSON Queries

## Migration

```php
// database/migrations/2021_07_31_000000_create_students_table.php
class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('options')->nullable();
        });
    }
```

## Model

```php
// app/Models/Student.php
class Student extends Model
{
    protected $guarded = [];

    protected $casts = [
        'options' => 'array',
    ];
```

## JSON Insert/Update

### JSON Insert/Update from array

```php
$alice = Student::create([
    'name' => 'Alice',
    'options' => [
        'province' => 'Bangkok',
        'sports' => ['Football', 'Golf'],
    ],
]);

$alice->options;
// array:2 [
//   "province" => "Bangkok"
//   "sports" => array:2 [
//     0 => "Football"
//     1 => "Golf"
//   ]
// ]
```

```
mysql> select name, options from students where name='Alice';
+-------+---------------------------------------------------------+
| name  | options                                                 |
+-------+---------------------------------------------------------+
| Alice | {"sports": ["Football", "Golf"], "province": "Bangkok"} |
+-------+---------------------------------------------------------+
```

### JSON Insert/Update using object notation

Insert

```php
$bob = Student::create([
    'name' => 'Bob',
    'options->province' => 'Phuket',
    'options->sports' => ['Running'],
]);

$bob->options;
// array:2 [
//   "province" => "Phuket"
//   "sports" => array:1 [
//     0 => "Running"
//   ]
// ]
```

Update

```php
$bob->update([
    'options->province' => 'Chonburi',
]);

$bob->options;
// array:2 [
//   "province" => "Chonburi"
//   "sports" => array:1 [
//     0 => "Running"
//   ]
// ]
```

```
mysql> select name, options from students where name='Bob';
+-------+---------------------------------------------------------+
| name  | options                                                 |
+-------+---------------------------------------------------------+
| Bob   | {"sports": ["Running"], "province": "Chonburi"}         |
+-------+---------------------------------------------------------+
```

## JSON Queries

### Cast values as array

```php
foreach (Student::all() as $student) {
    echo $student->name . ' : ';
    echo $student->options['province'] . ' : ';

    foreach ($student->options['sports'] as $sport) {
        echo $sport . ', ';
    }

    echo "\n";
}
// Alice : Bangkok : Football, Golf,
// Bob : Chonburi : Running,
```

### Specify condition with object notation

```php
$students = Student::where('options->province', 'Bangkok')->pluck('name');
// array:1 [
//   0 => "Alice"
// ]
```

```php
$students = Student::whereJsonContains('options->sports', 'Running')->pluck('name');
// array:1 [
//   0 => "Bob"
// ]
```
