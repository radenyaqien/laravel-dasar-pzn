<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(3)->create();
    

        Category::create([
            "name"=> "web programming",
            "slug"=> "web-programming"
        ]);
        Category::create([
            "name"=> "desktop programming",
            "slug"=> "desktop-programming"
        ]);
        Category::create([
            "name"=> "mobile programming",
            "slug"=> "mobile-programming"
        ]);

        Post::factory(30)->create();

    }
}
