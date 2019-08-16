<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
	public function index()
	{
		$categoryCards = \App\PopularCat::orderBy('display_name')->get();
		return view('welcome', compact('categoryCards'));
	}

	public function search()
	{
		$keyword = request('keyword', null);
		$city_id = request('city', null);
		$category_id = request('category', null);

		/*if ($city_id && $category_id && $keyword) {
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')
			
			->where('city_id', $city_id)
			->where('category_id', $category_id)
			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')
			->paginate(15);

			$city = \App\City::select('name')->find($city_id);
			$category = \App\Category::select('name')->find($category_id);
		}
		if ($city_id && $category_id) {
			$businesses = Business::where('keywords', 'like', '%'.$keyword.'%')
			->where('city_id', $city_id)
			->where('category_id', $category_id)
			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')
			->paginate(15);

			$city = \App\City::select('name')->find($city_id);
			$category = \App\Category::select('name')->find($category_id);
		}
		elseif($city_id && $keyword) {
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')
			->orWhere('keywords', 'like', '%'.$keyword.'%')
			->where('city_id', $city_id)
			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')
			->paginate(15);

			$city = \App\City::select('name')->find($city_id);
		}
		elseif($city_id) {
			$businesses = Business::where('keywords', 'like', '%'.$keyword.'%')
			->where('city_id', $city_id)
			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')
			->paginate(15);

			$city = \App\City::select('name')->find($city_id);
		}
		elseif($category_id && $keyword) {
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')
			->orWhere('keywords', 'like', '%'.$keyword.'%')
			->where('category_id', $category_id)
			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')
			->paginate(15);

			$category = \App\Category::select('name')->find($category_id);
		}
		elseif($category_id) {
			$businesses = Business::where('keywords', 'like', '%'.$keyword.'%')
			->where('category_id', $category_id)
			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')
			->paginate(15);

			$category = \App\Category::select('name')->find($category_id);
		}
		else {
			$businesses = Business::where('name', 'like', '%'.$keyword.'%')
			->orWhere('keywords', 'like', '%'.$keyword.'%')

			->with(['category', 'city', 'business_hours'])
			->orderBy('account_type', 'desc')

			->paginate(15);
		}*/

		$businesses = new Business;

		if ($city_id) {
			$businesses = $businesses->where('city_id', $city_id);

			$city = \App\City::select('name')->find($city_id);
		}

		if ($category_id) {
			$businesses = $businesses->where('category_id', $category_id);

			$category = \App\Category::select('name')->find($category_id);
		}

		if ($keyword) {
			if($businesses->where('name', 'like', '%'.$keyword.'%')->count() > 0){
				$businesses = $businesses->where('name', 'like', '%'.$keyword.'%');
			}
			else{
				$businesses = $businesses->Where('keywords', 'like', '%'.$keyword.'%');
			}
		}


		$businesses = $businesses->orderBy('account_type', 'desc')
		->with(['category', 'city', 'business_hours'])->paginate(15);


		return view('frontend.search', compact(['businesses', 'keyword', 'city', 'city_id', 'category', 'category_id']));
	}

	public function viewBusiness($slug)
	{
		$business = Business::where('slug', $slug)->with(['city', 'business_hours'])->first();
		return view('frontend.show', compact('business'));
	}
}
