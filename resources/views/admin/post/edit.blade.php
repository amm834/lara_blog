@extends('layouts.app')
@section('title','Create Post')
@section('content')

<div class="container-fluid">
  <form method="post">
    @csrf
    @foreach($errors->all() as $error)
    <div class="row justify-content-center">
        <div class="alert alert-danger alert-dismissible fade show col-10">
      {{$error}}
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>

    </div>
    @endforeach
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show">
      {{session('status')}}
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <p class="my-3">
      <div class="form-group my-3">
        <label class="my-2">Choose Category</label>
        <select class="form-control" name="category">
          @foreach($categories as $category)
          <option value="{{$category->id}}"
          @if($post->cat_id == $category->id)
          selected
          @endif
          >{{$category->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <textarea name="content" id="editor" class="form-control">
          {!! $post->content !!}
        </textarea>
      </div>
      <input type="submit" value="Post" class="btn btn-primary my-3">
    </p>
  </form>

</div>

@endsection