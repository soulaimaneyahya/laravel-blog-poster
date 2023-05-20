<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testNoPostsWhenNothingInDatabase()
    {
        $this->get('/posts')
            ->assertSeeText('There are no posts');
    }

    public function testSee1PostWhenThereIs1()
    {
        // Arrange
        $post = $this->createDummyPost();

        // Act
        $response = $this->get('/posts');

        // // Assert
        $response->assertSeeText("@{$post->user->username}");
        $response->assertSeeText($post->content);
        $response->assertSeeText('0 likes');

        $this->assertDatabaseHas('posts', [
            'content' => $post->content
        ]);
    }

    public function testSee1BlogPostWithLikes()
    {
        $likesCount = 5;
        $john = $this->john();
        $post = $this->createDummyPost($john->id);

        $this->likes($likesCount, $john->id, $post->id);

        $response = $this->get('/posts');
        $response->assertSeeText($post->content);
        $response->assertSeeText("$likesCount likes");
    }

    public function testStoreValid()
    {
        $params = [
            'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
        ];

        $this->actingAs($this->john())
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Post Created');
    }

    public function testStoreFail()
    {
        $params = [
            'content' => ''
        ];

        $this->actingAs($this->john())
            ->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();

        $this->assertEquals($messages['content'][0], 'The content field is required.');
    }


    public function testUpdateValid()
    {
        $john = $this->john();
        $post = $this->createDummyPost($john->id);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'content' => $post->content,
            'user_id' => $john->id
        ]);

        $params = [
            'content' => 'Content was changed'
        ];

        $this->actingAs($john)
            ->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Post Updated');
        $this->assertDatabaseMissing('posts', [
            'id' => $post->id,
            'content' => $post->content
        ]);
        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'content' => 'Content was changed'
        ]);
    }

    public function testDeletePost()
    {
        $john = $this->john();
        $post = $this->createDummyPost($john->id);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
            'content' => $post->content,
            'user_id' => $john->id
        ]);

        $this->actingAs($john)
            ->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Post Deleted');
        // $this->assertDatabaseMissing('posts', [
        //     'id' => $post->id,
        //     'content' => $post->content
        // ]);
        $this->assertSoftDeleted('posts', [
            'id' => $post->id,
            'content' => $post->content
        ]);
    }
}
