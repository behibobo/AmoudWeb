<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use App\Category;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

		return View('products.index')
			->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::pluck('name', 'id');
        return View('products.create')
            ->with('products', $cats);
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
			return Redirect::to('admin/products/create')
				->withErrors($validator);
		} else {
			// store
			$product = new Product;
			$product->name       = $request->get('name');
			$product->slug      = $request->get('slug');
			$product->desc      = $request->get('desc');
			$product->category_id = $request->get('category_id');
			$product->save();

			// redirect
			Session::flash('message', 'Successfully created Product!');
			return Redirect::to('admin/products');
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
        
        $product = Product::findOrFail($id);
        $images = ProductImage::where('product_id', $product->id)->get();
		return View('products.show')
            ->with(['product' => $product, 'images' => $images]);
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
        $product = Product::findOrFail($id);
		return View('products.edit')
			->with(['product'=> $product, 'categories' => $cats]);
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
			return Redirect::to('admin/products/' . $id . '/edit')
				->withErrors($validator);
		} else {
			// store
			$product = Product::findOrFail($id);
			$product->name       = $request->get('name');
			$product->slug      = $request->get('slug');
			$product->desc      = $request->get('desc');
			$product->category_id = $request->get('category_id');
			$product->save();

			// redirect
			Session::flash('message', 'Successfully updated Product!');
			return Redirect::to('admin/products');
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
        $product = Product::findOrFail($id);

        $images = ProductImage::where('product_id', $id)->get();

        foreach($images as $image) {
            $path = public_path().'/uploads/'.$image->filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        ProductImage::where('product_id', $id)->delete();
		$product->delete();

		// redirect
		Session::flash('message', 'Successfully deleted the cat!');
		return Redirect::to('products');
    }

    public function uploadImages(Request $request) {
        foreach ($request->file('images') as $image) {
            $postImage = new ProductImage();
            $name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $path = public_path().'/uploads';
            $image->move($path, $name);
            $postImage->product_id = $request->product_id;
            $postImage->filename = $name;
            $postImage->save();
        }
    
        return redirect()->back();
    }


    public function deleteImage(Request $request) {
        $image = $request->file('filename');
        $filename =  $request->get('filename').'.jpeg';
        ImageUpload::where('filename', $filename)->delete();
        $path = public_path().'/uploads/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
}
