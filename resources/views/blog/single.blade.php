@extends('pages.app')

@section('content')

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center text-bold">{{$post->title}}</h1>
            <p>{!!$post->body!!}</p>
            <hr>
        <p>Posted in: {{$post->category->name}}</p>
        <!-- <p>Posted in: {{$post->user->name}}</p> -->
        </div>
    </div>

    <div class="row">
        <div class="offset-2">
            <h1>Comments</h1>
            @foreach ($post->comments->sortByDesc('id') as $comment)

            <div class="row">
                <div class="comment_content mb-4 offset-3">
                    <div class="author_info">
                        <img src="{{"https://www.gravatar.com/avatar/" . md5( strtolower( trim( " $comment->email " ) ) ) . "?d=mm"}}" alt="image here" class="author_image">
                        <div class="author_name">
                            <h4 class="mb-0 comment-h">{{$comment->name}}</h4>
                            <p class="text-muted text-sm">{{date('jS M, Y g:ia', strtotime($comment->created_at))}}</p>
                        </div>
                    </div>
                    <div class="comment">
                      <p class="comment-body">  {{$comment->comment}}</p>
                    </div>
                </div>

            </div>

            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="{{route('comments.store', $post->id)}}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="John Doe" class="form-control">
                    </div>

                    <div  class="form-group col-md-6">
                        <label for="email">Email:</label>
                        <input type="text" name="email" placeholder="johndoe@gmail.com" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea name="comment" rows="5" class="form-control"></textarea>
                </div>

                <div>
                    <button class="btn btn-outline-success">Send</button>
                </div>
            </form>
        </div>
    </div>


@endsection
