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

        $response = $this->get(route('products.index'));

        $response
            ->assertStatus(200)
            ->assertJsonCount(10);
    }

    public function testCheckIfShowFunctionIsWorking()
    {
        $product = factory(Product::class)->create();

        $response = $this->get(route('products.show', ['product' => $product->id]));
        $response
            ->assertStatus(200)
            ->assertJson($product->toArray());

        $response = $this->get(route('products.show', ['product' => 2]));
        $response
            ->assertStatus(404)
            ->assertJsonFragment([
                'message' => 'Not Found'
            ]);
    }

    public function testCheckIfStoreFunctionIsWorking()
    {
        $response = $this->postJson(route('products.store'), [
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
            route('products.update', ['product' => $product->id]),
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

        $response = $this->delete(
            route('products.destroy', ['product' => $product->id])
        );
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Deleted Successfully'
            ]);

        $response = $this->delete(
            route('products.destroy', ['product' => $product->id])
        );
        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Not Found'
            ]);
    }
}
