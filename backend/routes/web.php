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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('sample/route', function () {
    return 'PHP Framework Laravel Routing!!';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ToppageController;
Route::get('/',  [ToppageController::class, 'index']);
Route::get('/workbook',  [ToppageController::class, 'workbook'])->middleware('auth');

use App\Http\Controllers\QuestionController;
Route::resource('/question',  QuestionController::class)->middleware('auth');

use App\Http\Controllers\MypageController;
Route::get('/mypage',  [MypageController::class, 'index'])->middleware('auth');
