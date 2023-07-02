<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

use function PHPSTORM_META\map;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // only needed if db not refreshed at the start
        // User::truncate();
        // Post::truncate();
        // Category::truncate();

        Post::factory(5)->create();

  
    }
}
