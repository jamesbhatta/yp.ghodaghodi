<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	public function search()
	{
		$keyword = request('keyword', null);
		$city_id = request('city', null);
		$category_id = request('category', null);

		if ($city_id && $category_id) {
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')->where('city_id', $city_id)->where('category_id', $category_id)->with(['category', 'city', 'business_hours'])->paginate(5);
			$city = \App\City::select('name')->find($city_id);
			$category = \App\Category::select('name')->find($category_id);
		}
		elseif($city_id){
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')->where('city_id', $city_id)->with(['category', 'city', 'business_hours'])->paginate(5);
			$city = \App\City::select('name')->find($city_id);
		}
		elseif($category_id){
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')->where('category_id', $category_id)->with(['category', 'city', 'business_hours'])->paginate(5);
			$category = \App\Category::select('name')->find($category_id);
		}
		else{
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')->with(['category', 'city', 'business_hours'])->paginate(5);
		}



		return view('frontend.search', compact(['businesses', 'keyword', 'city', 'category']));
	}

	public function viewBusiness($slug)
	{
		$business = Business::where('slug', $slug)->with(['city', 'business_hours'])->first();
		return view('frontend.show', compact('business'));
	}
}
