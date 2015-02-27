<?php

class UsersController extends \BaseController {
	
	public function index()
	{
		$users = User::orderBy('updated_at', 'desc')->get();
		return View::make('users.index')->with('users',$users);
	}
	
	public function login()
	{
		return View::make('users.login');
	}

	public function handleLogin()
	{
		$ruleslog = [
			'username'    => 'required', 
			'password'    => 'required|alphaNum|min:6' 
		];
		$validator = Validator::make(Input::all(), $ruleslog);
		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password')); 
		} else {
			$userdata = [
				'username'  => Input::get('username'),
				'password'  => Input::get('password'),
				'active' 	=> 1,
			];
			if (Auth::attempt($userdata, true)) {					
				$akses = Auth::user()->group_id;
				Session::flash('message', 'Berhasil Login');			
				return Redirect::to('welcome'); 					
			} else {   				
				Session::flash('message', 'Maaf Status Anda Belum Aktif');
				return Redirect::to('login');
			}
		}	

	}

	public function logout()
	{
		if(Auth::check()){
		  	Auth::logout();
		}
			Session::flash('message', 'Berhasil Logout');
		 	return Redirect::route('login');
 	}
	
	public function create()
	{
		return View::make('users.create');
	}

	public function store()
	{
		$rules = array(
	        'username'  => 'required|min:6', 
	        'password' 	=> 'required|alphaNum|min:6', 
		);
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {        	
        	return Redirect::route('user.create')->withErrors($validator);
        } else {
            $user = new User;
            $user->username   = Input::get('username');
            $user->password   = Hash::make(Input::get('password'));			
            $user->group_id   = Input::get('group_id');
			$user->is_guru	  = input::get('is_guru');
            $user->save();
            Session::flash('message', 'Successfully created user!');
            return Redirect::to('login');
        }	
	}

	public function profil($id)
	{
		$user = User::find($id);
		return View::make('users.profil')->with('user',$user);		
	}
	
	public function edit($id)
	{
		$user = User::find($id);
		return View::make('users.edit')->with('user',$user);
	}	
	
	public function editprofil($id)
	{
		$user = User::find($id);
		return View::make('users.editprofil')->with('user',$user);
	}

	public function changepassword($id)
	{
		$user = User::find($id);
		return View::make('users.changepassword')->with('user',$user);
	}
	
	public function updatepass($id)
	{
		$ruless = array(
			'password'	 => 'required|alphaNum|min:6', 
	    );
        $validator = Validator::make(Input::all(), $ruless);
        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/changepassword')->withErrors($validator);
        } else {
            $user = User::find($id);
            $user->password   = Hash::make(Input::get('password'));			
            $user->save();
            Session::flash('message', 'Successfully Change Password!');
            return Redirect::back();
        }		
    }

	public function update($id)
	{
		$rules = array(
		    'username'   => 'required',
			'password'	 => 'required|alphaNum|min:6', 
	    );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('user/' . $id . '/edit')->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $user = User::find($id);
            $user->username   = Input::get('username');
            $user->password   = Hash::make(Input::get('password'));			
            $user->group_id   = Input::get('group_id');  
            $user->active     = Input::get('active'); 
            $user->is_guru   = Input::get('is_guru');          
            $user->save();
            Session::flash('message', 'Successfully updated user!');
            return Redirect::back();
        }		
    }

	public function destroy($id)
	{
        $user = User::find($id);
		$user->delete();
       // $profil = Profile::where('user_id','=', $id )->first();
		//$profil->delete();
				Session::flash('message', 'Successfully deleted the user!');
				return Redirect::back();
	}
	
	
}