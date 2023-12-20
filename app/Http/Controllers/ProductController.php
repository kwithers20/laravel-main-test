<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
            'profit_margin' => 'required|numeric|min:0|max:100',
        ]);

        Product::create([
            'name' => $request->name,
            'profit_margin' => $request->profit_margin * 100,
        ]);

        return redirect()->route('coffee.products')->with('success', 'Product added successfully.');
    }
}
