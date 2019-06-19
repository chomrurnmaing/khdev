<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $services = Service::take(3)->get();
        $portfolios = Portfolio::orderBy('created_at')->get();
        $categories = Category::all();
        $teams = Team::all();
        $partners = Partner::all();
        $clients = Client::all();

        return view('front.home', compact('sliders', 'services', 'portfolios', 'categories', 'teams', 'partners', 'clients'));
    }
}
