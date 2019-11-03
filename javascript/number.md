# JavaScript Number

## toLocaleString()

```
(1234.567).toLocaleString('en');
// 1,234.567

(1234.567).toLocaleString('en', { style: 'currency', currency: 'USD' });
// $1,234.57

(1234.567).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
// 1,234.57

(1234).toLocaleString('en', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
// 1,234.00
```
