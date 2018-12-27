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
Route::get('admin/daftar-pemain-game', 'UserLevelController@index')->name('admin.user_dashboard');
Route::get('admin/kelola-kategori-game', 'GameCategoryController@index')->name('admin.gamecategory');
Route::get('admin/kelola-mata-pelajaran', 'SubjectsCategoryController@index')->name('admin.subjectscategory');
Route::get('admin/mini-games', 'GamesController@index')->name('admin.minigames');
Route::get('admin/e-book', 'EbookController@index')->name('admin.ebook');
Route::get('admin/bank-soal', 'BankSoalController@index')->name('admin.banksoal'); //controller diganti ya

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

// managekategorigame
// Route::get('gamecategory', 'GameCategoryController@index');

Route::get('gamecategory/add','GameCategoryController@create')->name('gamecategory.add');
Route::post('gamecategory/store', 'GameCategoryController@store')->name('gamecategory.store');

Route::get('gamecategory/detail/{id}', 'GameCategoryController@show')->name('gamecategory.detail');

Route::get('gamecategory/edit/{id}', 'GameCategoryController@edit')->name('gamecategory.edit');
Route::post('gamecategory/update/{id}', 'GameCategoryController@update')->name('gamecategory.update');

Route::get('gamecategory/delete/{id}', 'GameCategoryController@destroy')->name('gamecategory.delete');

// manage mata pelajaran
Route::get('subjectscategory/add','SubjectsCategoryController@create')->name('subjectscategory.add');
Route::post('subjectscategory/store', 'SubjectsCategoryController@store')->name('subjectscategory.store');

Route::get('subjectscategory/detail/{id}', 'SubjectsCategoryController@show')->name('subjectscategory.detail');

Route::get('subjectscategory/edit/{id}', 'SubjectsCategoryController@edit')->name('subjectscategory.edit');
Route::post('subjectscategory/update/{id}', 'SubjectsCategoryController@update')->name('subjectscategory.update');

Route::get('subjectscategory/delete/{id}', 'SubjectsCategoryController@destroy')->name('subjectscategory.delete');

// Route::get('admin/games_edit', function () {
//     return view('admin.games_edit');
// });
// Route::post('admin/games_add', 'DashboardController@store');

// Route::get('/admin_materi', function () {
//     return view('admin.admin_materi'); // salah
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');// ini baru benar
