<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Examplecontroller extends Controller
{
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
    
}
