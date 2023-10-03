<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 0; $i < 20; $i++) {
        //     // DB::table('posts')->insert([
        //     //     'title' => fake()->text(50),
        //     //     'excerpt' => fake()->text(100),
        //     //     'body' => fake()->text(200),
        //     // ]);

        //     Post::create([
        //         'title' => fake()->text(50),
        //         'excerpt' => fake()->text(100),
        //         'body' => fake()->text(200),
        //     ]);
        // }
        Post::factory(50)->create();
    }
}
