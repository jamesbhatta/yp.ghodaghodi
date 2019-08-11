<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categoryCount = \App\Category::count();
        $businessCount = \App\Business::count();
        $zoneCount = \App\Zone::count();
        $cityCount = \App\City::count();
        $advertisementCount = 35;
        $freeBusinessCount = \App\Business::where('account_type', '1')->count();
        $premiumBusinessCount = \App\Business::where('account_type', '2')->count();
        return view('dashboard', compact(
            'categoryCount',
            'businessCount',
            'zoneCount',
            'cityCount',
            'advertisementCount',
            'freeBusinessCount',
            'premiumBusinessCount'
        ));
    }
}
