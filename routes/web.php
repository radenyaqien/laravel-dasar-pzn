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

Route::get('/product/{id}', function ($productId) {
    return "Product $productId";
});

Route::get('/product/{id}/items/{item}', function ($productId,$itemId) {
    return "Product $productId Item $itemId";
});

Route::get("/categories/{id}",function($id){
    return "Category $id";
})->where('id',"[0-9]+"); //withRegex

Route::get("users/{id?}",function($id="404"){
    return "User $id";
});

//konflik akan di prioritaskan yang atas
Route::get("/conflict/eko",function(){
    return "User Eko";
});

Route::get("/conflict/{name}",function($name){
    return "User $name";
});
