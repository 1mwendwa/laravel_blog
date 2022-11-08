@extends('pages.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
              <h1 class="display-4">Welcome to my blog page!</h1>
              <p class="lead">Thank you for visiting my blog page. Hope that it will be entertaini</p>
              <hr class="my-4">
              <a class="btn btn-primary btn-lg" href="#" role="button">Trending Posts</a>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-3 d-flex mb-4">
                    <div class="card flex-fill">
                        <div class="card-body">
                            <h3 class="card-title">{{$post->title}}</h3>
                            <p class="card-text">{{ substr(strip_tags($post->body), 0, 200)}} {{ strlen(strip_tags($post->body)) > 200 ? "..." : ""}}</p>
                            <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-primary">Read More </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-2">
            <div class="bg-light p-4 rounded">
                <h1>Sidebar</h1>
                @foreach ($posts as $post)
                {{$post->title}}
                @endforeach

            </div>
        </div>
    </div>


</div>
@endsection
