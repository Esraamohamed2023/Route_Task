<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Examplecontroller;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\placeController as ControllersPlaceController;

enum Section:string{
    case phone='phone';
    case computer='computer';
}
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/* main route */
Route::get('/', function () {
    return view('welcome');
});
/* About route */
Route::get('About', function () {
    return '<h1>This Is About Page</h1>';
});
/* Contact us route */
Route::get('Contact us', function () {
    return '<h1>This Is Contact Us Page</h1>';
});
/* start support route */
Route::prefix('Support')->group(function(){
    Route::get('Chat', function () {
        return '<h1>This Is Chat Page</h1>';
    }); 
    Route::get('Call', function () {
        return '<h1>This Is Call Page</h1>';
    }); 
    Route::get('Ticket', function () {
        return '<h1>This Is Ticket Page</h1>';
    }); 
});
/* end support route */
/* start Training route */
Route::prefix('Training')->group(function(){
    Route::get('HR', function () {
        return '<h1>This Is HR Page</h1>';
    }); 
    Route::get('ICT', function () {
        return '<h1>This Is ICT Page</h1>';
    }); 
    Route::get('Marketing', function () {
        return '<h1>This Is Marketing Page</h1>';
    });
    Route::get('Logistics', function () {
        return '<h1>This Logistics Page</h1>';
    }); 
});

// Route::fallback(function(){
//  return Redirect('/');
//  });
Route::get('cv',function(){
    return view('cv');
});
Route::get('login',function(){
    return view('login');
});
Route::post('receive',function(){
    return 'recieved data ';
    })->name("receive");



Route::get('showupload',[Examplecontroller::class,'showupload']);
Route::post('upload',[Examplecontroller::class,'upload'])->name('upload');
Route::get('addcar','Examplecontroller@test1');
Route::post('data-add',[Examplecontroller::class,'test2'])->name("data-add");

Route::domain('{acount}.laravel')->group(function(){
    // Route::get('addcar','Examplecontroller@test1');
});
Route::get('sections/{section}',function(Section $section){
    return $section->value;
});
/* end Training route */
Route::get('carshow',[CarController::class,'index']);
Route::get('addcar',[CarController::class,'create']);
Route::post('storecare',[CarController::class,'store'])->name('addcar');
Route::get('editcar/{id}',[CarController::class,'edit']);
Route::put('update/{id}',[CarController::class,'update'])->name("update");
Route::get('deletecar/{id}',[CarController::class,'destroy']);
Route::get('cardetails/{id}',[CarController::class,'show'])->name('cardetails');
Route::get('trashed',[CarController::class,'trashed']);
Route::get('restorecar/{id}',[CarController::class,'restore']);
Route::get('forcedelete/{id}',[CarController::class,'forcedelete']);
Route::post('my/data',fn()=>view('my-data'));



// Route::post('recieve/data',function(){
// return 'recieve data site';
// })->name("receive");

/* end Training route */
// Route::fallback(fn()=>Redirect::to('/'));

/* start new section to add post  */

Route::get('postshow',[NewsController::class,'create']);
Route::post('postrecieve',[NewsController::class,'store'])->name('add-post');
/* task 6 */

Route::get('showposts',[NewsController::class,'index']);
Route::get('addpost',[NewsController::class,'create']);
Route::get('updatepost/{id}',[NewsController::class,'edit']);
Route::put('updatepost/{id}',[NewsController::class,'update'])->name("updatepost");
Route::get('deletepost/{id}',[NewsController::class,'destroy']);
Route::get('postdetails/{id}',[NewsController::class,'show'])->name('postdetails');
Route::get('posttrashed',[NewsController::class,'posttrashed']);
Route::get('restorepost/{id}',[NewsController::class,'restore']);
Route::get('deletepost/{id}',[NewsController::class,'forcedelete']);
/* end new section to add post  */
Route::get('landing',[Examplecontroller::class,'landing']);
Route::get('blog', function () {
    return view('layouts.blog');
});

Route::get('newblog',[PlaceController::class,'index']);
Route::get('addexplore',[PlaceController::class,'create']);
Route::post('addnew',[PlaceController::class,'store'])->name('addnew');
Route::get('showplaces',[PlaceController::class,'showLastSixRows']);
Route::get('places',[PlaceController::class,'index']);
Route::get('deleteplace/{id}',[PlaceController::class,'destroy']);
Route::get('placestrashed',[PlaceController::class,'trashed']);
Route::get('restoreplace/{id}',[PlaceController::class,'restore']);
Route::get('deleteplace/{id}',[PlaceController::class,'forcedelete']);