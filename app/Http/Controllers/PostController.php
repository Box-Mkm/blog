<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use app\Models\comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { //views posts.index in url .../posts
        // $posts = DB::table('posts')->latest()->get();  //order the posts by the latest then gets the database 'posts' table
        $posts = post::all();
        return view('posts.index', compact('posts')); //views the index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = post::all();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validatePost();
        // DB::table('posts')->insert([      //using insert so we can insert data using and array with keys keys being name of column in db
        Post::create([
            'title' => request('title'),  //the values will be the values inside the table
            'body' => request('body'),    //request get the value from the forms
            'author' => request('author'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/posts'); //returns to the previous page after submiting the article
    }

    /**
     * Display the specified resource.
     */
    public function show(Post  $post)
    {
        //$post = Post::findOrFail($id);
        $comments = $post->comments()->where('approved', 1)->get();
        return view('posts.show', compact(['post', 'comments']));
        //    return view('posts.show', compact('post'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Post $post)
    {
        $this->validatePost();
        $post->update([
            'title' => request('title'),
            'body' => request('body'),
            'author' => request('author'),
        ]);
        return redirect('/posts/' . $post->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function validatePost(){
        request()->validate([
            'title'=>['required','unique:posts','max:100'],
            'body'=>'required',
            'author'=>'required',
        ]);
    }
}
