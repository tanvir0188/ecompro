<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
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

    public function product_search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('title', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->orWhere('category', 'LIKE', '%' . $search . '%')->paginate(3);
        return view('admin.productView', compact('products'));
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

    public function order_list_view()
    {
        $orders = Order::all();
        return view('admin.orderList', compact('orders'));
    }
    public function on_the_way($id)
    {
        $order = Order::find($id);
        $order->status = 'On the way';
        $order->save();
        toastr()->addSuccess('Order status has been updated successfully.');
        return redirect()->back();
    }
    public function delivered($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->payment_status = 'paid';
        $order->save();
        toastr()->addSuccess('Order status has been updated successfully.');
        return redirect()->back();
    }

    public function userView()
    {
        $users = User::orderBy('usertype', 'asc')->paginate(30);

        return view('admin.userList', compact('users'));
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        toastr()->addSuccess('User has been deleted successfully.');
        return redirect()->back();
    }
    public function manageUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.manageUser', compact('user'));
    }

    public function updateUser($id, Request $request)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'usertype' => 'required|in:admin,customer',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->usertype = $request->usertype;
        $user->save();
        toastr()->addSuccess('User has been updated successfully.');
        return redirect()->route('admin.userList');
    }
}
