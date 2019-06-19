<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Service;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Clients';
        $page_description = 'Manage all your clients.';

        $data = Client::all();

        return view('dashboard.clients.index', compact('page_title', 'page_description', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Client';
        $page_description = 'Add a new client.';

        return view('dashboard.clients.create', compact('page_title', 'page_description'));
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
            'name'   => 'required',
        ]);

        $request = $request->all();
        $media_id = 0;

        if( isset($request['media']) && $request['media'] != null ){
            $media = UploadFile::uploadFiles($request['media']);

            if( !$media['error'] )
                $media_id = $media['data']->id;
        }

        Client::create([
            'name'  => $request['name'],
            'description'   => $request['description'],
            'media_id'  => $media_id
        ]);

        Flash::success('Client successfully created.');

        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Client $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param Client $partner
     * @return void
     */
    public function update(Request $request, Client $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $partner)
    {
        //
    }
}
