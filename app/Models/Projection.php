<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Projection extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'industry',
        'baseline_units_sold',
        'product_distribution',
        'projection_years',
        'fixed_costs',
        'variable_costs',
        'employees',
        'assets',
        'yearly_growth_rates',
        'products',
        'funding_sources',
        'projections_data',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'fixed_costs' => 'array',
        'variable_costs' => 'array',
        'employees' => 'array',
        'assets' => 'array',
        'yearly_growth_rates' => 'array',
        'product_distribution' => 'array',
        'products' => 'array',
        'funding_sources' => 'array',
        'projections_data' => 'array',
        'baseline_units_sold' => 'integer',
    ];

    /**
     * Get the products for the projection.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    // Accessor for formatted currency
    public function getFormattedCurrencyAttribute()
    {
        return function($value) {
            return 'Rp ' . number_format($value, 0, ',', '.');
        };
    }

    // Get monthly growth rate for specific year
    public function getMonthlyGrowthRateForYear($year)
    {
        $yearlyRates = $this->yearly_growth_rates ?? [];
        $annualRate = $yearlyRates[$year] ?? $yearlyRates[1] ?? 0; // Default to year 1 or 0
        return pow(1 + ($annualRate / 100), 1/12) - 1;
    }

    // Get monthly growth rate percentage for specific year
    public function getMonthlyGrowthRatePercentageForYear($year)
    {
        return $this->getMonthlyGrowthRateForYear($year) * 100;
    }

    // Get all monthly growth rates
    public function getAllMonthlyGrowthRates()
    {
        $rates = [];
        for ($year = 1; $year <= $this->projection_years; $year++) {
            $rates[$year] = $this->getMonthlyGrowthRateForYear($year);
        }
        return $rates;
    }

    // Calculate total months
    public function getTotalMonthsAttribute()
    {
        return $this->projection_years * 12;
    }

    // Get projections data
    public function getProjectionsData()
    {
        return $this->projections_data ?? [];
    }

    // Calculate monthly depreciation for assets
    public function getMonthlyDepreciation()
    {
        $assets = $this->assets ?? [];
        $totalDepreciation = 0;
        
        foreach ($assets as $asset) {
            if (isset($asset['purchase_price']) && isset($asset['useful_life_months'])) {
                $depreciation = $asset['purchase_price'] / $asset['useful_life_months'];
                $totalDepreciation += $depreciation;
            }
        }
        
        return $totalDepreciation;
    }

    // Calculate HPP for products
    public function getProductHPP($productIndex)
    {
        $products = $this->products ?? [];
        if (!isset($products[$productIndex])) {
            return 0;
        }
        
        $product = $products[$productIndex];
        $hpp = 0;
        
        if (isset($product['raw_materials'])) {
            foreach ($product['raw_materials'] as $material) {
                if (isset($material['cost_per_unit']) && isset($material['quantity'])) {
                    $hpp += $material['cost_per_unit'] * $material['quantity'];
                }
            }
        }
        
        return $hpp;
    }

    // Calculate gross profit for products
    public function getProductGrossProfit($productIndex)
    {
        $products = $this->products ?? [];
        if (!isset($products[$productIndex])) {
            return 0;
        }
        
        $product = $products[$productIndex];
        $sellingPrice = $product['selling_price'] ?? 0;
        $hpp = $this->getProductHPP($productIndex);
        
        return $sellingPrice - $hpp;
    }

    // Calculate monthly interest expense
    public function getMonthlyInterestExpense()
    {
        $fundingSources = $this->funding_sources ?? [];
        $totalInterest = 0;
        
        foreach ($fundingSources as $source) {
            if (isset($source['type']) && $source['type'] === 'loan') {
                $principal = $source['amount'] ?? 0;
                $interestRate = $source['interest_rate'] ?? 0;
                $monthlyInterest = ($principal * $interestRate / 100) / 12;
                $totalInterest += $monthlyInterest;
            }
        }
        
        return $totalInterest;
    }

    // Get yearly summary
    public function getYearlySummary()
    {
        $projections = $this->getProjectionsData();
        $yearlyData = [];
        
        foreach ($projections as $projection) {
            $year = $projection['year'];
            
            if (!isset($yearlyData[$year])) {
                $yearlyData[$year] = [
                    'revenue' => 0,
                    'fixed_costs' => 0,
                    'variable_costs' => 0,
                    'payroll' => 0,
                    'depreciation' => 0,
                    'interest_expense' => 0,
                    'total_costs' => 0,
                    'profit' => 0,
                    'months' => 0
                ];
            }
            
            $yearlyData[$year]['revenue'] += $projection['revenue'];
            $yearlyData[$year]['fixed_costs'] += $projection['fixed_costs'];
            $yearlyData[$year]['variable_costs'] += $projection['variable_costs'];
            $yearlyData[$year]['payroll'] += $projection['payroll'];
            $yearlyData[$year]['depreciation'] += $projection['depreciation'] ?? 0;
            $yearlyData[$year]['interest_expense'] += $projection['interest_expense'] ?? 0;
            $yearlyData[$year]['total_costs'] += $projection['total_costs'];
            $yearlyData[$year]['profit'] += $projection['profit'];
            $yearlyData[$year]['months']++;
        }
        
        return $yearlyData;
    }

    /**
     * Calculate units sold for a specific month based on growth rate.
     */
    public function getUnitsSoldForMonth(int $month): int
    {
        $year = ceil($month / 12);
        $monthlyGrowthRate = $this->getMonthlyGrowthRateForYear($year);
        
        // Calculate cumulative growth from month 1 to current month
        $cumulativeGrowth = pow(1 + $monthlyGrowthRate, $month - 1);
        
        return (int) round($this->baseline_units_sold * $cumulativeGrowth);
    }

    /**
     * Calculate total revenue for a specific month.
     */
    public function getTotalRevenueForMonth(int $month): float
    {
        $totalUnitsSold = $this->getUnitsSoldForMonth($month);
        $totalRevenue = 0;
        
        $products = $this->products ?? [];
        foreach ($products as $product) {
            $salesPercentage = $product['sales_percentage'] ?? 0;
            $sellingPrice = $product['selling_price'] ?? 0;
            $productUnitsSold = $totalUnitsSold * ($salesPercentage / 100);
            $totalRevenue += $productUnitsSold * $sellingPrice;
        }
        
        return $totalRevenue;
    }

    /**
     * Calculate total HPP for a specific month.
     */
    public function getTotalHPPForMonth(int $month): float
    {
        $totalUnitsSold = $this->getUnitsSoldForMonth($month);
        $totalHPP = 0;
        
        $products = $this->products ?? [];
        foreach ($products as $product) {
            $salesPercentage = $product['sales_percentage'] ?? 0;
            $productUnitsSold = $totalUnitsSold * ($salesPercentage / 100);
            
            // Calculate HPP for this product
            $productHPP = 0;
            $rawMaterials = $product['raw_materials'] ?? [];
            foreach ($rawMaterials as $material) {
                $costPerUnit = $material['cost_per_unit'] ?? 0;
                $quantity = $material['quantity'] ?? 0;
                $productHPP += $costPerUnit * $quantity;
            }
            
            // Add packaging and labor costs
            $packagingCost = $product['packaging_cost'] ?? 0;
            $directLaborCost = $product['direct_labor_cost'] ?? 0;
            $productHPP += $packagingCost + $directLaborCost;
            
            $totalHPP += $productHPP * $productUnitsSold;
        }
        
        return $totalHPP;
    }

    /**
     * Calculate total gross profit for a specific month.
     */
    public function getTotalGrossProfitForMonth(int $month): float
    {
        return $this->getTotalRevenueForMonth($month) - $this->getTotalHPPForMonth($month);
    }

    /**
     * Get product breakdown for a specific month.
     */
    public function getProductBreakdownForMonth(int $month): array
    {
        $totalUnitsSold = $this->getUnitsSoldForMonth($month);
        $breakdown = [];
        
        $products = $this->products ?? [];
        foreach ($products as $product) {
            $salesPercentage = $product['sales_percentage'] ?? 0;
            $sellingPrice = $product['selling_price'] ?? 0;
            $productUnitsSold = $totalUnitsSold * ($salesPercentage / 100);
            
            // Calculate HPP for this product
            $productHPP = 0;
            $rawMaterials = $product['raw_materials'] ?? [];
            foreach ($rawMaterials as $material) {
                $costPerUnit = $material['cost_per_unit'] ?? 0;
                $quantity = $material['quantity'] ?? 0;
                $productHPP += $costPerUnit * $quantity;
            }
            
            // Add packaging and labor costs
            $packagingCost = $product['packaging_cost'] ?? 0;
            $directLaborCost = $product['direct_labor_cost'] ?? 0;
            $productHPP += $packagingCost + $directLaborCost;
            
            $revenue = $productUnitsSold * $sellingPrice;
            $hpp = $productHPP * $productUnitsSold;
            $grossProfit = $revenue - $hpp;
            $grossProfitMargin = $revenue > 0 ? ($grossProfit / $revenue) * 100 : 0;
            
            $breakdown[] = [
                'product_name' => $product['name'] ?? 'Unknown Product',
                'units_sold' => $productUnitsSold,
                'revenue' => $revenue,
                'hpp' => $hpp,
                'gross_profit' => $grossProfit,
                'gross_profit_margin' => $grossProfitMargin,
            ];
        }
        
        return $breakdown;
    }

    /**
     * Validate that product distribution percentages sum to 100%.
     */
    public function validateProductDistribution(): bool
    {
        $totalPercentage = 0;
        $products = $this->products ?? [];
        foreach ($products as $product) {
            $totalPercentage += $product['sales_percentage'] ?? 0;
        }
        
        return abs($totalPercentage - 100) < 0.01; // Allow for small floating point errors
    }
}