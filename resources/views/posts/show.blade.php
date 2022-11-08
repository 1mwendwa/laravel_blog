@extends('pages.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>{{$post->title}}</h2>
                <p>
                    {!!$post->body!!}
                </p>
            </div>
            <div class="col-md-4">
                <div class="bg-light text-black rounded-lg p-4">
                    <dl class="dl-horizontal ml-3">
                        <dt>url:</dt>
                        <dd>  <a class="text-info" href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
                    </dl>
                    <dl class="dl-horizontal ml-3">
                        <dt>Category:</dt>
                        <dd>{{ $post->category->name }}</dd>
                    </dl>
                     <dl class="dl-horizontal ml-3">
                        <dt>Created by:</dt>
                        <dd>{{ $post->user->name }}</dd>
                    </dl>
                    <dl class="dl-horizontal ml-3">
                        <dt>Created at:</dt>
                        <dd>{{ date('jS M, Y g:ia', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal ml-3">
                        <dt>Last updated:</dt>
                        <dd>{{ date('jS M, Y g:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-block">edit</a>
                        </div>
                        <div class="col-sm-6">
                            <form action="/posts/{{$post->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-block">DELETE</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <a href="/posts" class="btn btn-info btn-block"><< All Posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="">
                <h1>Comments</h1>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Comment</th>
                        <th scope="col">Sender Email</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($post->comments->sortByDesc('id') as $comment)
                      <tr>
                        <th scope="row">{{$comment->id}}</th>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->email}}</td>
                        <td>
                            <form action="/comments/{{$comment->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger"><span><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg></span></button>
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
