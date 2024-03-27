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

Auth::routes();


//ダッシュボード、ログイン成功画面？
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//商品一覧画面表示
Route::get('/index', [App\Http\Controllers\ProductController::class, 'index'])->name('index');

//商品新規登録画面表示
Route::get('/create', [App\Http\Controllers\ProductController::class, 'create'])->name('create');

//商品新規登録
Route::post('/create', [App\Http\Controllers\ProductController::class, 'store'])->name('home');

//商品情報削除
Route::delete('/index', [App\Http\Controllers\ProductController::class, 'destroy'])->name('home');

//商品情報詳細画面
Route::post('/show', [App\Http\Controllers\ProductController::class, 'show'])->name('home');

//商品情報編集画面
Route::push('/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('home');

//商品情報更新
Route::post('/edit', [App\Http\Controllers\HProductController::class, 'update'])->name('home');


