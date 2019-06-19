<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Service;
use App\Models\ServiceGallery;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Services';
        $page_description = 'Manage all your services.';

        $data = Service::all();

        return view('dashboard.services.index', compact('page_title', 'page_description', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = 'Create Service';
        $page_description = 'Add a new service.';

        return view('dashboard.services.create', compact('page_title', 'page_description'));
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
            'title'   => 'required',
            'icon'   => 'required'
        ]);

        $request = $request->all();
        $gallery_photos = explode(',', $request['gallery']);

        $media = UploadFile::uploadFiles($request['icon']);

        if( !$media['error'] )
            $media_id = $media['data']->id;
        else
            $media_id = 0;

        $service = Service::create([
            'title'  => $request['title'],
            'except'   => $request['except'],
            'content'   => $request['content'],
            'icon_id'  => $media_id
        ]);

        foreach ($gallery_photos as $photo_id){
            if($photo_id != '') {
                ServiceGallery::create([
                    'service_id' => $service->id,
                    'media_id' => $photo_id
                ]);
            }
        }

        if(isset($request['faq-question']) && count($request['faq-question']) > 0) {
            foreach ($request['faq-question'] as $key => $value){
                FAQ::create([
                    'service_id'    => $service->id,
                    'questions'     => $value,
                    'answer'        => $request['faq-answer'][$key]
                ]);
            }
        }

        Flash::success('Service successfully created.');

        return redirect()->route('admin.services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Service';
        $page_description = 'Modifying a service.';

        $service = Service::find($id);

        return view('dashboard.services.edit', compact('page_title', 'page_description', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required',
        ]);

        $service = Service::find($id);

        $request = $request->all();
        $gallery_photos = explode(',', $request['gallery']);
        $media_id = $service->icon_id;

        if(isset($request['icon']) && $request['icon'] != null){
            $media = UploadFile::uploadFiles($request['icon']);

            if( !$media['error'] )
                $media_id = $media['data']->id;
        }


        $service->title = $request['title'];
        $service->except = $request['except'];
        $service->content = $request['content'];
        $service->icon_id = $media_id;
        $service->save();

        ServiceGallery::where('service_id', $service->id)->delete();
        FAQ::where('service_id', $service->id)->delete();

        foreach ($gallery_photos as $photo_id){
            if($photo_id != '') {
                ServiceGallery::create([
                    'service_id' => $service->id,
                    'media_id' => $photo_id
                ]);
            }
        }

        if(isset($request['faq-question']) && count($request['faq-question']) > 0) {
            foreach ($request['faq-question'] as $key => $value){
                FAQ::create([
                    'service_id'    => $service->id,
                    'questions'     => $value,
                    'answer'        => $request['faq-answer'][$key]
                ]);
            }
        }

        Flash::success('Service successfully Updated.');

        return redirect()->route('admin.services.index');
    }

    public function getModalDelete($id)
    {
        $error = null;

        $data = Service::find($id);

        $modal_title = 'Delete a service.';

        $modal_route = route('admin.services.delete', array('id' => $data->id));

        $modal_body = 'Are you sure that you want to delete ' . $data->title . ' service? This operation is irreversible.';

        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }

    public function destroy($id)
    {
        Service::destroy($id);

        return redirect()->route('admin.services.index');
    }
}
