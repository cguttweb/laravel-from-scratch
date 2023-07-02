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
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        // for testing purposes only!
        $coding = Category::create([
            'name' => 'Coding',
            'slug' => 'coding'
        ]);

        $blog = Category::create([
            'name' => 'Blog',
            'slug' => 'blog'
        ]);

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Post::create([
            'user_id' => $user->id, 
            'category_id' => $coding->id,
            'title' => 'My Coding Post',
            'slug' => 'my-coding-post',
            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia accusamus consectetur vitae maxime ut repellendus sapiente rerum at odit harum nostrum, cupiditate optio. Ullam vero, alias nam deserunt ex quae, ipsa quisquam ducimus, dignissimos enim est reiciendis rem fugiat mollitia provident! Ut doloribus deleniti animi? Nihil perspiciatis non incidunt quasi eaque dolorem. Excepturi earum illum, blanditiis neque eos alias temporibus ipsum reiciendis cum, at laudantium inventore quaerat ad corporis eveniet atque. Porro, laudantium magni. Neque quas numquam laborum repudiandae fugit placeat tenetur aperiam, beatae quod, saepe officiis unde possimus commodi eaque, eius aliquid itaque repellendus sunt quo voluptate ea nihil.</p>'
        ]);

        Post::create([
            'user_id' => $user->id, 
            'category_id' => $blog->id,
            'title' => 'My Blog Post',
            'slug' => 'my-blog-post',
            'excerpt' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.',
            'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia accusamus consectetur vitae maxime ut repellendus sapiente rerum at odit harum nostrum, cupiditate optio. Ullam vero, alias nam deserunt ex quae, ipsa quisquam ducimus, dignissimos enim est reiciendis rem fugiat mollitia provident! Ut doloribus deleniti animi? Nihil perspiciatis non incidunt quasi eaque dolorem. Excepturi earum illum, blanditiis neque eos alias temporibus ipsum reiciendis cum, at laudantium inventore quaerat ad corporis eveniet atque. Porro, laudantium magni. Neque quas numquam laborum repudiandae fugit placeat tenetur aperiam, beatae quod, saepe officiis unde possimus commodi eaque, eius aliquid itaque repellendus sunt quo voluptate ea nihil.</p>'
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
