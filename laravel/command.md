# Laravel Command

## arguments

```php
class ImportFile extends Command
{
    protected $signature = 'import-file {file_name}';

    public function handle()
    {
        echo $this->argument('file_name');
    }
}
```

```console
$ php artisan import-file test.csv
test.csv
```
