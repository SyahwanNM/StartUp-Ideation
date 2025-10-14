<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Color;

class ProfessionalProjectionExport implements WithMultipleSheets
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function sheets(): array
    {
        return [
            'Deskripsi Usaha' => new BusinessDescriptionSheet($this->projection),
            'Sumber Permodalan' => new FundingSourceSheet($this->projection),
            'Asset' => new AssetSheet($this->projection),
            'Produk' => new ProductSheet($this->projection),
            'HPP' => new HPPSheet($this->projection),
            'Fixed Cost' => new FixedCostSheet($this->projection),
            'Variable Cost' => new VariableCostSheet($this->projection),
            'Proyeksi Bulanan' => new MonthlyProjectionSheet($this->projection),
            'Ringkasan Tahunan' => new YearlySummarySheet($this->projection),
        ];
    }
}

class BusinessDescriptionSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        return [
            ['1', 'Nama Usaha', $this->projection->business_name, '', '3', 'Domisili', 'Bandung', '', '6', 'Nama Direktur', '', 'Amalia'],
            ['2', 'Deskripsi Usaha', 'Bakery & Cafe "Sweet Dreams"', '', '4', 'Cakupan', 'Nasional', '', '7', 'Jumlah Karyawan', '', count($this->projection->employees)],
            ['', '', '', '', '5', 'Model Usaha', 'B2C', '', '8', 'Link Website', '', ''],
        ];
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 20, 'C' => 30, 'D' => 5, 'E' => 5, 'F' => 15, 'G' => 15, 'H' => 5, 'I' => 5, 'J' => 15, 'K' => 5, 'L' => 15
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '1. DESKRIPSI USAHA');
                $sheet->mergeCells('A1:L1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '2E86AB']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $sheet->getStyle('A3:L5')->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                $sheet->getRowDimension(1)->setRowHeight(25);
                $sheet->getRowDimension(3)->setRowHeight(20);
                $sheet->getRowDimension(4)->setRowHeight(20);
                $sheet->getRowDimension(5)->setRowHeight(20);
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class FundingSourceSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $result = [];
        $equityTotal = 0;
        $loanTotal = 0;
        $investmentTotal = 0;
        
        foreach ($this->projection->funding_sources as $index => $source) {
            if ($source['type'] == 'equity') {
                $equityTotal += $source['amount'];
            } elseif ($source['type'] == 'loan') {
                $loanTotal += $source['amount'];
            } else {
                $investmentTotal += $source['amount'];
            }
        }
        
        $result[] = ['1', 'Modal Awal Pendiri', 'IDR ' . number_format($equityTotal, 0, ',', '.'), 'Mandiri', 'IDR ' . number_format($equityTotal, 0, ',', '.'), '', 'Target proyeksi (bulan)', '', '', '', '', $this->projection->projection_years * 12];
        $result[] = ['', '', '', 'Team', '', '', 'Transaksi bulan 1', '', '', '', '', '50'];
        
        $result[] = ['2', 'Pinjaman Modal', 'IDR ' . number_format($loanTotal, 0, ',', '.'), 'Investor', 'IDR ' . number_format($loanTotal, 0, ',', '.'), '', 'Pertumbuhan tahun 1', '', '', '', '', ($this->projection->yearly_growth_rates[1] ?? 0) . '%'];
        $result[] = ['3', 'Investasi Pihak Luar', 'IDR ' . number_format($investmentTotal, 0, ',', '.'), '', 'IDR ' . number_format($investmentTotal, 0, ',', '.'), '', 'Pertumbuhan tahun 2', '', '', '', '', ($this->projection->yearly_growth_rates[2] ?? 0) . '%'];
        $result[] = ['', '', '', '', '', '', 'Pertumbuhan tahun 3', '', '', '', '', ($this->projection->yearly_growth_rates[3] ?? 0) . '%'];
        
        return $result;
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 20, 'C' => 20, 'D' => 15, 'E' => 20, 'F' => 5, 'G' => 20, 'H' => 5, 'I' => 5, 'J' => 5, 'K' => 5, 'L' => 15
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add titles
                $sheet->setCellValue('A1', '2. SUMBER PERMODALAN');
                $sheet->mergeCells('A1:E1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'A23B72']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                $sheet->setCellValue('G1', '3. TARGET USAHA');
                $sheet->mergeCells('G1:L1');
                $sheet->getStyle('G1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'F18F01']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $sheet->getStyle('A3:L7')->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                for ($i = 1; $i <= 7; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class AssetSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $result = [];
        $totalAssets = 0;
        $totalDepreciation = 0;
        
        foreach ($this->projection->assets as $index => $asset) {
            $usefulLifeMonths = $asset['useful_life_months'] ?? 60; // Default 5 years
            $monthlyDepreciation = $asset['purchase_price'] / $usefulLifeMonths;
            $totalAssets += $asset['purchase_price'];
            $totalDepreciation += $monthlyDepreciation;
            
            $result[] = [
                $index + 1,
                'Pembelian Peralatan',
                $asset['name'],
                'IDR ' . number_format($asset['purchase_price'], 0, ',', '.'),
                'IDR ' . number_format($asset['purchase_price'], 0, ',', '.'),
                '',
                '',
                '',
                '',
                '',
                '',
                ''
            ];
        }
        
        $result[] = ['', '', '', '', '', '', '', '', '', '', '', ''];
        $result[] = ['2', 'Depresiasi Asset', $this->projection->projection_years * 12, 'Bulan', 'IDR ' . number_format($totalDepreciation, 0, ',', '.'), '', '', '', '', '', '', ''];
        
        return $result;
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 20, 'C' => 25, 'D' => 20, 'E' => 20, 'F' => 5, 'G' => 5, 'H' => 5, 'I' => 5, 'J' => 5, 'K' => 5, 'L' => 5
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '4. ASSET');
                $sheet->mergeCells('A1:L1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '2D5016']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:L' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class ProductSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $result = [];
        $totalSales = 0;
        
        $result[] = ['Nama Produk', '', 'Harga Jual', 'Total Penjualan', 'Persentase Keuntungan', '', '', '', '', '', '', ''];
        
        // Get product data from projections_data
        $projectionsData = $this->projection->getProjectionsData();
        $firstMonthData = $projectionsData[0] ?? null;
        
        if ($firstMonthData && isset($firstMonthData['product_breakdown'])) {
            foreach ($firstMonthData['product_breakdown'] as $index => $product) {
                $sellingPrice = $product['revenue'] / $product['units_sold'];
                $margin = $product['gross_profit_margin'];
                $monthlySales = $product['revenue'];
                $totalSales += $monthlySales;
                
                $result[] = [
                    $index + 1,
                    $product['product_name'],
                    'IDR ' . number_format($sellingPrice, 0, ',', '.'),
                    'IDR ' . number_format($monthlySales, 0, ',', '.'),
                    number_format($margin, 0) . '%',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    ''
                ];
            }
        } else {
            // Fallback if no product data
            $result[] = [
                1,
                'Product A',
                'IDR 50,000',
                'IDR 5,000,000',
                '50%',
                '',
                '',
                '',
                '',
                '',
                '',
                ''
            ];
            $totalSales = 5000000;
        }
        
        $result[] = ['', '', '', '', '', '', '', '', '', '', '', ''];
        $result[] = ['Total Penjualan Bulan 1', '', '', 'IDR ' . number_format($totalSales, 0, ',', '.'), '', '', '', '', '', '', '', ''];
        
        return $result;
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 25, 'C' => 20, 'D' => 20, 'E' => 20, 'F' => 5, 'G' => 5, 'H' => 5, 'I' => 5, 'J' => 5, 'K' => 5, 'L' => 5
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '5. PRODUK');
                $sheet->mergeCells('A1:L1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '8B4513']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:L' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class HPPSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $result = [];
        
        $result[] = ['6. HARGA POKOK PENJUALAN', '', '', '', '', '', '', '', '', '', '', ''];
        
        // Get product data from projections_data
        $projectionsData = $this->projection->getProjectionsData();
        $firstMonthData = $projectionsData[0] ?? null;
        
        if ($firstMonthData && isset($firstMonthData['product_breakdown'])) {
            foreach ($firstMonthData['product_breakdown'] as $index => $product) {
                $result[] = [$product['product_name'], 'Bahan Baku', '', '', '', '', '', '', '', '', '', ''];
                
                $hpp = $product['hpp'];
                $unitsSold = $product['units_sold'];
                $costPerUnit = $hpp / $unitsSold;
                
                $result[] = [
                    '',
                    '',
                    'Bahan Baku Utama',
                    '',
                    'IDR ' . number_format($costPerUnit, 0, ',', '.'),
                    'IDR ' . number_format($hpp, 0, ',', '.'),
                    'Persentase Kuantitas',
                    'Total Kuantitas'
                ];
                
                $result[] = ['', '', 'Kemasan', '', '', 'IDR 500', '', ''];
                $result[] = ['', '', 'Tenaga Kerja Langsung', '', '', 'IDR 2,000', '', ''];
                $result[] = ['', '', 'Total HPP', '', '', 'IDR ' . number_format($hpp + 2500, 0, ',', '.'), number_format($unitsSold, 0), ''];
                $result[] = ['', '', '', '', '', '', '', ''];
            }
        } else {
            // Fallback if no product data
            $result[] = ['Product A', 'Bahan Baku', '', '', '', '', '', '', '', '', '', ''];
            $result[] = ['', '', 'Bahan Baku Utama', '', 'IDR 25,000', 'IDR 2,500,000', 'Persentase Kuantitas', '100'];
            $result[] = ['', '', 'Kemasan', '', '', 'IDR 500', '', ''];
            $result[] = ['', '', 'Tenaga Kerja Langsung', '', '', 'IDR 2,000', '', ''];
            $result[] = ['', '', 'Total HPP', '', '', 'IDR 2,502,500', '100', ''];
            $result[] = ['', '', '', '', '', '', '', ''];
        }
        
        return $result;
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 25, 'B' => 15, 'C' => 20, 'D' => 5, 'E' => 20, 'F' => 20, 'G' => 20, 'H' => 15
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '6. HARGA POKOK PENJUALAN');
                $sheet->mergeCells('A1:H1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'DC143C']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:H' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class FixedCostSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $result = [];
        $totalFixedCosts = 0;
        
        $result[] = ['7. FIX COST', '', '', '', '', '', '', '', '', '', '', ''];
        
        foreach ($this->projection->fixed_costs as $index => $cost) {
            $totalFixedCosts += $cost['amount'];
            $result[] = [
                $index + 1,
                $cost['name'],
                '',
                '',
                'IDR ' . number_format($cost['amount'], 0, ',', '.'),
                '',
                '',
                '',
                '',
                '',
                '',
                ''
            ];
        }
        
        $result[] = ['', '', '', '', '', '', '', '', '', '', '', ''];
        $result[] = ['TOTAL FIX COST', '', '', '', 'IDR ' . number_format($totalFixedCosts, 0, ',', '.'), '', '', '', '', '', '', ''];
        
        return $result;
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 30, 'C' => 5, 'D' => 5, 'E' => 20, 'F' => 5, 'G' => 5, 'H' => 5, 'I' => 5, 'J' => 5, 'K' => 5, 'L' => 5
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '7. FIX COST');
                $sheet->mergeCells('A1:L1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FF6347']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:L' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class VariableCostSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $result = [];
        $totalVariableCosts = 0;
        
        $result[] = ['8. VARIABLE COST', '', '', '', '', '', '', '', '', '', '', ''];
        
        foreach ($this->projection->variable_costs as $index => $cost) {
            $totalVariableCosts += $cost['percentage'];
            $result[] = [
                $index + 1,
                $cost['name'],
                '',
                '',
                $cost['percentage'] . '%',
                '',
                '',
                '',
                '',
                '',
                '',
                ''
            ];
        }
        
        $result[] = ['', '', '', '', '', '', '', '', '', '', '', ''];
        $result[] = ['TOTAL VARIABLE COST', '', '', '', $totalVariableCosts . '%', '', '', '', '', '', '', ''];
        
        return $result;
    }

    public function headings(): array
    {
        return ['', '', '', '', '', '', '', '', '', '', '', ''];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5, 'B' => 30, 'C' => 5, 'D' => 5, 'E' => 15, 'F' => 5, 'G' => 5, 'H' => 5, 'I' => 5, 'J' => 5, 'K' => 5, 'L' => 5
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '8. VARIABLE COST');
                $sheet->mergeCells('A1:L1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '32CD32']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Style data rows
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:L' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class MonthlyProjectionSheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $projections = $this->projection->getProjectionsData();
        $result = [];
        
        $result[] = ['Bulan', 'Tahun', 'Pendapatan', 'Biaya Tetap', 'Biaya Variabel', 'Payroll', 'Depresiasi', 'Bunga Pinjaman', 'Total Biaya', 'Profit', 'Profit Margin', 'Kumulatif Profit'];
        
        $cumulativeProfit = 0;
        foreach ($projections as $month => $data) {
            $profit = $data['net_profit'] ?? $data['profit'] ?? 0;
            $cumulativeProfit += $profit;
            $profitMargin = ($profit / $data['revenue']) * 100;
            
            $result[] = [
                $data['month'],
                $data['year'],
                'IDR ' . number_format($data['revenue'], 0, ',', '.'),
                'IDR ' . number_format($data['fixed_costs'], 0, ',', '.'),
                'IDR ' . number_format($data['variable_costs'], 0, ',', '.'),
                'IDR ' . number_format($data['payroll'], 0, ',', '.'),
                'IDR ' . number_format($data['depreciation'], 0, ',', '.'),
                'IDR ' . number_format($data['interest_expense'], 0, ',', '.'),
                'IDR ' . number_format($data['total_costs'], 0, ',', '.'),
                'IDR ' . number_format($profit, 0, ',', '.'),
                number_format($profitMargin, 2) . '%',
                'IDR ' . number_format($cumulativeProfit, 0, ',', '.')
            ];
        }
        
        return $result;
    }

    public function headings(): array
    {
        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8, 'B' => 8, 'C' => 20, 'D' => 20, 'E' => 20, 'F' => 20, 'G' => 20, 'H' => 20, 'I' => 20, 'J' => 20, 'K' => 15, 'L' => 20
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '9. PROYEKSI BULANAN');
                $sheet->mergeCells('A1:L1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4B0082']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Header styling
                $sheet->getStyle('A2:L2')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '6A5ACD']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => '000000']]]
                ]);
                
                // Data styling
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:L' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Color code profit cells
                for ($i = 3; $i <= $highestRow; $i++) {
                    $profitCell = 'J' . $i;
                    $profitValue = $sheet->getCell($profitCell)->getValue();
                    
                    if (strpos($profitValue, '-') !== false) {
                        $sheet->getStyle($profitCell)->applyFromArray([
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFB6C1']]
                        ]);
                    } else {
                        $sheet->getStyle($profitCell)->applyFromArray([
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '90EE90']]
                        ]);
                    }
                }
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}

