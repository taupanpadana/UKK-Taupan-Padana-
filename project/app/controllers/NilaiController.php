<?php

class NilaiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /nilai
	 *
	 * @return Response
	 */
	public function index()
	{
		$nilai = Nilai::all();
		return View::make('nilai.nilai')->with('nilai',$nilai);	
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /nilai/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /nilai
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /nilai/{id}
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
	 * GET /nilai/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /nilai/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /nilai/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$nli = Nilai::find($id);
        $nli->delete();
        Session::flash('message', 'Successfully deleted the nilai!');
        return Redirect::back();
	}

}