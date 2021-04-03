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
    return view('auth.login');
});

Auth::routes();
Route::match(["GET","post"],"/register", function(){
	return redirect('login');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user','UserController');
Route::resource('outlet','OutletController');
Route::resource('paket','PaketController');
Route::resource('member','MemberController');
Route::resource('transaksi','TransaksiController');
Route::resource('transaksi_detail','TransaksiDetailController');
Route::get('report','ReportController@index')->name('report');
Route::get('cetak_pdf','ReportController@cetak_pdf')->name('cetak_pdf');