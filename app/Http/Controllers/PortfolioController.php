<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\PortfolioSkill;
use App\Models\Skill;
use App\Utils\UploadFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Laracasts\Flash\Flash;

class PortfolioController extends Controller
{
    public function index()
    {
        $page_title = 'Portfolio Management';
        $page_description = '';

        $data = Portfolio::all();

        return view('dashboard.portfolios.index', [
            'page_title'        => $page_title,
            'page_description'  => $page_description,
            'data'              => $data
        ]);
    }

    public function create()
    {
        $page_title = 'Create Portfolio';
        $page_description = 'Add a new portfolio.';

        $skills = Skill::all();
        $categories = Category::all();

        return view('dashboard.portfolios.create', compact('page_title', 'page_description', 'skills', 'categories'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $request = $request->all();

        $featured_image = null;
        $featured_image_id = 0;
        $galleries = [];

        if(isset($request['featured_image']) && $request['featured_image'] != null){
            $featured_image = UploadFile::uploadFiles($request['featured_image']);
            $featured_image_id = $featured_image['data']->id;
        }

        if( isset($request['galleries']) && $request['galleries'] != null ) {
            foreach ($request['galleries'] as $gallery) {

                $media = UploadFile::uploadFiles($gallery);

                if( !$media['error'] )
                    array_push($galleries, $media['data']->id);
            }
        }

        $portfolio = Portfolio::create([
            'title'     => $request['title'],
            'content'   => $request['content'],
            'date'      => Carbon::parse($request['date']),
            'client_id'         => $request['client'],
            'featured_image'    => $featured_image_id
        ]);

        if( isset($request['skills']) && $request['skills'] != null ) {
            foreach ( $request['skills'] as $skill) {
                PortfolioSkill::create([
                    'portfolio_id'  => $portfolio->id,
                    'skill_id'      => $skill
                ]);
            }
        }

        if( isset($request['categories']) && $request['categories'] != null ){
            foreach ($request['categories'] as $key => $value) {
                PortfolioCategory::create([
                    'portfolio_id'  => $portfolio->id,
                    'category_id'   => $value
                ]);
            }
        }

        if( count($galleries) > 0 ) {
            foreach ( $galleries as $key => $value) {
                Gallery::create([
                    'portfolio_id'  => $portfolio->id,
                    'media_id'      => $value
                ]);
            }
        }


        return redirect()->route('admin.portfolios.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $page_title = 'Edit Portfolio';
        $page_description = 'Modifying a portfolio.';

        $skills = Skill::all();
        $categories = Category::all();

        $portfolio = Portfolio::find($id);

        return view('dashboard.portfolios.edit', compact('page_title', 'page_description', 'skills', 'categories', 'portfolio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $portfolio = Portfolio::find($id);

        $request = $request->all();

        $featured_image = null;
        $featured_image_id = $portfolio->featured_image;
        $galleries = [];

        if(isset($request['featured_image']) && $request['featured_image'] != null){
            $featured_image = UploadFile::uploadFiles($request['featured_image']);
            $featured_image_id = $featured_image['data']->id;
        }

        if( isset($request['galleries']) && $request['galleries'] != null ) {
            foreach ($request['galleries'] as $gallery) {

                $media = UploadFile::uploadFiles($gallery);

                if( !$media['error'] )
                    array_push($galleries, $media['data']->id);
            }
        }

        $portfolio->title = $request['title'];
        $portfolio->content = $request['content'];
        $portfolio->date = Carbon::parse($request['date']);
        $portfolio->featured_image = $featured_image_id;
        $portfolio->save();

        PortfolioSkill::where('portfolio_id', $portfolio->id)->delete();
        PortfolioCategory::where('portfolio_id', $portfolio->id)->delete();

        if( count($galleries) > 0 ) {
            Gallery::where('portfolio_id', $portfolio->id)->delete();
        }

        if( isset($request['skills']) && $request['skills'] != null ) {
            foreach ( $request['skills'] as $skill) {
                PortfolioSkill::create([
                    'portfolio_id'  => $portfolio->id,
                    'skill_id'      => $skill
                ]);
            }
        }

        if( isset($request['categories']) && $request['categories'] != null ){
            foreach ($request['categories'] as $key => $value) {
                PortfolioCategory::create([
                    'portfolio_id'  => $portfolio->id,
                    'category_id'   => $value
                ]);
            }
        }

        if( count($galleries) > 0 ) {
            foreach ( $galleries as $key => $value) {
                Gallery::create([
                    'portfolio_id'  => $portfolio->id,
                    'media_id'      => $value
                ]);
            }
        }


        return redirect()->route('admin.portfolios.index');
    }

    public function getModalDelete($id)
    {
        $error = null;

        $data = Portfolio::find($id);

        $modal_title = 'Delete portfolio.';

        $modal_route = route('admin.portfolios.delete', array('id' => $data->id));

        $modal_body = 'Are you sure that you want to delete ' . $data->title . ' portfolio? This operation is irreversible.';

        return view('modal_confirmation', compact('error', 'modal_route', 'modal_title', 'modal_body'));

    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Portfolio::destroy($id);

        return redirect()->route('admin.portfolios.index');
    }
}
