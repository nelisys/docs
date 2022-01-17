# Network

```php
$results = dns_get_record('example.com', DNS_A + DNS_TXT);

// Array
// (
//     [0] => Array
//         (
//             [host] => example.com
//             [class] => IN
//             [ttl] => 4502
//             [type] => A
//             [ip] => 93.184.216.34
//         )
//
//     [1] => Array
//         (
//             [host] => example.com
//             [class] => IN
//             [ttl] => 4502
//             [type] => TXT
//             [txt] => v=spf1 -all
//             [entries] => Array
//                 (
//                     [0] => v=spf1 -all
//                 )
//
//         )
//
//     [2] => Array
//         (
//             [host] => example.com
//             [class] => IN
//             [ttl] => 4502
//             [type] => TXT
//             [txt] => yxvy9m4blrswgrsz8ndjh467n2y7mgl2
//             [entries] => Array
//                 (
//                     [0] => yxvy9m4blrswgrsz8ndjh467n2y7mgl2
//                 )
//
//         )
//
// )
```
