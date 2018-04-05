<?php

namespace App\Http\Controllers;

use App\Email;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
	public function test(Request $request)
	{
		try {
			$to = $request->input('to') ?? 'admin@gaspla.net';
			
			Mail::to($to)->send(new Email(['subject' => 'Test-Email', 'view' => 'emails.test', 'replyTo']));
			
			return response()->json(['message' => 'Test-Email gesendet']);
		} catch (Exception $e) {
			return response()->json(['message' => $e->getMessage()]);
		}
	}
	
	public function contact(Request $request)
	{
		$v = \Validator::make($request->all(), [
			'name' => 'required|string|max:255',
			'email' => 'required|email|max:255',
			'subject' => 'required|string|max:255',
			'message' => 'required|string|max:9000',
		]);
		
		if ($v->fails())
			return redirect('/kontakt/formular')->withErrors($v, 'contact')->withInput();
		
		$to = env('CONTACT_FORM_ADDRESS');
		
		if (empty($to)) abort(500);
		
		Mail::to($to)->send(new Email([
			'subject' => '[Kontaktanfrage] ' . $request->input('subject'),
			'view' => [
				'emails.contact',
				[
					'name' => $request->input('name'),
					'email' => $request->input('email'),
					'subject' => $request->input('subject'),
					'body' => $request->input('message'),
				],
			],
			'replyTo' => [$request->input('email'), $request->input('name')]
		]));
		
		return redirect('/kontakt/formular')->withSuccess('Kontaktanfrage erfolgreich versandt.');
	}
}
