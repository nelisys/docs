# post

```php
get_header();

while (have_posts()) {
    the_post();

    echo the_title();
    echo the_permalink();
    echo the_content();
}

get_footer();
```
