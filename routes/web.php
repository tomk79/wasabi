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

Route::middleware(['boot'])
->group(function () {
	Route::get('/', 'StartpageController@startpage');
	Route::get('/settings/withdraw/completed', function(){
		return view('withdraw/completed');
	});

	Auth::routes(['verify' => true]);
	Route::middleware('verified')->group(function(){

		// ユーザーのプロフィール
		Route::get('settings/profile', 'ProfileController@index');
		Route::get('settings/profile/edit', 'ProfileController@edit');
		Route::post('settings/profile/edit', 'ProfileController@update');
		Route::get('settings/profile/edit_email', 'ProfileController@edit_email');
		Route::post('settings/profile/edit_email', 'ProfileController@update_email');
		Route::get('settings/profile/edit_email_mailsent', 'ProfileController@update_email_mailsent');
		Route::get('settings/profile/edit_email_update', 'ProfileController@update_email_update');
		Route::get('settings/withdraw', 'WithdrawController@confirm');
		Route::delete('settings/withdraw', 'WithdrawController@withdraw');

		// ユーザーグループ一覧
		Route::get('settings/groups', 'GroupsController@index');
		Route::get('settings/groups/create', 'GroupsController@create');
		Route::post('settings/groups/create', 'GroupsController@store');


		// アカウント: ホームページ
		Route::get('{account}', 'HomeController@index');
		Route::get('{account}/edit', 'HomeController@edit');
		Route::post('{account}/edit', 'HomeController@update');

		// アカウント: メンバー管理
		Route::resource('{account}/members', 'MembersController');

	});

});