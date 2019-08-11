<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCategories()
    {
    	$categories = \App\Category::select(['id', 'name'])->get();
    	return response()->json(['category' => $categories->toArray()]);
    }

    public function getCities()
    {
    	$cities = \App\City::select(['id', 'name'])->get();
    	return response()->json(['city' => $cities->toArray()]);
    }
}
