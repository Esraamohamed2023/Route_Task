<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;        // to work this model        

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $cars=Car::get();
    return view('cars',compact('cars'));  //get all data on variable cars to show them by name of variable
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCard');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $cars=new Car;
      $result=$cars->title=$request->title;
      $cars->price=$request->price;
      $cars->description=$request->description;
      $cars->published = $request->has('published') ? true : false;
      $cars->save();
      return "car title is:". $result;

    

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
        $car=Car::findOrFail($id);
       return view("editcar",compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
