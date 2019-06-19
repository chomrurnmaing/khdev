<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageSection;
use App\Utils\UploadFile;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $page_title = 'Page Management';
        $page_description = '';

        $data = Page::all();

        return view('dashboard.pages.index', [
            'page_title'        => $page_title,
            'page_description'  => $page_description,
            'data'              => $data
        ]);
    }

    public function create()
    {
        $page_title = 'Create Page';
        $page_description = 'Add a new page.';

        return view('dashboard.pages.create', compact('page_title', 'page_description'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:pages'
        ]);

        $request = $request->all();
        $media_id = 0;

        if( isset($request['media']) &&  $request['media'] != null ){
            $media = UploadFile::uploadFiles($request['media']);

            if( !$media['error'] )
                $media_id = $media['data']->id;
        }

        $page = Page::create([
            'title'     => $request['title'],
            'content'   => $request['content'],
            'hero'      => $media_id
        ]);

        if( isset($request['section-title']) ) {
            foreach ($request['section-title'] as $key => $value) {
                $section_media_id = 0;

                if( isset($request['section-image'][$key]) && $request['section-image'][$key] != null ){
                    $section_media = UploadFile::uploadFiles($request['section-image']);

                    if( !$section_media['error'] ){
                        $section_media_id = $section_media['data']->id;
                    }
                }

                PageSection::create([
                    'page_id'   => $page->id,
                    'title'     => $value,
                    'tagline'   => $request['section-tagline'][$key],
                    'content'   => $request['section-content'][$key],
                    'media'     => $section_media_id
                ]);
            }
        }

        return redirect()->route('admin.pages.index');
    }

    public function edit($id)
    {
        $page_title = 'Create Page';
        $page_description = 'Add a new page.';

        $page = Page::find($id);
        $page_sections = PageSection::where('page_id', $id)->get();

        return view('dashboard.pages.edit', compact('page_title', 'page_description', 'page', 'page_sections'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|unique:pages,title,' . $id
        ]);

        $request = $request->all();
        $media_id = 0;

        if( isset($request['media']) &&  $request['media'] != null ){
            $media = UploadFile::uploadFiles($request['media']);

            if( !$media['error'] )
                $media_id = $media['data']->id;
        }

        $page = Page::find($id);
        $page->title = $request['title'];
        $page->content = $request['content'];
        $page->hero = $media_id;
        $page->save();

        return redirect()->route('admin.pages.index');
    }

    public function getModalDelete($id)
    {
        $error = null;

        $data = Page::find($id);

        $modal_title = 'Delete page.';

        $modal_route = route('admin.pages.delete', array('id' => $data->id));

        $modal_body = 'Are you sure that you want to delete page ' . $data->title . '? This operation is irreversible.';

        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Page::destroy($id);

        return redirect()->route('admin.pages.index');
    }
}
