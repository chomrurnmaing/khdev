<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Laracasts\Flash\Flash;
use App\Utils\UploadFile;

class MediaController extends Controller
{
    public function index()
    {
        $page_title = 'Media';
        $page_description = '';

        $data = Media::orderBy('id', 'DESC')->get();

        return view('dashboard.media.index', [
            'page_title'        => $page_title,
            'page_description'  => $page_description,
            'data'              => $data
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'media' => 'required',
        ));

        $request = $request->all();

        $media = UploadFile::uploadFiles($request['media']);

        if (!$media['error']){
            Flash::success('A file successfully uploaded.');
        }

        return redirect()->route('admin.media.index');
    }

    public function apiStore(Request $request){
        $request = $request->all();

        $media = UploadFile::uploadFiles($request['file']);

        return response()->json($media);
    }
    public function getModalDelete($id)
    {
        $error = null;

        $data = Media::find($id);

        $modal_title = trans('admin/dialog.media.delete-confirm.title');

        $modal_route = route('admin.media.delete', array('id' => $data->id));

        $modal_body = trans('admin/dialog.media.delete-confirm.body', ['id' => $data->id, 'name' => $data->name]);

        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }

    public function destroy($id)
    {

    }
}
