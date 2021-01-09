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

Route::get('sample/route', function () {
    return 'PHP Framework Laravel Routing!!';
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ToppageController;
Route::get('/index',  [ToppageController::class, 'index']);
Route::get('/workbook',  [ToppageController::class, 'workbook']);

use App\Http\Controllers\QuestionController;
Route::resource('questions', QuestionController::class);
