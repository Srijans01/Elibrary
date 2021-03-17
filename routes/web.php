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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/admin_dashboard',  [App\Http\Controllers\Admin\DashboardController::class,'index'])->middleware('role:admin');
Route::get('/seller_dashboard', [App\Http\Controllers\Users\DashboardController::class,'index'])->middleware('role:user');


Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->middleware('role:admin');
Route::get('/login/user', [App\Http\Controllers\Auth\LoginController::class, 'showUserLoginForm'])->middleware('role:user');
Route::get('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm']);
Route::get('/register/user', [App\Http\Controllers\Auth\RegisterController::class, 'showUserRegisterForm']);

Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
Route::post('/login/user', [App\Http\Controllers\Auth\LoginController::class, 'UserLogin']);
Route::post('/register/admin', [App\Http\Controllers\Auth\RegisterController::class, 'createAdmin']);
Route::post('/register/user', [App\Http\Controllers\Auth\RegisterController::class, 'createUser']);

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin');
Route::view('/user', 'user');

Route::get('/add-book',[App\Http\Controllers\FormController::class, 'addBook'])->name('add-book');

Route::post('/add-book',[App\Http\Controllers\FormController::class, 'storeBook'])->name('form.store');


Route::get('/add-book-order/{id}',[App\Http\Controllers\OrderController::class, 'storeBookOrder'])->name('add-book-order');

Route::post('/add-book-order/{id}',[App\Http\Controllers\OrderController::class, 'storeBookOrder'])->name('order.store');



Route::get('/add-book-wish/{id}',[App\Http\Controllers\WishController::class, 'storeBookWish'])->name('add-book-wish');

Route::post('/add-book-wish/{id}',[App\Http\Controllers\WishController::class, 'storeBookWish'])->name('wish.store');



Route::get('/show-book',[App\Http\Controllers\FormController::class, 'showBook'])->name('show-book');

Route::get('/show-user',[App\Http\Controllers\FormController::class, 'showUser'])->name('show-user');





Route::get('/make-admin/{id}',[App\Http\Controllers\FormController::class, 'makeAdmin'])->name('make-admin');

Route::get('/remove-admin/{id}',[App\Http\Controllers\FormController::class, 'removeAdmin'])->name('remove-admin');



Route::get('/show-book-order',[App\Http\Controllers\OrderController::class, 'showBookOrder'])->name('show-book-order');

Route::get('/show-book-wish',[App\Http\Controllers\WishController::class, 'showBookWish'])->name('show-book-wish');

Route::get('/show-book-history',[App\Http\Controllers\OrderController::class, 'showBookHistory'])->name('show-book-history');

Route::get('/edit-book/{id}',[App\Http\Controllers\FormController::class, 'editBook'])->name('edit-book');


Route::get('/readmore-book/{id}',[App\Http\Controllers\FormController::class, 'readmBook'])->name('readmore-book');



Route::post('/update-book',[App\Http\Controllers\FormController::class, 'updateBook'])->name('form.update');

Route::get('/delete-book/{id}',[App\Http\Controllers\FormController::class, 'deleteBook'])->name('delete-book');

Route::get('/remove-book/{id}',[App\Http\Controllers\OrderController::class, 'removeBook'])->name('remove-book');

Route::get('/read-book/{id}',[App\Http\Controllers\FormController::class, 'readBook'])->name('read-book');