class YearlySummarySheet implements FromArray, WithHeadings, WithStyles, WithColumnWidths, WithEvents
{
    protected $projection;

    public function __construct($projection)
    {
        $this->projection = $projection;
    }

    public function array(): array
    {
        $projections = $this->projection->getProjectionsData();
        $result = [];
        
        $result[] = ['Tahun', 'Total Pendapatan', 'Total Biaya', 'Total Profit', 'Rata-rata Bulanan', 'Profit Margin', 'Status'];
        
        $yearlyData = [];
        $currentYear = 1;
        $yearRevenue = 0;
        $yearCosts = 0;
        $yearProfit = 0;

        foreach ($projections as $month => $data) {
            if ($data['year'] != $currentYear) {
                if ($currentYear > 0) {
                    $yearlyData[] = [
                        $currentYear,
                        'IDR ' . number_format($yearRevenue, 0, ',', '.'),
                        'IDR ' . number_format($yearCosts, 0, ',', '.'),
                        'IDR ' . number_format($yearProfit, 0, ',', '.'),
                        'IDR ' . number_format($yearProfit / 12, 0, ',', '.'),
                        number_format(($yearProfit / $yearRevenue) * 100, 2) . '%',
                        $yearProfit >= 0 ? 'Profitable' : 'Loss'
                    ];
                }
                
                $currentYear = $data['year'];
                $yearRevenue = 0;
                $yearCosts = 0;
                $yearProfit = 0;
            }
            
            $yearRevenue += $data['revenue'];
            $yearCosts += $data['total_costs'];
            $profit = $data['net_profit'] ?? $data['profit'] ?? 0;
            $yearProfit += $profit;
        }

        // Last year
        $yearlyData[] = [
            $currentYear,
            'IDR ' . number_format($yearRevenue, 0, ',', '.'),
            'IDR ' . number_format($yearCosts, 0, ',', '.'),
            'IDR ' . number_format($yearProfit, 0, ',', '.'),
            'IDR ' . number_format($yearProfit / 12, 0, ',', '.'),
            number_format(($yearProfit / $yearRevenue) * 100, 2) . '%',
            $yearProfit >= 0 ? 'Profitable' : 'Loss'
        ];
        
        return array_merge($result, $yearlyData);
    }

