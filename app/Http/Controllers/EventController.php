<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
	public $sidenavreturn;
	
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show']]);
		
		$this->sidenavreturn = [
			['title' => '<i class="fa fa-angle-left"></i>&nbsp;&nbsp;Zurück zur Übersicht',
				'link' => route('events.index')
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
		$sidenavitems = [
			[	'title' => 'Verein und Weltladen',
				'link' => route('about', ['sub' => 'verein'])
			],
			[	'title' => 'Vereinsleben',
				'link' => route('about', ['sub' => 'vereinsleben'])
			],
			[	'title' => 'Veranstaltungen',
				'link' => route('about', ['sub' => 'veranstaltungen'])
			],
			[	'title' => 'Bildungsarbeit',
				'link' => route('about', ['sub' => 'bildungsarbeit'])
			],
			[	'title' => 'Was kann ich tun?',
				'link' => route('about', ['sub' => 'beteiligen'])
			],
		];
		
		$events = (new Event)->orderBy('date', 'desc')->paginate(15);
		
        return view('pages.events.index')->with([
			'request' => $request,
			'sidenavitems' => $sidenavitems,
			'events' => $events,
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
		if (!auth()->user()->perm_events) abort(403);
		
        return view('pages.events.create')->with([
        	'request' => $request,
			'sidenavitems' => $this->sidenavreturn
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if (!auth()->user()->perm_events) abort(403);
	
		$validator = Validator::make($request->all(), [
			'title' => 'required|string|max:255',
			'body' => 'required|string',
			'date' => 'nullable|max:255',
			'igm' => 'nullable|file',
			'link' => 'nullable|url'
		]);
	
		if (!empty($validator->errors()->toArray()))
		{
			$messages = [];
			foreach ($validator->errors()->toArray() as $error)
				$messages[] = $error[0];
			dd($messages);
			return redirect()->route('events.create')->with(['errors' => $messages])->withInput();
		}
	
		$event = new Event;
		$event->title = $request->get('title');
		$event->date = $request->get('date') ?? null;
	
		$base64 = null;
		
		if ($request->hasFile('img'))
			if ($request->file('img')->isValid()) {
				$image = $request->file('img') ?? null;
				$imagedata = file_get_contents($image);
				$base64 = base64_encode($imagedata);
			}
		
		$event->image = $base64;
		$event->more_link = $request->get('link') ?? null;
		$event->body = $request->get('body');
	
		if ($event->save())
			return redirect()->route('events.index')->with(['success' => 'Beitrag erfolgreich gespeichert.']);
	
		return redirect()->route('events.create')->with(['error' => 'Beim Speichern des Beitrages ist ein Fehler aufgetreten.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    /*public function show(Event $event)
    {
        //
    }*/
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Request $request
	 * @param  \App\Event $event
	 * @return \Illuminate\Http\Response
	 */
    public function edit(Request $request, $event)
    {
		if (!auth()->user()->perm_events) abort(403);
	
		$event = Event::findOrFail($event);
		
		return view('pages.events.edit')->with([
			'request' => $request,
			'sidenavitems' => $this->sidenavreturn,
			'event' => $event
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $event)
    {
		if (!auth()->user()->perm_events) abort(403);
		
		$validator = Validator::make($request->all(), [
			'title' => 'required|string|max:255',
			'body' => 'required|string',
			'date' => 'nullable|max:255',
			'igm' => 'nullable|file',
			'link' => 'nullable|url'
		]);
		
		if (!empty($validator->errors()->toArray()))
		{
			$messages = [];
			foreach ($validator->errors()->toArray() as $error)
				$messages[] = $error[0];
			return redirect()->route('events.edit', $event)->with(['errors' => $messages])->withInput();
		}
		
		$event = Event::findOrFail($event);
		$event->title = $request->get('title');
		
		$date = $request->get('date') ?? null;
		
		if ($date)
		{
			$dates = explode(' bis ', $date);
			$date = strftime('%g-%m-%d', strtotime($dates[0])) . '/' . strftime('%g-%m-%d', strtotime($dates[1]));
		}
		
		$event->date = $date;
	
		$base64 = null;
	
		if ($request->hasFile('img')) {
			if ($request->file('img')->isValid()) {
				$image = $request->file('img') ?? null;
				$imagedata = file_get_contents($image);
				$base64 = base64_encode($imagedata);
			}
		}
		
		if ($base64)
			$event->image = $base64;
		
		if ($request->get('del-img') === '1')
			$event->image = null;
		
		$event->more_link = $request->get('link') ?? null;
		$event->body = $request->get('body');
	
		if ($event->save())
			return redirect()->route('events.index')->with(['success' => 'Veranstaltung erfolgreich aktualisiert.']);
	
		return redirect()->route('events.update', $event->id)->with(['error' => 'Beim Speichern des Beitrages ist ein Fehler aufgetreten.']);
    }
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param $id
	 * @return \Illuminate\Http\Response
	 */
    public function destroy($id)
    {
		if (!auth()->user()->perm_events) return json_encode(['success' => false]);
	
		$event = Event::findOrFail($id);
	
		if ($event->delete())
			return json_encode(['success' => true]);
	
		return json_encode(['success' => false]);
    }
}
