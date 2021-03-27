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

// ミドルウェアのコントローラー
Route::get('/top', [App\Http\Controllers\TopController::class, 'index'])->name('top');

Route::get('/note', [App\Http\Controllers\NoteController::class, 'index'])->name('note');

Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
