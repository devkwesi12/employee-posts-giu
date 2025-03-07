<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum',except:['index','show'])

        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return all posts here
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $fields = $request->validate([
            "title"=> "required",
            "body"=> "required",

        ]);

       // $post = Post::create($fields);
       $post = $request->user()->posts()->create($fields);



        return [
            'post'=>$post,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        return [
            'post'=>$post,
        ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $fields = $request->validate([
            "title"=> "required",
            "body"=> "required",

        ]);

        $post->update($fields);



        return [
            'post'=>$post,
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();
        return ['message'=>'THE POST IS now deleted'];
    }
}
