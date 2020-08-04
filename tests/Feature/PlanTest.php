<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanTest extends TestCase
{
    public function testOnlyLoggedUsersCanSeePlansList()
    {
        $response = $this->get('/admin/planos');

        $response->assertRedirect('/login');
    }
}
