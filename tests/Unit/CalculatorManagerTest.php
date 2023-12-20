<?php
use App\Managers\CalculatorManager;
use PHPUnit\Framework\TestCase;

class CalculatorManagerTest extends TestCase
{
    public function testCalculateSalePrices()
    {
        $calculator = new CalculatorManager();

        // Test case 1: Quantity = 10, Unit Cost = 5.00, Profit Margin = 0.25
        $sellingPrice1 = $calculator->calculateSalePrices(2, 20.50, 0.25);
        $this->assertEquals(64.67, $sellingPrice1);

        // Test case 2: Quantity = 5, Unit Cost = 12.00, Profit Margin = 0.15
        $sellingPrice2 = $calculator->calculateSalePrices(5, 12.00, 0.15);
        $this->assertEquals(80.59, $sellingPrice2);
    }
}
