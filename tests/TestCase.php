<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function likes(string $nbr, string $userId, string $postId)
    {
        return \App\Models\Like::factory($nbr)->create([
            'user_id' => $userId,
            'post_id' => $postId
        ]);
    }

    protected function createDummyPost(?string $userId = null)
    {
        return \App\Models\Post::factory()->lorem()->create([
            'user_id' => $userId ?? $this->john()->id
        ]);
    }

    protected function john()
    {
        return \App\Models\User::factory()->john()->create();
    }
}
