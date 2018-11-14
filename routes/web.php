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
Route::get('admin/dashboard', 'DashboardController@adminDashboard')->name('admin.dashboard');
Route::get('admin/mini-games', 'GamesController@index')->name('admin.minigames');

// mini games
// Route::get('admin/admin-games', 'GamesController@index')->name('admin.');

Route::get('admin/games/add', 'GamesController@create')->name('admin.games.add');
Route::post('admin/games/store', 'GamesController@store')->name('admin.games.store');

Route::get('admin/games/detail/{id}', 'GamesController@show')->name('admin.games.detail');
// Route::post('admin/games/detail/{id}', 'GamesController@show')->name('admin/games/detail');

Route::get('admin/games/edit/{id}', 'GamesController@edit')->name('admin.games.edit');
Route::post('admin/games/update/{id}', 'GamesController@update')->name('admin.games.update');

Route::get('admin/games/delete/{id}', 'GamesController@destroy')->name('admin.games.delete');

// routing untuk list games & list user in dashboard
Route::get('admin/games-dashboard', function () {
    return view('admin.games_dashboard');
});

Route::get('admin/user-dashboard', function () {
    return view('admin.user_dashboard');
});

// Route::get('admin/games_edit', function () {
//     return view('admin.games_edit');
// });
// Route::post('admin/games_add', 'DashboardController@store');

// Route::get('/admin_materi', function () {
//     return view('admin.admin_materi'); // salah
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');// ini baru benar
