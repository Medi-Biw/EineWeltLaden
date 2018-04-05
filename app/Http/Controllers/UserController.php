<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (!auth()->user()->perm_users) abort(403);
		
		$users = User::all();
		return view('pages.panel.users.index')->with(['users' => $users]);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		if (!auth()->user()->perm_users) abort(403);
		
		return view('pages.panel.users.create');
	}
	
	/**
	 * @param array $data
	 * @return \Illuminate\Validation\Validator
	 */
	protected function validateStore(array $data)
	{
		return \Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|string|min:6|max:255|confirmed',
		]);
	}
	
	/**
	 * @param array $data
	 * @param $id
	 * @return \Illuminate\Validation\Validator
	 */
	protected function validateUpdate(array $data, $id)
	{
		return \Validator::make($data, [
			'name' => 'required|string|max:255',
			'email' => ['required', 'email', 'max:255',
				function () use ($id) {
					return Rule::unique('users')->ignore($id);
				}],
			'password' => 'sometimes|required|string|min:6|max:255|confirmed',
		]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		if (!auth()->user()->perm_users) abort(403);
		
		$validator = $this->validateStore($request->all());
		
		if ($validator->fails())
			return redirect()->route('user.create')->withErrors($validator->errors(), 'cruser')->withInput();
		
		$user = User::create($request->all());
		
		return redirect()->route('user.show', $user->id);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		if (!auth()->user()->perm_users) abort(403);
		
		$user = User::findOrFail($id);
		return view('pages.panel.users.show')->with(['user' => $user]);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		if (!auth()->user()->perm_users) abort(403);
		
		$user = User::findOrFail($id);
		return view('pages.panel.users.edit')->with(['user' => $user]);
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		if (!auth()->user()->perm_users) abort(403);
		
		$data = $request->all();
		
		if (empty($data['password']) && empty($data['password_confirmation'])) {
			unset($data['password']);
			unset($data['password_confirmation']);
		}
		
		$validator = $this->validateUpdate($data, $id);
		
		if ($validator->fails())
			return redirect()->route('user.edit', $id)->withErrors($validator->errors(), 'cruser')->withInput();
		
		$user = User::findOrFail($id);
		
		if (!empty($data['password']))
			$data['password'] = \Hash::make($data['password']);
		
		$user->update($data);
		
		return redirect()->route('user.show', $id);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy($id)
	{
		if (!auth()->user()->perm_users) return response(403)->json(['success' => false]);
		if ($id === 1) return response(403)->json(['success' => false]);
		
		$event = User::findOrFail($id);
		
		if ($event->delete()) {
			session()->flash('success', 'Benutzerkonto erfolgreich gelöscht.');
			return response()->json(['success' => true]);
		}
		
		return response()->json(['success' => false]);
	}
}
