<?php

namespace App\Http\Controllers\Frontend;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
	public function index()
	{
		$events = Event::orderBy('start_time', 'desc')->get();
		return view('event.list', compact('events'));
	}

	public function show($slug)
	{
		$event = Event::where('slug', $slug)->first();
		if (!$event) {
			abort(404);
		}
		return view('event.show', compact('event'));
	}
}
