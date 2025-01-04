<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function home()
    {

        $products = Product::orderBy('created_at', 'desc')->take(5)->get();

        if (Auth::id()) {
            $cart_count = cart::where('user_id', Auth::id())->count();
            $cart = cart::where('user_id', Auth::id())->get();
            $wishlist_items = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $cart_count = null;
            $wishlist_items = null;
            $cart = null;
        }

        return view('home.index', compact('products', 'cart_count', 'cart', 'wishlist_items'));
    }

    public function shop(Request $request)
    {


        $categories = Category::all();
        $query = Product::query();



        if (Auth::id()) {
            $cart_count = cart::where('user_id', Auth::id())->count();
            $cart = cart::where('user_id', Auth::id())->get();
            $wishlist_items = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $cart_count = null;
            $cart = null;
            $wishlist_items = null;
        }

        if ($request->has('categories') && is_array($request->categories)) {
            $query->whereIn('id', $request->categories);
        }
        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
            $query->where('title', 'LIKE', '%' . $request->search . '%')->orWhere('description', 'LIKE', '%' . $request->search . '%')->orWhere('category', 'LIKE', '%' . $request->search . '%');
        }
        $products = $query->orderBy('price', 'asc')->paginate(8);



        return view('home.shop', compact('products', 'cart_count', 'cart', 'wishlist_items', 'categories'));
    }



    public function why()
    {


        if (Auth::id()) {
            $cart_count = cart::where('user_id', Auth::id())->count();
            $wishlist_items = Wishlist::where('user_id', Auth::id())->count();
            $cart = cart::where('user_id', Auth::id())->get();
        } else {
            $cart_count = null;
            $cart = null;
            $wishlist_items = null;
        }

        return view('home.why', compact('cart_count', 'cart', 'wishlist_items'));
    }

    public function testimonial()
    {


        if (Auth::id()) {
            $cart_count = cart::where('user_id', Auth::id())->count();
            $cart = cart::where('user_id', Auth::id())->get();
            $wishlist_items = Wishlist::where('user_id', Auth::id())->count();
        } else {
            $cart_count = null;
            $cart = null;
            $wishlist_items = null;
        }

        return view('home.testimonial', compact('cart_count', 'cart', 'wishlist_items'));
    }

    public function login_home()
    {
        $user_id = Auth::id();
        $products = Product::orderBy('created_at', 'desc')->get();
        $cart_count = cart::where('user_id', Auth::id())->count();
        $cart = cart::where('user_id', $user_id)->get();
        $wishlist_items = Wishlist::where('user_id', $user_id)->count();
        return view('home.index', compact('products', 'cart_count', 'cart', 'wishlist_items'));
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
        $wishlist_items = Wishlist::where('user_id', $user_id)->count();

        return view('home.productDetails', compact('product', 'cart_count', 'cart', 'wishlist_items'));
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
        $wishlist_items = Wishlist::where('user_id', $user_id)->count();

        return view('home.cart', compact('cart', 'cart_count', 'wishlist_items'));
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
        $wishlist_items = Wishlist::where('user_id', Auth::id())->count();
        $user_id = Auth::id();

        // Fetch previous orders (delivered), sorted by the latest date first
        $previousOrders = Order::where('user_id', $user_id)
            ->where('status', 'delivered')
            ->orderBy('created_at', 'desc') // Sort by created_at in descending order
            ->get();

        // Fetch pending orders, sorted by the latest date first
        $pendingOrders = Order::where('user_id', $user_id)
            ->where(function ($query) {
                $query->whereRaw('LOWER(status) = ?', ['on the way'])
                    ->orWhereRaw('LOWER(status) = ?', ['in progress']);
            })
            ->orderBy('created_at', 'desc') // Sort by created_at in descending order
            ->get();

        return view('home.order_history', compact('cart_count', 'previousOrders', 'pendingOrders', 'wishlist_items'));
    }


    public function stripe($totalValue)

    {
        return view('home.stripe', compact('totalValue'));
    }

    public function stripePost(Request $request, $totalValue)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalValue * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from arnob"
        ]);

        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->rec_address;

        $cart = cart::where('user_id', Auth::id())->get();

        // Iterate through the cart items and create orders
        foreach ($cart as $cartItem) {
            $order = new Order;
            $order->name = $name;
            $order->phone = $phone;
            $order->rec_address = $address;
            $order->user_id = Auth::id();
            $order->product_id = $cartItem->product_id;
            $order->payment_status = 'paid';

            $order->save();
        }

        // Delete all cart items for the user
        cart::where('user_id', Auth::id())->delete();




        // Redirect to the order history view with required variables
        return redirect('order_history')->with('success', 'Payment successful!');
    }

    public function wishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        $cart_count = cart::where('user_id', Auth::id())->count();
        $wishlist_items = Wishlist::where('user_id', Auth::id())->count();
        return view('home.wishlist', compact('wishlist', 'cart_count', 'wishlist_items'));
    }
    public function add_wishlist($id)
    {
        $product = Product::findOrFail($id);

        // Check if the product is already in the wishlist
        $existingWishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $id)
            ->first();

        if ($existingWishlist) {
            // If the product is already in the wishlist, return with a message
            return redirect()->back()->with('info', 'Product is already in your wishlist.');
        }

        // If not, add the product to the wishlist
        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::id();
        $wishlist->product_id = $id;
        $wishlist->save();

        return redirect()->back()->with('success', 'Product added to wishlist.');
    }

    public function delete_wishlist($id)
    {

        $item = Wishlist::where('user_id', Auth::id())->where('product_id', $id);
        $item->delete();
        return redirect()->back()->with('success', 'Product deleted from wishlist');
    }
}
