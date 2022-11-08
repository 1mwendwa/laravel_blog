<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Posts;
use \App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\BinaryOp\Pow;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Posts::orderBy('id', 'desc')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'title'=>'required',
            'body'=>'required',
            'slug'=>'required|max:255|alpha_dash|unique:posts,slug',
            'category_id'=>'required|integer'
        ]);

        // $post=Posts::create($data);
        $post = new Posts;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post['user_id'] = Auth::user()->id;
        $post->save();


        Session::flash('Success', 'The post was created successfully!');
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        $categories=Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Posts $post)
    {
        $id=$post->id;
        /*
       $post=Posts::find($id);
       if ($request->input('slug')==$post->slug) {
           $this->validate($request, array(
                'title' => 'required',
                'body' => 'required'
           ));
       } else {
        $this->validate($request, array(
            'title' => 'required',
            'slug'=>'required|max:255|alpha_dash|unique:posts,slug',
            'body' => 'required'
       ));

       }
       $post= Posts::find($id);
       $post->title = $request->input('title');
       $post->slug = $request->input('slug');
       $post->body = $request->input('body');

       $post->save();
       */
      $request=Request();
      $post=Posts::find($id);
       if ($request->input('slug')==$post->slug) {
           $data=Request()->validate([
               'title'=>'required',
               'category_id'=>'required|integer',
               'body'=>'required'
           ]);
       } else {
        $data=Request()->validate([
            'title'=>'required',
            'slug'=>'required|max:255|alpha_dash|unique:posts,slug',
            'category_id'=>'required|integer',
            'body'=>'required'
        ]);
       }

        $post->update($data);
        Session::flash('Success', 'The post was updated successfully!');
        Posts::all('id');
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        $post->delete();
        Session::flash('Success', 'The post was deleted successfully!');
        return redirect('/posts');
    }
}
