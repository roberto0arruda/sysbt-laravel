<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Admin\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testCheckIfIndexFunctionIsWorking()
    {
        $products = factory(Product::class, 10)->create();

        $response = $this->get(route('api.products.index'));

        $response
            ->assertStatus(200)
            ->assertJsonCount(10)
            ->assertJson($products->toArray());
    }

    public function testCheckIfShowFunctionIsWorking()
    {
        $product = factory(Product::class)->create();

        $response = $this->getJson(route('api.products.show', ['product' => $product->id]));
        $response
            ->assertStatus(200)
            ->assertJson($product->toArray());

        $response = $this->getJson(route('api.products.show', ['product' => 2]));

        $response
            ->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'No query results for model [App\Models\Admin\Product] 2'
            ]);
    }

    public function testCheckIfStoreFunctionIsWorking()
    {
        $response = $this->postJson(route('api.products.store'), [
            'title' => 'test',
            'description' => 'description_test',
            'price' => 100
        ]);

        $id = $response->json('id');
        $product = Product::find($id);
        $response
            ->assertStatus(201)
            ->assertJson($product->toArray());
    }

    public function testCheckIfUpdateFunctionIsWorking()
    {
        $product = factory(Product::class)->create([
            'title' => 'test',
            'description' => 'test_description',
            'price' => 100
        ]);

        $response = $this->putJson(
            route('api.products.update', ['product' => $product->id]),
            [
                'title' => 'test_update',
                'description' => 'update_description',
                'price' => 150
            ]
        );

        $id = $response->json('id');
        $product = Product::find($id);
        $response
            ->assertStatus(200)
            ->assertJson($product->toArray())
            ->assertJsonFragment([
                'title' => 'test_update',
                'description' => 'update_description',
                'price' => 150
            ]);
    }

    public function testCheckIfDestroyFunctionIsWorking()
    {
        $product = factory(Product::class)->create();

        $response = $this->deleteJson(route('api.products.destroy', ['product' => $product->id]));
        $response->assertStatus(204);

        $response = $this->deleteJson(route('api.products.destroy', ['product' => $product->id]));
        $response
            ->assertStatus(404)
            ->assertJsonFragment([
                'message' => "No query results for model [App\Models\Admin\Product] {$product->id}"
            ]);
    }
}
