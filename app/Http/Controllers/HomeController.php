<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function home()
    {

        $products = Product::orderBy('created_at', 'desc')->get();
        if (Auth::id()) {
            $cart_count = cart::where('user_id', Auth::id())->count();
            $cart = cart::where('user_id', Auth::id())->get();
        } else {
            $cart_count = null;
            $cart = null;
        }

        return view('home.index', compact('products', 'cart_count', 'cart'));
    }

    public function login_home()
    {
        $user_id = Auth::id();
        $products = Product::orderBy('created_at', 'desc')->get();
        $cart_count = cart::where('user_id', Auth::id())->count();
        $cart = cart::where('user_id', $user_id)->get();
        return view('home.index', compact('products', 'cart_count', 'cart'));
    }

    public function index()
    {
        return view('admin.index');
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        $cart_count = cart::where('user_id', Auth::id())->count();
        $user_id = Auth::id();
        $cart = cart::where('user_id', $user_id)->get();

        return view('home.productDetails', compact('product', 'cart_count', 'cart'));
    }

    public function add_cart($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user(); //getting all the user details
        $user_id = $user->id;
        $data = new cart;
        $data->user_id = $user_id;
        $data->product_id = $id;

        $data->save();
        return redirect()->back()->with('success', 'Product added to cart successfully');
    }

    public function view_cart()
    {
        $user_id = Auth::id();
        $cart = cart::with('product')->where('user_id', $user_id)->get();
        $cart_count = cart::where('user_id', Auth::id())->count();
        return view('home.cart', compact('cart', 'cart_count'));
    }
    public function delete_cart($id)
    {
        $cart = cart::findOrFail($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Product deleted from cart successfully');
    }
    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->rec_address;
        $cart = cart::where('user_id', Auth::id())->get();
        foreach ($cart as $cartItem) {
            $order = new Order;
            $order->name = $name;
            $order->phone = $phone;
            $order->rec_address = $address;
            $order->user_id = Auth::id();
            $order->product_id = $cartItem->product_id;
            $order->save();
        }
        cart::where('user_id', Auth::id())->delete();
        return redirect()->back()->with('success', 'Order confirmed successfully');
    }
}
