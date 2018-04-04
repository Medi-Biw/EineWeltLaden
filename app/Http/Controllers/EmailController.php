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
		try
		{
			$to = $request->input('to') ?? 'admin@gaspla.net';
			
			Mail::to($to)->send(new Email(['subject' => 'Test-Email', 'view' => 'emails.test']));
			
			return response()->json(['message' => 'Test-Email gesendet']);
		}
		catch (Exception $e)
		{
			return response()->json(['message' => $e->getMessage()]);
		}
	}
}
