<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

		return View('categories.index')
			->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::pluck('name', 'id');
        return View('categories.create')
            ->with('categories', $cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
			'name'       => 'required',
			'slug'       => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/categories/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$cat = new Category;
			$cat->name       = $request->get('name');
			$cat->slug      = $request->get('slug');
			$cat->parent_id = $request->get('parent_id');
			$cat->save();

			// redirect
			Session::flash('message', 'Successfully created Category!');
			return Redirect::to('admin/categories');
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $cat = Category::findOrFail($id);
		return View('categories.show')
            ->with('category', $cat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::pluck('name', 'id');
        $cat = Category::findOrFail($id);
		return View('categories.edit')
			->with(['category'=> $cat, 'categories' => $cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = array(
			'slug'       => 'required',
			'name'       => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/categories/' . $id . '/edit')
				->withErrors($validator);
		} else {
			// store
			$cat = Category::findOrFail($id);
			$cat->name       = $request->get('name');
			$cat->slug      = $request->get('slug');
			$cat->parent_id = $request->get('parent_id');
			$cat->save();

			// redirect
			Session::flash('message', 'Successfully updated Category!');
			return Redirect::to('admin/categories');
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);
		$cat->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the cat!');
		return Redirect::to('admin/categories');
    }
}
