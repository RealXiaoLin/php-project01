<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/topworkbook',  [ToppageController::class, 'workbook'])->name('toppage.workbook')->middleware('auth');

use App\Http\Controllers\QuestionController;
Route::resource('/question',  QuestionController::class)->middleware('auth');
Route::post('/question/choice',  [QuestionController::class, 'choice'])->middleware('auth');
Route::post('/question/search',  [QuestionController::class, 'search'])->name('question.search')->middleware('auth');

use App\Http\Controllers\CategoryController;
Route::resource('/category',  CategoryController::class)->middleware('auth');

use App\Http\Controllers\WorkbookController;
Route::resource('/workbook',  WorkbookController::class)->middleware('auth');
Route::get('/workbook/score/{workbook}',  [WorkbookController::class, 'score'])->name('workbook.score')->middleware('auth');
Route::get('/workbook/review/{workbook}',  [WorkbookController::class, 'review'])->name('workbook.review')->middleware('auth');

use App\Http\Controllers\MypageController;
Route::get('/mypage',  [MypageController::class, 'index'])->middleware('auth');
