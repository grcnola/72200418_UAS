<?php
Route::get('/home', function () {
    return view('home');
});

Route::get('/koneksi', function () {
    return view('koneksi');
});

//Mahasiswa//
Route::get('/mahasiswa/mahasiswa','MahasiswaController@mahasiswa');
Route::get('/mahasiswa/search','MahasiswaController@search');
Route::get('/mahasiswa/mahasiswa/formMahasiswa','MahasiswaController@formMahasiswa');
Route::post('mahasiswa/saveMahasiswa','MahasiswaController@saveMahasiswa');
Route::get('/mahasiswa/mahasiswa/updateMahasiswa/{id}','MahasiswaController@formupdateMahasiswa');
Route::put('/mahasiswa/updateMahasiswa/{id}','MahasiswaController@updateMahasiswa');
Route::get('/mahasiswa/deleteMahasiswa/{id}','MahasiswaController@deleteMahasiswa');

//Dosen//
Route::get('/dosen/dosen','DosenController@dosen');
Route::get('/dosen/search','DosenController@search');
Route::get('/dosen/dosen/formDosen','DosenController@formDosen');
Route::post('dosen/saveDosen','DosenController@saveDosen');
Route::get('/dosen/dosen/updateDosen/{id}','DosenController@formupdateDosen');
Route::put('/dosen/updateDosen/{id}','DosenController@updateDosen');
Route::get('/dosen/deleteDosen/{id}','DosenController@deleteDosen');

//User//
Route::get('/user','UserController@user');
Route::get('/user/formUser','UserController@formUser');
Route::post('/user/saveUser','UserController@saveUser');
Route::get('/login','UserController@login');
Route::post('/user/checkLogin','UserController@checkLogin');
Route::get('/logout','UserController@logout');
Route::get('/user/updateUser/{id}','UserController@formupdateUser');
Route::put('/user/updateUser/{id}','UserController@updateUser');
Route::get('/user/deleteUser/{id}','UserController@deleteUser');