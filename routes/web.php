<?php

use App\Http\Controllers\Users\Profile\SecurityController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\ContactController;

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
})->name('welcome.test');

Auth::routes();

// Contact routes 
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'handleResponse'])->name('contact.response');

// Account settings routes 
Route::patch('/account/settings/security', [SecurityController::class, 'update'])->name('profile.settings.update.security');
Route::get('/account/{user}', [DashboardController::class, 'show'])->name('users.show');
Route::get('/account/settings/security', [SecurityController::class, 'index'])->name('profile.settings.security');
Route::patch('/account/{user}', [DashboardController::class, 'update'])->name('profile.settings.update.info');
Route::match(['get', 'delete'], '/account/delete/{user}', [DashboardController::class, 'destroy'])->name('users.delete');

