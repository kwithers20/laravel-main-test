<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Sales Agent',
            'email' => 'sales@coffee.shop',
        ]);

        Product::factory()->create([
            'name' => 'Gold Coffee',
        ]);

        Customer::factory()->create([
            'name' => 'Ted Mosby',
            'company' => 'Mosbius Designs',
            'email' => 'ted@mosbius-designs.com',
        ]);
    }
}
