<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = collect(User::all()->modelKeys());
        $count = max((int)$this->command->ask("How many posts would you like ?", 100), 1);
        
        Post::factory($count)->make()->each(function ($post) use ($users) {
            $post->user_id = $users->random();
            $post->save();
        });
    }
}
