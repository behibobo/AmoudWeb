<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Upload;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
class GalleryController extends Controller
{
    
    public function index()
    {
        $images = Upload::where('type', 'gallery')->get();

		return View('galleries.index')
			->with('images', $images);
    }

    public function removeImage($id)
    {
        $image = Upload::findOrFail($id);
		$image->delete();
        return redirect()->back();
    }

    public function store(Request $request) {
        foreach ($request->file('images') as $image) {
            $postImage = new Upload();
            $name = date('YmdHis') . mt_rand(111,999) . "." . $image->getClientOriginalExtension();
            $path = public_path().'/uploads/galleries/';
            $image->move($path, $name);
            $postImage->item_id = 1;
            $postImage->type = "gallery";
            $postImage->filename = $name;
            $postImage->save();
        }
        return redirect()->back();
    }

}
