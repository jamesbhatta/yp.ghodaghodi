<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading = "Events";
        $events = Event::orderBy('start_time', 'desc')->get();
        return view('event.index', compact('heading', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heading = "New Event Form";
        return view('event.create', compact('heading'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        DB::beginTransaction();
        try {
            $event = new Event();
            $event->name = $request->name;
            $event->host = $request->host;
            $event->location = $request->location;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->excerpt = $request->excerpt;
            $event->description = $request->description;
            if ($request->pic) {
                $event->pic = Storage::disk('public_uploads')->put('event', $request->file('pic'));
                $event->thumbnail =  $event->storeThumbnail($request->file('pic'));
            }
            $event->save();
            DB::commit();
            $request->session()->flash('success', 'Event Registered Successfully.');
        } catch (Exception $e) {
            Storage::disk('public_uploads')->delete($event->pic);
            Storage::disk('public_uploads')->delete($event->thumbnail);
            DB::rollback();
            $request->session()->flash('error', 'Something went wrong please check the form.');
            return redirect()->back();
        }

        return redirect()->route('event.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $heading = "Edit Event";
        return view('event.edit', compact('heading', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, Event $event)
    {
        DB::beginTransaction();
        try {
            $event->name = $request->name;
            $event->host = $request->host;
            $event->location = $request->location;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->description = $request->description;
            $event->excerpt = $request->excerpt;
            if ($request->pic) {
                Storage::disk('public_uploads')->delete($event->pic);
                Storage::disk('public_uploads')->delete($event->thumbnail);
                $event->pic = Storage::disk('public_uploads')->put('event', $request->file('pic'));
                $event->thumbnail =  $event->storeThumbnail($request->file('pic'));
            }
            $event->update();
            DB::commit();
            $request->session()->flash('success', 'Event Updated Successfully.');
        } catch (Exception $e) {
            Storage::disk('public_uploads')->delete($event->pic);
            Storage::disk('public_uploads')->delete($event->thumbnail);
            DB::rollback();
            $request->session()->flash('error', 'Something went wrong please check the form.');
            return redirect()->back();
        }

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        Storage::disk('public_uploads')->delete($event->pic);
        Storage::disk('public_uploads')->delete($event->thumbnail);
        $event->delete();
        session()->flash('success', 'Event has been deleted from the list.');
        return redirect()->back();
    }
}
