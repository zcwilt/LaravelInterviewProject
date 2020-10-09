<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create(
            [
                'name'     => 'Gandalf',
                'email'    => 'gandalf@gmail.com',
                'password' => \Hash::make('password'),
            ]
        );
        $user2 = User::create(
            [
                'name'     => 'Frodo',
                'email'    => 'frodo@gmail.com',
                'password' => \Hash::make('password'),
            ]
        );
        Task::create(
            [
                'name'     => 'Gandalf Low 1',
                'user_id' => $user1->id,
                'priority' => 0,
            ]
        );
        Task::create(
            [
                'name'     => 'Gandalf High 1',
                'user_id' => $user1->id,
                'priority' => 2,
            ]
        );
        Task::create(
            [
                'name'     => 'Gandalf High 2',
                'user_id' => $user1->id,
                'priority' => 2,
            ]
        );
        Task::create(
            [
                'name'     => 'Frodo High 1',
                'user_id' => $user2->id,
                'priority' => 2,
            ]
        );
        Task::create(
            [
                'name'     => 'Frodo low 1',
                'user_id' => $user2->id,
                'priority' => 0,
            ]
        );
    }
}
