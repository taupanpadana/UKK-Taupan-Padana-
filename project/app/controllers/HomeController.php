<?php

class HomeController extends BaseController {


	public function showWelcome()
	{
		return View::make('hello');
	}

	public function create()
	{
		return View::make('register');
	}

	
}
