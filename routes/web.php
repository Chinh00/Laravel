<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\LoginAdminController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\backend\OrdersController;
use App\Http\Controllers\backend\NewsController;
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


Route::get("/admin/login", [LoginAdminController::class, "login"]);
Route::post("/admin/login", [LoginAdminController::class, "postLogin"]);

Route::middleware("checkAdmin")->prefix("admin/")->group(function(){
    Route::get("dashboard", [LoginAdminController::class, "index"]);
    Route::get("logout", [LoginAdminController::class, "logout"]);
    Route::prefix("/product")->group(function(){
        Route::get("/list", [ProductController::class, "index"])->name("list");
        Route::get("/add", [ProductController::class, "create"]);
        Route::post("/add", [ProductController::class, "postCreate"]);
        Route::post("/delete", [ProductController::class, "delete"]);
        Route::post("/edit", [ProductController::class, "edit"]);
        Route::post("/post-edit", [ProductController::class, "postEdit"]);
    });
    Route::prefix("/categories")->group(function(){
        Route::get("/add", [CategoryController::class, "create"]);
        Route::get("/list", [CategoryController::class, "index"]);
        Route::post("/add", [CategoryController::class, "postCreate"]);
        Route::get("/edit/{id}", [CategoryController::class, "edit"]);
        Route::post("/edit/{id}", [CategoryController::class, "update"]);

    });
    Route::prefix("/user")->group(function(){
        Route::get("/list", [UserController::class, "index"]);
    });
    Route::prefix("/orders")->group(function(){
        Route::get("/list", [OrdersController::class, "index"]);
        Route::get("/show/{id}", [OrdersController::class, "detail"]);
        Route::post("/checkout", [OrdersController::class, "checkout"]);

    });
    Route::prefix("/news")->group(function(){
        Route::get("/list", [NewsController::class, "index"]);
        Route::get("/add", [NewsController::class, "create"]);
        Route::get("/edit/{id}", [NewsController::class, "edit"]);
        Route::post("/delete", [NewsController::class, "delete"]);
        Route::post("/add", [NewsController::class, "postCreate"]);
        Route::post("/edit", [NewsController::class, "postEdit"]);
    });
});
Route::get("/", [HomeController::class, "index"]);
Route::post("/login", [UsersController::class, "login"]);
Route::post("/signin", [UsersController::class, "signin"]);
Route::post("/logout", [UsersController::class, "logout"]);
Route::get("quickView/{id}", [HomeController::class, "quickView"]);
Route::get("/phone", [ProductsController::class, "index"]);
Route::get("/phone/{slug}/{id}", [ProductsController::class, "product"]);
Route::get("/phone/{slug}", [ProductsController::class, "category"]);

Route::get("/cart", [CartController::class, "index"]);
Route::post("/cart", [CartController::class, "postCart"]);

Route::get("/checkout", [CartController::class, "checkout"]);

Route::get("/news", [HomeController::class, "news"]);
Route::get("/contact", [HomeController::class, "contact"]);
Route::get("/about", [HomeController::class, "about"]);

Route::get("/checkout", [CartController::class, "checkout"]);
Route::post("/cart/delete", [CartController::class, "delete"]);
Route::post("/checkout/success", [CartController::class, "postCheckout"]);
Route::post("/contact", [SendMailController::class, "sendMail"]);
Route::get("/success", function(){
    return view("success");
});
Route::get("/product", [HomeController::class, "product"]);
