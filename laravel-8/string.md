# String

## markdown

```php
use Illuminate\Support\Str;

$md = "# Topics
- Laravel
- JavaScript
- CSS";

echo Str::markdown($md);
// <h1>Topics</h1>
// <ul>
// <li>Laravel</li>
// <li>JavaScript</li>
// <li>CSS</li>
// </ul>
```
