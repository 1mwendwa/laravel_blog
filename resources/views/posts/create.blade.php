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

@section('content')
   <div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-offset-2">
                <h1>Create Post</h1>
                <hr>
            <form action="{{ route('posts.store') }}" method="POST">
                    @csrf
                    <div >
                        <label for="Title">Tittle</label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div >
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>

                    <div >
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pt-3">
                        <label for="body">Body</label>
                        <textarea name="body" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="pt-3">
                        <input type="submit" value="Submit" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
   </div>
@endsection