    public function headings(): array
    {
        return [];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 8, 'B' => 25, 'C' => 25, 'D' => 25, 'E' => 25, 'F' => 15, 'G' => 15
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                
                // Add title
                $sheet->setCellValue('A1', '10. RINGKASAN TAHUNAN');
                $sheet->mergeCells('A1:G1');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '2F4F4F']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Header styling
                $sheet->getStyle('A2:G2')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12, 'color' => ['rgb' => 'FFFFFF']],
                    'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '708090']],
                    'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER],
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => '000000']]]
                ]);
                
                // Data styling
                $highestRow = $sheet->getHighestRow();
                $sheet->getStyle('A3:G' . $highestRow)->applyFromArray([
                    'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN, 'color' => ['rgb' => 'CCCCCC']]],
                    'alignment' => ['vertical' => Alignment::VERTICAL_CENTER]
                ]);
                
                // Color code status cells
                for ($i = 3; $i <= $highestRow; $i++) {
                    $statusCell = 'G' . $i;
                    $statusValue = $sheet->getCell($statusCell)->getValue();
                    
                    if ($statusValue === 'Profitable') {
                        $sheet->getStyle($statusCell)->applyFromArray([
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '90EE90']]
                        ]);
                    } else {
                        $sheet->getStyle($statusCell)->applyFromArray([
                            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => 'FFB6C1']]
                        ]);
                    }
                }
                
                // Set row height
                for ($i = 1; $i <= $highestRow; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(20);
                }
            }
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [];
    }
}
