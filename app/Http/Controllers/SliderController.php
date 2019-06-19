<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Utils\UploadFile;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class SliderController extends Controller
{
    public function index()
    {
        $page_title = 'Slider Management';
        $page_description = '';

        $data = Slider::all();

        return view('dashboard.slider.index', [
            'page_title'        => $page_title,
            'page_description'  => $page_description,
            'data'              => $data
        ]);
    }

    public function create()
    {
        $page_title = 'Create Slider';
        $page_description = 'Add a new slider.';

        return view('dashboard.slider.create', compact('page_title', 'page_description'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'media' => 'required'
        ]);

        $request = $request->all();
        $media_id = 0;
        $media = UploadFile::uploadFiles($request['media']);

        if( !$media['error'] )
            $media_id = $media['data']->id;

        Slider::create([
            'title'     => $request['title'],
            'except'    => $request['except'],
            'content'   => $request['content'],
            'media_id'  => $media_id
        ]);

        Flash::success('Slider successfully created.');

        return redirect()->route('admin.sliders.index');
    }

    public function edit($id)
    {
        $page_title = 'Edit Slider';
        $page_description = 'Update slider';

        $slider = Slider::find($id);

        return view('dashboard.slider.edit', compact('page_description', 'page_title', 'slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $slider = Slider::find($id);

        $request = $request->all();
        $media_id = $slider->media_id;

        if( isset($request['media']) && $request['media'] != null ){
            $media = UploadFile::uploadFiles($request['media']);

            if( !$media['error'] )
                $media_id = $media['data']->id;
        }

        $slider->title  = $request['title'];
        $slider->except = $request['except'];
        $slider->content= $request['content'];
        $slider->media_id = $media_id;
        $slider->save();

        Flash::success('Slider successfully updated.');

        return redirect()->route('admin.sliders.index');

    }

    public function getModalDelete($id)
    {
        $error = null;

        $data = Slider::find($id);

        $modal_title = 'Delete Slider';

        $modal_route = route('admin.sliders.delete', array('id' => $data->id));

        $modal_body = 'Are you sure that you want to delete ' . $data->title . ' slider? This operation is irreversible.';

        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }

    public function destroy($id)
    {
        Slider::destroy($id);

        return redirect()->route('admin.sliders.index');
    }
}
