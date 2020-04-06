# Exception

## Throw by static Class::Method

```php
class TeamException extends Exception
{
    public static function fromTooManyMembers()
    {
        return new static('cannot add more than 3 team mebers!');
    }
}

// call
throw TeamException::fromTooManyMembers();
```
