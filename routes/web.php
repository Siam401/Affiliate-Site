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
//     return view('frontend.main_page');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'signin'])->name('signin');
Route::post('/signin_admin', [App\Http\Controllers\HomeController::class, 'signin_admin'])->name('admin.signin');


Auth::routes();

Route::post('logged_in', [App\Http\Controllers\Auth\LoginController::class, 'logged_in'])->name('logged_in');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('user/{affiliate}', [App\Http\Controllers\HomeController::class, 'signin_affiliate'])->name('user.signin');
Route::post('user/{affiliate}', [App\Http\Controllers\HomeController::class, 'signin_store'])->name('signin.store');
Route::get('signin', [App\Http\Controllers\HomeController::class, 'mainpage'])->name('mainpage');
Route::middleware(['checkLogin'])->group(function () {
    Route::get('/Users', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/UserList', [App\Http\Controllers\HomeController::class, 'UserList'])->name('UserList');
    Route::get('/Create/User', [App\Http\Controllers\HomeController::class, 'createUser'])->name('user.create');
    Route::post('/Store/User', [App\Http\Controllers\HomeController::class, 'storeUser'])->name('user.store');
    Route::get('/edit/User/{id}', [App\Http\Controllers\HomeController::class, 'editUser'])->name('user.edit');
    Route::post('/Update/User/{id}', [App\Http\Controllers\HomeController::class, 'updateUser'])->name('user.update');
    Route::get('/delete/User/{id}', [App\Http\Controllers\HomeController::class, 'deleteUser'])->name('user.delete');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
