# xml

```php
$xml = '
<students>
    <student>
        <id>1</id>
        <name>Alice</name>
    </student>
    <student>
        <id>2</id>
        <name>Bob</name>
    </student>
</students>';

$x = new SimpleXMLElement($xml);

$x->student[1]->name = 'New Bob';

$x->student[2]->id = 3;
$x->student[2]->name = 'Carter';
```

`print_r($x)`

```console
SimpleXMLElement Object
(
    [student] => Array
        (
            [0] => SimpleXMLElement Object
                (
                    [id] => 1
                    [name] => Alice
                )

            [1] => SimpleXMLElement Object
                (
                    [id] => 2
                    [name] => New Bob
                )

            [2] => SimpleXMLElement Object
                (
                    [id] => 3
                    [name] => Carter
                )

        )

)
```

