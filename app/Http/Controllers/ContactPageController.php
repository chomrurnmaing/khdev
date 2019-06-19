<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index(){
        $page = Page::where('title', 'Contact Us')->first();
        return view('front.contact', compact('page'));
    }
}
