@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="container">

  <div class="card border-0">
    <h1 class="display-6">
      Users
    </h1>
    <div class="card-body overflow-auto">
      <table class="table">
        <thead>
          <th>#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Manage</th>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>
              {{$user->id}}
            </td>
            <td>
              {{$user->name}}
            </td>
            <td>
              {{$user->email}}
            </td>
            <td class="text-center">
              <a href="{{action('admin\AdminController@delete',$user->id)}}" class="btn btn-danger btn-sm my-1">
                Ban
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
  </div>


</div>
@endsection