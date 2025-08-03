<?php

namespace App\Http\Controllers;

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
        $data= Post::cursorPaginate(5);
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
    public function store(Request $request)
    {
        // @TODO this will be completed in the Forms section.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post= Post::find($id);
        return view('post.show',['post' => $post, "pageTitle" =>$post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post= Post::find($id);
        return view('post.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // @TODO this will be completed in the Forms section.
    }
}
