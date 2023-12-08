<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
class Examplecontroller extends Controller
{
    use common;
    // method-1
    public function test1(){
        return view('addCard');
    }
    // method-2
    public function test2(Request $request){
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
           
        ]);
    
        return view('dataRecieve')->with([
            'title'=>$request->title,
            'price'=>$request->input('price'),
            'description'=>$request->input('description'),
            'published' => $request->has('remember'),
        ]);
    }
    public function showupload(){
        return view('upload');
    }
    public function upload(Request $request){
        // $file_extension = $request->image->getClientOriginalExtension();

        // $file_name = time() . '.' . $file_extension;

        // $path = 'assets/images';

        // $request->image->move($path, $file_name);
        $fileName=$this->uploadFile($request->image,'assets/images');
        return $fileName;
    }
    public function landing(){
       return  view('landing');
    }
}
