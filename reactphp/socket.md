# ReactPHP Socket

```
composer require react/event-loop;
composer require react/socket
```

```php
use React\EventLoop\Factory as LoopFactory;
use React\Socket\Server;
use React\Socket\ConnectionInterface;

$loop = LoopFactory::create();

$server = new Server('0.0.0.0:8080', $loop);

$server->on('connection', function(ConnectionInterface $connection) {
    echo 'New Connection : ' . $connection->getRemoteAddress() . PHP_EOL;

    $connection->on('data', function ($data) use ($connection) {
        echo 'Received data : ' . $data;
        $connection->write('Reply data : ' . strtoupper($data));
    });
});

$loop->run();

// # client
// $ telnet localhost 8080
// Trying 127.0.0.1...
// Connected to localhost.
// Escape character is '^]'.
// Hello World
// Reply data : HELLO WORLD
// ^]
// telnet> q
// Connection closed.

// # server
// New Connection : tcp://127.0.0.1:51666
// Received data : Hello World
// ^C
```
