<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PointController;
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

Route::get('/', [ContactController::class, 'getData'])->name('home');;

Route::get('/about', function () {
    return view('about');
})->name('about');;

Route::get('/contact', function () {
    return view('contact');
})->name('contact');;

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');
Route::post('/user/login', [RegisterController::class, 'login'])->name('login');
Route::post('/user/logout', [RegisterController::class, 'logout'])->name('logout')->middleware(['password.confirm']);
Route::post('/user/register', [RegisterController::class, 'register'])->name('useradd');
Route::post('/point/add', [PointController::class, 'add'])->name('pointadd')->middleware('auth');
Route::post('/point/delete/{id}', [PointController::class, 'deletePointById'])->middleware('auth');
Route::post('/point/update/{id}', [PointController::class, 'updatePointById'])->middleware('auth');
