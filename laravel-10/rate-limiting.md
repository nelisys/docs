# Rate Limiting

```php
use Illuminate\Support\Facades\RateLimiter;

$key = 'test-limiter-2';

$callback = function () {
    echo now()->format('H:i:s ');
    echo "\n";
};

// limit 100 per 1 hour
$executed = RateLimiter::attempt($key,
    $maxAttempts = 100,
    $callback,
    $decaySeconds = 3600
);

$remaining = RateLimiter::remaining($key, 100);
echo "remaining = {$remaining}\n";

$availableIn = RateLimiter::availableIn($key);
echo "availableIn = {$availableIn}\n";
 
if (! $executed) {
  echo "Too many messages sent!\n";
}
```
