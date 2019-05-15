<?php

use App\Http\Controllers\Users\Profile\SecurityController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\Users\DashboardController;

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
Route::impersonate();

// Audit routes 
Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');

// User management routes
Route::get('/users', [DashboardController::class, 'index'])->name('users.dashboard');
Route::get('/users/new', [DashboardController::class, 'create'])->name('users.create');
Route::post('/users/new', [DashboardController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [DashboardController::class, 'show'])->name('users.show');
Route::patch('/users/{user}', [DashboardController::class, 'update'])->name('profile.settings.update.info');
Route::match(['get', 'delete'], 'users/delete/{user}', [DashboardController::class, 'destroy'])->name('users.delete');

Route::get('/home', 'HomeController@index')->name('home');

// Account settings routes 
Route::patch('/account/settings/security', [SecurityController::class, 'update'])->name('profile.settings.update.security');
Route::get('/account/settings/security', [SecurityController::class, 'index'])->name('profile.settings.security');

