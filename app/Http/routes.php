<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('email',function(){
  $trans=\App\User::all();
  $data1 = $trans->last()->toArray();
  return view('emails.transfer',compact('data1'));
  // dd($data1);
});

Route::get('/', function () {  return view('auth.login');});
// Route::auth();}
// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');
Route::get('/home', 'HomeController@index');

Route::resource('Deposit','DepositController');

Route::resource('Transfer','TransferController');
Route::post('/Transfer/destino','TransferController@cant');
Route::get('/tranfers/{id}','TransferController@show');
Route::get('/transfer/direct','TransferController@direct');
Route::get('transfer/email','TransferController@email');
Route::post('Transfer/email','TransferController@postEmail');

Route::resource('Bank','BankController');
Route::get('/Bank/{id}/delete','BankController@destroy');

Route::resource('Card','CardController');
Route::get('/Card/{id}/delete','CardController@destroy');

// Route::resource('users','UserController');
Route::post('users','UserController@store');
Route::get('users/create/{id}','UserController@create');

Route::get('user/{id}','UserController@update');

Route::get('settings/{id}','SettingsController@update');

Route::get('user/settings','SettingsController@index');
Route::get('admin/settings','SettingsController@admin');
Route::get('admin/users','AdminController@user');
Route::get('admin/usersAll','AdminController@userAll');
Route::get('admin/user/{id}','AdminController@userShow');
Route::get('admin/user/confir/{id}','AdminController@userConfir');

Route::resource('Monedas','MonedaController');
Route::post('settings/tasas','SettingsController@storeTasas');
Route::get('tasas','SettingsController@showTasas');
Route::get('monedas','SettingsController@getMonedas');
Route::get('tasa/moneda/{id}/{id2}','MonedaController@getTasas');
