<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\PostFormRequest;
use App\Models\User;

class PostController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    // Post creator
    $categories = Category::all();
    return view('admin.post.create', compact('categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PostFormRequest $request) {

    // Store post
    Post::create([
      'content' => $request->get('content'),
      'cat_id' => $request->get('category')
    ]);
    return redirect('/')->with('status', 'You posted successfully!');

  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
    //Show all posts
    $post = Post::whereId($id)->firstOrFail();
    $comments = $post->comments;
    return view('admin.post.show', compact('post', 'comments'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    // Edit
    $categories = Category::all();
    $post = Post::whereId($id)->firstOrFail();
    return view('admin.post.edit', compact('categories', 'post'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(PostFormRequest $request, $id) {
    // Post update

    $post = Post::whereId($id)->firstOrFail();
    $post->cat_id = $request->get('category');
    $post->content = $request->get('content');
    $post->update();
    return redirect('admin/posts')->with('status', 'Post have been modified!');

  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
  }
  function delete($id) {
    $post = Post::whereId($id)->firstOrFail();
    $post->delete();
    return redirect('admin/posts')->with('status', 'Successfully Deleted!');
  }
}