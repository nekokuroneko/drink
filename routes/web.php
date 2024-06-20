<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
    return view('auth.login');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//商品一覧画面表示
Route::get('/index', [App\Http\Controllers\ProductController::class, 'showIndex'])->name('drink.index');

//商品新規登録画面表示
Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('drink.create');

//商品新規登録
Route::post('/create', [App\Http\Controllers\ProductController::class, 'store'])->name('drink.store');

//商品情報削除
Route::post('/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy']);

//商品情報詳細画面表示
Route::get('/show/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('drink.show');

//商品情報編集画面表示
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('drink.edit');

//商品情報更新
Route::put('/edit/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('drink.update');
