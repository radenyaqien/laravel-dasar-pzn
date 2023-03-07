<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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
})->name("product.detail");

Route::get('/product/{id}/items/{item}', function ($productId,$itemId) {
    return "Product $productId Item $itemId";
})->name("product.item.detail");

Route::get("/categories/{id}",function($id){
    return "Category $id";
})->where('id',"[0-9]+")->name("category.detail"); //withRegex

Route::get("users/{id?}",function($id="404"){
    return "User $id";
})->name("user.detail");

//konflik akan di prioritaskan yang atas
Route::get("/conflict/eko",function(){
    return "User Eko";
});

Route::get("/conflict/{name}",function($name){
    return "User $name";
});

Route::get("/produk/{id}",function($id){

    $link = route("product.detail",["id"=> $id]);

    return "Link $link";

});

Route::get("/produk-redirect/{id}",function($id){

   return redirect()->route("product.detail",["id"=> $id]);

});

Route::get('controller/hello/request', [HelloController::class,'request']);

Route::get('controller/hello/{name}', [HelloController::class,'hello']);

Route::get("/input/hello",[InputController::class,"hello"]);
Route::post("/input/hello",[InputController::class,"hello"]);
Route::post("/input/hello/first",[InputController::class,"helloFirstName"]);
Route::post("/input/hello/input",[InputController::class,"helloInput"]);
Route::post("/input/hello/array",[InputController::class,"helloArray"]);
Route::post("/input/type",[InputController::class,"inputType"]);