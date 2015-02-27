<?php

class SoalController extends \BaseController {

	public function index()
	{
		$soals = Soal::all();
		return View::make('soals.index')->with('soals',$soals);		
	}

	public function create()
	{
		return View::make('soals.create');
	}
	
	public function ujian()
	{
		return View::make('soals.ujian');
	}

	public function store()
	{
		$rules = array(
			'pertanyaan'=> 'required',
			'jawab_a' 	=> 'required',
			'jawab_b' 	=> 'required',
			'jawab_c' 	=> 'required',
			'jawab_d' 	=> 'required',
			'kunci_jawab' 	=> 'required',
		);
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {        	
        	return Redirect::route('soal.create')->withErrors($validator);
        } else {
            $soal = new Soal;
            $soal->group_id   = Input::get('group_id');
            $soal->mapel_id   = Input::get('mapel_id');			
            $soal->pertanyaan   = Input::get('pertanyaan');
			$soal->jawab_a   = Input::get('jawab_a');
			$soal->jawab_b   = Input::get('jawab_b');
			$soal->jawab_c   = Input::get('jawab_c');
			$soal->jawab_d   = Input::get('jawab_d');
			$soal->kunci_jawab   = Input::get('kunci_jawab');
            $soal->save();
            Session::flash('message', 'Successfully created soal!');
            return Redirect::to('soal');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /soal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /soal/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$soal = Soal::find($id);
		return View::make('soals.edit')->with('soal',$soal);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /soal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'pertanyaan'=> 'required',
			'jawab_a' 	=> 'required',
			'jawab_b' 	=> 'required',
			'jawab_c' 	=> 'required',
			'jawab_d' 	=> 'required',
			'kunci_jawab' 	=> 'required',
		);
		$validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {        	
        	return Redirect::to('soal/' . $id . '/edit')->withErrors($validator);
        } else {
            $soal = Soal::find($id);
            $soal->group_id   = Input::get('group_id');
            $soal->mapel_id   = Input::get('mapel_id');			
            $soal->pertanyaan   = Input::get('pertanyaan');
			$soal->jawab_a   = Input::get('jawab_a');
			$soal->jawab_b   = Input::get('jawab_b');
			$soal->jawab_c   = Input::get('jawab_c');
			$soal->jawab_d   = Input::get('jawab_d');
			$soal->kunci_jawab   = Input::get('kunci_jawab');
            $soal->save();
            Session::flash('message', 'Successfully update soal!');
            return Redirect::to('soal');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /soal/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$soal = Soal::find($id);
        $soal->delete();
        Session::flash('message', 'Successfully deleted the Soal!');
        return Redirect::back();
	}
	
	

}