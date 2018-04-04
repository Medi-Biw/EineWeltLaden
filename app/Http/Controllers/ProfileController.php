<?php

namespace App\Http\Controllers;

use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
	{
		return view('pages.panel.profile');
	}
	
	public function validateInfos(array $data)
	{
		return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => [
            	'required', 'string', 'email', 'max:255',
				Rule::unique('users')->ignore(auth()->id()),
			],
        ]);
	}
	
	public function validatePassword(array $data)
	{
		return Validator::make($data, [
			'password_old' => [
				'required',
				'string',
				function($attribute, $value, $fail) {
					if (!\Hash::check($value, auth()->user()->getAuthPassword()))
						return $fail('Aktuelles Passwort ist inkorrekt.');
				},
			],
			'password' => 'required|string|min:6|confirmed',
		]);
	}
	
	public function update(Request $request)
	{
		$data = $request->all();
		
		$validator = $this->validateInfos($data);
		
		if ($validator->fails())
			return redirect()->route('profile')->withErrors($validator, 'profile');
		
		$update = auth()->user()->update($data);
		
		if ($update)
			return redirect()->route('profile')->with(['success' => 'Profil erfolgreich aktualisiert.']);
		else
			return redirect()->route('profile')->withError('Es ist ein undokumentierter Fehler aufgetreten.');
	}
	
	public function password(Request $request)
	{
		$validator = $this->validatePassword($request->all());
		
		if ($validator->fails())
			return redirect()->route('profile')->withErrors($validator, 'password');
		
		$update = auth()->user()->update(['password' => \Hash::make($request->input('password'))]);
		
		if ($update)
			return redirect()->route('profile')->with(['success' => 'Passwort erfolgreich aktualisiert.']);
		else
			return redirect()->route('profile')->withError('Es ist ein undokumentierter Fehler aufgetreten.');
	}
}
