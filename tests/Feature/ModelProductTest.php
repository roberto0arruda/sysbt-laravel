<?php

namespace Tests\Feature;

use App\Models\Admin\Product;
use Exception;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModelProductTest extends TestCase
{
    use DatabaseMigrations;

    public function testCheckIfTheProductListingIsWorking()
    {
        factory(Product::class, 2)->create();

        $products = Product::all();

        $this->assertCount(2, $products);

        $productKey = array_keys($products->first()->getAttributes());
        $this->assertEqualsCanonicalizing(
            [
                'id',
                'title',
                'description',
                'price',
                'stock',
                'likes',
                'photo1',
                'photo2',
                'photo3',
                'created_at',
                'updated_at',
                'deleted_at'
            ],
            $productKey
        );
    }

    public function testCheckIfCreatingProductIsWorking()
    {
        $product = factory(Product::class)->create([
            'title' => 'test',
            'description' => 'test_description',
            'price' => 10
        ])->first();

        $this->assertEquals('test', $product->title);
        $this->assertEquals('test_description', $product->description);
        $this->assertEquals(10, $product->price);
    }

    public function testCheckIfUpdateProductIsWorking()
    {
        $product = factory(Product::class)->create([
            'title' => 'test',
            'description' => 'test_description',
            'price' => 100
        ])->first();

        $data = [
            'title' => 'test_update',
            'description' => 'test_description_update',
            'price' => 150.99
        ];

        $product->update($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $product->{$key});
        }
    }

    /** @test
     * @throws Exception
     */
    public function testCheckIfDeletingProductIsWorking()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();
        $product->delete();

        $this->assertNull(Product::find($product->id));
    }
}
