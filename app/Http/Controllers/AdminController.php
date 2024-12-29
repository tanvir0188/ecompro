<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
}
