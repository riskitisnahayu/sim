<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// user login
Route::middleware('api')->post('/user/login','UserController@api_login');

//user logout
Route::middleware('auth:api')->post('/admin/logout','UserController@api_logout');
Route::middleware('auth:api')->post('/orangtua/logout','UserController@api_logout');
Route::middleware('auth:api')->post('/siswa/logout','UserController@api_logout');


// forgot password
Route::middleware('api')->post('forgot/password', 'Auth\ForgotPasswordAPIController')->name('forgot.password');

// untuk registrasi
Route::middleware('api')->post('/user/orangtua','UserController@api_regisOrtu');
Route::middleware('api')->post('/user/siswa','UserController@api_regisSiswa');

Route::middleware('auth:api')->get('/province','ProvinceController@api_getProvince');
Route::middleware('auth:api')->get('/regency','RegencyController@api_getRegency');
Route::middleware('auth:api')->get('/district','DistrictController@api_getDistrict');

// untuk api create user
// Route::middleware('api')->post('/user','UserController@store');

// nampilin orangtua dan anaknya
Route::middleware('auth:api')->get('/cek/orangtua','OrangtuaController@api_getOrangtua');
// BERITA
Route::middleware('auth:api')->get('/berita','OrangtuaController@api_getNews');
// profil orangtua
Route::middleware('auth:api')->get('/orangtua/profil/detail/{id}','OrangtuaController@api_detailProfil');
Route::middleware('auth:api')->put('/orangtua/profil/update/{id}','OrangtuaController@api_updateProfil');
Route::middleware('auth:api')->put('/orangtua/password/update/{id}','OrangtuaController@api_updatePasswOrtu');
// passw anak/siswa
Route::middleware('auth:api')->put('/siswa/password/update/{id}','OrangtuaController@api_updatePasswSiswa');

// api buat nampilin siswa
Route::middleware('auth:api')->get('/cek/siswa','StudentController@api_getSiswa');
Route::middleware('auth:api')->get('/siswa/soal','StudentController@api_soal');
// profil siswa
Route::middleware('auth:api')->get('/siswa/profil/detail/{id}','StudentController@api_detailProfil');

// jalan buat nampilin nilai siswa mengerjakan soal
Route::middleware('auth:api')->post('/siswa/nilai','StudentController@api_getScore');

// untuk kategori game
Route::middleware('auth:api')->get('/gamecategory','GameCategoryController@api_getGameCategory');
Route::middleware('auth:api')->get('/gamecategory/detail/{id}','GameCategoryController@api_show');

// untuk api game
Route::middleware('auth:api')->get('/games','GamesController@api_getGames');
Route::middleware('auth:api')->get('/games/detail/{id}','GamesController@api_show');

// untuk kategori mapel
Route::middleware('auth:api')->get('/subjectscategory','SubjectsCategoryController@api_getSubjectsCategory');
Route::middleware('auth:api')->get('/subjectscategory/detail/{id}','SubjectsCategoryController@api_show');

// untuk api ebook
Route::middleware('auth:api')->get('/ebook','EbookController@api_getEbook');
Route::middleware('auth:api')->get('/ebook/class','EbookController@api_getEbookClass');
Route::middleware('auth:api')->get('/ebook/detail/{id}','EbookController@api_show');
