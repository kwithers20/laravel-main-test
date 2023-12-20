<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;

class SaleController extends Controller
{
    /**
     * Display the list of sales.
     */
    public function index()
    {
        $sales = Sales::orderBy('created_at')->get();

        return view('coffee_sales', compact('sales'));
    }
}
