# Queue

## Installation

```sh
$ php artisan queue:table
```

Edit `.env` file

```
...
QUEUE_CONNECTION=database
```

## Create Job class

```sh
$ php artisan make:job ProcessReport
```

```php
// app/Jobs/ProcessReport.php

class ProcessReportJob implements ShouldQueue
{
    // ...
    public function handle(): void
    {
        logger('process the report');
    }
}
```

## Dispatch Job

```php
// app/Console/Commands/UtilQueue.php

use App\Jobs\ProcessReportJob;

class UtilQueue extends Command
{
    // ...
    public function handle()
    {
        logger('submit job');
        ProcessReportJob::dispatch();
    }
}
```

## Start Worker

```sh
$ php artisan queue:work

   INFO  Processing jobs from the [default] queue.
```

```sh
$ tail storage/logs/laravel.log
[2024-04-14 09:16:58] local.DEBUG: submit job
[2024-04-14 09:18:02] local.DEBUG: process the report
```
