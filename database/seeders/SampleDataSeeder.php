<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;
use App\Models\BmcData;
use App\Models\TamSamSom;
use App\Models\Projection;
use Carbon\Carbon;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create BMC Data
        $this->createBMCData();
        
        // Create TAM SAM SOM Data
        $this->createTamSamSomData();
        
        // Create Financial Projection Data
        $this->createProjectionData();
    }

    private function createBMCData()
    {
        $businesses = [
            [
                'business_name' => 'Bakery & Cafe "Sweet Dreams"',
                'owner_name' => 'Sarah Johnson',
                'location' => 'Jakarta Selatan',
                'phone_number' => '081234567890',
                'business_description' => 'Bakery dan cafe yang menyediakan roti, kue, dan minuman berkualitas tinggi dengan konsep cozy dan modern.',
                'industry' => 'Food & Beverage',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'business_name' => 'TechStart Solutions',
                'owner_name' => 'Ahmad Rahman',
                'location' => 'Bandung',
                'phone_number' => '081234567891',
                'business_description' => 'Perusahaan teknologi yang mengembangkan aplikasi mobile dan web untuk UMKM dengan fokus pada digitalisasi bisnis.',
                'industry' => 'Technology',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'business_name' => 'EcoFashion Store',
                'owner_name' => 'Maya Sari',
                'location' => 'Yogyakarta',
                'phone_number' => '081234567892',
                'business_description' => 'Toko fashion yang menjual pakaian ramah lingkungan dan sustainable fashion dengan desain modern dan unik.',
                'industry' => 'Fashion',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ]
        ];

        foreach ($businesses as $businessData) {
            $business = Business::create($businessData);
            
            // Create BMC Data for each business
            BmcData::create([
                'business_id' => $business->id,
                'key_partnerships' => ['Supplier bahan baku', 'Distributor', 'Mitra teknologi'],
                'key_activities' => ['Produksi', 'Pemasaran', 'Layanan pelanggan', 'Riset dan pengembangan'],
                'value_propositions' => ['Kualitas tinggi', 'Harga kompetitif', 'Layanan prima', 'Inovasi produk'],
                'customer_relationships' => ['Personal assistance', 'Self-service', 'Automated service'],
                'customer_segments' => ['Konsumen individu', 'Bisnis B2B', 'Pelanggan premium'],
                'key_resources' => ['Tim ahli', 'Teknologi', 'Merek', 'Jaringan distribusi'],
                'channels' => ['Online store', 'Toko fisik', 'Marketplace', 'Social media'],
                'cost_structure' => ['Biaya produksi', 'Pemasaran', 'Operasional', 'Teknologi'],
                'revenue_streams' => ['Penjualan produk', 'Layanan', 'Subscription', 'Komisi'],
                'created_at' => $business->created_at,
                'updated_at' => $business->updated_at,
            ]);
        }
    }

    private function createTamSamSomData()
    {
        $tamSamSomData = [
            [
                'business_name' => 'Bakery & Cafe "Sweet Dreams"',
                'owner_name' => 'Sarah Johnson',
                'industry' => 'Food & Beverage',
                'location' => 'Jakarta Selatan',
                'tam_description' => 'Total Addressable Market untuk industri bakery dan cafe di Indonesia',
                'tam_market_size' => 1000000,
                'tam_unit_value' => 50000,
                'tam_value' => 50000000000, // 50 billion
                'sam_description' => 'Serviceable Addressable Market untuk bakery premium di Jakarta',
                'sam_market_size' => 100000,
                'sam_value' => 5000000000, // 5 billion
                'sam_percentage' => 10.0,
                'som_description' => 'Serviceable Obtainable Market untuk target pelanggan kami',
                'som_market_size' => 10000,
                'som_value' => 500000000, // 500 million
                'som_percentage' => 10.0,
                'market_assumptions' => 'Pertumbuhan industri F&B 15% per tahun, peningkatan konsumsi premium',
                'growth_projections' => 'Target 20% market share dalam 3 tahun',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(4),
            ],
            [
                'business_name' => 'TechStart Solutions',
                'owner_name' => 'Ahmad Rahman',
                'industry' => 'Technology',
                'location' => 'Bandung',
                'tam_description' => 'Total Addressable Market untuk software development di Indonesia',
                'tam_market_size' => 5000000,
                'tam_unit_value' => 20000,
                'tam_value' => 100000000000, // 100 billion
                'sam_description' => 'Serviceable Addressable Market untuk aplikasi UMKM',
                'sam_market_size' => 500000,
                'sam_value' => 10000000000, // 10 billion
                'sam_percentage' => 10.0,
                'som_description' => 'Serviceable Obtainable Market untuk target klien kami',
                'som_market_size' => 50000,
                'som_value' => 1000000000, // 1 billion
                'som_percentage' => 10.0,
                'market_assumptions' => 'Digitalisasi UMKM meningkat 25% per tahun',
                'growth_projections' => 'Target 15% market share dalam 4 tahun',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'business_name' => 'EcoFashion Store',
                'owner_name' => 'Maya Sari',
                'industry' => 'Fashion',
                'location' => 'Yogyakarta',
                'tam_description' => 'Total Addressable Market untuk sustainable fashion di Indonesia',
                'tam_market_size' => 2000000,
                'tam_unit_value' => 15000,
                'tam_value' => 30000000000, // 30 billion
                'sam_description' => 'Serviceable Addressable Market untuk eco-friendly fashion',
                'sam_market_size' => 200000,
                'sam_value' => 3000000000, // 3 billion
                'sam_percentage' => 10.0,
                'som_description' => 'Serviceable Obtainable Market untuk target pelanggan eco-conscious',
                'som_market_size' => 20000,
                'som_value' => 300000000, // 300 million
                'som_percentage' => 10.0,
                'market_assumptions' => 'Kesadaran sustainable fashion meningkat 30% per tahun',
                'growth_projections' => 'Target 12% market share dalam 3 tahun',
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ]
        ];

        foreach ($tamSamSomData as $data) {
            TamSamSom::create($data);
        }
    }

    private function createProjectionData()
    {
        $projections = [
            [
                'business_name' => 'Bakery & Cafe "Sweet Dreams"',
                'industry' => 'Food & Beverage',
                'baseline_units_sold' => 400,
                'projection_years' => 3,
                'yearly_growth_rates' => [1 => 15, 2 => 20, 3 => 17],
                'fixed_costs' => [
                    ['name' => 'Sewa Tempat', 'amount' => 15000000],
                    ['name' => 'Listrik & Air', 'amount' => 2000000],
                    ['name' => 'Internet', 'amount' => 500000],
                    ['name' => 'Asuransi', 'amount' => 1000000]
                ],
                'variable_costs' => [
                    ['name' => 'Bahan Baku', 'percentage' => 30],
                    ['name' => 'Marketing', 'percentage' => 5]
                ],
                'employees' => [
                    ['name' => 'Manager', 'salary' => 8000000, 'start_month' => 1, 'end_month' => 36],
                    ['name' => 'Chef', 'salary' => 6000000, 'start_month' => 1, 'end_month' => 36],
                    ['name' => 'Kasir', 'salary' => 4000000, 'start_month' => 1, 'end_month' => 36]
                ],
                'assets' => [
                    ['name' => 'Oven Industrial', 'purchase_price' => 25000000, 'purchase_date' => '2024-01-01', 'useful_life_months' => 60],
                    ['name' => 'Mesin Kopi', 'purchase_price' => 15000000, 'purchase_date' => '2024-01-01', 'useful_life_months' => 48]
                ],
                'products' => [
                    [
                        'name' => 'Roti Croissant',
                        'selling_price' => 15000,
                        'packaging_cost' => 500,
                        'direct_labor_cost' => 2000,
                        'sales_percentage' => 40,
                        'raw_materials' => [
                            ['name' => 'Tepung Terigu', 'cost_per_unit' => 5000, 'quantity' => 1],
                            ['name' => 'Mentega', 'cost_per_unit' => 3000, 'quantity' => 0.5]
                        ]
                    ],
                    [
                        'name' => 'Cappuccino',
                        'selling_price' => 25000,
                        'packaging_cost' => 1000,
                        'direct_labor_cost' => 1500,
                        'sales_percentage' => 35,
                        'raw_materials' => [
                            ['name' => 'Biji Kopi', 'cost_per_unit' => 8000, 'quantity' => 0.1],
                            ['name' => 'Susu', 'cost_per_unit' => 2000, 'quantity' => 0.2]
                        ]
                    ],
                    [
                        'name' => 'Kue Tart',
                        'selling_price' => 35000,
                        'packaging_cost' => 1500,
                        'direct_labor_cost' => 3000,
                        'sales_percentage' => 25,
                        'raw_materials' => [
                            ['name' => 'Tepung Terigu', 'cost_per_unit' => 5000, 'quantity' => 0.8],
                            ['name' => 'Telur', 'cost_per_unit' => 2000, 'quantity' => 2],
                            ['name' => 'Gula', 'cost_per_unit' => 1500, 'quantity' => 0.5]
                        ]
                    ]
                ],
                'funding_sources' => [
                    ['type' => 'equity', 'amount' => 100000000, 'interest_rate' => 0, 'tenor_months' => 0],
                    ['type' => 'loan', 'amount' => 50000000, 'interest_rate' => 12, 'tenor_months' => 24]
                ],
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(3),
            ],
            [
                'business_name' => 'TechStart Solutions',
                'industry' => 'Technology',
                'baseline_units_sold' => 50,
                'projection_years' => 4,
                'yearly_growth_rates' => [1 => 25, 2 => 30, 3 => 20, 4 => 15],
                'fixed_costs' => [
                    ['name' => 'Sewa Kantor', 'amount' => 20000000],
                    ['name' => 'Server & Cloud', 'amount' => 5000000],
                    ['name' => 'Software License', 'amount' => 3000000]
                ],
                'variable_costs' => [
                    ['name' => 'Marketing Digital', 'percentage' => 15],
                    ['name' => 'Komisi Sales', 'percentage' => 10]
                ],
                'employees' => [
                    ['name' => 'CEO', 'salary' => 15000000, 'start_month' => 1, 'end_month' => 48],
                    ['name' => 'Developer Senior', 'salary' => 12000000, 'start_month' => 1, 'end_month' => 48],
                    ['name' => 'Developer Junior', 'salary' => 8000000, 'start_month' => 6, 'end_month' => 48],
                    ['name' => 'Marketing Manager', 'salary' => 10000000, 'start_month' => 3, 'end_month' => 48]
                ],
                'assets' => [
                    ['name' => 'Laptop Development', 'purchase_price' => 30000000, 'purchase_date' => '2024-01-01', 'useful_life_months' => 36],
                    ['name' => 'Server Equipment', 'purchase_price' => 50000000, 'purchase_date' => '2024-01-01', 'useful_life_months' => 60]
                ],
                'products' => [
                    [
                        'name' => 'Aplikasi Mobile UMKM',
                        'selling_price' => 5000000,
                        'packaging_cost' => 0,
                        'direct_labor_cost' => 2000000,
                        'sales_percentage' => 60,
                        'raw_materials' => [
                            ['name' => 'Development Time', 'cost_per_unit' => 3000000, 'quantity' => 1]
                        ]
                    ],
                    [
                        'name' => 'Website E-commerce',
                        'selling_price' => 3000000,
                        'packaging_cost' => 0,
                        'direct_labor_cost' => 1500000,
                        'sales_percentage' => 40,
                        'raw_materials' => [
                            ['name' => 'Development Time', 'cost_per_unit' => 2000000, 'quantity' => 1]
                        ]
                    ]
                ],
                'funding_sources' => [
                    ['type' => 'equity', 'amount' => 200000000, 'interest_rate' => 0, 'tenor_months' => 0],
                    ['type' => 'investment', 'amount' => 100000000, 'interest_rate' => 8, 'tenor_months' => 36]
                ],
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(2),
            ],
            [
                'business_name' => 'EcoFashion Store',
                'industry' => 'Fashion',
                'baseline_units_sold' => 200,
                'projection_years' => 3,
                'yearly_growth_rates' => [1 => 20, 2 => 25, 3 => 18],
                'fixed_costs' => [
                    ['name' => 'Sewa Toko', 'amount' => 12000000],
                    ['name' => 'Listrik & Air', 'amount' => 1500000],
                    ['name' => 'Internet', 'amount' => 300000]
                ],
                'variable_costs' => [
                    ['name' => 'Bahan Baku', 'percentage' => 40],
                    ['name' => 'Marketing', 'percentage' => 8]
                ],
                'employees' => [
                    ['name' => 'Manager', 'salary' => 7000000, 'start_month' => 1, 'end_month' => 36],
                    ['name' => 'Designer', 'salary' => 6000000, 'start_month' => 1, 'end_month' => 36],
                    ['name' => 'Sales Staff', 'salary' => 4000000, 'start_month' => 1, 'end_month' => 36]
                ],
                'assets' => [
                    ['name' => 'Mesin Jahit', 'purchase_price' => 20000000, 'purchase_date' => '2024-01-01', 'useful_life_months' => 60],
                    ['name' => 'Display Rack', 'purchase_price' => 5000000, 'purchase_date' => '2024-01-01', 'useful_life_months' => 48]
                ],
                'products' => [
                    [
                        'name' => 'Dress Eco-Friendly',
                        'selling_price' => 250000,
                        'packaging_cost' => 5000,
                        'direct_labor_cost' => 50000,
                        'sales_percentage' => 50,
                        'raw_materials' => [
                            ['name' => 'Kain Organik', 'cost_per_unit' => 80000, 'quantity' => 1],
                            ['name' => 'Benang Eco', 'cost_per_unit' => 10000, 'quantity' => 0.5]
                        ]
                    ],
                    [
                        'name' => 'T-Shirt Sustainable',
                        'selling_price' => 150000,
                        'packaging_cost' => 3000,
                        'direct_labor_cost' => 30000,
                        'sales_percentage' => 30,
                        'raw_materials' => [
                            ['name' => 'Kain Bamboo', 'cost_per_unit' => 50000, 'quantity' => 1],
                            ['name' => 'Benang Eco', 'cost_per_unit' => 8000, 'quantity' => 0.3]
                        ]
                    ],
                    [
                        'name' => 'Bag Reusable',
                        'selling_price' => 75000,
                        'packaging_cost' => 2000,
                        'direct_labor_cost' => 20000,
                        'sales_percentage' => 20,
                        'raw_materials' => [
                            ['name' => 'Kain Canvas', 'cost_per_unit' => 30000, 'quantity' => 1],
                            ['name' => 'Benang Eco', 'cost_per_unit' => 5000, 'quantity' => 0.2]
                        ]
                    ]
                ],
                'funding_sources' => [
                    ['type' => 'equity', 'amount' => 80000000, 'interest_rate' => 0, 'tenor_months' => 0],
                    ['type' => 'loan', 'amount' => 40000000, 'interest_rate' => 10, 'tenor_months' => 24]
                ],
                'created_at' => Carbon::now()->subDays(1),
                'updated_at' => Carbon::now()->subDays(1),
            ]
        ];

        foreach ($projections as $projectionData) {
            // Extract products data to calculate product distribution
            $products = $projectionData['products'];
            $productDistribution = [];
            
            foreach ($products as $product) {
                $productDistribution[$product['name']] = $product['sales_percentage'];
            }
            
            // Add product_distribution to projection data
            $projectionData['product_distribution'] = $productDistribution;
            
            $projection = Projection::create($projectionData);
            
            // Calculate projections data
            $projectionsData = $this->calculateProjectionsData($projection);
            $projection->update(['projections_data' => $projectionsData]);
        }
    }

    private function calculateProjectionsData($projection)
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
            foreach ($projection->fixed_costs as $cost) {
                $fixedCostsTotal += $cost['amount'];
            }
            
            // Calculate variable costs (percentage of revenue)
            $variableCostsTotal = 0;
            foreach ($projection->variable_costs as $cost) {
                $variableCostsTotal += ($totalRevenue * $cost['percentage'] / 100);
            }
            
            // Calculate payroll
            $payroll = $this->calculatePayroll($projection->employees, $month);
            
            // Calculate depreciation
            $depreciation = $this->calculateDepreciation($projection->assets, $month, $projection->projection_years);
            
            // Calculate interest expense
            $interestExpense = $this->calculateInterestExpense($projection->funding_sources, $month);
            
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
                'revenue' => $totalRevenue,
                'hpp' => $totalHPP,
                'gross_profit' => $grossProfit,
                'fixed_costs' => $fixedCostsTotal,
                'variable_costs' => $variableCostsTotal,
                'payroll' => $payroll,
                'depreciation' => $depreciation,
                'interest_expense' => $interestExpense,
                'total_costs' => $totalCosts,
                'net_profit' => $netProfit,
                'product_breakdown' => $productBreakdown,
            ];
        }
        
        return $projections;
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
                
                if ($currentMonth >= $startMonth && $currentMonth <= $endMonth) {
                    $total += $employee['salary'];
                }
            }
        }
        return $total;
    }

    private function calculateDepreciation($assets, $currentMonth, $projectionYears = null)
    {
        $total = 0;
        if (empty($assets)) {
            return $total;
        }
        
        $totalProjectionMonths = $projectionYears ? $projectionYears * 12 : 60;
        
        foreach ($assets as $asset) {
            $purchasePrice = $asset['purchase_price'];
            $usefulLifeMonths = $asset['useful_life_months'] ?? 60;
            
            $monthlyDepreciation = $purchasePrice / $usefulLifeMonths;
            
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
                
                if ($currentMonth <= $tenorMonths) {
                    $monthlyInterest = $principal * $interestRate / 12;
                    $total += $monthlyInterest;
                }
            }
        }
        
        return $total;
    }
}
