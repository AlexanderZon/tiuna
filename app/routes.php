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

if(Auth::check()):

Route::get('/auth/login', function(){
	return Redirect::to('/');
});
Route::get('/auth/logout', function(){
	return View::make('auth.logout');
});
Route::post('/auth/logout', function(){
	Auth::logout();
	return Redirect::to('/');
});
Route::get('/auth/password', function(){
	return View::make('auth.password');
});
Route::post('/auth/password', function(){
	$password = Auth::user()->password;
	if(Hash::check(Input::get('actual_pass'), $password)){
		if(Input::get('new_pass') === Input::get('repeat_pass')){
			$user = User::find(Auth::user()->id);
			$user->password = Hash::make(Input::get('new_pass'));
			$user->save();
			Auth::logout();
			return Redirect::to('/');
		}
		else{
			return View::make('auth.password')->with(array('err'=>'Las Contraseñas introducidas no son iguales'));
		}
	}
	else{
		return View::make('auth.password')->with(array('err'=>'La contraseña actual introducida no es válida'));
	}
});
Route::controller('/patient', 'PatientsController');
//
Route::controller('/', 'IndexController');


else:

Route::get('/auth', function(){
	return Redirect::to('auth/login');
});
Route::get('/patient', function(){
	return Redirect::to('auth/login');
});
Route::get('/patient/{any}', function(){
	return Redirect::to('auth/login');
});
Route::get('/', function(){
	return Redirect::to('auth/login');
});

endif;

Route::controller('/auth', 'AuthController');
