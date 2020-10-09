<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /** @test */
    public function it_fails_the_user_list_not_logged_in()
    {
        $response = $this->get('/users');
        $response->assertStatus(302);
    }

    /** @test */
    public function it_gets_the_user_list()
    {
        $user = User::find(1);
        $response = $this->actingAs($user)
                         ->get('/users');

        $response->assertStatus(200);
        $response->AssertSee('Gandalf');
    }


    /** @test */
    public function it_adds_a_user()
    {
        $user = User::find(1);
        $userInfo = ['name' => 'Bilbo', 'email' => 'bilbo@gmail.com', 'password' => 'password'];
        $response = $this->actingAs($user)->followingRedirects()
                         ->post('/users', $userInfo);

        $response->assertStatus(200);
        $response->AssertSee('Bilbo');
    }

    /** @test */
    public function it_fails_to_add_a_user()
    {
        $user = User::find(1);
        $userInfo = [];
        $response = $this->actingAs($user)->followingRedirects()
                         ->post('/users', $userInfo);

        $response->assertStatus(200);
        $response->AssertSee('The email field is required');
    }
}
