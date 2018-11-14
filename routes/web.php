<?php

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
    // return view('dashboard');
    return view('auth.login');
});



// Dashboard admin
Route::get('admin/admin_dashboard', 'DashboardController@adminDashboard')->name('admin.dashboard');
Route::get('admin/admin_games', 'DashboardController@adminGames')->name('admin.minigames');

Route::get('/admin_materi', function () {
    return view('admin.admin_materi'); // salah
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');// ini baru benar

// Auth::logout();
// Route::get('logout', 'Controller\Auth\AuthController@logout');
