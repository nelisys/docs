# curl

## JSON POST

```php
$url = 'http://www.example.com';

$headers = [
    'Content-Type: application/json',
    'X-Requested-With: XMLHttpRequest',
    'Authorization: Bearer ...',
];

$data = [
    'name' => '...',
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
print_r($result);

curl_close($ch);
```
