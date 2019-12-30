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

## assertSame() vs assertEquals()

```php
$a = 20;

// assertSame() ===
$this->assertSame(20, $a);      // ok
$this->assertSame('20', $a);    // fail

// assertEquals() ==
$this->assertEquals(20, $a);    // ok
$this->assertEquals('20', $a);  // ok
```

## phpunit.xml

`phpunit.xml`

```xml
<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="vendor/autoload.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false">
    <testsuites>
        <testsuite name="Test Suite">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
    <filter>
        <whitelist>
            <directory suffix=".php">src/</directory>
        </whitelist>
    </filter>
</phpunit>
```

## Code Coverage

requires `xdebug`

```
$ phpunit --coverage-text=coverage.txt
PHPUnit 8.5.0 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 44 ms, Memory: 6.00 MB

OK (1 test, 1 assertion)
```

```
$ cat coverage.txt

Code Coverage Report:
  2019-12-27 01:53:59

 Summary:
  Classes: 100.00% (1/1)
  Methods: 100.00% (1/1)
  Lines:   100.00% (1/1)

\Supasin\PhpPackage::Supasin\PhpPackage\Item
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% (  1/  1)
```
