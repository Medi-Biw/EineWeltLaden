<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	public $sidenavitems;
	public $sidenavreturn;
	
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
		
		$this->sidenavitems = [
			['title' => 'Neuigkeiten-Blog',
				'link' => route('posts.index')
			],
		];
		
		$this->sidenavreturn = [
			['title' => '<i class="fa fa-angle-left"></i>&nbsp;&nbsp;Zurück zu den Beiträgen',
				'link' => route('posts.index')
			],
		];
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$posts = Post::with(['user'])->orderBy('created_at', 'desc')->paginate(20);
		return view('pages.posts.index')->with(['request' => $request, 'sidenavitems' => $this->sidenavitems, 'posts' => $posts]);
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		return view('pages.posts.create')->with(['request' => $request, 'sidenavitems' => $this->sidenavreturn]);
	}
	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required|max:255',
			'body' => 'required'
		]);
		
		$post = new Post;
		$post->title = $request->get('title');
		$post->body = $request->get('body');
		
		$user = auth()->user();
		$post->user()->associate($user);
		
		if ($post->save())
			return redirect()->route('posts.show', $post->id)->with(['success' => 'Beitrag erfolgreich gespeichert.']);
		
		return redirect()->route('posts.create')->with(['error' => 'Beim Speichern des Beitrages ist ein Fehler aufgetreten.']);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id)
	{
		$post = Post::where('id', $id)->with(['user'])->get()->first();
		
		if (count($post) <> 1)
			return abort(404);
		
		return view('pages.posts.show')->with(['post' => $post, 'request' => $request, 'sidenavitems' => $this->sidenavreturn]);
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request, $id)
	{
		$post = Post::where('id', $id)->with(['user'])->get()->first();
		
		if (count($post) <> 1)
			return abort(500);
		
		return view('pages.posts.edit')->with(['post' => $post, 'request' => $request, 'sidenavitems' => $this->sidenavreturn]);
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
		$this->validate($request, [
			'title' => 'required|max:255',
			'body' => 'required'
		]);
		
		$post = Post::findOrFail($id);
		$post->title = $request->get('title');
		$post->body = $request->get('body');
		
		if ($post->save())
			return redirect()->route('posts.show', $post->id)->with(['success' => 'Beitrag erfolgreich gespeichert.']);
		
		return redirect()->route('posts.edit', $id)->with(['error' => 'Beim Speichern des Beitrages ist ein Fehler aufgetreten.']);
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
