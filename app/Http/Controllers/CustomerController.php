<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display the list of customers.
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();

        return view('coffee_customers', compact('customers'));
    }

    /**
     * Store a new customer.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        Customer::create([
            'name' => $request->name,
            'company' => $request->company,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('coffee.customers')->with('success', 'Customer added successfully.');
    }
}
