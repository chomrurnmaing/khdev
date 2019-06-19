<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioPageController extends Controller
{
    public function index(){

        $page = Page::where('title', 'Portfolios')->first();
        $portfolios = Portfolio::all();
        $categories = Category::all();

        return view('front.portfolios.index', compact('page', 'portfolios', 'categories'));
    }

    public function show($id){
        $page = Page::where('title', 'Portfolios')->first();
        $portfolio = Portfolio::find($id);
        $data_title = $portfolio->title;

        return view('front.portfolios.show', compact('page', 'portfolio', 'data_title'));
    }
}
