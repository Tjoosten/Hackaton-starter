<?php 

use App\Http\Controllers\AuditController;
use App\Http\Controllers\Users\DashboardController;
use App\Http\Controllers\ContactController;

Route::impersonate();

// Audit routes 
Route::get('/audit', [AuditController::class, 'index'])->name('audit.index');

// User management routes
Route::get('/users', [DashboardController::class, 'index'])->name('users.dashboard');
Route::get('/users/new', [DashboardController::class, 'create'])->name('users.create');
Route::post('/users/new', [DashboardController::class, 'store'])->name('users.store');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact/download', [ContactController::class, 'downloadAll'])->name('responses.download');