<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display the list of products.
     */
    public function index()
    {
        $products = Product::orderBy('name')->get();

        return view('coffee_products', compact('products'));
    }

    /**
     * Store a new product.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Product::create([
            'name' => $request->name,
        ]);

        return redirect()->route('coffee.products')->with('success', 'Product added successfully.');
    }
}
