<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
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
        $userCount = User::all()->count();
        $productCount = Product::all()->count();
        $categoryCount = Category::all()->count();
        $orderCount = Order::where('status', 'in progress')->get()->count();
        return view('admin.index', compact('userCount', 'productCount', 'categoryCount', 'orderCount'));
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
        // Check if the cart is empty
        $cart = cart::where('user_id', Auth::id())->get();

        // If the cart is empty, return with a message
        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'You have no items in your cart.');
        }

        // Retrieve user input from the request
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->rec_address;

        // Iterate through the cart items and create orders
        foreach ($cart as $cartItem) {
            $order = new Order;
            $order->name = $name;
            $order->phone = $phone;
            $order->rec_address = $address;
            $order->user_id = Auth::id();
            $order->product_id = $cartItem->product_id;
            $order->save();
        }

        // Delete all cart items for the user
        cart::where('user_id', Auth::id())->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Order confirmed successfully');
    }

    public function order_history()
    {
        $cart_count = cart::where('user_id', Auth::id())->count();
        $user_id = Auth::id();
        $previousOrders = Order::where('user_id', $user_id)->where('status', 'delivered')->get();
        $pendingOrders = Order::where('user_id', $user_id)
            ->where(function ($query) {
                $query->whereRaw('LOWER(status) = ?', ['on the way'])
                    ->orWhereRaw('LOWER(status) = ?', ['in progress']);
            })
            ->get();


        return view('home.order_history', compact('cart_count', 'previousOrders', 'pendingOrders'));
    }
}
