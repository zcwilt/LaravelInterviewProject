<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class TaskTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /** @test */
    public function it_fails_the_task_list_not_logged_in()
    {
        $response = $this->get('/tasks');
        $response->assertStatus(302);
    }

    /** @test */
    public function it_gets_the_task_list()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
                         ->get('/tasks');

        $response->assertStatus(200);
        $response->AssertSee('Gandalf');
    }

    /** @test */
    public function it_adds_a_task()
    {
        $user = User::find(1);
        $userInfo = ['name' => 'Test Task Blah', 'priority' => 2 ];
        $response = $this->actingAs($user)->followingRedirects()
                         ->post('/tasks', $userInfo);
        $response->assertStatus(200);
        $response->AssertSee('Test Task Blah');
    }

    /** @test */
    public function it_fails_to_add_a_task()
    {
        $user = User::find(1);
        $userInfo = [];
        $response = $this->actingAs($user)->followingRedirects()
                         ->post('/tasks', $userInfo);

        $response->assertStatus(200);
        $response->AssertSee('The name field is required');
    }

}
