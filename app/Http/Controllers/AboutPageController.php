<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function index(){
        $page = Page::where('title', 'About Us')->first();
        return view('front.about', compact('page'));
    }
}
