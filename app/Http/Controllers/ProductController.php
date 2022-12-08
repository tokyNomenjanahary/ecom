<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
                            ->inRandomOrder()
                            ->whereIsActive(true)
                            ->take(16)
                            ->get();
        return view('products.index', ['products' => $products]);
    }
}
