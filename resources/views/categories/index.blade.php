@extends('pages.app')

@section('content')

    <h1>Categories</h1>
    <div class="row">
        <div class="col-md-7 offset-md-1">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @foreach ($categories as $category)
                    <tbody>
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td></td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        <div class="col-md-3 ">
           <div class=" bg-secondary rounded p-4">
            <h5 class="text-info">Create New Category</h5>
            <div class="p-2 text-white">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <label for="name">Category Name:</label>
                    <input type="text" name="name" class="form-control">
                    <button class="btn btn-primary mt-2">Create</button>
                </form>
            </div>
           </div>
        </div>
    </div>

@endsection
