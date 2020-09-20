<?php

namespace Tests\Unit;

use App\Models\Admin\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testCheckIfProductFieldsIsCorrect()
    {
        $product = new Product;

        $expected = [
            'title',
            'description',
            'price',
            'stock',
            'photo1',
            'photo2',
            'photo3'
        ];

        $arrayCompared = array_diff($expected, $product->getFillable());

        $this->assertCount(0, $arrayCompared);
    }
}
