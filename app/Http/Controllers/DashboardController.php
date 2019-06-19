<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $page_title = 'Dashboard';
        $page_description = 'Control Panel';

        return view('dashboard.welcome.welcome', compact('page_title', 'page_description'));
    }
}
