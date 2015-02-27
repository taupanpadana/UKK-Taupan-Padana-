<?php

class MapelController extends \BaseController {

	public function index()
	{
		$mapels = Mapel::all();
		return View::make('mapels.index')->with('mapels',$mapels);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mapel/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mapels.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mapel
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'mata_pelajaran'=> 'required',
			'waktu_ujian'=> 'required',
		);
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {        	
        	return Redirect::route('mapel.create')->withErrors($validator);
        } else {
            $mpl = new Mapel;
            $mpl->mata_pelajaran   = Input::get('mata_pelajaran');
			$mpl->waktu_ujian   = Input::get('waktu_ujian');
            $mpl->save();
            Session::flash('message', 'Successfully created mata Pelajaran!');
            return Redirect::to('mapel');
        }
	}

	/**
	 * Display the specified resource.
	 * GET /mapel/{id}
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
	 * GET /mapel/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$mapel = Mapel::find($id);
		return View::make('mapels.edit')->with('mapel',$mapel);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mapel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
		    'mata_pelajaran'   => 'required', 
			'waktu_ujian'=> 'required',
	    );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('mapel/' . $id . '/edit')->withErrors($validator);
        } else {
            $mapel = Mapel::find($id);
            $mapel->mata_pelajaran   = Input::get('mata_pelajaran');
			$mapel->waktu_ujian   = Input::get('waktu_ujian');
            $mapel->save();
            Session::flash('message', 'Successfully updated Mata pelajaran!');
            return Redirect::to('mapel');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mapel/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$mapel = Mapel::find($id);
        $mapel->delete();
        Session::flash('message', 'Successfully deleted the mata pelajaran!');
        return Redirect::back();
	}
	

}