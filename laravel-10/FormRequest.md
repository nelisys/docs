# FormRequest

## array validation

### validation messages for array

```php
    public function attributes(): array
    {
        return [
            'products.*.name' => __('product name'),
            'products.*.quantity' => __('product :index quantity'), // show the :index
        ];
    }
```

### custom validation message

```php
    public function messages()
    {
        return [
            'products.*.name.required' => __('Product :position is required'),
            'products.*.quantity.required' => __('Quantity is required'),
        ];
    }
```

