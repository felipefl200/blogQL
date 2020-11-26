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
        Topic::create(['name' => 'Destaques', 'slug' => 'featured']);
        Topic::create(['name' => 'Links uteis', 'slug' => 'links']);
        Topic::create(['name' => 'Guias e tutoriais', 'slug' => 'tutorials']);

        Post::factory(20)->create();
    }
}
