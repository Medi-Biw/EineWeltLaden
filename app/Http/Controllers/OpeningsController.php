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
		$data = Openings::get()->keyBy('id')->toArray();
        return view('pages.panel.openings')->with(['data' => $data]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Openings  $openings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Openings $openings)
    {
		if (!auth()->user()->perm_openings) abort(403);
        //
    }
}
