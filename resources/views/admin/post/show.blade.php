@extends('layouts.app')
@section('title','Post')
@section('content')
<div class="container">

  <div class="card border-0">
    <div class="card-header">
      <span class="float-right">
        {!! $post->created_at->diffForHumans() !!}

      </span>
    </div>
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show my-3">
      {{session('status')}}
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <div class="card-body">
      <p class="card-text">
        {!! $post->content !!}
      </p>
    </div>
    <hr>
    <!-- Show All Comments -->
    <div class="card bg-light">
      @foreach($comments as $comment)
      <div class="card-body">
        {{$comment->content}}
      </div>
      @endforeach

    </div>
    <!-- Comment Form -->
    @if(Auth::check())
    <form method="post" class="my-3">
      @csrf
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Discuss Something ..." name="content">
      </div>
      @if(Auth::check())
      <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
      @endif
      <input type="hidden" name="commentable_id" value="{{$post->id}}">
      <input type="hidden" name="commentable_type" value="App\Models\Post">
      <button class="btn btn-primary my-3 float-right">Comment</button>
    </form>
    @else
    <div class="form-group">
      <input type="text" class="form-control my-3" placeholder="Login to share your ideas!" disabled>
    </div>
    @endif
  </div>
</div>
@endsection