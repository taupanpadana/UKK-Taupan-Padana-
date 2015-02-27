<?php
Route::pattern('id', '\d+');
Route::pattern('betul', '\d+');
Route::pattern('salah', '\d+');
Route::pattern('skor', '\d+');
Route::pattern('slug', '[a-z0-9-]+');


Route::get('/', function(){	return View::make('hello'); });	
Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@handleLogin'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
Route::get('register', array('as' => 'register', 'uses' => 'HomeController@create'));
Route::post('/register', function(){
	$rules = array(
        'username'  => 'required|min:6', 
        'password' 	=> 'required|alphaNum|min:6', 
	);
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {        	
    	return Redirect::to('register')->withErrors($validator);
    } else {
        $user = new User;
        $user->username   = Input::get('username');
        $user->password   = Hash::make(Input::get('password'));			
        $user->group_id   = Input::get('group_id');
        $user->save();
        Session::flash('message', 'Successfully created user!');
        return Redirect::to('login');
    }	
});

Route::get('/ujian','SoalController@ujian');
Route::group(array('before' => 'auth'), function(){
	Route::resource('user', 'UsersController'); 	
	Route::get('welcome', function(){ return View::make('welcome'); });
	Route::get('/profil/{id}', array('as' => 'profil', 'uses' => 'UsersController@profil'));
	Route::get('/editprofil/{id}',array('as' => 'editprofil', 'uses' => 'UsersController@editprofil'));
	Route::get('/changepassword/{id}', array('as' => 'changepassword', 'uses' => 'UsersController@changepassword'));
	Route::post('/changepassword/{id}/change', array('as' => 'changepassword', 'uses' => 'UsersController@updatepass'));
	Route::get('/user/{id}/aktifkan', function($id){
		$user = User::find($id);
		$user->active = 1;
		$user->save();
	    return Redirect::back();
	});	
	Route::get('/user/{id}/nonaktifkan', function($id){
		$user = User::find($id);
		$user->active = 0;
		$user->save();
	    return Redirect::back();
	});

	Route::get('/user/{id}/jadiadmin', function($id){
		$user = User::find($id);
		$user->active = 1;
		$user->save();
	    return Redirect::back();
	});

	Route::get('/user/{id}/jadisiswa', function($id){
		$user = User::find($id);
		$user->active = 0;
		$user->save();
	    return Redirect::back();
	});
	
	Route::get('/user/{id}/jadiguru', function($id){
		$user = User::find($id);
		$user->active = 2;
		$user->save();
	    return Redirect::back();
	});

	
	Route::get('/ujian/{id}/proses', function($id){
		$mapl = Mapel::find($id);
		$timeset = $mapl->waktu_ujian;
		$soal = Soal::where('mapel_id','=',$id)->where('group_id','=', Auth::user()->group_id )->orderByRaw("RAND()")->take(10)->get();
		return View::make('ujian.prsujian')->with(compact('mapl'))->with(compact('timeset'))->with(compact('soal'));
	});

	Route::resource('mapel', 'MapelController');
	Route::get('/mapel/{id}',array('as' => 'edit', 'uses' => 'MapelController@edit'));
	
	Route::resource('soal', 'SoalController'); 
	Route::get('/edit/{id}',array('as' => 'edit', 'uses' => 'SoalController@edit'));
	Route::resource('nilai', 'NilaiController'); 
	Route::get('nilai', function (){
		$nilais = Nilai::all();
		return View::make('nilai.index')->with('nilais',$nilais);
	}); 
	
	Route::get('/nilai/{id}/{betul}/{salah}/{skor}', function($id,$betul,$salah,$skor){
		$nilai = new Nilai;
		$nilai->user_id   = Auth::user()->id;
        $nilai->mapel_id   = $id;			
        $nilai->benar   = $betul;
        $nilai->salah   = $salah;
        $nilai->nilai   = $skor;
        $nilai->save();            
        return Redirect::to('ujian');	
	});
	
	Route::resource('nilai', 'NilaiController');
	
	
});




