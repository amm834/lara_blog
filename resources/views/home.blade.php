@extends('layouts.app')

@section('content')
@if(Auth::check() && Auth::id() === 1)
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
        {{ session('status') }}
      </div>
      @endif
      <div class="card">
        <div class="card-header">
          Discuss Something
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <a href="{{route('post-create')}}">
                <input type="text" class="form-control border-top-0 border-left-0 border-right-0 rounded-0" placeholder="Discuss Here!">

              </a>

            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endif
<div class="container my-3">
  <div class="row">
    @foreach($posts as $post)
    <a href="{{action('admin\PostController@show',$post->id)}}">
      <div class="card bg-light text-dark my-2">
        <div class="card-header text-left">
          {{$post->created_at->diffForHumans()}}
        </div>
        <div class="card-body">
          <p class="card-text">
            {!! Str::limit($post->content,300,' [ See More ... ] ') !!}

          </p>
          
        </div>
<div class="card-footer text-right">
  @foreach($categories as $cat)
  @if($post->cat_id == $cat->id)
 <b>tag : </b> {{$cat->name}}
  @endif
  @endforeach
</div>
      </div>
    </a>
    @endforeach

  </div>
  <div class="row justify-content-center my-3">
    <div class="col-10 offset-1 row">
        {{$posts->links()}}
    </div>
  </div>
</div>



@endsection