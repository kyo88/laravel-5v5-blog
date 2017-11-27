<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testExample()
  {
    $response = $this->get(route('post.add'));

    $response->assertRedirect(route('login'));
  }

  public function testAccessToAddPost()
  {
    $user = factory(User::class)->create();

    $response = $this->actingAs($user)
      ->withSession(['foo' => 'bar'])
      ->get(route('post.list'));

    $response->assertSeeText('List of posts');

  }

  public function testAddPost()
  {
    $title = 'This is test post';
    $content = 'Content of post';
    $user = User::all()->first();

    $this->actingAs($user)
      ->withSession(['foo' => 'bar'])
      ->get(route('post.add'));

    $response = $this->post(route('post.confirm'), [
      'title'   => $title,
      'content' => $content,
      '_token'  => csrf_token(),
    ]);

    $response->assertSeeText('Confirm post data');
  }

  public function testAddPostTitleInvalid()
  {
    $title = 'This is';
    $content = 'Content of post';
    $user = User::all()->first();

    $this->actingAs($user)
      ->withSession(['foo' => 'bar'])
      ->get(route('post.add'));

    $response = $this->followingRedirects()
      ->post(route('post.confirm'), [
        'title'   => $title,
        'content' => $content,
        '_token'  => csrf_token(),
      ]);

    $response->assertSeeText('The title must be at least 10 characters');
  }
}
