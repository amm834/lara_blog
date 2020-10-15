@extends('layouts.app')
@section('title','Categories')
@section('content')
<div class="container">
<div class="card">
  <div class="card-body">
      <form method="post">
  @csrf
    @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible fade show">
    {{$error}}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>

  </div>
  @endforeach
  <div class="form-group">
    <label>Edit Category</label>
    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 rounded-0 my-3" value="{{$category->name}}" name="name">
  </div>
  <button type="submit"class="btn btn-primary">Edit</button>
</form>

  </div>
</div>
</div>
@endsection