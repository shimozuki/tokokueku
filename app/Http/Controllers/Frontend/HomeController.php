<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()
            ->take(4)
            ->get();

        return view('frontend.home', compact('products'));
    }
}
