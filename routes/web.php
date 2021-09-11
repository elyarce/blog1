<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [App\Http\Controllers\GuestController::class, 'index'])->name('guest');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/entries/create', [App\Http\Controllers\EntryController::class, 'create'])->name('entries.create');
Route::post('/entries', [App\Http\Controllers\EntryController::class, 'store'])->name('entries.store');

Route::get('/entries/{entry}', [App\Http\Controllers\GuestController::class, 'show'])->name('entries.show');

Route::get('/entries/{entry}/edit', [App\Http\Controllers\EntryController::class, 'edit'])->name('entries.edit'); //->middleware('can:update,entry');
Route::put('/entries/{entry}', [App\Http\Controllers\EntryController::class, 'update'])->name('entries.update'); //->middleware('can:update,entry');

Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
