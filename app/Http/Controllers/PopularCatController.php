<?php

namespace App\Http\Controllers;

use App\PopularCat;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\PopularCatRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PopularCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heading = 'Popular Categories';
        $popularCats = PopularCat::orderBy('display_name')->get();
        return view('popularcat.index', compact('heading', 'popularCats'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PopularCatRequest $request)
    {
        $popularcat = new PopularCat();
        $popularcat->category_id = $request->category_id;
        $popularcat->display_name = $request->display_name ? : Category::select('name')->find($request->category_id)->name;
        $popularcat->avatar = Storage::disk('public_uploads')->put('popularCatThumb', $request->file('avatar'));
        $popularcat->button_class = $request->button_class;
        $popularcat->save();
        session()->flash('success', 'Category has been added to the popular list.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PopularCat  $popularCat
     * @return \Illuminate\Http\Response
     */
    public function show(PopularCat $popularCat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PopularCat  $popularCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PopularCat $popularCat)
    {
        // return $popularCat;
        if ($request->category_id) {
            $popularCat->category_id = $request->category_id;
        }
        // $popularcat->display_name = $request->display_name;
        if($request->file('avatar')){
            Storage::disk('public_uploads')->delete($popularCat->avatar);
            $popularCat->avatar = Storage::disk('public_uploads')->put('popularCatThumb', $request->file('avatar'));
        }
        $popularCat->button_class = $request->button_class;
        $popularCat->update();
        session()->flash('success', 'Update Successful.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PopularCat  $popularCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(PopularCat $popularCat)
    {
        Storage::disk('public_uploads')->delete($popularCat->avatar);
        $popularCat->delete();
        session()->flash('success', 'Record has been deleted permanently.');
        return redirect()->back();
    }
}
