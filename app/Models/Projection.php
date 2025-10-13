<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projection extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'baseline_revenue',
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
        'products' => 'array',
        'funding_sources' => 'array',
        'projections_data' => 'array',
        'baseline_revenue' => 'decimal:2',
    ];

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
}