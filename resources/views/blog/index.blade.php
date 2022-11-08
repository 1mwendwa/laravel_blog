@extends('pages.app')

@section('content')

 <div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <h1>Blog</h1>
        </div>
    </div>

    @foreach ($posts as $post)

    <div class="row">
        <div class="col-md-8 offset-md-2">
        <h1 class="">{{$post->title}}</h1>
        <h6 class="text-muted">published: {{date('jS M, Y g:ia', strtotime($post->created_at))}}</h6>
        <p>{{substr(strip_tags($post->body), 0, 300)}}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
        <a href="{{route('blog.single', $post->slug)}}" class="btn btn-primary">Read More</a>
        <hr>
        </div>
    </div>

    @endforeach

    <div class="row">
        <div class="col-md-2 offset-md-5">
            {!!$posts->links();!!}
        </div>
    </div>
 </div>

@endsection
