<?php

namespace Tests\Feature\Http\Requests\Admin;

use App\Models\Admin\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductRequestTest extends TestCase
{
    use DatabaseMigrations;

    public function testCheckIfAllFieldsIsValidatedOnCreate()
    {
        $response = $this->postJson(route('api.products.store'), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'title',
                'price'
            ])
            ->assertJsonFragment([
                \Lang::get('validation.required', ['attribute' => 'título'])
            ])
            ->assertJsonFragment([
                \Lang::get('validation.required', ['attribute' => 'preço'])
            ]);
    }

    public function testCheckIfAllFieldsIsValidatedOnUpdate()
    {
        $product = factory(Product::class)->create();
        $response = $this->putJson(route('api.products.update', ['product' => $product->id]), []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'title',
                'price'
            ])
            ->assertJsonFragment([
                \Lang::get('validation.required', ['attribute' => 'título'])
            ])
            ->assertJsonFragment([
                \Lang::get('validation.required', ['attribute' => 'preço'])
            ]);
    }
}
