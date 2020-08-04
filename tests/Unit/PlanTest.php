<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Admin\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanTest extends TestCase
{
    public function testCheckIfPlanColumnsIsCorrect()
    {
        // Given // Dado
        $plan = new Plan();

        $expected = ["name", "url", "price", "description"];

        // When // Quando
        $arrayCompared = array_diff($expected, $plan->getFillable());

        // Then // Então
        $this->assertEquals(0, count($arrayCompared));
    }
}
