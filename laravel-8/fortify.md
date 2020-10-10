# Laravel Fortify

## Installation

```
$ composer require laravel/fortify

$ php artisan vendor:publish --provider="Laravel\Fortify\FortifyServiceProvider"
```

## Service Provider

```php
// config/app.php
    'providers' => [
        // ...
        App\Providers\FortifyServiceProvider::class,
```

```php
// app/Providers/FortifyServiceProvider.php
    public function boot()
    {
        // ...
        Fortify::loginView(function () {
            return view('auth.login');
        });
    }
```

## Login form

```php
// resources/views/auth/login.blade.php
<form method="POST" action="/login">
    @csrf
    Email: <input type="text" name="email" value="alice@example.com">
    <br>

    Password: <input type="password" name="password" value="secret">
    <br>
    <button type="submit">submit</button>
</form>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
```

## Create test user

```
$ php artisan migrate:fresh
```

```
$ php artisan tinker

App\Models\User::create([
  'email' => 'alice@example.com',
  'name' => 'Alice',
  'password' => bcrypt('secret'),
]);
```

## Change email to username

```php
// config/fortify.php
    'username' => 'username',
```

```php
// app/Models/User.php
    protected $fillable = [
        'username',
```

```php
// database/migrations/2014_10_12_000000_create_users_table.php
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
```

```php
// database/factories/UserFactory.php
    public function definition()
    {
        return [
            'username' => $this->faker->userName,
        ];
```
