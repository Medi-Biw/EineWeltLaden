<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;
use Validator;

class PostController extends Controller
{
	public $sidenavitems;
	public $sidenavreturn;
	
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
		
		$this->sidenavitems = [
			[	'title' => 'Pax et bonum',
				'link' => route('welcome')
			],
			[	'title' => 'Aktuell',
				'link' => route('posts.index')
			],
			'divider',
			[	'title' => 'Verein und Weltladen',
				'link' => route('about', ['sub' => 'verein'])
			],
			[	'title' => 'Fair Trade',
				'link' => route('laden', ['sub' => 'fair-trade'])
			],
			[	'title' => 'Veranstaltungen',
				'link' => route('about', ['sub' => 'veranstaltungen'])
			],
			[	'title' => 'Erreichen Sie uns',
				'link' => route('kontakt', ['sub' => 'info'])
			],
			[	'title' => 'Impressum',
				'link' => route('kontakt', ['sub' => 'impressum'])
			],
		];
		
		$this->sidenavreturn = [
			['title' => '<i class="fa fa-angle-left"></i>&nbsp;&nbsp;Zurück zur Übersicht',
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
		if (!auth()->user()->perm_posts) abort(403);
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
		if (!auth()->user()->perm_posts) abort(403);
		
		$validator = Validator::make($request->all(), [
			'title' => 'required|max:255',
			'body' => 'required|min:10'
		]);
		
		if (!empty($validator->errors()->toArray()))
		{
			$messages = [];
			foreach ($validator->errors()->toArray() as $error)
				$messages[] = $error[0];
			return redirect()->route('posts.create')->with(['errors' => $messages])->withInput();
		}
		
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
		$post = (new Post)->where('id', $id)->with(['user'])->get()->first();
		
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
		if (!auth()->user()->perm_posts) abort(403);
		
		$post = (new Post)->where('id', $id)->with(['user'])->get()->first();
		
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
		if (!auth()->user()->perm_posts) abort(403);
		
		$validator = Validator::make($request->all(), [
			'title' => 'required|max:255',
			'body' => 'required|min:10'
		]);
		
		if (!empty($validator->errors()->toArray()))
		{
			$messages = [];
			foreach ($validator->errors()->toArray() as $error)
				$messages[] = $error[0];
			return redirect()->route('posts.edit', $id)->with(['errors' => $messages])->withInput();
		}
		
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
		if (!auth()->user()->perm_posts) return json_encode(['success' => false]);
		
		$post = Post::findOrFail($id);
		
		if ($post->delete())
			return json_encode(['success' => true]);
		
		return json_encode(['success' => false]);
	}
}
