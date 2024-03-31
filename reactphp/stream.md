# ReactPHP Stream

```
$ composer require react/event-loop
$ composer require react/stream
```

```php
use React\EventLoop\Factory as LoopFactory;
use React\Stream\WritableResourceStream;
use React\Stream\ReadableResourceStream;
use React\Stream\ThroughStream;

$loop = LoopFactory::create();

$out = new WritableResourceStream(STDOUT, $loop);
$in = new ReadableResourceStream(STDIN, $loop);

$through = new ThroughStream(function ($data) {
    return 'Pipe Through : ' . strtoupper($data);
});

$in->on('data', function ($data) use ($out) {
    $out->write('Reader Stream : ' . $data);
});

$in->pipe($through)
    ->pipe($out);

$loop->run();

// Hello World
// Reader Stream : Hello World
// Pipe Through : HELLO WORLD
// ^C
```
