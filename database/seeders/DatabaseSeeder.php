<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()
           ->count(7)
           ->sequence(
               ['user_role' => 'user'],
               ['user_role' => 'user'],
               ['user_role' => 'author'],
               ['user_role' => 'author'],
               ['user_role' => 'author'],
               ['user_role' => 'admin'],
               ['user_role' => 'admin']
           )
           ->has(Post::factory(3)->state(function (array $attributes, User $user) {
               return ['author' => $user->name];
           }))
           ->create();
    }
}
