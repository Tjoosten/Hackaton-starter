<?php
use App\Http\Controllers\Users\Profile\SettingsController;

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

// Account settings routes 
Route::patch('/account/settings/security', [SettingsController::class, 'updateSecurity'])->name('profile.settings.update.security');
Route::get('/account/settings/{type?}', [SettingsController::class, 'index'])->name('profile.settings');

Route::get('/home', 'HomeController@index')->name('home');
