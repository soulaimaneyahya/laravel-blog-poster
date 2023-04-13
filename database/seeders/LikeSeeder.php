<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        $posts->each(function($post) use($users) {
            Like::factory(rand(0, 10))->create([
                'user_id' => $users->random()->id,
                'post_id' => $post->id
            ]);
        });
    }
}
