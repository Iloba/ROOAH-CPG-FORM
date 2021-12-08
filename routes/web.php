<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
Route::get('/review-entry/{id}', [HomeController::class, 'ReviewEntry'])->name('review.user');
Route::get('/reverse-review-entry/{id}', [HomeController::class, 'ReverseReviewEntry'])->name('reverse.review.user');
Route::get('/status-interviewed/{id}', [HomeController::class, 'StatusInterviewed'])->name('status.interviewed');
Route::get('/status-hired/{id}', [HomeController::class, 'StatusHired'])->name('status.hired');
Route::get('/status-terminated/{id}', [HomeController::class, 'StatusTerminated'])->name('status.terminated');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
