<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Sales;
use App\Managers\CalculatorManager;

class SaleCalculator extends Component
{
    public $products;
    public $customers;

    public $product_id;
    public $customer_id;
    public $quantity;
    public $unit_cost;
    public $sellingPrice = 0.00;

    public function render()
    {
        $this->products = Product::all();
        $this->customers = Customer::all();

        return view('livewire.sale-calculator');
    }

    public function calculate()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'unit_cost' => 'required|numeric|min:0.01',
        ]);

        $calculator = new CalculatorManager();
        $this->sellingPrice = $calculator->calculateSalePrices($this->quantity ?? 0, $this->unit_cost ?? 0, 0.25);
    }

    public function save()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'customer_id' => 'required|exists:customers,id',
            'quantity' => 'required|integer|min:1',
            'unit_cost' => 'required|numeric|min:0.01',
        ]);

        Sales::create([
            'product_id' => $this->product_id,
            'user_id' => auth()->user()->id,
            'customer_id' => $this->customer_id,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost * 100,
            'selling_price' => $this->sellingPrice * 100,
        ]);

        // redirect to the sales page
        return redirect()->route('coffee.sales')->with('success', 'Sale recorded successfully!');
    }
}