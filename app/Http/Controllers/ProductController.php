<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create() {
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    public function store(Request $request) {
        $input = \Request::all();
        // Validate the form
        $request->validate([
           'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|required'
        ]);

        // Upload the image
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }
        // Upload the multible images
        $images=array();
        if ($files=$request->file('images')) {
            foreach ($files as $file) {
                $name=$file->getClientOriginalName();
                $file->move('multipleuploads',$name);
                $images[]=$name;
            }
            
        }
    /*Insert your data*/
    dd($request->name,$request->price,$request->description,$request->cov_descript,$request->image->getClientOriginalName(),
        $request->images->getClientOriginalName(),$request->website,$request->youtube,$request->studentprice,$input,'jjj');
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'cov_descript' => $request->cov_descript,
            'image' => $request->image->getClientOriginalName(),
            'mul_images' => $request->file->getClientOriginalName(),
            'website' => $request->website,
            'youtube' => $request->youtube,
            'studentprice' => $request->studentprice

        ]);

        // Sessions Message
        $request->session()->flash('msg','Your product has been added');

        // Redirect

        return redirect('admin/products/create');

    }

    public function edit($id) {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id) {

        // Find the product
        $product = Product::find($id);

        // Validate The form
        $request->validate([
           'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        // Check if there is any cover image
        if ($request->hasFile('image')) {
            // Check if the old image exists inside folder
            if (file_exists(public_path('uploads/') . $product->image)) {
                unlink(public_path('uploads/') . $product->image);
            }

            // Upload the new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());

            $product->image = $request->image->getClientOriginalName();
        }
        // Check if there is any multi image
        $images=array();
        if ($files=$request->file('images')) {
            foreach ($files as $file) {
                $name=$file->getClientOriginalName();
                $file->move('multipleuploads',$name);
                $images[]=$name;
            }
            
        }
        // Updating the product
        $product->update([
           'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'cov_descript' => $request->cov_descript,
            'image' => $request->image->getClientOriginalName(),
            'mul_images' => $request->file->getClientOriginalName(),
            'website' => $request->website,
            'youtube' => $request->youtube,
            'studentprice' => $request->studentprice
        ]);

        // Store a message in session
        $request->session()->flash('msg', 'Product has been updated');

        // Redirect
        return redirect('admin/products');

    }

    public function show($id) {
        $product = Product::find($id);
        return view('admin.products.details', compact('product'));
    }

    public function destroy($id) {
        // Delete the product
        Product::destroy($id);

        // Store a message
        session()->flash('msg','Product has been deleted');

        // Redirect back
        return redirect('admin/products');


    }
}
