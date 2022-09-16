<?php

use App\Http\Controllers\UserController;
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


Route::get('/users',[UserController::class, "index"]);
Route::get('/users-data',[UserController::class, "getData"]);
Route::post('/insert', [UserController::class, 'insert']);
Route::delete('delete', [UserController::class, 'delete'])->name('user.multiple-delete');
Route::post('/insert', [UserController::class, 'insert']);
Route::get('/addperson',[UserController::class, 'add']);
Route::get('edit/{id}',[UserController::class, 'edit']);
Route::post('/update/{id}', [UserController::class, 'update']);