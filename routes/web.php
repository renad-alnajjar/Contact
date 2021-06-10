<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use App\Http\Controllers\ContactsController;

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

 
Route::get('/', [ContactsController::class, 'index']);

Route::get('contact', [ContactsController::class, 'contact']);
Route::post('/store', [ContactsController::class, 'store']);
Route::put('edit/{id}', [ContactsController::class, 'edit']);
Route::patch('update/{id}', [ContactsController::class, 'update']);
Route::delete('destroy/{id}', [ContactsController::class, 'destroy']);
Auth::routes();

Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
