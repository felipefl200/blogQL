<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        Topic::create(['name' => 'Feature', 'slug' => 'featured']);
        Topic::create(['name' => 'UserFul Links', 'slug' => 'links']);
        Topic::create(['name' => 'Guides & Tutorials', 'slug' => 'tutorials']);

        Post::factory(20)->create();
    }
}
