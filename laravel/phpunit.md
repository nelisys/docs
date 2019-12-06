# phpunit

## WithFaker

```php
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function test_something()
    {
        $fake_name = $this->faker->name;
        ...
    }
...
```

## mark test

```php
    /** @test */
    public function test_something()
    {
        $this->markTestIncomplete('pending');
        ...
    }
```

## set the history url

```php
$this->from('/students');
```
