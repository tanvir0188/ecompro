<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function view_category(Request $request)
    {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $context = [
            'categories' => $categories,
        ];
        return view('admin.category', $context);
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;
        $category->save();

        toastr()->addSuccess('Category has been added successfully.');

        return redirect()->back(); //redirect to the same page
    }

    public function delete_category($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }


    public function add_product()
    {
        $categories = Category::all();
        $products = Product::paginate(3);
        $context = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view('admin.product', $context);
    }

    public function upload_product(Request $request)
    {

        $rules = [
            'title' => 'required|min:3',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        //add image
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admintemplate/img/products'), $imageName);
        $product->image = $imageName;
        $product->save();
        toastr()->addSuccess('Product has been added successfully.');
        return redirect()->back();
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        File::delete(public_path('admintemplate/img/products/' . $product->image));
        $product->delete();
        return redirect()->back();
    }

    public function edit_product($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $context = [
            'product' => $product,
            'categories' => $categories,
        ];

        return view('admin.productUpdate', $context);
    }


    public function update_product($id, Request $request)
    {
        $product = Product::findOrFail($id);

        $rules = [
            'title' => 'required|min:3',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //now we update it into the database
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        File::delete(public_path('admintemplate/img/products/' . $product->image));
        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('admintemplate/img/products'), $imageName);
        $product->image = $imageName;



        $product->save();
        toastr()->addSuccess('Product has been updated successfully.');
        return redirect()->route('admin.product');
    }
}
