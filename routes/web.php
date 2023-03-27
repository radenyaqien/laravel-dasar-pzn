<?php

use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Exceptions\ValidationException;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionContoller;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResponseController;

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
    return view('home', [
        "title" => "Home",
        "active" => "home",
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Muhammad Ainul Yaqin",
        "email" => "Myaqien27@gmail.com",
        "image" => "sendakep.jpeg"
    ]);
});


Route::get('/blog', [PostController::class, 'index']);

Route::get("/posts/{post:slug}", [PostController::class, 'show']);
Route::get("/categories", function (Category $category) {
    return view('categories', [
        "title" => "Post Categories",
        "active" => "categories",
        "categories" => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);


//Programmer Zaman Now
Route::get("/pzn", function () {
    return "warjoe";
});

Route::redirect("/yt", "/pzn");

Route::fallback(function () {
    return "404";
});

Route::view("/hello", "hello", ['name' => "Yaqin"]);

Route::get('/hello-again', function () {
    return view('hello', ['name' => "Eko"]);
});

Route::get('/hello-world', function () {
    return view('hello.world', ['name' => "Eko"]);
});

Route::get('/product/{id}', function ($productId) {
    return "Product $productId";
})->name("product.detail");

Route::get('/product/{id}/items/{item}', function ($productId, $itemId) {
    return "Product $productId Item $itemId";
})->name("product.item.detail");

Route::get("/categories/{id}", function ($id) {
    return "Category $id";
})->where('id', "[0-9]+")->name("category.detail"); //withRegex

Route::get("users/{id?}", function ($id = "404") {
    return "User $id";
})->name("user.detail");

//konflik akan di prioritaskan yang atas
Route::get("/conflict/eko", function () {
    return "User Eko";
});

Route::get("/conflict/{name}", function ($name) {
    return "User $name";
});

Route::get("/produk/{id}", function ($id) {

    $link = route("product.detail", ["id" => $id]);

    return "Link $link";
});

Route::get("/produk-redirect/{id}", function ($id) {

    return redirect()->route("product.detail", ["id" => $id]);
});

Route::get('controller/hello/request', [HelloController::class, 'request']);

Route::get('controller/hello/{name}', [HelloController::class, 'hello']);

Route::get("/input/hello", [InputController::class, "hello"]);
Route::post("/input/hello", [InputController::class, "hello"]);
Route::post("/input/hello/first", [InputController::class, "helloFirstName"]);
Route::post("/input/hello/input", [InputController::class, "helloInput"]);
Route::post("/input/hello/array", [InputController::class, "helloArray"]);
Route::post("/input/type", [InputController::class, "inputType"]);
Route::post("/input/filter/only", [InputController::class, "filterOnly"]);
Route::post("/input/filter/except", [InputController::class, "filterExcept"]);
Route::post("/input/filter/merge", [InputController::class, "filterMerge"]);

Route::post("/file/upload", [FileController::class, "upload"])->withoutMiddleware([VerifyCsrfToken::class]);
Route::post("/file/uploadlocal", [FileController::class, "uploadlocal"]);
Route::get("/response/hello", [ResponseController::class, "response"]);
Route::get("/response/header", [ResponseController::class, "header"]);

Route::prefix("/response/type")->group(function () {
    Route::get("/view", [ResponseController::class, "responseView"]);
    Route::get("/json", [ResponseController::class, "responseJson"]);
    Route::get("/file", [ResponseController::class, "responseFile"]);
    Route::get("/download", [ResponseController::class, "responseDownload"]);
});

Route::controller(CookiesController::class)->prefix("/cookie")->group(function () {
    Route::get("/set", "createCookies");
    Route::get("/get", "getCookie");
    Route::get("/clear", "clearCookie");
});


Route::prefix("/redirect")->group(function () {
    Route::get("/from", [RedirectController::class, "redirectFrom"]);
    Route::get("/name", [RedirectController::class, "redirectName"]);

    Route::get("/name/{name}", [RedirectController::class, "redirectHello"])->name("redirect-hello");
    Route::get("/named", function () {
        //return route("redirect-hello", ["name" => "EKO"]); 
        //return url()->route("redirect-hello", ["name" => "EKO"]);
        return URL::route("redirect-hello", ["name" => "EKO"]);
    });
    Route::get("/away", [RedirectController::class, "redirectAway"]);
});

Route::middleware("contoh:PZN,401")->group(function () {

    Route::get('/middleware/api', function () {
        return "api";
    });

    Route::get('/middleware/group', function () {
        return "group";
    });
});

Route::get("/url/action", function () {

    return url()->action([FormController::class, "form"]);
});
Route::get('/form', [FormController::class, "form"]);
Route::post('/form', [FormController::class, "submitForm"]);

Route::get("/url/current", function () {
    return URL::full();
});

Route::get("/session/create", [SessionContoller::class, "createSession"]);
Route::get("/session/get", [SessionContoller::class, "getSession"]);


Route::get("/error/sample", function () {
    throw new Exception("Sample Error");
});

Route::get("/error/manual", function () {
    report(new Exception("Sample Error"));
});


Route::get("/error/validation", function () {
    throw new ValidationException("validation Error");
});

Route::get("/abort/400", function () {
    abort(400, " ups not valid");
});
Route::get("/abort/401", function () {
    abort(401);
});
Route::get("/abort/500", function () {
    abort(500);
});
