<?php

namespace App\Managers;

class CalculatorManager
{
    /**
     * Calculate the selling price.
     *
     * @param int $quantity The quantity.
     * @param float $unitCost The cost per unit.
     * @param float $profitMargin The profit margin as a decimal.
     * @param float $shippingCost The shipping cost.
     * @return float The calculated selling price.
     */
    public function calculateSalePrices($quantity, $unitCost, $profitMargin, $shippingCost = 10.00)
    {
        // Calculate the cost
        $cost = $quantity * $unitCost;

        // Calculate and return the selling price and round up to the nearest penny
        return round(($cost / (1 - $profitMargin)) + $shippingCost, 2);
    }
}
