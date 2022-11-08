@extends('pages.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-offset-1">
                    <h1>My Posts</h1>
                </div>
            </div>

            <div class="col-md-2">
                <div class="col-md-offset-1">
                    <a href="/posts/create" class="btn btn-primary">Create New post</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-10">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Created on</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                  <tr>
                    <th>{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{ substr(strip_tags($post->body), 0, 50)}} {{ strlen(strip_tags($post->body)) > 50 ? "..." : ""}}</td>
                    <td>{{date('jS M, Y g:ia', strtotime($post->created_at))}}</td>
                    <td><a href="/posts/{{$post->id}}" class="btn btn-sm btn-outline-success btn-block">View</a> <a href="/posts/{{$post->id}}/edit" class="btn btn-sm btn-outline-primary btn-block">Edit</a></td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-2 offset-md-5">
                    {!!$posts->links();!!}
                </div>
            </div>
        </div>
    </div>
@endsection
