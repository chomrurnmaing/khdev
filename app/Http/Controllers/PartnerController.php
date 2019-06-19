<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Partners';
        $page_description = 'Manage all your partners.';

        $data = Partner::all();

        return view('dashboard.partners.index', compact('page_title', 'page_description', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Partners';
        $page_description = 'Add a new partner.';

        return view('dashboard.partners.create', compact('page_title', 'page_description'));
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

        Partner::create([
            'name'  => $request['name'],
            'description'   => $request['description'],
            'media_id'  => $media_id
        ]);

        Flash::success('Partner successfully created.');

        return redirect()->route('admin.partners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        //
    }
}
