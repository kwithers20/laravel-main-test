<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageLoadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPageLoads()
    {
        $user = \App\Models\User::factory()->create();

        $response = $this->actingAs($user)->get('/sales');

        $response->assertStatus(200);
        $response->assertSee('Record a new sale');
    }
}
