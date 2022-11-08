@extends('pages.app')

@section('stylesheet')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
    plugins: "link",

  });
</script>
@endsection

@section('stylesheet')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
  tinymce.init({
    selector: 'textarea',
  });
</script>
@endsection

@section('content')
   <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="">
                    <h1>Edit Post</h1>
                    <hr>
                <form class="" id="myform" action="/posts/{{$post->id}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="">
                            <label for="Title">Tittle</label>
                            <input type="text" name="title" value="{{$post->title}}" class="form-control">
                        </div>

                        <div class="mt-3" >
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" value="{{$post->slug}}" class="form-control">
                        </div>

                        <div class="mt-3">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}"
                                        @if ($post->category_id == $category->id)
                                        selected="selected"
                                        @endif >{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="body">Body</label>
                            <textarea name="body" rows="5" class="form-control">{!!$post->body!!}</textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class=" bg-light text-black rounded-lg p-4">
                    <dl class="dl-horizontal ml-3">
                        <dt>Created at:</dt>
                        <dd>{{ date('jS M, Y g:ia', strtotime($post->created_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal ml-3">
                        <dt>Last updated:</dt>
                        <dd>{{ date('jS M, Y g:ia', strtotime($post->updated_at)) }}</dd>
                    </dl>
                    <dl class="dl-horizontal ml-3">
                        <dt>Category:</dt>
                        <dd>{{ $post->category->name }}</dd>
                    </dl>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <a href="/posts/{{$post->id}}" class="btn btn-danger btn-block btn-rounded">cancel</a>
                        </div>
                        <div class="col-sm-6">
                            <input type="submit" form="myform" value="Save Changes" class="btn btn-success btn-rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>
@endsection
