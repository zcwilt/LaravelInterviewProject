<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class HighPriorityFeatureTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /** @test */
    public function it_lists_starting_high_priority()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)->followingRedirects()
                         ->get('/highpriority');
        $response->assertStatus(200);
        $response->AssertSee('High Priority Tasks');
        $response->AssertSee('Gandalf High 1');
        $response->AssertSee('Gandalf High 2');
        $response->AssertDontSee('Gandalf Low 1');
    }
}
