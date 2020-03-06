# Mockery

## tested class and route files

```php
// app/Student.php

namespace App;

class Student
{
    public function say($word)
    {
        echo "\nsay {$word}\n";
    }
}
```

```php
// routes/web.php

use App\Student;

Route::get('/test', function (Student $student) {
    $student->say('hello');
});
```

## 0. Before Mock

```php
// tests/Feature/MockTest.php

use App\Student;

class MockTest extends TestCase
{
    /** @test */
    public function test_no_mock()
    {
        $this->get('/test');
    }
}
```

```console
$ phpunit tests/Feature/MockTest.php
...
say hello
```

## 1. Mockery Test

```php
// tests/Feature/MockTest.php

use Mockery;
use App\Student;

class MockTest extends TestCase
{
    /** @test */
    public function test_mock()
    {
        $mock = Mockery::mock(Student::class, function ($mock) {
            $mock->shouldReceive()->say('hello')->once();
        });

        // binding the tested class to mock class
        $this->instance(Student::class, $mock);

        $this->get('/test');
    }
}
```

```console
$ phpunit tests/Feature/MockTest.php

OK (1 test, 1 assertion)
```

## 2. Mock Test since Laravel 5.8

```php
// tests/Feature/MockTest.php
...
    /** @test */
    public function test_mock()
    {
        $this->mock(Student::class, function ($mock) {
            $mock->shouldReceive()->say('hello')->once();
        });

        $this->get('/test');
    }

```

## 3. Spy Test

```php
// tests/Feature/MockTest.php
...
    /** @test */
    public function test_spy()
    {
        $spy = $this->spy(Student::class);

        $this->get('/test');

        $spy->shouldHaveReceived()->say('hello')->once();
    }
```
