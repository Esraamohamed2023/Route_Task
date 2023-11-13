<?php

use Illuminate\Support\Facades\Route;

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
/* end Training route */