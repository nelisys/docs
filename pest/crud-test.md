# Pest Crud Test

## tests/Pest.php

```php
uses(
    Tests\TestCase::class,
    Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');
```

## index()

```php
test('user can get list of products', function () {
    $product = Product::factory()->create();

    $this->getJson('/api/products')
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                ]
            ],
        ])
        ->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);
});
```

## show()

```php
test('user can get a product', function() {
    $product = Product::factory()->create();

    $this->getJson("/api/products/{$product->id}")
        ->assertStatus(200)
        ->assertJson([
            'data' => [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
            ],
        ]);
});
```

## store()

```php
test('guest user cannot create any new product', function () {
    $data = Product::factory()->raw();

    $this->postJson('/api/products', $data)
        ->assertStatus(401);

    $this->assertDatabaseCount('products', 0);
});

test('creating a new product requires valid input data', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $data = [];

    $this->postJson('/api/products', $data)
        ->assertStatus(422)
        ->assertJson([
            'errors' => [
                'name' => [
                    __('validation.required', [
                        'attribute' => 'name',
                    ]),
                ],
                'price' => [
                    __('validation.required', [
                        'attribute' => 'price',
                    ]),
                ],
            ],
        ]);
});

test('authenticated user can create a new product', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $data = Product::factory()->raw();

    $this->postJson('/api/products', $data)
        ->assertStatus(201);

    $this->assertDatabaseHas('products', $data);
});
```

## update()

```php
test('guest user cannot update a product', function () {
    $product = Product::factory()->create();

    $data = Product::factory()->raw();  // to update

    $this->putJson("/api/products/{$product->id}", $data)
        ->assertStatus(401);

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => $product->name,
        'price' => $product->price,
    ]);
});

test('updating a product requires valid input', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $product = Product::factory()->create();

    $data = [];

    $this->putJson("/api/products/{$product->id}", $data)
        ->assertStatus(422)
        ->assertJson([
            'errors' => [
                'name' => [
                    __('validation.required', [
                        'attribute' => 'name',
                    ]),
                ],
                'price' => [
                    __('validation.required', [
                        'attribute' => 'price',
                    ]),
                ],
            ],
        ]);
});

test('authenticated user can update a product', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $product = Product::factory()->create();

    $data = Product::factory()->raw();

    $this->putJson("/api/products/{$product->id}", $data)
        ->assertStatus(200);

    $this->assertDatabaseHas('products', [
        'id' => $product->id,
        'name' => $data['name'],
        'price' => $data['price'],
    ]);
});
```

## destroy()

```php
test('guest user cannot delete any product', function () {
    $product = Product::factory()->create();

    $this->deleteJson("/api/products/{$product->id}")
        ->assertStatus(401);

    $this->assertDatabaseCount('products', 1);
});

test('authenticated user can delete a product', function () {
    $user = User::factory()->create();
    Sanctum::actingAs($user);

    $product = Product::factory()->create();

    $this->deleteJson("/api/products/{$product->id}")
        ->assertStatus(200);

    $this->assertDatabaseCount('products', 0);
});
```
