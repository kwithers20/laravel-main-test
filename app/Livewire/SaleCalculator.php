<?php

namespace App\Livewire;

use App\Managers\CalculatorManager;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sales;
use Livewire\Component;

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

        $product = Product::find($this->product_id);

        $calculator = new CalculatorManager();
        $this->sellingPrice = $calculator->calculateSalePrices($this->quantity ?? 0, $this->unit_cost ?? 0, $product->profit_margin / 100);
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
