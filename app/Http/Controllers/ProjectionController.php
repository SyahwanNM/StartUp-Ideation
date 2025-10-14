<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projection;
use Illuminate\Support\Facades\Log;
use DateTime;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProfessionalProjectionExport;

class ProjectionController extends Controller
{
    public function index()
    {
        // Only admin can access the index
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized access. Only admin can view projection list.');
        }
        
        $projections = Projection::orderBy('created_at', 'desc')->paginate(10);
        return view('projection.index', compact('projections'));
    }

    public function create()
    {
        return view('projection.form');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'business_name' => 'required|string|max:255',
                'industry' => 'required|string|max:255',
                'baseline_units_sold' => 'required|integer|min:1',
                'projection_years' => 'required|integer|min:1|max:5',
                'fixed_costs' => 'required|array|min:1',
                'fixed_costs.*.name' => 'required|string|max:255',
                'fixed_costs.*.amount' => 'required|numeric|min:0',
                'variable_costs' => 'nullable|array',
                'variable_costs.*.name' => 'nullable|string|max:255',
                'variable_costs.*.percentage' => 'nullable|numeric|min:0|max:100',
                'employees' => 'nullable|array',
                'employees.*.name' => 'nullable|string|max:255',
                'employees.*.salary' => 'nullable|numeric|min:0',
                'employees.*.start_month' => 'nullable|integer|min:1',
                'employees.*.end_month' => 'nullable|integer|min:1',
                'assets' => 'nullable|array',
                'assets.*.name' => 'nullable|string|max:255',
                'assets.*.purchase_price' => 'nullable|numeric|min:0',
                'assets.*.purchase_date' => 'nullable|date',
                'yearly_growth_rates' => 'required|array',
                'yearly_growth_rates.*' => 'required|numeric|min:0|max:100',
                'products' => 'required|array|min:1',
                'products.*.name' => 'required|string|max:255',
                'products.*.selling_price' => 'required|numeric|min:0',
                'products.*.packaging_cost' => 'nullable|numeric|min:0',
                'products.*.direct_labor_cost' => 'nullable|numeric|min:0',
                'products.*.sales_percentage' => 'required|numeric|min:0|max:100',
                'products.*.raw_materials' => 'required|array|min:1',
                'products.*.raw_materials.*.name' => 'required|string|max:255',
                'products.*.raw_materials.*.cost_per_unit' => 'required|numeric|min:0',
                'products.*.raw_materials.*.quantity' => 'required|numeric|min:0',
                'funding_sources' => 'nullable|array',
                'funding_sources.*.type' => 'nullable|string|in:equity,loan,investment',
                'funding_sources.*.amount' => 'nullable|numeric|min:0',
                'funding_sources.*.interest_rate' => 'nullable|numeric|min:0|max:100',
                'funding_sources.*.tenor_months' => 'nullable|integer|min:1',
            ]);

            // Validate product distribution percentages sum to 100%
            $totalPercentage = 0;
            foreach ($request->products as $product) {
                $totalPercentage += $product['sales_percentage'];
            }
            if (abs($totalPercentage - 100) > 0.01) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Total persentase distribusi produk harus 100%. Saat ini: ' . number_format($totalPercentage, 2) . '%');
            }

            // Clean and prepare data
            $fixedCosts = array_filter($request->fixed_costs, function($cost) {
                // Clean currency input by removing dots and converting to numeric
                $amount = is_string($cost['amount']) ? str_replace('.', '', $cost['amount']) : $cost['amount'];
                $cost['amount'] = (float) $amount;
                return !empty($cost['name']) && !empty($cost['amount']) && $cost['amount'] > 0;
            });
            
            $variableCosts = array_filter($request->variable_costs ?? [], function($cost) {
                // Clean percentage input
                $percentage = is_string($cost['percentage']) ? str_replace(',', '.', $cost['percentage']) : $cost['percentage'];
                return !empty($cost['name']) && isset($cost['percentage']) && $cost['percentage'] !== '' && is_numeric($percentage) && $percentage > 0;
            });
            
            $employees = array_filter($request->employees ?? [], function($employee) {
                // Clean currency input
                $salary = is_string($employee['salary']) ? str_replace('.', '', $employee['salary']) : $employee['salary'];
                $employee['salary'] = (float) $salary;
                return !empty($employee['name']) && !empty($employee['salary']) && $employee['salary'] > 0 && 
                       !empty($employee['start_month']) && !empty($employee['end_month']) &&
                       $employee['start_month'] < $employee['end_month'];
            });

            $assets = array_filter($request->assets ?? [], function($asset) {
                // Clean currency input
                $purchasePrice = is_string($asset['purchase_price']) ? str_replace('.', '', $asset['purchase_price']) : $asset['purchase_price'];
                $asset['purchase_price'] = (float) $purchasePrice;
                return !empty($asset['name']) && !empty($asset['purchase_price']) && $asset['purchase_price'] > 0 &&
                       !empty($asset['purchase_date']);
            });

            $fundingSources = array_filter($request->funding_sources ?? [], function($source) {
                // Clean currency input
                $amount = is_string($source['amount']) ? str_replace('.', '', $source['amount']) : $source['amount'];
                $source['amount'] = (float) $amount;
                return !empty($source['type']) && !empty($source['amount']) && $source['amount'] > 0;
            });

            // Prepare products data for array storage
            $products = [];
            foreach ($request->products as $productData) {
                // Clean currency inputs for products
                $sellingPrice = is_string($productData['selling_price']) ? str_replace('.', '', $productData['selling_price']) : $productData['selling_price'];
                $packagingCost = isset($productData['packaging_cost']) && is_string($productData['packaging_cost']) ? str_replace('.', '', $productData['packaging_cost']) : ($productData['packaging_cost'] ?? null);
                $directLaborCost = isset($productData['direct_labor_cost']) && is_string($productData['direct_labor_cost']) ? str_replace('.', '', $productData['direct_labor_cost']) : ($productData['direct_labor_cost'] ?? null);
                
                $product = [
                    'name' => $productData['name'],
                    'selling_price' => (float) $sellingPrice,
                    'packaging_cost' => $packagingCost ? (float) $packagingCost : null,
                    'direct_labor_cost' => $directLaborCost ? (float) $directLaborCost : null,
                    'sales_percentage' => $productData['sales_percentage'],
                    'raw_materials' => []
                ];
                
                foreach ($productData['raw_materials'] as $materialData) {
                    // Clean currency input for raw materials
                    $costPerUnit = is_string($materialData['cost_per_unit']) ? str_replace('.', '', $materialData['cost_per_unit']) : $materialData['cost_per_unit'];
                    
                    $product['raw_materials'][] = [
                        'name' => $materialData['name'],
                        'cost_per_unit' => (float) $costPerUnit,
                        'quantity' => $materialData['quantity'],
                    ];
                }
                
                $products[] = $product;
            }

            // Create projection
            $projection = Projection::create([
                'business_name' => $request->business_name,
                'industry' => $request->industry,
                'baseline_units_sold' => $request->baseline_units_sold,
                'projection_years' => $request->projection_years,
                'fixed_costs' => $fixedCosts,
                'variable_costs' => $variableCosts,
                'employees' => $employees,
                'assets' => $assets,
                'yearly_growth_rates' => $request->yearly_growth_rates,
                'products' => $products,
                'funding_sources' => $fundingSources,
            ]);


            // Calculate projections
            $projections = $this->calculateUnitBasedProjections($projection, $fixedCosts, $variableCosts, $employees, $assets, $fundingSources);

            // Update projection with calculated data
            $projection->update(['projections_data' => $projections]);

            return redirect()->route('projection.show', $projection->id)
                ->with('success', 'Proyeksi keuangan berhasil dibuat!');
                
        } catch (\Exception $e) {
            Log::error('Error in ProjectionController@store: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat membuat proyeksi keuangan. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        try {
            $projection = Projection::findOrFail($id);
            
            // Only admin can access any projection, or user can access their own
            if (auth()->check() && auth()->user()->role === 'admin') {
                // Admin can access all projections
            } else {
                // For now, allow access to any projection (since we don't have user_id in projections table)
                // In the future, you might want to add user_id to track who created the projection
            }
            
            // Get projections data for the view
            $projectionsData = $projection->getProjectionsData();
            
            // Always use unit-based result view
            return view('projection.result', compact('projection', 'projectionsData'));

        } catch (\Exception $e) {
            Log::error('Error in ProjectionController@show: ' . $e->getMessage());
            return redirect()->route('bmc.landing')
                ->with('error', 'Proyeksi keuangan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $projection = Projection::findOrFail($id);
            
            // Only admin can edit projections
            if (!auth()->check() || auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized access. Only admin can edit projections.');
            }
            
            return view('projection.edit', compact('projection'));
            
        } catch (\Exception $e) {
            Log::error('Error in ProjectionController@edit: ' . $e->getMessage());
            return redirect()->route('bmc.landing')
                ->with('error', 'Proyeksi keuangan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $projection = Projection::findOrFail($id);
            
            // Only admin can update projections
            if (!auth()->check() || auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized access. Only admin can update projections.');
            }
            
            $request->validate([
                'business_name' => 'required|string|max:255',
                'baseline_units_sold' => 'required|integer|min:1',
                'projection_years' => 'required|integer|min:1|max:5',
                'fixed_costs' => 'required|array|min:1',
                'fixed_costs.*.name' => 'required|string|max:255',
                'fixed_costs.*.amount' => 'required|numeric|min:0',
                'variable_costs' => 'nullable|array',
                'variable_costs.*.name' => 'nullable|string|max:255',
                'variable_costs.*.percentage' => 'nullable|numeric|min:0|max:100',
                'employees' => 'nullable|array',
                'employees.*.name' => 'nullable|string|max:255',
                'employees.*.salary' => 'nullable|numeric|min:0',
                'employees.*.start_month' => 'nullable|integer|min:1',
                'employees.*.end_month' => 'nullable|integer|min:1',
                'assets' => 'nullable|array',
                'assets.*.name' => 'nullable|string|max:255',
                'assets.*.purchase_price' => 'nullable|numeric|min:0',
                'assets.*.purchase_date' => 'nullable|date',
                'yearly_growth_rates' => 'required|array',
                'yearly_growth_rates.*' => 'required|numeric|min:0|max:100',
                'products' => 'nullable|array',
                'products.*.name' => 'nullable|string|max:255',
                'products.*.selling_price' => 'nullable|numeric|min:0',
                'products.*.raw_materials' => 'nullable|array',
                'products.*.raw_materials.*.name' => 'nullable|string|max:255',
                'products.*.raw_materials.*.cost_per_unit' => 'nullable|numeric|min:0',
                'products.*.raw_materials.*.quantity' => 'nullable|numeric|min:0',
                'funding_sources' => 'nullable|array',
                'funding_sources.*.type' => 'nullable|string|in:equity,loan,investment',
                'funding_sources.*.amount' => 'nullable|numeric|min:0',
                'funding_sources.*.interest_rate' => 'nullable|numeric|min:0|max:100',
                'funding_sources.*.tenor_months' => 'nullable|integer|min:1',
            ]);

            // Clean and prepare data (same as store method)
            $fixedCosts = array_filter($request->fixed_costs, function($cost) {
                return !empty($cost['name']) && !empty($cost['amount']) && $cost['amount'] > 0;
            });
            
            $variableCosts = array_filter($request->variable_costs ?? [], function($cost) {
                return !empty($cost['name']) && isset($cost['percentage']) && $cost['percentage'] !== '' && is_numeric($cost['percentage']) && $cost['percentage'] > 0;
            });
            
            $employees = array_filter($request->employees ?? [], function($employee) {
                return !empty($employee['name']) && !empty($employee['salary']) && $employee['salary'] > 0 && 
                       !empty($employee['start_month']) && !empty($employee['end_month']) &&
                       $employee['start_month'] < $employee['end_month'];
            });

            $assets = array_filter($request->assets ?? [], function($asset) {
                return !empty($asset['name']) && !empty($asset['purchase_price']) && $asset['purchase_price'] > 0 &&
                       !empty($asset['purchase_date']);
            });

            $products = array_filter($request->products ?? [], function($product) {
                return !empty($product['name']) && !empty($product['selling_price']) && $product['selling_price'] > 0;
            });

            $fundingSources = array_filter($request->funding_sources ?? [], function($source) {
                return !empty($source['type']) && !empty($source['amount']) && $source['amount'] > 0;
            });

            // Calculate projections
            $projections = $this->calculateProjections($request, $fixedCosts, $variableCosts, $employees, $assets, $products, $fundingSources);

            // Update projection
            $projection->update([
                'business_name' => $request->business_name,
                'baseline_revenue' => $request->baseline_revenue,
                'projection_years' => $request->projection_years,
                'fixed_costs' => $fixedCosts,
                'variable_costs' => $variableCosts,
                'employees' => $employees,
                'assets' => $assets,
                'yearly_growth_rates' => $request->yearly_growth_rates,
                'products' => $products,
                'funding_sources' => $fundingSources,
                'projections_data' => $projections,
            ]);

            return redirect()->route('projection.show', $projection->id)
                ->with('success', 'Proyeksi keuangan berhasil diperbarui!');

        } catch (\Exception $e) {
            Log::error('Error in ProjectionController@update: ' . $e->getMessage());
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat memperbarui proyeksi keuangan. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        try {
            $projection = Projection::findOrFail($id);
            
            // Only admin can delete projections
            if (!auth()->check() || auth()->user()->role !== 'admin') {
                abort(403, 'Unauthorized access. Only admin can delete projections.');
            }
            
            $projection->delete();
            
            return redirect()->route('projection.index')
                ->with('success', 'Proyeksi keuangan berhasil dihapus!');

        } catch (\Exception $e) {
            Log::error('Error in ProjectionController@destroy: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menghapus proyeksi keuangan. Silakan coba lagi.');
        }
    }

    public function export($id)
    {
        try {
            $projection = Projection::findOrFail($id);
            $fileName = 'Laporan_Proyeksi_Keuangan_' . str_replace(' ', '_', $projection->business_name) . '_' . date('Y-m-d_H-i-s') . '.xlsx';
            return Excel::download(new ProfessionalProjectionExport($projection), $fileName);
        } catch (\Exception $e) {
            Log::error('Error in ProjectionController@export: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengexport data.');
        }
    }


    private function calculateProjections($request, $fixedCosts, $variableCosts, $employees, $assets, $products, $fundingSources)
    {
        $projections = [];
        $baselineRevenue = $request->baseline_revenue;
        $projectionYears = $request->projection_years;
        $yearlyGrowthRates = $request->yearly_growth_rates;
        
        // Calculate monthly depreciation
        $monthlyDepreciation = 0;
        foreach ($assets as $asset) {
            if (isset($asset['purchase_price']) && isset($asset['useful_life_months'])) {
                $monthlyDepreciation += $asset['purchase_price'] / $asset['useful_life_months'];
            }
        }
        
        // Calculate monthly interest expense
        $monthlyInterestExpense = 0;
        foreach ($fundingSources as $source) {
            if (isset($source['type']) && $source['type'] === 'loan') {
                $principal = $source['amount'] ?? 0;
                $interestRate = $source['interest_rate'] ?? 0;
                $monthlyInterestExpense += ($principal * $interestRate / 100) / 12;
            }
        }
        
        $currentRevenue = $baselineRevenue;
        
        for ($month = 1; $month <= $projectionYears * 12; $month++) {
            $year = ceil($month / 12);
            $monthInYear = (($month - 1) % 12) + 1;
            
            // Get growth rate for current year
            $annualGrowthRate = $yearlyGrowthRates[$year] ?? $yearlyGrowthRates[1] ?? 0;
            $monthlyGrowthRate = pow(1 + ($annualGrowthRate / 100), 1/12) - 1;
            
            // Calculate revenue for this month
            if ($month > 1) {
                $currentRevenue = $currentRevenue * (1 + $monthlyGrowthRate);
            }
            
            // Calculate fixed costs
            $totalFixedCosts = array_sum(array_column($fixedCosts, 'amount'));
            
            // Calculate variable costs
            $totalVariableCosts = 0;
            foreach ($variableCosts as $cost) {
                $totalVariableCosts += $currentRevenue * ($cost['percentage'] / 100);
            }
            
            // Calculate payroll
            $totalPayroll = $this->calculatePayroll($employees, $month);
            
            // Calculate total costs
            $totalCosts = $totalFixedCosts + $totalVariableCosts + $totalPayroll + $monthlyDepreciation + $monthlyInterestExpense;
            
            // Calculate profit
            $profit = $currentRevenue - $totalCosts;
            
            $monthNames = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            
            $projections[$month] = [
                'month' => $month,
                'month_name' => $monthNames[$monthInYear],
                'year' => $year,
                'revenue' => round($currentRevenue, 2),
                'fixed_costs' => round($totalFixedCosts, 2),
                'variable_costs' => round($totalVariableCosts, 2),
                'payroll' => round($totalPayroll, 2),
                'depreciation' => round($monthlyDepreciation, 2),
                'interest_expense' => round($monthlyInterestExpense, 2),
                'total_costs' => round($totalCosts, 2),
                'profit' => round($profit, 2),
            ];
        }
        
        return $projections;
    }

    private function calculateUnitBasedProjections($projection, $fixedCosts, $variableCosts, $employees, $assets, $fundingSources)
    {
        $projections = [];
        $totalMonths = $projection->projection_years * 12;
        
        for ($month = 1; $month <= $totalMonths; $month++) {
            // Calculate units sold for this month
            $unitsSold = $projection->getUnitsSoldForMonth($month);
            
            // Calculate revenue from products
            $totalRevenue = $projection->getTotalRevenueForMonth($month);
            
            // Calculate HPP from products
            $totalHPP = $projection->getTotalHPPForMonth($month);
            
            // Calculate gross profit
            $grossProfit = $totalRevenue - $totalHPP;
            
            // Calculate fixed costs
            $fixedCostsTotal = 0;
            foreach ($fixedCosts as $cost) {
                $fixedCostsTotal += $cost['amount'];
            }
            
            // Calculate variable costs (percentage of revenue)
            $variableCostsTotal = 0;
            foreach ($variableCosts as $cost) {
                $variableCostsTotal += ($totalRevenue * $cost['percentage'] / 100);
            }
            
            // Calculate payroll
            $payroll = $this->calculatePayroll($employees, $month);
            
            // Calculate depreciation
            $depreciation = $this->calculateDepreciation($assets, $month, $projection->projection_years);
            
            // Calculate interest expense
            $interestExpense = $this->calculateInterestExpense($fundingSources, $month);
            
            // Calculate total costs
            $totalCosts = $totalHPP + $fixedCostsTotal + $variableCostsTotal + $payroll + $depreciation + $interestExpense;
            
            // Calculate net profit
            $netProfit = $totalRevenue - $totalCosts;
            
            // Get product breakdown for this month
            $productBreakdown = $projection->getProductBreakdownForMonth($month);
            
            $projections[] = [
                'month' => $month,
                'year' => ceil($month / 12),
                'units_sold' => $unitsSold,
                'revenue' => round($totalRevenue, 2),
                'hpp' => round($totalHPP, 2),
                'gross_profit' => round($grossProfit, 2),
                'fixed_costs' => round($fixedCostsTotal, 2),
                'variable_costs' => round($variableCostsTotal, 2),
                'payroll' => round($payroll, 2),
                'depreciation' => round($depreciation, 2),
                'interest_expense' => round($interestExpense, 2),
                'total_costs' => round($totalCosts, 2),
                'net_profit' => round($netProfit, 2),
                'product_breakdown' => $productBreakdown,
            ];
        }
        
        return $projections;
    }

    private function calculateDepreciation($assets, $currentMonth, $projectionYears = null)
    {
        $total = 0;
        if (empty($assets)) {
            return $total;
        }
        
        // Calculate total months in projection if not provided
        $totalProjectionMonths = $projectionYears ? $projectionYears * 12 : 60; // Default to 5 years
        
        foreach ($assets as $asset) {
            $purchasePrice = $asset['purchase_price'];
            $purchaseDate = $asset['purchase_date'];
            
            // Calculate months since purchase
            $purchaseDateTime = new DateTime($purchaseDate);
            $currentDateTime = new DateTime();
            $monthsSincePurchase = $currentDateTime->diff($purchaseDateTime)->m + ($currentDateTime->diff($purchaseDateTime)->y * 12);
            
            // Use projection duration as useful life, but not less than 12 months
            $usefulLifeMonths = max($totalProjectionMonths, 12);
            
            // Calculate monthly depreciation
            $monthlyDepreciation = $purchasePrice / $usefulLifeMonths;
            
            // Check if asset is still being depreciated
            // Asset starts depreciating from month 1 of projection, regardless of purchase date
            if ($currentMonth <= $usefulLifeMonths) {
                $total += $monthlyDepreciation;
            }
        }
        
        return $total;
    }

    private function calculateInterestExpense($fundingSources, $currentMonth)
    {
        $total = 0;
        if (empty($fundingSources)) {
            return $total;
        }
        
        foreach ($fundingSources as $source) {
            if ($source['type'] === 'loan' && isset($source['interest_rate']) && isset($source['tenor_months'])) {
                $principal = $source['amount'];
                $interestRate = $source['interest_rate'] / 100;
                $tenorMonths = $source['tenor_months'];
                
                // Check if loan is still active
                if ($currentMonth <= $tenorMonths) {
                    $monthlyInterest = $principal * $interestRate / 12;
                    $total += $monthlyInterest;
                }
            }
        }
        
        return $total;
    }

    private function calculatePayroll($employees, $currentMonth)
    {
        $total = 0;
        if (empty($employees)) {
            return $total;
        }
        
        foreach ($employees as $employee) {
            if (isset($employee['start_month']) && isset($employee['end_month'])) {
                $startMonth = (int)$employee['start_month'];
                $endMonth = (int)$employee['end_month'];
                
                // Check if current month is within the employee's working period
                if ($currentMonth >= $startMonth && $currentMonth <= $endMonth) {
                    $total += $employee['salary'];
                }
            }
        }
        return $total;
    }
}