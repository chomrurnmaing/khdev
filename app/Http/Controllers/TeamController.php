<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Team;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Teams';
        $page_description = 'Manage all your teams.';

        $data = Team::all();

        return view('dashboard.teams.index', compact('page_title', 'page_description', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Team';
        $page_description = 'Add a new team.';

        $positions = Position::all();

        return view('dashboard.teams.create', compact('page_title', 'page_description', 'positions'));
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
            'first_name'    => 'required',
            'last_name' => 'required',
            'position_id' => 'required',
        ]);

        $request = $request->all();
        $avatar_id = 0;

        if( isset($request['avatar_id']) && $request['avatar_id'] != null )
        {
            $media = UploadFile::uploadFiles($request['avatar_id']);

            if( !$media['error'] )
            {
                $avatar_id = $media['data']->id;
            }
        }

        Team::create([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'position_id' => $request['position_id'],
            'facebook' => $request['facebook'],
            'linkedin' => $request['linkedin'],
            'gmail' => $request['gmail'],
            'twitter' => $request['twitter'],
            'avatar_id' => $avatar_id

        ]);

        Flash::success('Team successfully created.');

        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
