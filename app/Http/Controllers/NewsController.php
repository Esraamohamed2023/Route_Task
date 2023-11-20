<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $posts=new Post;  //  creates a new instance of post model
     $posts->title=$request->title;
     $posts->author=$request->author;
     $posts->content=$request->content;
     $posts->published=$request->has('published') ? true:false;
     $posts->save();
     return "post published";
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
}
