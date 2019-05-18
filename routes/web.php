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
    return redirect('login');
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

// Route admin
Route::get('/admin/dashboard', 'AdminController@index');
Route::get('/admin/get-user', 'UserController@GetUser');
Route::get('/admin/create-user', 'UserController@showCreateUser');
Route::post('/admin/create-user', 'UserController@CreateUser');
Route::get('/admin/edit-user/{id}', 'UserController@showEditUser');
Route::post('/admin/edit-user/', 'UserController@updateUser');
Route::get('/admin/delete-user/{id}','UserController@deleteUser');

Route::get('/admin/get-bagian', 'BagianController@GetBagian');
Route::get('/admin/create-bagian', 'BagianController@showCreateBagian');
Route::post('/admin/create-bagian', 'BagianController@CreateBagian');
Route::get('/admin/delete-bagian/{id}', 'BagianController@DeleteBagian');
Route::get('/admin/edit-bagian/{id}', 'BagianController@showEditBagian');
Route::post('/admin/edit-bagian/', 'BagianController@UpdateBagian');

Route::get('/admin/get-jabatan', 'JabatanController@GetJabatan');
Route::get('/admin/create-jabatan', 'JabatanController@showCreateJabatan');
Route::post('/admin/create-jabatan', 'JabatanController@CreateJabatan');

Route::get('/admin/get-rootjab', 'RootJabatanController@GetRootJabatan');
Route::get('/admin/create-rootjab', 'RootJabatanController@showCreateRootJabatan');
Route::post('/admin/create-rootjab', 'RootJabatanController@CreateRootJabatan');

Route::get('/admin/get-surat', 'SuratController@GetSurat');
Route::get('/admin/create-surat', 'SuratController@showCreateSurat');
Route::post('/admin/create-surat', 'SuratController@CreateSurat');
Route::get('admin/download-surat/{id}', 'SuratController@DownloadSurat');
Route::get('/admin/delete-surat/{id}', 'SuratController@DeleteSurat');
Route::get('admin/arsip-surat/{id}', 'SuratController@ArsipSurat');
Route::get('admin/pulih-surat/{id}', 'SuratController@PulihSurat');
Route::get('admin/get-arsipsurat', 'SuratController@GetArsipSurat');


Route::get('/admin/get-disposisi', 'DisposisiController@GetDisposisi');
Route::get('/admin/create-disposisi/{id}', 'DisposisiController@showCreateDisposisi');
Route::post('/admin/create-disposisi', 'DisposisiController@CreateDisposisi');
Route::get('/admin/edit-disposisi/{id}', 'DisposisiController@showEditDisposisi');
Route::post('/admin/edit-disposisi/', 'DisposisiController@updateDisposisi');
Route::get('/admin/delete-disposisi/{id}','DisposisiController@deleteDisposisi');
Route::get('/admin/pilih-disposisi','DisposisiController@pilihDisposisi');

Route::get('/admin/get-laporan', 'LaporanController@GetLaporan');
Route::post('/admin/show-laporan/', 'LaporanController@ShowLaporan');

