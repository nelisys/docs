# Class

## How Get Class Name

```php
namespace App;

class HelloWorld
{
    public function name()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}

echo 'Full Name = ' . get_class(new HelloWorld) . "\n";
echo 'Short Name = ' . (new HelloWorld)->name() . "\n";
echo 'Short Name = ' . (new \ReflectionClass((new HelloWorld)))->getShortName() . "\n";

// Full Name = App\HelloWorld
// Short Name = HelloWorld
// Short Name = HelloWorld
```

## New object by static

```php
class Item
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public static function create(...$params)
    {
        return new static(...$params);
    }
}

$item = Item::create('test');

print_r($item);

// Item Object
// (
//    [name:protected] => test
// )
```
