<?php

namespace App\Domain\Products\Tests;

use App\Domain\Products\Models\Product;
use App\Support\Domain\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\TestCase;

class UnitModelProductTest extends TestCase
{
    private $product;

    public function testCheckIfProductFieldsIsCorrect()
    {
        $expected = [
            'title',
            'price',
            'description',
            'stock',
            'photo1',
            'photo2',
            'photo3'
        ];

        $arrayCompared = array_diff($expected, $this->product->getFillable());

        $this->assertCount(0, $arrayCompared);
        $this->assertEquals($expected, $this->product->getFillable());
    }

    public function testCheckIfIsUsingTraits()
    {
        $traits = [
            SoftDeletes::class,
            Uuid::class
        ];
        $productTraits = array_keys(class_uses(Product::class));
        $this->assertEquals($traits, $productTraits);
    }

    public function testCheckIfIncrementingAttributeIsFalse()
    {
        $this->assertFalse($this->product->incrementing);
    }

    public function testCheckIfDatesAttributeIsCorrect()
    {
        $expected = ['deleted_at', 'created_at', 'updated_at'];
        $this->assertIsArray($this->product->getDates());
        $this->assertCount(count($expected), $this->product->getDates());
        foreach ($expected as $item) {
            $this->assertContains($item, $this->product->getDates());
        }

        $this->assertEqualsCanonicalizing($expected, $this->product->getDates());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->product = new Product();
    }
}
