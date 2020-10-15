@extends('layouts.app')
@section('title','Manage Posts')
@section('content')
<div class="container">
  @if(session('status'))
  <div class="alert alert-success" >
    {{session('status')}}
  </div>
  @endif
  @foreach($posts as $post)
  <div class="card my-2">
    <div class="card-body">
        {!! Str::limit($post->content,150) !!}
    </div>
    <div class="card-footer">
      <button class="btn">
        {{$post->created_at->diffForHumans()}}
      </button>
            <!-- Edit Post -->
      <a href="{{action('admin\PostController@edit',$post->id)}}" class="btn btn-outline-info float-right mx-2">Edit</a>
      <!-- Button trigger modal -->
<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#staticBackdrop">
  Delete
</button>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Warinig!</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this post?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a  class="btn btn-danger" href="{{action('admin\PostController@delete',$post->id)}}">Delete</a>
      </div>
    </div>
  </div>
</div>
      

    </div>
  </div>
  @endforeach
    <div class="row justify-content-center my-3">
    <div class="col-10 offset-1">
          {{$posts->links()}}

    </div>
  </div>

</div>
@endsection