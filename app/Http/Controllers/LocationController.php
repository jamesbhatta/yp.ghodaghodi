<?php

namespace App\Http\Controllers;

use App\Zone;
use App\City;
use App\Http\Requests\ZoneRequest;
use App\Http\Requests\CityRequest;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading = "Location";
        $zones = Zone::with('cities')->orderBy('name')->get();
        return view('location.index', compact('heading', 'zones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeZone(ZoneRequest $request)
    {
        Zone::create($request->all());

        $request->session()->flash('success', $request->name . ' has been added to the Zone list.');
        return redirect()->route('location.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCity(CityRequest $request)
    {
        City::create($request->all());

        $request->session()->flash('success', $request->name . ' has been added to the City list.');
        return redirect()->route('location.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update Zone resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateZone(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:zones,name,'.$request->id,
        ]);
        $zone = Zone::findOrFail($request->id);
        $zone->name = $request->name;
        $zone->update();
        $request->session()->flash('success', $request->name . ' has been updated.');
        return redirect()->route('location.index');
    }
     /**
     * Update City resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updateCity(CityRequest $request, City $city)
     {
        //
     }

    /**
     * Remove Zone resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyZone(Request $request, Zone $zone)
    {
        if (count($zone->cities)) {
            $request->session()->flash('warning', 'There are cities registerd inside this zone and thus it cannot be deleted. Delete the cities associated with this zone first.');
        }else{
            $zone->delete();
            $request->session()->flash('success', 'Selected zone has been deleted from the database.');
        }
        return redirect()->route('location.index');
    }

     /**
     * Remove City resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroyCity(Request $request, City $city)
     {
        $city->delete();
        $request->session()->flash('success', 'City name has been deleted from the database.');

        return redirect()->route('location.index');
    }
}
