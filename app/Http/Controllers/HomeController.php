<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('home.index', compact('products'));
    }

    public function login_home()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('home.index', compact('products'));
    }

    public function index()
    {
        return view('admin.index');
    }
}
