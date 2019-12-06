# phpunit

## begin testing

- test files's name must have suffix with 'Test.php'
- the test class must extend PHPUnit\Framework\TestCase

```php
$this->assertEquals($expected, $actual);
```

## mark test incomplete

```php
$this->markTestIncomplete();
```

## assertEqualsWithDelta

```php
$this->assertEquals(0.3, 0.301);
// false

$this->assertEqualsWithDelta(0.3, 0.301, 0.001);
// false

$this->assertEqualsWithDelta(0.3, 0.301, 0.01);
// true
```
