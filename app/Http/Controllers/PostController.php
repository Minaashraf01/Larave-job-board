<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             // ORM
        $data= Post::latest()->cursorPaginate(5);
        // pass the data to the view
        return view('post.index',['posts' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         Post::factory(100)->create();
         return view('post.create');
        //return response(["message" => "Successfully Created!","Created Count" => "100" ],201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->author =$request->input('author');
        $post->body =$request->input('body');
        $post->published =$request->has('published');

        $post->save();
        return redirect('/blog')->with('success','Post Created Successfully!');
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post= Post::find($id);
        return view('post.show',['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post= Post::findOrFail($id);
        return view('post.edit',["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
       $post= Post::findOrFail($id);

        $post->title = $request->input('title');
        $post->author =$request->input('author');
        $post->body =$request->input('body');
        $post->published =$request->has('published');

        $post->save();
        return redirect('/blog')->with('success','Post Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post= Post::findOrFail($id);
        $post->delete();
         return redirect('/blog')->with('success','Post Deleted Successfully!');
    }
}
