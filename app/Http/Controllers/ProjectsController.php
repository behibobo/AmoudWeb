<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Upload;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

		return View('projects.index')
			->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('projects.create');
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
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/projects/create')
				->withErrors($validator);
		} else {
			// store
			$project = new Project;
			$project->name       = $request->get('name');
			$project->desc      = $request->get('desc');
			$project->save();

			// redirect
			Session::flash('message', 'Successfully created Project!');
			return Redirect::to('admin/projects');
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
        
        $project = Project::findOrFail($id);
        $images = Upload::where('item_id', $project->id)
            ->where('type', 'project')->get();
		return View('projects.show')
            ->with(['project' => $project, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrFail($id);
		return View('projects.edit')
			->with('project', $project);
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
			'name'       => 'required',
		);
		$validator = Validator::make($request->all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/projects/' . $id . '/edit')
				->withErrors($validator);
		} else {
			// store
			$project = Project::findOrFail($id);
			$project->name       = $request->get('name');
			$project->desc      = $request->get('desc');
			$project->save();

			// redirect
			Session::flash('message', 'Successfully updated Project!');
			return Redirect::to('admin/projects');
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
        $project = Project::findOrFail($id);

        $images = Upload::where('item_id', $id)
            ->where('type', 'project')->get();

        foreach($images as $image) {
            $path = public_path().'/uploads/projects/'.$image->filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        Upload::where('item_id', $id)
            ->where('type', 'project')->delete();
		$project->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the cat!');
		return Redirect::to('projects');
    }

    public function uploadImages(Request $request) {
        foreach ($request->file('images') as $image) {
            $postImage = new Upload();
            $name = date('YmdHis') . mt_rand(111,999) . "." . $image->getClientOriginalExtension();
            $path = public_path().'/uploads/projects/';
            $image->move($path, $name);
            $postImage->item_id = $request->item_id;
            $postImage->type = "project";
            $postImage->filename = $name;
            $postImage->save();
        }
    
        return redirect()->back();
    }

}
