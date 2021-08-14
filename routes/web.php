<?php

use App\Http\Controllers\FaceBookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



//facebook login
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [FaceBookController::class, 'loginUsingFacebook'])->name('login');
    Route::get('callback', [FaceBookController::class, 'callbackFromFacebook'])->name('callback');
});

//google logi

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
