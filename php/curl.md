# curl

## JSON POST

```php
$url = 'http://www.example.com';

$headers = [
    'Content-Type: application/json',
    // 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
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
curl_setopt($ch, CURLINFO_HEADER_OUT, true); // debug headers

$result = curl_exec($ch);
print_r($result);

$headers = curl_getinfo($ch, CURLINFO_HEADER_OUT);
print_r($headers);

curl_close($ch);
```
