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
Route::get('welcome/login', 'LoginController@login')->name('login');
Route::post('welcome/login', 'LoginController@postLogin');
Route::get('logout/user', 'LoginController@logout');

Route::group(['middleware' => 'auth'], function() {

	Route::get('/{id?}', 'CompanyController@index')->name('home');
	Route::get('showCompany/{id}', 'CompanyController@showCompany')->name('show');
	Route::get('showCompany/{id}/edit', 'CompanyController@edit')->name('edit');
	Route::get('addCompany/new', 'CompanyController@create')->name('addCompany');
	Route::post('showCompany/info/update/', 'CompanyController@update');
	Route::post('addCompany/store', 'CompanyController@store');
	Route::get('remove/{id}', 'CompanyController@remove');

	Route::post('showCompany/addNew', 'ContactController@addNew');
	Route::get('showCompany/editContact/{id?}', 'ContactController@editContact');
	Route::post('showCompany/update', 'ContactController@update');

	Route::get('interest/create', 'InterestController@create');
	Route::post('interest/new', 'InterestController@add');
	Route::get('interest/remove/{id}', 'InterestController@remove');
	Route::post('interest/addNew', 'InterestController@addCompanyInterest');
	Route::get('interest/companyInterest/{id}/remove', 'InterestController@removeCompanyInterest');

	Route::get('search/showForm', 'SearchController@showForm');
	Route::post('search/filter', 'SearchController@searchFilter');
	Route::get('search/showOpgForm', 'SearchController@showOpgForm');
	Route::post('search/opgfilter', 'SearchController@searchOpgFilter');

	//OPG routes
	Route::get('opg/all', 'OpgController@index');
	Route::get('showOpg/{id}', 'OpgController@showOpg');
	Route::get('showOpg/{id}/edit', 'OpgController@edit');
	Route::get('addOpg/new', 'OpgController@create');
	Route::post('showOpg/info/update/', 'OpgController@update');
	Route::post('addOpg/store', 'OpgController@store');
	Route::get('opg/remove/{id}', 'OpgController@remove');

	Route::post('opginterest/addNew', 'InterestController@addOpgInterest');
	Route::get('interest/opgInterest/{id}/remove', 'InterestController@removeOpgInterest');

	Route::post('showOpg/addNew', 'OpgcontactController@addNew');
	Route::get('showOpg/editContact/{id?}', 'OpgcontactController@editContact');
	Route::post('showOpg/update', 'OpgcontactController@update');

	// Sent documents routes
	Route::get('register/show', 'RegisterController@index')->name('showReg');
	Route::post('register/show/addNew', 'RegisterController@addReg');
	Route::get('register/showRegister/{id}', 'RegisterController@show');
	Route::post('register/update', 'RegisterController@update');
	Route::get('register/remove/{id}', 'RegisterController@remove');

	// Received documents routes
	Route::get('receiver/show', 'ReceiverController@index')->name('showRec');
	Route::post('receiver/show/addNew', 'ReceiverController@addRec');
	Route::get('receiver/showRegister/{id}', 'ReceiverController@show');
	Route::post('receiver/update', 'ReceiverController@update');
	Route::get('receiver/remove/{id}', 'ReceiverController@remove');

	// Activities
	Route::get('activities/index/{id?}', 'ActivityController@index')->name('act-home');
	Route::get('activities/create/{id}', 'ActivityController@create');
	Route::get('activities/edit/{id}', 'ActivityController@edit');
	Route::post('activities/store', 'ActivityController@store');
	Route::post('activities/update', 'ActivityController@update');
	Route::get('activities/destroy/{id}', 'ActivityController@destroy');

	Route::post('activities/export', 'ExcelController@getExport');
	Route::get('activities/autocomplete', 'ActivityController@autocomplete')->name('autocomplete');
	Route::get('activities/autocompleteOpg', 'ActivityController@autocompleteOpg')->name('autocompleteOpg');

	Route::get('activities/changeOrder', 'ActivityController@changeOrder');

	Route::get('test/show', 'CompanyController@test');

	//Route::get('test/getDate', 'ActivityController@resetDates');

});