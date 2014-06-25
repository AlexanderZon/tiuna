<?php

class IndexController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getIndex(){
		return View::make('hello');
	}

	public function getContact(){
		return View::make('index.contact');
	}

	public function getHelp(){
		return View::make('index.help');
	}

	public function getDevelopers(){
		return View::make('index.developers');
	}

}