# Laravel Translatable

## Installation

```
composer require astrotomic/laravel-translatable

php artisan vendor:publish --tag=translatable 
```

## config/translatable.php

```php
// config/translatable.php
return [
    'locales' => [
        'en',
        'th',
    ],

    ...

    'translation_suffix' => 'Tran',
```

## Post

```
php artisan make:model -m Post
```

```php
// database/migrations/2022_07_24_100000_create_posts_table.php

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->timestamps();
        });
    }

```

```php
// app/Models/Post.php

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Post extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $guarded = ['id'];

    public $translatedAttributes = ['title', 'content'];
}

```

## PostTran

```
php artisan make:model -m PostTran
```

```php
// database/migrations/2022_07_24_200000_create_post_trans_table.php

    public function up()
    {
        Schema::create('post_trans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->text('content');

            $table->unique(['post_id', 'locale']);
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }
```

```php
// app/Models/PostTran.php

class PostTran extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];
}
```

## Usages

### create Post

```php
$data = [
    'author' => 'Bob',
    'en' => [
        'title' => 'title 1',
        'content' => 'content 1',
    ],
    'th' => [
        'title' => 'หัวข้อ 1',
        'content' => 'เนื้อหา 1',
    ],
];

$post = Post::create($data);
```

### query Post

```php
$post = Post::first();

print_r($post->toArray());
// Array
// (
//     [id] => 1
//     [author] => Bob
//     [created_at] => 2022-07-24T08:35:26.000000Z
//     [updated_at] => 2022-07-24T08:35:26.000000Z
//     [title] => title 1
//     [content] => content 1
//     [translations] => Array
//         (
//             [0] => Array
//                 (
//                     [id] => 1
//                     [post_id] => 1
//                     [locale] => en
//                     [title] => title 1
//                     [content] => content 1
//                 )
// 
//             [1] => Array
//                 (
//                     [id] => 2
//                     [post_id] => 1
//                     [locale] => th
//                     [title] => หัวข้อ 1
//                     [content] => เนื้อหา 1
//                 )
// 
//         )
// 
// )
```

### setLocal()

```php
App::setLocale('th');

$post = Post::first();

print_r($post->toArray());

// Array
// (
//     [id] => 1
//     [author] => Bob
//     [created_at] => 2022-07-24T08:35:26.000000Z
//     [updated_at] => 2022-07-24T08:35:26.000000Z
//     [title] => หัวข้อ 1
//     [content] => เนื้อหา 1
//     [translations] => Array
//         (
//             [0] => Array
//                 (
//                     [id] => 1
//                     [post_id] => 1
//                     [locale] => en
//                     [title] => title 1
//                     [content] => content 1
//                 )
// 
//             [1] => Array
//                 (
//                     [id] => 2
//                     [post_id] => 1
//                     [locale] => th
//                     [title] => หัวข้อ 1
//                     [content] => เนื้อหา 1
//                 )
// 
//         )
// 
// )
```

### translate()

```php
$post = Post::first();

print_r($post->translate('th')->toArray());

// Array
// (
//     [id] => 2
//     [post_id] => 1
//     [locale] => th
//     [title] => หัวข้อ 1
//     [content] => เนื้อหา 1
// )
```

### update Post

```php
$post = Post::first();
$post->translate('th')->title = 'หัวข้อแก้ไข 1';
$post->save();
```

