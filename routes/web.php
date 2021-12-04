<?php

use App\Models\ScholarshipEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScholarshipEntryController;

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
    return view('index');
});

Route::post('/submit-entry', [ScholarshipEntryController::class, 'StoreEntry'])->name('submit.entry');
// Route::view('/login', 'admin.login')->name('admin.login.page');
// Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
// Route::post('/login', [AdminDashboardController::class, 'login'])->name('login.admin');
Route::post('/review-entry/{id}', [HomeController::class, 'ReviewEntry'])->name('review.user');
Route::post('/reverse-review-entry/{id}', [HomeController::class, 'ReverseReviewEntry'])->name('reverse.review.user');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
