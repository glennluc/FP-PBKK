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
Route::post('/admin/update-bagian/{id}', 'BagianController@CreateBagian');

Route::get('/admin/get-jabatan', 'JabatanController@GetJabatan');
Route::get('/admin/create-jabatan', 'JabatanController@showCreateJabatan');
Route::post('/admin/create-jabatan', 'JabatanController@CreateJabatan');

Route::get('/admin/get-rootjab', 'RootJabatanController@GetRootJabatan');
Route::get('/admin/create-rootjab', 'RootJabatanController@showCreateRootJabatan');
Route::post('/admin/create-rootjab', 'RootJabatanController@CreateRootJabatan');
