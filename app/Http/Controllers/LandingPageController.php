<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(6)->get(); // Get latest 6 products
        return view('landing', compact('products'));
    }
} 