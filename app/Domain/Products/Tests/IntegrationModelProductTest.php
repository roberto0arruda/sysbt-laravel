<?php

namespace App\Domain\Products\Tests;

use App\Domain\Products\Models\Product;
use App\Support\Tests\TestCase;
use Exception;

class IntegrationModelProductTest extends TestCase
{
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
        $product = Product::create([
            'title' => 'test',
            'price' => 10
        ]);
        $product->refresh();

        $this->assertEquals(36, strlen($product->id));
        $this->assertEquals('test', $product->title);
        $this->assertEquals(10, $product->price);
        $this->assertEquals('0', $product->stock);
        $this->assertEquals('0', $product->likes);
        $this->assertNull($product->description);
        $this->assertNull($product->photo1);
        $this->assertNull($product->photo2);
        $this->assertNull($product->photo3);
        $this->assertNull($product->deleted_at);

        $product = Product::create([
            'title' => 'test2',
            'description' => 'description_test',
            'price' => 10
        ]);
        $this->assertEquals('description_test', $product->description);
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

    /**
     * @throws Exception
     */
    public function testCheckIfDeletingProductIsWorking()
    {
        /** @var Product $product */
        $product = factory(Product::class)->create();
        $product->delete();
        $this->assertNull(Product::find($product->id));

        $product->restore();
        $this->assertNotNull(Product::find($product->id));
    }
}
