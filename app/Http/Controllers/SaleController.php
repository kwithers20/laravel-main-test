<?php

namespace App\Http\Controllers;

use App\Models\Sales;

class SaleController extends Controller
{
    /**
     * Display the list of sales.
     */
    public function index()
    {
        $sales = Sales::orderBy('created_at', 'desc')->get();

        return view('coffee_sales', compact('sales'));
    }
}
