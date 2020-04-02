# Notification

## Mail Notification

```console
$ php artisan make:notification MailNotification
```

Edit method `toMail()` in `MailNotification.php`

```php
// app/Notifications/MailNotification.php
// ...
class MailNotification extends Notification
{
    // ...
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Mail Subject')
                    ->greeting('Greeting Message')
                    ->line('The introduction to the notification.')
                    ->action('Sign Up', url('/'))
                    ->line('Thanks!');
    }
```

Call `Notification::send()` or `$user->notify()` to send the notification.

```php
// routes/web.php

use App\User;
use App\Notifications\MailNotification;

Route::get('/', function () {
    $user = User::first();

    Notification::send($user, new MailNotification);
    // $user->notify(new MailNotification);
});
```

Test

```console
$ curl http://localhost.test
```

See the mail log results

```console
$ cat storage/logs/laravel.log
[2020-04-02 12:40:40] local.DEBUG: Message-ID: <c301...@swift.generated>
Date: Thu, 02 Apr 2020 12:40:40 +0000
Subject: Mail Subject
From: App Admin <admin@example.com>
To: user@example.com
MIME-Version: 1.0
Content-Type: multipart/alternative;
...
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
...
</html>

Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: quoted-printable

[Laravel](http://localhost)

# Greeting Message

The introduction to the notification.

Sign Up: http://localhost.test

Thanks!

Regards,
Laravel

If you’re having trouble clicking the "Sign Up" button, copy and paste the URL below
into your web browser: [http://localhost.test](http://localhost.test)

© 2020 Laravel. All rights reserved.
```

## Database Notification

Migrate table `notifications`

```console
$ php artisan notifications:table

$ php artisan migrate
Migrating: 2020_04_02_125535_create_notifications_table
```

Create class `DatabaseNotification`

```console
$ php artisan make:notification DatabaseNotification
```

In the file `app/Notifications/DatabaseNotification.php`
- add `database` in return of method `via()`
- add values in the array return of method `toArray()`

```php
// app/Notifications/DatabaseNotification.php

class DatabaseNotification extends Notification
{
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toArray($notifiable)
    {
        return [
            'amount' => 900,
        ];
    }
```

Call `$user->notify()`

```php
// routes/web.php

use App\User;
use App\Notifications\DatabaseNotification;

Route::get('/', function () {
    $user = User::first();

    $user->notify(new DatabaseNotification);
});
```

Test

```console
$ curl http://laravel-7.test
```

Query the table `notifications`

```console
mysql> select * from notifications \G
*************************** 1. row ***************************
             id: 2a07...
           type: App\Notifications\DatabaseNotification
notifiable_type: App\User
  notifiable_id: 1
           data: {"amount":900}
        read_at: NULL
     created_at: 2020-04-02 13:08:03
     updated_at: 2020-04-02 13:08:03
1 row in set (0.00 sec)
```

### Query notifications

- $user->notifications()
- $user->unreadNotifications()

```php
foreach ($user->notifications as $notification) {
    echo $notification->type . ' ';
    echo $notification->data['amount'] . ' ';
    echo $notification->read_at . ' ';
    echo "\n";
}

// App\Notifications\DatabaseNotification 900
```

`markAsRead()`

```
$notification->markAsRead();

echo $notification->read_at;
// 2020-04-02 13:26:19
```
