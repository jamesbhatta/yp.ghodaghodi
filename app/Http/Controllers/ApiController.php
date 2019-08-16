<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use DataTables;

class ApiController extends Controller
{
    public function getCategories()
    {
    	$categories = \App\Category::select(['id', 'name'])->orderBy('name')->get();
    	return response()->json(['category' => $categories->toArray()]);
    }

    public function getCities()
    {
    	$cities = \App\City::select(['id', 'name'])->get();
    	return response()->json(['city' => $cities->toArray()]);
    }

    public function businessDatatables()
    {
        $businesses = \App\Business::select('id', 'name', 'slug', 'account_type', 'expires_at', 'category_id')->with('category')->orderBy('id', 'desc');
        // $businesses = Business::with('category');
        return DataTables::eloquent($businesses)
        ->addColumn('category', function (Business $business) {
            return $business->category->name;
        })
        ->toJson();
        // return datatables($businesses)->toJson();
    }
}
