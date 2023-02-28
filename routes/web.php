<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/pzn", function () {
    return "warjoe";
});

Route::redirect("/yt","/pzn");

Route::fallback(function(){
    return "404";
});

Route::view("/hello","hello",['name'=>"Yaqin"]);

Route::get('/hello-again', function () {
    return view('hello',['name'=> "Eko"]);
});

Route::get('/hello-world', function () {
    return view('hello.world',['name'=> "Eko"]);
});