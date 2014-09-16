<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array (
	'as' => 'home',
	'uses' => 'HomeController@home'
));
/*
Unauthorised group
*/
Route::group(array('before' => 'guest'), function() {
	/*
	CSRF group
	*/
	Route::group(array('before' => 'csrf'), function(){
	/*
	Create Account (POST)
	*/
	Route::post('/account/create', array(
		'as' => 'account-create-post',
		'uses' => 'AccountController@postCreate'));
	});
	/*
	Create Account (GET)
	*/
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'));

	Route:: get('/account/activate/{code}', array(
	'as' => 'account-activate',
	'uses' => 'AccountController@getActivate'));
});