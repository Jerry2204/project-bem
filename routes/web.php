<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login_auth', 'AuthController@login_auth');
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware' => ['auth', 'CheckRole:admin']], function () {
    Route::get('/list_departemen', 'DepartemenController@index');
    Route::post('/departemen/create', 'DepartemenController@create');
    Route::get('/list_kadep', 'KadepController@index');
    Route::post('/kadep/create', 'KadepController@create');
    Route::get('/departemen/{id}/ubah', 'DepartemenController@edit');
    Route::get('/departemen/{id}/hapus', 'DepartemenController@delete');
    Route::post('/departemen/update/{id}', 'DepartemenController@update');
    Route::get('/kadep/{id}/ubah', 'KadepController@edit');
    Route::get('/kadep/{id}/hapus', 'KadepController@delete');
    Route::post('/kadep/{id}/update', 'KadepController@update');
    Route::get('/kelas', 'KelasController@index');
    Route::post('/kelas/create', 'KelasController@create');
    Route::get('/kelas/{id}/edit', 'KelasController@edit');
    Route::get('/kelas/{id}/hapus', 'KelasController@delete');
    Route::post('/kelas/{id}/update', 'KelasController@update');
    Route::get('/keuangan', 'KeuanganController@index');
    Route::post('/keuangan/create', 'KeuanganController@create');
    Route::get('/keuangan/{id}/edit', 'KeuanganController@edit');
    Route::get('/keuangan/{id}/hapus', 'KeuanganController@delete');
    Route::post('/keuangan/{id}/update', 'KeuanganController@update');
    Route::get('/pengeluaran', 'PengeluaranController@index');
    Route::post('/pengeluaran/create', 'PengeluaranController@create');
    Route::get('/pengeluaran/{id}/edit', 'PengeluaranController@edit');
    Route::post('/pengeluaran/{id}/update', 'PengeluaranController@update');
    Route::get('/pengeluaran/{id}/hapus', 'PengeluaranController@delete');
    Route::get('/admin', 'UserController@index');
    Route::post('/admin/create', 'UserController@create');
    Route::get('/admin/{id}/edit', 'UserController@edit');
    Route::post('/admin/{id}/update', 'UserController@update');
    Route::get('/admin/{id}/hapus', 'UserController@delete');
});

Route::group(['middleware' => ['auth', 'CheckRole:admin,kadep']], function () {
    Route::get('/', 'DashboardController@index');
    Route::get('/account_setting/{id}', 'UserController@account_setting');
    Route::post('/account_setting/update/{id}', 'UserController@account_update');
});

Route::group(['middleware' => ['auth', 'CheckRole:kadep']], function () {
    Route::get('/proker/{id}', 'KadepController@proker');
    Route::post('/proker/create/{id}', 'KadepController@create_proker');
    Route::get('/anggota/{id}', 'AnggotaController@index');
    Route::post('/anggota/create/{id}', 'AnggotaController@create');
    Route::get('/proker/edit/{id}', 'KadepController@edit_proker');
    Route::post('/proker/update/{id}', 'KadepController@update_proker');
    Route::get('/anggota/{id}/ubah', 'AnggotaController@edit');
    Route::post('/anggota/{id}/update', 'AnggotaController@update');
});
