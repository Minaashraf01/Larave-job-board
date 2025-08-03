<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ORM
        $data= Tag::all();
        // pass the data to the view
        return view('tag.index',['tags' =>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }

//      function testManytoMany()
//    {
       // $post2= Post::find(2);
       // $post3= Post::find(3);
//
       // $post2->tags()->attach([1,2]);
       // $post3->tags()->attach([1,2]);
//
       // return response()->json(([
       //     'post2' => $post2->tags,
       //     'post3' =>$post3->tags ]));
    //   $tag =Tag::find(1);
    //   $tag->posts()->attach([2]);
    //
    //   return response()->json(([
    //    'tag' =>$tag->title,
    //    'posts' => $tag->posts
    //   ]));
//    }
}
