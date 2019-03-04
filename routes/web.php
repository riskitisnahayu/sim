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
Auth::routes(); //route login admin
// UI user
Route::get('/', function() {
	return view('student_layouts.student');
});

// Route::get('reset-password', function ()
// {
// 	return view('auth.passwords.email');
// })->name('password.email');

// Route::get('/home', 'HomeController@index')->name('home');// ini baru benar

Route::get('admin-login', function () {
    // return view('dashboard');
    return view('auth.login');
})->name('admin.login');

Route::get('siswa-login', function() {
	return view('auth.student_login');
})->name('siswa.login');

Route::get('orangtua-login', function() {
	return view('auth.orangtua_login');
})->name('orangtua.login');

Route::get('orangtua-register', function() {
	return view('auth.register');
});

// Password Reset Routes...
// Route::get('passwords/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('passwords.reset');
// Route::post('passwords/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('passwords.email');
// Route::get('passwords/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('passwords.reset.token');
// Route::post('passwords/reset', 'Auth\ResetPasswordController@reset');

// dashboard orangtua
Route::get('orangtua/dashboard', 'OrangtuaController@index')->name('orangtua.dashboard');
Route::get('orangtua/registrasi-anak', 'OrangtuaController@registration')->name('orangtua.registration');
Route::get('orangtua/laporan', 'OrangtuaController@report')->name('orangtua.report');
Route::get('orangtua/registerasi-anak/edit/{id}', 'OrangtuaController@edit')->name('orangtua.registeration.edit');
Route::get('orangtua/profil-detail', 'OrangtuaController@detailProfil')->name('orangtua.profil.detail');
Route::get('orangtua/profil-edit', 'OrangtuaController@editProfil')->name('orangtua.profil.edit');
Route::post('orangtua/profil-edit', 'OrangtuaController@updateProfil')->name('orangtua.profil.update');
Route::get('orangtua/profil-password-edit', 'OrangtuaController@editPassword')->name('orangtua.password.edit');
Route::post('orangtua/profil-password-edit', 'OrangtuaController@updatePassword')->name('orangtua.password.update');

Route::get('orangtua/registerasi-anak', 'OrangtuaController@index2')->name('orangtua.registeration.index2');
Route::get('orangtua/registerasi-anak/add', 'OrangtuaController@create')->name('orangtua.registeration.add');
Route::post('orangtua/registerasi-anak/store', 'OrangtuaController@store')->name('orangtua.registeration.store');
Route::get('orangtua/registerasi-anak/detail/{id}', 'OrangtuaController@show')->name('orangtua.registeration.detail');
Route::get('orangtua/registerasi-anak/edit/{id}', 'OrangtuaController@edit')->name('orangtua.registeration.edit');
Route::post('orangtua/registerasi-anak/update/{id}', 'OrangtuaController@update')->name('orangtua.registeration.update');
Route::get('orangtua/registerasi-anak/delete/{id}', 'OrangtuaController@destroy')->name('orangtua.registeration.delete');

// untuk Siswa
Route::get('siswa', 'StudentController@index')->name('student.index');
Route::get('siswa/mini-games', 'StudentController@games')->name('student.games');
Route::get('siswa/e-books', 'StudentController@ebooks')->name('student.ebook');
Route::get('siswa/bank-soal', 'StudentController@banksoal')->name('student.banksoal');



// Dashboard admin
Route::get('admin/profil-detail', 'DashboardController@detailProfil')->name('admin.profil.detail');
Route::get('admin/profil-edit', 'DashboardController@editProfil')->name('admin.profil.edit');
Route::post('admin/profil-edit', 'DashboardController@updateProfil')->name('admin.profil.update');
Route::get('admin/profil-password-edit', 'DashboardController@editPassword')->name('admin.password.edit');
Route::post('admin/profil-password-edit', 'DashboardController@updatePassword')->name('admin.password.update');

Route::get('admin/dashboard', 'DashboardController@adminDashboard')->name('admin.dashboard');
// Route::get('admin/dashboard', 'DashboardController@adminReport')->name('admin.dashboard');
// Route::get('admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
Route::get('admin/daftar-pemain-game', 'UserLevelController@index')->name('admin.user_dashboard');
Route::get('admin/kelola-kategori-game', 'GameCategoryController@index')->name('admin.gamecategory');
Route::get('admin/kelola-mata-pelajaran', 'SubjectsCategoryController@index')->name('admin.subjectscategory');
Route::get('admin/mini-games', 'GamesController@index')->name('admin.minigames');
Route::get('admin/e-book', 'EbookController@index')->name('admin.ebook');
Route::get('admin/bank-soal', 'TaskMasterController@index')->name('admin.banksoal'); //controller diganti ya


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
// Route::get('admin/games-dashboard', function () {
//     return view('admin.games_dashboard');
// });
//
// Route::get('admin/user-dashboard', function () {
//     return view('admin.user_dashboard');
// });

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


// ebook
Route::get('ebook/add','EbookController@create')->name('ebook.add');
Route::post('ebook/store', 'EbookController@store')->name('ebook.store');
Route::get('ebook/detail/{id}', 'EbookController@show')->name('ebook.detail');
Route::get('ebook/edit/{id}', 'EbookController@edit')->name('ebook.edit');
Route::post('ebook/update/{id}', 'EbookController@update')->name('ebook.update');
Route::get('ebook/delete/{id}', 'EbookController@destroy')->name('ebook.delete');
// Route::get('admin/games_edit', function () {
//     return view('admin.games_edit');
// });
// Route::post('admin/games_add', 'DashboardController@store');

// Route::get('/admin_materi', function () {
//     return view('admin.admin_materi'); // salah
// });

// bank soal
Route::get('banksoal/add','TaskMasterController@create')->name('taskmaster.add');
Route::post('banksoal/store', 'TaskMasterController@store')->name('taskmaster.store');
Route::get('banksoal/detail/{id}', 'TaskMasterController@show')->name('taskmaster.detail');
Route::get('banksoal/edit/{id}', 'TaskMasterController@edit')->name('taskmaster.edit');
Route::post('banksoal/update/{id}', 'TaskMasterController@update')->name('taskmaster.update');
Route::get('banksoal/delete/{id}', 'TaskMasterController@destroy')->name('taskmaster.delete');

// soal
Route::get('soal/add/{id}','TaskController@create')->name('task.add');
Route::post('soal/store', 'TaskController@store')->name('task.store');
// Route::get('soal/detail/{id}','TaskController@create')->name('task.add');
Route::get('soal/edit/{id}', 'TaskController@edit')->name('task.edit');
Route::post('soal/update/{id}', 'TaskController@update')->name('task.update');
// Untuk siswa
