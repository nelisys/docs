# Mail

Modify `MAIL` variables in `.env`

```console
$ vi .env
...
MAIL_MAILER=log
MAIL_FROM_ADDRESS=admin@example.com
MAIL_FROM_NAME="App Admin"
```

## Mail::raw()

```php
// routes/web.php

use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    Mail::raw('Mail Body', function($message) {
        $message->to('user@example.com')
            ->subject('Mail Subject');
    });
});
```

```console
$ curl http://localhost/
```

See mail log in `laravel.log`

```console
$ cat storage/logs/laravel.log
[2020-04-02 06:53:59] local.DEBUG: Message-ID: <7369...@swift.generated>
Date: Thu, 02 Apr 2020 06:53:59 +0000
Subject: Mail Subject
From: App Admin <admin@example.com>
To: user@example.com
MIME-Version: 1.0
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: quoted-printable

Mail Body
```

## Mail HTML

Create a mail class

```console
$ php artisan make:mail ContactHtml
```

Edit `ContactHtml.php`

```php
// app/Mail/ContactHtml.php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactHtml extends Mailable
{
    public function build()
    {
        return $this->view('mail.contact-html')
            ->subject('Mail Subject');
    }
}
```

Create mail template `resources/views/mail/contact-html.blade.php`

```html
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Mail Body</h1>
</body>
</html>
```

Sending the mail

```php
// routes/web.php

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactHtml;

Route::get('/', function () {
    Mail::to('user@example.com')
        ->send(new ContactHtml);
});
```

See results

```console
$ cat storage/logs/laravel.log
[2020-04-02 07:54:11] local.DEBUG: Message-ID: <3e46...@swift.generated>
Date: Thu, 02 Apr 2020 07:54:11 +0000
Subject: HTML Mail
From: App Admin <admin@example.com>
To: user@example.com
MIME-Version: 1.0
Content-Type: text/html; charset=utf-8
Content-Transfer-Encoding: quoted-printable

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
    <h1>Mail Body</h1>
</body>
</html>
```

## Mail Markdown

Create a mail class

```console
$ php artisan make:mail --markdown mail.contact-markdown ContactMarkdown
```

Edit `ContactMarkdown.php`

```php
// app/Mail/ContactMarkdown.php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class ContactMarkdown extends Mailable
{
    public function build()
    {
        return $this->markdown('mail.contact-markdown');
    }
}
```

Create mail template `resources/views/mail/contact-markdown.blade.php`

```markdown
@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => 'http://example.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
```

Sending the mail

```php
// routes/web.php

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMarkdown;

Route::get('/', function () {
    Mail::to('user@example.com')
        ->send(new ContactMarkdown);
});
```

See results

```console
$ cat storage/logs/laravel.log
[2020-04-02 08:01:57] local.DEBUG: Message-ID: <2240...@swift.generated>
Date: Thu, 02 Apr 2020 08:01:57 +0000
Subject: Contact Markdown
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
<body
...
</body>
</html>

Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: quoted-printable

[Laravel](http://localhost)

# Introduction

The body of your message.

Button Text: http://example.com

Thanks,
Laravel

© 2020 Laravel. All rights reserved.
```
