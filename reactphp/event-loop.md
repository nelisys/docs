# ReactPHP Event Loop

```
$ composer require react/event-loop
```

## addTimer : setTimeout

```php
use React\EventLoop\Factory as LoopFactory;

$loop = LoopFactory::create();

$loop->addTimer(1, function () {
    echo now() . ' run first job ' . PHP_EOL;
});

$loop->addTimer(2, function () {
    echo now() . ' run second job ' . PHP_EOL;
});

echo now() . ' init ' . PHP_EOL;

$loop->run();

// 2024-03-31 09:51:25 init
// 2024-03-31 09:51:26 run first job
// 2024-03-31 09:51:27 run second job
```

## addPeriodicTimer : setInterval

```php
use React\EventLoop\Factory as LoopFactory;

$loop = LoopFactory::create();

$loop->addPeriodicTimer(1, function () {
    echo now() . ' looping...' . PHP_EOL;
});

$loop->run();
// 2024-03-31 09:54:56 looping...
// 2024-03-31 09:54:57 looping...
// 2024-03-31 09:54:58 looping...
// ^C
```
