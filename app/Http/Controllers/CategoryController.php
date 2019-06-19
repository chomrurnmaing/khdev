<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Category';
        $page_description = 'Manage all categories';

        $data = Category::all();

        return view('dashboard.categories.index', compact('page_title', 'page_description', 'data'));
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

        Category::create($request);

        Flash::success('A category successfully created.');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = 'Edit Category';
        $page_description = 'Manage all categories';

        $data = Category::all();
        $category = Category::find($id);

        return view('dashboard.categories.index', compact('page_title', 'page_description', 'data', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required'
        ]);

        $request = $request->all();

        $category = Category::find($id);

        $category->name = $request['name'];
        $category->description = $request['description'];
        $category->save();

        Flash::success('A category successfully update.');

        return redirect()->route('admin.categories.index');
    }
}
