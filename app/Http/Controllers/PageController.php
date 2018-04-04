<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$sidenavitems = [
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
			[	'title' => 'Öffnungszeiten',
				'link' => route('laden', ['sub' => 'öffnungszeiten'])
			],
		];
		
		return view('pages.welcome')->with([
			'request' => $request,
			'sidenavitems' => $sidenavitems,
		]);
	}
	
	public function about(Request $request)
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
		
		$include = null;
		
		if		($request->is('about/verein'))			$include = 'pages.about.verein';
		elseif	($request->is('about/vereinsleben'))	$include = 'pages.about.vereinsleben';
		elseif	($request->is('about/bildungsarbeit'))	$include = 'pages.about.bildungsarbeit';
		elseif	($request->is('about/beteiligen'))		$include = 'pages.about.involvieren';
		
		if (empty($include))
			return abort(404);
		
		return view($include)->with([
			'request' => $request,
			'sidenavitems' => $sidenavitems
		]);
	}
	
	public function laden(Request $request)
	{
		$sidenavitems = [
			[	'title' => 'Sortiment',
				'link' => route('laden', ['sub' => 'sortiment'])
			],
			[	'title' => 'Fairer Handel',
				'link' => route('laden', ['sub' => 'fair-trade'])
			],
			[	'title' => 'Mitarbeiter',
				'link' => route('laden', ['sub' => 'mitarbeiter'])
			],
			[	'title' => 'Standort',
				'link' => route('laden', ['sub' => 'standort'])
			],
			[	'title' => 'Öffnungszeiten',
				'link' => route('laden', ['sub' => 'öffnungszeiten'])
			],
		];
		
		$include = null;
		
		if		($request->is('laden/sortiment'))		$include = 'pages.laden.sortiment';
		elseif	($request->is('laden/fair-trade'))		$include = 'pages.laden.fair-trade';
		elseif	($request->is('laden/mitarbeiter'))		$include = 'pages.laden.mitarbeiter';
		elseif	($request->is('laden/standort'))		$include = 'pages.laden.standort';
		elseif	($request->is('laden/öffnungszeiten'))	$include = 'pages.laden.openings';
		
		if (empty($include))
			return abort(404);
		
		return view($include)->with([
			'request' => $request,
			'sidenavitems' => $sidenavitems
		]);
	}
	
	public function kontakt(Request $request)
	{
		$sidenavitems = [
			[	'title' => 'Kontakt',
				'link' => route('kontakt', ['sub' => 'info'])
			],
			[	'title' => 'Kontaktformular',
				'link' => route('kontakt', ['sub' => 'formular'])
			],
			[	'title' => 'Datenschutz',
				'link' => route('kontakt', ['sub' => 'datenschutz'])
			],
			[	'title' => 'Impressum',
				'link' => route('kontakt', ['sub' => 'impressum'])
			],
		];
		
		$include = null;
		
		if		($request->is('kontakt/info'))			$include = 'pages.kontakt.info';
		elseif	($request->is('kontakt/formular'))		$include = 'pages.kontakt.contactform';
		elseif	($request->is('kontakt/datenschutz'))	$include = 'pages.kontakt.datenschutz';
		elseif	($request->is('kontakt/impressum'))		$include = 'pages.kontakt.impressum';
		
		if (empty($include))
			return abort(404);
		
		return view($include)->with([
			'request' => $request,
			'sidenavitems' => $sidenavitems
		]);
	}
}
