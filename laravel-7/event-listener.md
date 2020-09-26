# Event and Listener

## Event

Make Event class

```console
$ php artisan make:event UserCreatedEvent
```

Edit class `UserCreatedEvent.php`

```php
// app/Events/UserCreatedEvent.php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreatedEvent
{
    use Dispatchable, SerializesModels;

    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}
```

## Listener

Make Listener class

```console
$ php artisan make:listener UserGreetingListener --event UserCreatedEvent
```

Edit class `UserGreetingListener.php`

```php
// app/Listeners/UserGreetingListener.php

namespace App\Listeners;

use App\Events\UserCreatedEvent;

class UserGreetingListener
{
    public function handle(UserCreatedEvent $event)
    {
        echo "Hello {$event->name}";
    }
}
```

## Map Event and Listener

Edit `EventServiceProvider.php`

```php
// app/Providers/EventServiceProvider.php
...
class EventServiceProvider extends ServiceProvider
    protected $listen = [
        ...
        \App\Events\UserCreatedEvent::class => [
            \App\Listeners\UserGreetingListener::class,
        ],
    ];
```

Use `event:list` to list all Events and Listeners

```console
$ php artisan event:list
+-----------------------------------+-------------------------------------------------------------+
| Event                             | Listeners                                                   |
+-----------------------------------+-------------------------------------------------------------+
| App\Events\UserCreatedEvent       | App\Listeners\UserGreetingListener                          |
...
+-----------------------------------+-------------------------------------------------------------+
```

## Submit Event

Use `dispatch()` or `event()` to submit an event.

```php
// routes/web.php

use App\Events\UserCreatedEvent;

Route::get('/', function () {
    UserCreatedEvent::dispatch('Alice');
    // event(new UserCreatedEvent('Alice'));
});
```

Test.

```console
$ curl http://laravel-7.test
Hello Alice
```
