<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $productQuery = Product::query();
        $productLists = $productQuery->latest()->limit(12)->get(['id','name', 'description', 'price', 'merk_id']);
        return view('landing.index', compact('productLists'));
    }

    public function shop()
    {
        $productQuery = Product::query();
        $productLists = $productQuery->latest()->paginate(12);
        return view('landing.shop', compact('productLists'));
    }
}
