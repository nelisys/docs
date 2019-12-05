# php

## parse php array to javascript

```php
<?php
$names = ['Alice', 'Bob', Chris'];    
?>
<script>
var names = <?php echo json_encode($names) ?>
</script>
```

## laravel parse php array to javascript

```php
<?php
$names = ['Alice', 'Bob', Chris'];    
?>
<script>
var names = {!! json_encode($names) !}}
</script>
```
