<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Models\comment;
use App\Models\post;
use Illuminate\Http\Request;
/**
 * adds comments to page
 */
class CommentsController extends Controller
{

    public function store(StoreComment $request , post $post)
    {
        Comment::create([
            'name' =>request('name'),
            'body' =>request('body'),
            'post_id' => $post->id
        ]);
        return back();
    }
}
