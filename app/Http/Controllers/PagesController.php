<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return view('pages.welcome');
	}
	
	public function about(Request $request)
	{
		$sidenavitems = [
			[	'title' => 'Verein und Weltladen',
				'link' => route('about', ['sub' => 'verein'])
			],
			[	'title' => 'Fairer Handel',
				'link' => route('about', ['sub' => 'fair-trade'])
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
		
		/*if (!self::isValidSub($sidenavitems, $request->fullUrl()))
			return abort(404);*/
		
		$include = null;
		
		if		($request->is('about/verein'))			$include = 'pages.about.verein';
		elseif	($request->is('about/fair-trade'))		$include = 'pages.about.fair-trade';
		elseif	($request->is('about/vereinsleben'))	$include = 'pages.about.vereinsleben';
		elseif	($request->is('about/veranstaltungen'))	$include = 'pages.about.veranstaltungen';
		elseif	($request->is('about/bildungsarbeit'))	$include = 'pages.about.bildungsarbeit';
		elseif	($request->is('about/beteiligen'))		$include = 'pages.about.involvieren';
		
		if (empty($include))
			return abort(404);
		
		/*if ($request->isMethod('post'))
			return view($include);*/
		
		return view('pages.about')->with([
			'request' => $request,
			'sidenavitems' => $sidenavitems,
			'include' => $include
		]);
	}
	
	/*private static function isValidSub($items, $current): bool {
		foreach ($items as $item)
			if ($item['link'] == $current)
				return true;
		return false;
	}*/
}
