<?php

namespace App\Http\Controllers;

use App\Openings;
use Illuminate\Http\Request;

class OpeningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
		if (!auth()->user()->perm_openings) abort(403);
		$data = (new Openings)->get()->keyBy('id')->toArray();
        return view('pages.panel.openings')->with(['data' => $data]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		if (!auth()->user()->perm_openings) abort(403);
    
		$days = $request->input('days');
		
		foreach ($days as $day => $data)
			(new Openings)->findOrFail($day)->update($data);
		
		return redirect()->route('openings.edit')->with(['success' => 'Änderungen erfolgreich gespeichert.']);
    }
}
