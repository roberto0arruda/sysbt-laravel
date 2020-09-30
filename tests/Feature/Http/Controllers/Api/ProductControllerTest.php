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
        factory(Product::class, 10)->create();

        $response = $this->get('/api/v1/products');

        $response
            ->assertStatus(200)
            ->assertJsonCount(10);
    }

    public function testCheckIfShowFunctionIsWorking()
    {
        $product = factory(Product::class)->create();

        $response = $this->get("/api/v1/products/{$product->id}");
        $response
            ->assertStatus(200)
            ->assertJson($product->toArray());

        $response = $this->getJson('/api/v1/products/2');

        $response
            ->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'No query results for model [App\Models\Admin\Product] 2'
            ]);
    }

    public function testCheckIfStoreFunctionIsWorking()
    {
        $response = $this->postJson('/api/v1/products', [
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
            "/api/v1/products/{$product->id}",
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

        $response = $this->deleteJson(
            "/api/v1/products/{$product->id}"
        );
        $response->assertStatus(204);

        $response = $this->deleteJson(
            "/api/v1/products/{$product->id}"
        );
        $response
            ->assertStatus(404)
            ->assertJsonFragment([
                'message' => "No query results for model [App\Models\Admin\Product] {$product->id}"
            ]);
    }
}
