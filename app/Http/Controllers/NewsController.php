<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
    //  $posts=new Post;  //  creates a new instance of post model
    //  $posts->title=$request->title;
    //  $posts->author=$request->author;
    //  $posts->content=$request->content;
    //  $posts->published=$request->has('published') ? true:false;
    //  $posts->save();
    //  return "post published";
    $request->validate([
        'title' => 'required|string',
        'content' => 'string|max:10',
        
    ]);

    $data = $request->only($this->columns);

    $data['published'] = isset($data['published'])? true : false;

    Post::create($data);        
    return "car data added";
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
        $data=$request->only($this->columns);
        $data['published'] = isset($data['published'])?true:false;

 Post::where('id',$id)->update($data);
       
  return redirect(to:'showposts');
      
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return "post with ID {$id} has been deleted.";
    }
    public function posttrashed(){
        $posts= Post::onlyTrashed()->get();
        return view('posttrashed',compact('posts'));

    }
    public function restore(string $id):RedirectResponse{
        Post::where('id',$id)->restore();
        return redirect('showposts');
    }
    public function forcedelete(string $id):RedirectResponse{
        Post::where('id',$id)->forceDelete();
        return redirect('showposts');
    }
}
