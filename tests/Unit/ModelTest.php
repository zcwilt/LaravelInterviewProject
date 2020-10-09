<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ModelTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() : void
    {
        parent::setUp();
        $this->artisan('db:seed');
    }

    /** @test */
    public function it_returns_tasks_from_a_user()
    {
        $user = User::find(1)->tasks()->get();
        $this->assertCount(3, $user);
        $user = User::find(2)->tasks()->get();
        $this->assertCount(2, $user);
    }

    /** @test */
    public function it_returns_user_from_a_task()
    {
        $task = Task::find(1);
        $this->assertEquals('Gandalf', $task->user->name);
   }

    /** @test */
    public function it_returns_high_priority_tasks()
   {
        $tasks = User::find(1)->tasks()->highPriority()->get();
        $this->assertCount(2, $tasks);
        $tasks = User::find(2)->tasks()->highPriority()->get();
        $this->assertCount(1, $tasks);
   }
}
