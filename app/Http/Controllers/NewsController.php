<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;  

class NewsController extends Controller
{
    private $columns=['title','author','content','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::get();

   return view("posts",compact("posts"));
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
        $post= Post::findOrFail($id);

       
        return view('postdetails', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts=Post::findOrFail($id);
        return view("updatepost",compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

    $post->update([
        'published' => $request->has('published')
    ]);

       
  return "data updated";
      
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return "post with ID {$id} has been deleted.";
    }
}
