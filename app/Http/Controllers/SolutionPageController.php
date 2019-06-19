<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class SolutionPageController extends Controller
{
    public function index(){

        $page = Page::where('title', 'Solutions')->first();
        $services = Service::all();

        return view('front.solutions.index', compact('page', 'services'));
    }

    public function show($id){
        $page = Page::where('title', 'Solutions')->first();
        $service = Service::find($id);
        $data_title = $service->title;

        return view('front.solutions.show', compact('page', 'service', 'data_title'));
    }
}
