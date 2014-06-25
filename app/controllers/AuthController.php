<?php

class AuthController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Redirect::to('/');
	}

	public function getLogin(){
		return View::make('auth.login');
	}

	public function postLogin(){
		$credentials = array(
			'login' => Input::get('login'),
			'password' => Input::get('password')
			);

		if(Auth::attempt($credentials)):
			return Redirect::to('/');
		else:
			return View::make('auth.login')->with('err', 'Usuario o Contraseña Inválidos');
		endif;
	}

	public function getLogout(){

		return View::make('auth.logout');

	}

	public function postLogout(){

		Auth::logout();
		return Redirect::to('/');

	}

	public function getReplace(){
		var_dump("hola");
	}

}