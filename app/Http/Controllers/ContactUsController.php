<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller
{
	public function send(Request $request)
	{
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		Mail::send('email.contactus', array(
			'name' => $request->name,
			'email' => $request->email,
			'msg' => $request->message
		), function($message)
		{
			$message->from('mail@example.com', 'Exampl');
			$message->to('jmsbhatta@gmail.com', 'Admin')->subject('Contact Us Form');
		});

		$response = array(
			'status' => true,
			'message' => 'Contact Form Submitted',
		);

		return response()->json($response); 
	}
}
