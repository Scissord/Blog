<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReviewController;
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

Route::get('/', [BlogController::class, 'index']);

Route::get('/category/{slug}', [BlogController::class, 'getPostsByCategory'])->name('getPostsByCategory');

Route::get('/category/{slug_category}/{slug_post}', [BlogController::class, 'getPost'])->name('getPost');

Route::get('/about', function() {
    return view('about');
});

Route::get('/review', [ReviewController::class, 'review'])->name('review');
Route::post('/review/check', [ReviewController::class, 'review_check']);


Route::name('user.')->group(function() {
   Route::view('/private', 'private')->middleware('auth')->name('private');

   Route::GET('/login', function() {
       if(Auth::check()){
           return redirect(route('user.private'));
       }
       return view('log');
   })->name('log');

   Route::post('/login', [LoginController::class, 'login']);

    Route::get('/logout', function (){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::GET('/registration', function() {
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::POST('/registration', [RegisterController::class, 'save']);
});
