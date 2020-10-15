@extends('layouts.app')
@section('title','Categories')
@section('content')
<div class="container">

  <!-- Button trigger modal -->
  @if(session('status'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  @foreach($errors->all() as $error)
  <div class="alert alert-danger alert-dismissible fade show">
    {{$error}}
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>

  </div>
  @endforeach
  <button type="button" class="btn btn-outline-info my-3" data-toggle="modal" data-target="#staticBackdrop">
    Create A Category
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Create A Category</h5>
          <button type="button" class="btn-close" data-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form id="form" method="post">
            @csrf

            <div class="form-group">
              <label for="name" class="my-2">Category Name</label>
              <input type="text" class="form-control" name="name" id="name">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-success" form="form">Create</button>
        </div>
      </div>
    </div>
  </div>


  <table class="table">
    <th>#</th>
    <th class="text-center">
      name
    </th>
    <th class="text-center">Manage Category</th>
    <tbody>
      @foreach($categories as $category)
      <tr>
        <td>
          {{$category->id}}</td>
        <td class="text-center">
          {{$category->name}}
          </td>
          <td class="text-center">
            <a href="{{action('admin\CategoryController@edit',$category->id)}}" class="btn btn-primary">Edit</a>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection