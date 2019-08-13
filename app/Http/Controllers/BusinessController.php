<?php

namespace App\Http\Controllers;

use App\Business;
use App\Category;
use App\Zone;
use App\City;
use App\BusinessHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BusinessRequest;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading = 'Business List';
        $businesses = Business::select('id', 'name', 'slug', 'account_type', 'expires_at', 'category_id')->with('category:id,name')->orderBy('id', 'desc')->get();
        return view('business.index', compact('heading', 'businesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $heading = 'Register New Business';
        $zones  = Zone::orderBy('name')->get();
        $cities  = City::orderBy('name')->get();
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        return view('business.create', compact('heading', 'categories', 'zones', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusinessRequest $request)
    {
        DB::beginTransaction();
        try {
            $business = new Business;
            $business->name = $request->name;
            $business->tagline = $request->tagline;
            $business->business_type = $request->business_type;
            $business->account_type = $request->account_type;
            $business->category_id = $request->category_id;
            $business->expires_at = $request->expires_at;
            $business->city_id = $request->city_id;
            $business->address = $request->address;
            $business->contact_one = $request->contact_one;
            $business->contact_two = $request->contact_two;
            $business->email = $request->email;
            $business->website = $request->website;
            $business->map_id = $request->map_id;
            $business->facebook_link = $request->facebook_link;
            $business->twitter_link = $request->twitter_link;
            $business->google_link = $request->google_link;
            $business->description_title = $request->description_title;
            $business->description = $request->description;
            $business->services_title = $request->services_title;
            $business->services = $request->services;
            $business->keywords = $request->keywords;
            if ($request->profile_pic) {
                $business->profile_pic = Storage::disk('public_uploads')->put('profile', $request->file('profile_pic'));
                $business->thumbnail =  $business->storeThumbnail($request->file('profile_pic'));
            }
            if ($request->cover_pic) {
                $business->cover_pic = Storage::disk('public_uploads')->put('cover', $request->file('cover_pic'));
            }
            $business->save();

            $businessHours = array(
                array(
                    'business_id' => $business->id,
                    'day' => 1,
                    'open_time' => $request->sun_open_time,
                    'close_time' => $request->sun_close_time,
                ),
                array(
                    'business_id' => $business->id,
                    'day' => 2,
                    'open_time' => $request->mon_open_time,
                    'close_time' => $request->mon_close_time,
                ),
                array(
                    'business_id' => $business->id,
                    'day' => 3,
                    'open_time' => $request->tues_open_time,
                    'close_time' => $request->tues_close_time,
                ),
                array(
                    'business_id' => $business->id,
                    'day' => 4,
                    'open_time' => $request->wednes_open_time,
                    'close_time' => $request->wednes_close_time,
                ),
                array(
                    'business_id' => $business->id,
                    'day' => 5,
                    'open_time' => $request->thurs_open_time,
                    'close_time' => $request->thurs_close_time,
                ),
                array(
                    'business_id' => $business->id,
                    'day' => 6,
                    'open_time' => $request->fri_open_time,
                    'close_time' => $request->fri_close_time,
                ),
                array(
                    'business_id' => $business->id,
                    'day' => 7,
                    'open_time' => $request->satur_open_time,
                    'close_time' => $request->satur_close_time,
                ),

            );
            BusinessHour::insert($businessHours);
            DB::commit();
            $request->session()->flash('success', 'Business Registered Successfully.');
        } catch (Exception $e) {
            Storage::disk('public_uploads')->delete($business->profile_pic);
            Storage::disk('public_uploads')->delete($business->cover_pic);
            Storage::disk('public_uploads')->delete($business->thumbnail);
            DB::rollback();
            return $business->profile_pic;
            $request->session()->flash('error', 'Something went wrong please check the form.');
        }

        return redirect()->route('business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        return view('business.show', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business, Request $request)
    {
        $business->delete();
        $request->session()->flash('success', 'Record has been moved to trash.');
        return redirect()->route('business.index');
    }

    public function trash()
    {
        $heading = 'Trash';
        $businesses = Business::onlyTrashed()->get();
        return view('business.trash', compact('heading', 'businesses'));
    }

    public function restore($id)
    {
        Business::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('trash');
    }
    public function hardDelete($id)
    {
        $business = Business::withTrashed()->find($id);
        Storage::disk('public_uploads')->delete($business->profile_pic);
        Storage::disk('public_uploads')->delete($business->cover_pic);
        Storage::disk('public_uploads')->delete($business->thumbnail);
        $business->forceDelete();

        $request = new Request();
        $request = session()->flash('success', 'Business Record has been deleted permanently.');
        return redirect()->route('trash');
    }
}
