<?php
/**
 * Created by PhpStorm.
 * User: kyo88
 * Date: 11/22/2017
 * Time: 11:29 AM
 */

namespace App\Http\Controllers;


use App\Http\Requests\PostForm;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
  /**
   * Create a new controller instance.
   *
   */
  public function __construct()
  {
    $this->middleware('auth')->except([
      'lists',
      'detail',
    ]);
  }

  public function add(Request $request)
  {
    if(!empty(session('errors'))){
//      dd ($request->all());
    }
    return view('post.add', [
      'title' => 'Add Post'
    ]);
  }

  public function confirm(PostForm $request)
  {
    $data = $request->all();
    return view('post.confirm', [
      'data' => $data,
      'title' => 'Confirm'
    ]);
  }

  public function postAdd(PostForm $request)
  {
    $data = $request->all();
    $post = new Post([
      'title' => $data['title'],
      'content' => $data['content'],
      'user_id' => 1,
    ]);
    $post->save();
    return redirect(route('post.list'));
  }

  public function lists()
  {
    $posts = Post::all();
    return view('post.list',[
      'posts' => $posts,
      'title' => 'All Post'
    ]);
  }

  public function detail($id)
  {
    $post = Post::find($id);
    return view('post.detail',[
      'post' => $post,
      'title' => 'Detail of ' . $id,
    ]);
  }
}