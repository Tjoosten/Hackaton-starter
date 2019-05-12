<?php

use App\Http\Controllers\Users\Profile\SettingsController;
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

// Audit routes 
Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');

// User management routes
Route::get('/users', [DashboardController::class, 'index'])->name('users.dashboard');
Route::get('/users/new', [DashboardController::class, 'create'])->name('users.create');
Route::post('/users/new', [DashboardController::class, 'store'])->name('users.store');

// Account settings routes 
Route::patch('/account/settings/security', [SettingsController::class, 'updateSecurity'])->name('profile.settings.update.security');
Route::patch('/account/settings/information', [SettingsController::class, 'updateInformation'])->name('profile.settings.update.info');
Route::get('/account/settings/{type?}', [SettingsController::class, 'index'])->name('profile.settings');

Route::get('/home', 'HomeController@index')->name('home');
