<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;  
use App\Traits\Common; 
use Illuminate\Support\Facades\DB;
class placeController extends Controller
{
    use common;
    private $columns=['image','title','price1','price2','description']; /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('includes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->only($this->columns);
        $fileName=$this->uploadFile($request->image,'assets/images');
       
        $data['image']=$fileName;
       Place::create($data);        
   
       return "done";

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
    public function showLastSixRows()
{
    $result = DB::table('places')
        ->select('*')
        ->orderBy('id', 'desc')
        ->take(6)
        ->get();

    return view('blog', ['result' => $result]);
}
}
