<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Positions';
        $page_description = 'Manage all positions';

        $data = Position::all();

        return view('dashboard.positions.index', compact('page_title', 'page_description', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required'
        ]);

        $request = $request->all();

        Position::create($request);

        Flash::success('A position successfully created.');

        return redirect()->route('admin.positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Position $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $category)
    {
        //
    }
}
