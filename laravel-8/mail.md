# Mail

## Generate Mail Class

```
php artisan make:mail TestMail
```

```php
// app/Mail/TestMail.php
class TestMail extends Mailable
{
    // ...

    public function build()
    {
        return $this->from('alice@example.com', 'Alice A.')
            ->markdown('mail.test', [
                'name' => 'Alice',
            ]);
    }
```

## Mail view file (markdown)

`resources/views/mail/test.blade.php`

```php
@component('mail::message')
# Hello

Please confirm your account

@component('mail::button', ['url' => 'http://example.com'])
confirm
@endcomponent

Thanks,<br>
{{ $name }}<br>
{{ config('app.name') }}

@endcomponent
```

## Test send mail

```php
Mail::to(['bob@example.com', 'chris@example.com'])
    ->cc('dan@example.com')
    ->bcc('eric@example.com')
    ->send(new TestMail());
```

## Mailer Configuration

### Log

Edit configuration in  `.env`

```
MAIL_MAILER=log
```

Example of Test results

```
$ cat storage/logs/laravel.log
[2021-08-07 12:19:12] local.DEBUG: Message-ID: <a57c....@swift.generated>
Date: Sat, 07 Aug 2021 12:19:12 +0700
Subject: Test Mail
From: "Alice A." <alice@example.com>
To: bob@example.com, chris@example.com
Cc: dan@example.com
Bcc: eric@example.com
MIME-Version: 1.0
...

# Hello

Please confirm your account

confirm: http://example.com

Thanks,
Alice

app

© 2021 app. All rights reserved.
```

### Google SMTP

Steps
- Enable 2-Step Verification
- Create App Password
  app: Mail
  device: Other

- Put code into file `.env`

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=alice@gmail.com
MAIL_PASSWORD=app-password
MAIL_ENCRYPTION=tls
```

### Error

```
stream_socket_enable_crypto(): Peer certificate CN=`*.mailgun.org' did not match expected 
```

```php
// config/mail.php
    'mailers' => [
        'smtp' => [
            'transport' => 'smtp',
            ...
            'auth_mode' => null,
            'stream' => [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ],
```
