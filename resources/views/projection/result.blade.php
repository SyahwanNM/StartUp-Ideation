<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Financial Projection - {{ $projection->business_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js" onerror="loadFallbackChart()"></script>
    <script>
        function loadFallbackChart() {
            console.log('Primary Chart.js CDN failed, loading fallback...');
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.umd.js';
            script.onload = function() {
                console.log('Fallback Chart.js loaded successfully');
            };
            script.onerror = function() {
                console.error('Both Chart.js CDNs failed');
                document.getElementById('chart-loading').innerHTML = '<p class="text-center text-muted">Gagal memuat Chart.js dari semua CDN. Silakan periksa koneksi internet.</p>';
            };
            document.head.appendChild(script);
        }
    </script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #a5b4fc;
            --secondary: #64748b;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --info: #06b6d4;
            --light: #f8fafc;
            --dark: #1e293b;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
            
            /* Gradient Variables */
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #10b981 0%, #059669 100%);
            --warning-gradient: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            --danger-gradient: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            --info-gradient: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            --secondary-gradient: linear-gradient(135deg, #64748b 0%, #475569 100%);
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --radius: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--gray-50);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--gray-800);
            font-size: 14px;
        }

        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Header Section */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            position: relative;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            font-size: 1.125rem;
            color: var(--gray-600);
            font-weight: 400;
            line-height: 1.6;
        }

        /* Navigation Styles */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: var(--shadow-sm);
            border: none;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-light) !important;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-light) !important;
            font-weight: 600;
        }

        /* Summary Cards */
        .summary-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .summary-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .summary-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .summary-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
        }

        .summary-card.revenue::before { background: var(--success); }
        .summary-card.costs::before { background: var(--warning); }
        .summary-card.profit::before { background: var(--primary); }
        .summary-card.units::before { background: var(--info); }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
            margin-bottom: 1rem;
        }

        .card-title {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--gray-600);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .card-change {
            font-size: 0.875rem;
            font-weight: 500;
        }

        .card-change.positive {
            color: #059669;
        }

        .card-change.negative {
            color: #dc2626;
        }

        .card-change small {
            font-size: 0.75rem;
            opacity: 0.8;
            font-weight: 500;
        }

        /* Data Sections */
        .data-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            transition: var(--transition);
        }

        .data-section:hover {
            box-shadow: var(--card-shadow-hover);
        }

        .data-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .data-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
        }

        /* Tables */
        .table {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .table thead th {
            background: var(--primary-gradient);
            color: white;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            letter-spacing: 0.5px;
            border: none;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .value-cell {
            font-weight: 600;
            text-align: right;
        }

        .value-cell.positive {
            color: #059669;
        }

        .value-cell.negative {
            color: #dc2626;
        }

        /* Product Breakdown */
        .product-breakdown {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .product-card {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            transition: var(--transition);
        }

        .product-card:hover {
            border-color: #667eea;
            background: #f0f9ff;
        }

        .product-name {
            font-size: 1.125rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
        }

        .product-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .product-stat {
            text-align: center;
        }

        .product-stat-label {
            font-size: 0.75rem;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.25rem;
        }

        .product-stat-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
        }

        /* Charts */
        .chart-container {
            position: relative;
            height: 400px;
            margin: 2rem 0;
        }

        /* Chart Controls */
        .form-select {
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            transition: var(--transition);
            background: #fafafa;
        }

        .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            display: block;
        }

        /* Chart Legend */
        .chart-legend {
            background: #f8fafc;
            border-radius: 12px;
            padding: 1rem;
            border: 1px solid #e2e8f0;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .legend-color {
            width: 16px;
            height: 16px;
            border-radius: 4px;
            display: inline-block;
        }

        .legend-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #64748b;
        }

        /* Buttons */
        .btn {
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary-gradient) !important;
            color: white !important;
            border: none !important;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-gradient) !important;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(102, 126, 234, 0.4);
            color: white !important;
        }

        .btn-success {
            background: var(--success-gradient) !important;
            color: white !important;
            border: none !important;
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3);
        }

        .btn-success:hover {
            background: var(--success-gradient) !important;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(79, 172, 254, 0.4);
            color: white !important;
        }

        .btn-info {
            background: var(--info-gradient) !important;
            color: white !important;
            border: none !important;
            box-shadow: 0 8px 25px rgba(168, 237, 234, 0.3);
        }

        .btn-info:hover {
            background: var(--info-gradient) !important;
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(168, 237, 234, 0.4);
            color: white !important;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin: 3rem 0;
            flex-wrap: wrap;
        }

        /* Badges */
        .badge {
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        .bg-success {
            background: var(--success-gradient) !important;
        }

        .bg-warning {
            background: var(--warning-gradient) !important;
        }

        .bg-danger {
            background: var(--danger-gradient) !important;
        }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Print Styles */
        /* Responsive Design */
        @media (max-width: 1200px) {
            .summary-cards {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .data-section {
                padding: 1.5rem;
            }
            
            .table-responsive {
                font-size: 0.875rem;
            }
        }

        @media (max-width: 768px) {
            .summary-cards {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .page-header {
                padding: 1rem 0;
                text-align: center;
            }
            
            .page-title {
                font-size: 1.75rem;
            }
            
            .page-subtitle {
                font-size: 1rem;
            }
            
            .data-section {
                padding: 1rem;
                margin-bottom: 1rem;
            }
            
            .data-title {
                font-size: 1.25rem;
                margin-bottom: 1rem;
            }
            
            .summary-card {
                padding: 1rem;
            }
            
            .card-title {
                font-size: 0.875rem;
            }
            
            .card-value {
                font-size: 1.25rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }
            
            .table-responsive {
                font-size: 0.75rem;
            }
            
            .table th,
            .table td {
                padding: 0.5rem 0.25rem;
            }
            
            .navbar-nav {
                text-align: center;
            }
            
            .navbar-nav .nav-link {
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .main-container {
                padding: 0.5rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .summary-card {
                padding: 0.75rem;
            }
            
            .card-value {
                font-size: 1rem;
            }
            
            .btn {
                padding: 0.625rem 1rem;
                font-size: 0.8rem;
            }
            
            .table th,
            .table td {
                padding: 0.25rem;
                font-size: 0.7rem;
            }
            
            .badge {
                font-size: 0.6rem;
                padding: 0.25rem 0.5rem;
            }
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            
            body {
                font-family: 'Times New Roman', serif !important;
                font-size: 12px !important;
                line-height: 1.4 !important;
                color: #000 !important;
                background: white !important;
            }
            
            .action-buttons, .btn {
                display: none !important;
            }
            
            .page-header {
                text-align: center !important;
                margin-bottom: 2rem !important;
                border-bottom: 3px solid #000 !important;
                padding-bottom: 1rem !important;
            }
            
            .page-title {
                font-size: 20px !important;
                font-weight: bold !important;
                margin-bottom: 0.5rem !important;
                color: #000 !important;
            }
            
            .page-subtitle {
                font-size: 12px !important;
                margin-bottom: 0.25rem !important;
                color: #666 !important;
            }
            
            .data-section {
                margin-bottom: 2rem !important;
                page-break-inside: avoid !important;
            }
            
            .data-title {
                font-size: 16px !important;
                font-weight: bold !important;
                margin-bottom: 1rem !important;
                color: #000 !important;
            }
            
            .table {
                width: 100% !important;
                border-collapse: collapse !important;
            }
            
            .table th, .table td {
                border: 1px solid #000 !important;
                padding: 8px !important;
                text-align: left !important;
            }
            
            .table thead th {
                background: #f0f0f0 !important;
                color: #000 !important;
                font-weight: bold !important;
            }
            
            .value-cell.positive, .value-cell.negative {
                color: #000 !important;
                font-weight: bold !important;
            }
            
            .badge {
                background: #f0f0f0 !important;
                color: #000 !important;
                border: 1px solid #000 !important;
            }
            
            .bg-success {
                background: #d4edda !important;
                color: #000 !important;
            }
            
            .bg-warning {
                background: #fff3cd !important;
                color: #000 !important;
            }
            
            .summary-cards {
                display: none !important;
            }
            
            .chart-container {
                display: none !important;
            }
            
            .fade-in-up {
                animation: none !important;
            }
            
            @page {
                margin: 1in !important;
                size: A4 !important;
            }
            
            .page-break {
                page-break-before: always !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="{{ route('bmc.landing') }}">
                <i class="fas fa-lightbulb me-2"></i>Ideation
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bmc.landing') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bmc.create') }}">BMC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tam-sam-som.create') }}">Market Validation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <!-- Header -->
        <div class="page-header fade-in-up">
            <h1 class="page-title">Hasil Financial Projection</h1>
            <p class="page-subtitle">{{ $projection->business_name }}</p>
        </div>

        <!-- Summary Cards -->
        <div class="summary-cards fade-in-up">
            @php
                $projectionsData = $projection->getProjectionsData();
                
                // Calculate totals for all years
                $totalRevenue = 0;
                $totalUnitsSold = 0;
                $totalCosts = 0;
                $totalNetProfit = 0;
                
                foreach ($projectionsData as $data) {
                    $totalRevenue += $data['revenue'] ?? 0;
                    $totalUnitsSold += $data['units_sold'] ?? 0;
                    $totalCosts += $data['total_costs'] ?? 0;
                    $totalNetProfit += $data['net_profit'] ?? 0;
                }
                
                // Calculate growth rate (comparing first year vs last year)
                $firstYearData = array_slice($projectionsData, 0, 12); // First 12 months
                $lastYearData = array_slice($projectionsData, -12); // Last 12 months
                
                $firstYearRevenue = array_sum(array_column($firstYearData, 'revenue'));
                $lastYearRevenue = array_sum(array_column($lastYearData, 'revenue'));
                $revenueGrowthRate = $firstYearRevenue > 0 ? (($lastYearRevenue - $firstYearRevenue) / $firstYearRevenue) * 100 : 0;
                
                $firstYearUnits = array_sum(array_column($firstYearData, 'units_sold'));
                $lastYearUnits = array_sum(array_column($lastYearData, 'units_sold'));
                $unitsGrowthRate = $firstYearUnits > 0 ? (($lastYearUnits - $firstYearUnits) / $firstYearUnits) * 100 : 0;
            @endphp
            
            <div class="summary-card revenue">
                <div class="card-icon" style="background: var(--success-gradient);">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="card-title">Total Pendapatan</div>
                <div class="card-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                <div class="card-change {{ $revenueGrowthRate >= 0 ? 'positive' : 'negative' }}">
                    <i class="fas fa-arrow-{{ $revenueGrowthRate >= 0 ? 'up' : 'down' }}"></i>
                    Selama {{ $projection->projection_years }} Tahun
                    @if($revenueGrowthRate != 0)
                        <br><small>({{ $revenueGrowthRate >= 0 ? '+' : '' }}{{ number_format($revenueGrowthRate, 1) }}% pertumbuhan)</small>
                    @endif
                </div>
            </div>

            <div class="summary-card units">
                <div class="card-icon" style="background: var(--info-gradient);">
                    <i class="fas fa-boxes"></i>
                </div>
                <div class="card-title">Unit Terjual</div>
                <div class="card-value">{{ number_format($totalUnitsSold, 0, ',', '.') }}</div>
                <div class="card-change {{ $unitsGrowthRate >= 0 ? 'positive' : 'negative' }}">
                    <i class="fas fa-arrow-{{ $unitsGrowthRate >= 0 ? 'up' : 'down' }}"></i>
                    Selama {{ $projection->projection_years }} Tahun
                    @if($unitsGrowthRate != 0)
                        <br><small>({{ $unitsGrowthRate >= 0 ? '+' : '' }}{{ number_format($unitsGrowthRate, 1) }}% pertumbuhan)</small>
                    @endif
                </div>
            </div>

            <div class="summary-card costs">
                <div class="card-icon" style="background: var(--warning-gradient);">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="card-title">Total Biaya</div>
                <div class="card-value">Rp {{ number_format($totalCosts, 0, ',', '.') }}</div>
                <div class="card-change negative">
                    <i class="fas fa-calculator"></i>
                    Selama {{ $projection->projection_years }} Tahun
                    <br><small>(Rp {{ number_format($totalCosts / $projection->projection_years, 0, ',', '.') }} per tahun)</small>
                </div>
            </div>

            <div class="summary-card profit">
                <div class="card-icon" style="background: var(--primary-gradient);">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="card-title">Laba Bersih</div>
                <div class="card-value {{ $totalNetProfit >= 0 ? 'positive' : 'negative' }}">
                    Rp {{ number_format($totalNetProfit, 0, ',', '.') }}
                </div>
                <div class="card-change {{ $totalNetProfit >= 0 ? 'positive' : 'negative' }}">
                    <i class="fas fa-arrow-{{ $totalNetProfit >= 0 ? 'up' : 'down' }}"></i>
                    Selama {{ $projection->projection_years }} Tahun
                    <br><small>(Rp {{ number_format($totalNetProfit / $projection->projection_years, 0, ',', '.') }} per tahun)</small>
                </div>
            </div>

        </div>

        <!-- Business Information -->
        <div class="data-section fade-in-up">
            <h2 class="data-title">
                <div class="data-icon" style="background: var(--primary-gradient);">
                    <i class="fas fa-building"></i>
                </div>
                Informasi Bisnis
            </h2>
            <div class="row">
                <div class="col-md-3">
                    <strong>Nama Bisnis:</strong><br>
                    {{ $projection->business_name }}
                </div>
                <div class="col-md-3">
                    <strong>Unit Awal:</strong><br>
                    {{ number_format($projection->baseline_units_sold, 0, ',', '.') }} unit
                </div>
                <div class="col-md-3">
                    <strong>Durasi Proyeksi:</strong><br>
                    {{ $projection->projection_years }} Tahun
                </div>
                <div class="col-md-3">
                    <strong>Total Produk:</strong><br>
                    {{ $projection->products ? count($projection->products) : 0 }} Produk
                </div>
            </div>
        </div>

        <!-- Products Information -->
        <div class="data-section fade-in-up">
            <h2 class="data-title">
                <div class="data-icon" style="background: var(--secondary-gradient);">
                    <i class="fas fa-box"></i>
                </div>
                Informasi Produk
            </h2>
            <div class="product-breakdown">
                @if($projection->products && count($projection->products) > 0)
                    @foreach($projection->products as $product)
                <div class="product-card">
                    <div class="product-name">{{ $product['name'] }}</div>
                    <div class="product-stats">
                        <div class="product-stat">
                            <div class="product-stat-label">Harga Jual</div>
                            <div class="product-stat-value">Rp {{ number_format($product['selling_price'], 0, ',', '.') }}</div>
                        </div>
                        <div class="product-stat">
                            <div class="product-stat-label">Distribusi</div>
                            <div class="product-stat-value">{{ number_format($product['sales_percentage'], 1) }}%</div>
                        </div>
                        <div class="product-stat">
                            <div class="product-stat-label">HPP per Unit</div>
                            <div class="product-stat-value">
                                @php
                                    $rawMaterialsCost = 0;
                                    if(isset($product['raw_materials'])) {
                                        foreach($product['raw_materials'] as $material) {
                                            $rawMaterialsCost += ($material['cost_per_unit'] ?? 0) * ($material['quantity'] ?? 0);
                                        }
                                    }
                                    $totalHPPPerUnit = $rawMaterialsCost + ($product['packaging_cost'] ?? 0) + ($product['direct_labor_cost'] ?? 0);
                                @endphp
                                Rp {{ number_format($totalHPPPerUnit, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="product-stat">
                            <div class="product-stat-label">Margin</div>
                            <div class="product-stat-value positive">
                                {{ number_format(($product['selling_price'] - $totalHPPPerUnit) / $product['selling_price'] * 100, 1) }}%
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <small class="text-muted">
                            <strong>Komponen HPP:</strong><br>
                            @if(isset($product['raw_materials']) && count($product['raw_materials']) > 0)
                                <i class="fas fa-cube me-1"></i>Bahan Baku: Rp {{ number_format($rawMaterialsCost, 0, ',', '.') }}<br>
                            @endif
                            @if($product['packaging_cost'] ?? 0)
                                <i class="fas fa-box me-1"></i>Kemasan: Rp {{ number_format($product['packaging_cost'], 0, ',', '.') }}<br>
                            @endif
                            @if($product['direct_labor_cost'] ?? 0)
                                <i class="fas fa-user me-1"></i>Tenaga Kerja: Rp {{ number_format($product['direct_labor_cost'], 0, ',', '.') }}<br>
                            @endif
                            <strong>Total HPP: Rp {{ number_format($totalHPPPerUnit, 0, ',', '.') }}</strong>
                        </small>
                    </div>
                    </div>
                </div>
                    @endforeach
                @else
                    <div class="text-center text-muted">
                        <i class="fas fa-box-open fa-3x mb-3"></i>
                        <p>Tidak ada data produk tersedia</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Monthly Projection Table -->
        <div class="data-section fade-in-up">
            <h2 class="data-title">
                <div class="data-icon" style="background: var(--success-gradient);">
                    <i class="fas fa-chart-bar"></i>
                </div>
                Proyeksi Bulanan
            </h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Unit Terjual</th>
                            <th>Pendapatan</th>
                            <th>HPP</th>
                            <th>Laba Kotor</th>
                            <th>Biaya Tetap</th>
                            <th>Biaya Variabel</th>
                            <th>Gaji</th>
                            <th>Depresiasi</th>
                            <th>Bunga</th>
                            <th>Total Biaya</th>
                            <th>Laba Bersih</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projectionsData as $data)
                        <tr>
                            <td><strong>Bulan {{ $data['month'] }}</strong></td>
                            <td><span class="badge bg-primary">Tahun {{ $data['year'] }}</span></td>
                            <td class="value-cell">{{ number_format($data['units_sold'], 0, ',', '.') }}</td>
                            <td class="value-cell positive">Rp {{ number_format($data['revenue'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['hpp'], 0, ',', '.') }}</td>
                            <td class="value-cell {{ $data['gross_profit'] >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($data['gross_profit'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['fixed_costs'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['variable_costs'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['payroll'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['depreciation'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['interest_expense'], 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($data['total_costs'], 0, ',', '.') }}</td>
                            <td class="value-cell {{ isset($data['net_profit']) && $data['net_profit'] >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($data['net_profit'] ?? 0, 0, ',', '.') }}</td>
                            <td class="text-center">
                                @php
                                    $netProfit = $data['net_profit'] ?? 0;
                                @endphp
                                @if($netProfit > 0)
                                    <span class="badge bg-success">
                                        <i class="fas fa-arrow-up me-1"></i>Untung
                                    </span>
                                @elseif($netProfit < 0)
                                    <span class="badge bg-danger">
                                        <i class="fas fa-arrow-down me-1"></i>Rugi
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        <i class="fas fa-minus me-1"></i>Break Even
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Charts -->
        <div class="data-section fade-in-up">
            <h2 class="data-title">
                <div class="data-icon" style="background: var(--info-gradient);">
                    <i class="fas fa-chart-pie"></i>
                </div>
                Grafik Proyeksi
            </h2>
            
            <!-- Chart Controls -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="yearFilter" class="form-label">
                        <i class="fas fa-filter me-2"></i>Filter Tahun
                    </label>
                    <select id="yearFilter" class="form-select">
                        <option value="all">Semua Tahun</option>
                        @for($year = 1; $year <= $projection->projection_years; $year++)
                            <option value="{{ $year }}">Tahun {{ $year }}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="chartType" class="form-label">
                        <i class="fas fa-chart-line me-2"></i>Tipe Grafik
                    </label>
                    <select id="chartType" class="form-select">
                        <option value="line">Garis</option>
                        <option value="bar">Bar</option>
                        <option value="area">Area</option>
                    </select>
                </div>
            </div>
            
            <!-- Chart Legend -->
            <div class="row mb-3">
                <div class="col-12">
                    <div class="chart-legend d-flex flex-wrap gap-3 justify-content-center">
                        <div class="legend-item">
                            <span class="legend-color" style="background-color: #4facfe;"></span>
                            <span class="legend-label">Pendapatan</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color" style="background-color: #43e97b;"></span>
                            <span class="legend-label">Total Biaya</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color" style="background-color: #667eea;"></span>
                            <span class="legend-label">Laba Bersih</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="chart-container">
                <div id="chart-loading" class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2 text-muted">Memuat grafik...</p>
                </div>
                <canvas id="projectionChart" style="display: none;"></canvas>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons fade-in-up">
            <a href="{{ route('projection.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Buat Proyeksi Baru
            </a>
            <a href="{{ route('projection.export', $projection->id) }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i>
                Download Excel
            </a>
            <button onclick="printProjection()" class="btn btn-primary">
                <i class="fas fa-print"></i>
                Print Laporan
            </button>
        </div>
    </div>

    <script>
        // Wait for DOM and Chart.js to be ready
        document.addEventListener('DOMContentLoaded', function() {
            let retryCount = 0;
            const maxRetries = 50; // 5 seconds max
            
            // Check if Chart.js is loaded, if not wait and retry
            function waitForChart() {
                if (typeof Chart !== 'undefined') {
                    console.log('Chart.js is loaded, initializing chart...');
                    initializeChart();
                } else if (retryCount < maxRetries) {
                    retryCount++;
                    console.log(`Chart.js not loaded yet, retrying... (${retryCount}/${maxRetries})`);
                    setTimeout(waitForChart, 100);
                } else {
                    console.error('Chart.js failed to load after maximum retries');
                    showSimpleChart();
                }
            }
            waitForChart();
        });
        
        // Global variables
        let chartInstance = null;
        let allProjectionData = @json($projectionsData);
        
        function initializeChart() {
            console.log('initializeChart function called');
            console.log('Chart object available:', typeof Chart);
            
            console.log('All projection data:', allProjectionData);
            console.log('Projection data length:', allProjectionData ? allProjectionData.length : 'undefined');
            
            // Hide loading and show chart
            const loadingEl = document.getElementById('chart-loading');
            const chartEl = document.getElementById('projectionChart');
            
            if (loadingEl) {
                loadingEl.style.display = 'none';
                console.log('Loading element hidden');
            } else {
                console.error('Loading element not found');
            }
            
            if (chartEl) {
                chartEl.style.display = 'block';
                console.log('Chart element shown');
            } else {
                console.error('Chart element not found');
            }
            
            // Check if data exists
            if (!allProjectionData || allProjectionData.length === 0) {
                console.error('No projection data available');
                if (chartEl) {
                    chartEl.innerHTML = '<p class="text-center text-muted">Tidak ada data proyeksi yang tersedia</p>';
                }
                return;
            }
            
            // Setup event listeners
            setupChartControls();
            
            // Create initial chart
            createChart();
        }
        
        function setupChartControls() {
            const yearFilter = document.getElementById('yearFilter');
            const chartType = document.getElementById('chartType');
            
            if (yearFilter) {
                yearFilter.addEventListener('change', function() {
                    console.log('Year filter changed to:', this.value);
                    createChart();
                });
            }
            
            if (chartType) {
                chartType.addEventListener('change', function() {
                    console.log('Chart type changed to:', this.value);
                    createChart();
                });
            }
        }
        
        function getFilteredData() {
            const selectedYear = document.getElementById('yearFilter').value;
            let filteredData = allProjectionData;
            
            if (selectedYear !== 'all') {
                const year = parseInt(selectedYear);
                filteredData = allProjectionData.filter(data => data.year === year);
            }
            
            console.log('Filtered data for year', selectedYear, ':', filteredData);
            return filteredData;
        }
        
        function createChart() {
            const projectionData = getFilteredData();
            const chartType = document.getElementById('chartType').value;
        
        // Prepare chart data
        const months = projectionData.map(data => `Bulan ${data.month}`);
            const revenue = projectionData.map(data => parseFloat(data.revenue) || 0);
            const costs = projectionData.map(data => parseFloat(data.total_costs) || 0);
            const profit = projectionData.map(data => parseFloat(data.net_profit) || 0);
            const units = projectionData.map(data => parseInt(data.units_sold) || 0);
            
            console.log('Chart data prepared:', {
                months: months,
                revenue: revenue,
                costs: costs,
                profit: profit,
                units: units
            });

            // Check if Chart.js is available
            if (typeof Chart === 'undefined') {
                console.error('Chart.js is not loaded');
                document.getElementById('projectionChart').innerHTML = '<p class="text-center text-muted">Chart.js tidak tersedia. Silakan refresh halaman.</p>';
                return;
            }
            
            // Destroy existing chart if it exists
            if (chartInstance) {
                chartInstance.destroy();
            }

        // Create chart
        const ctx = document.getElementById('projectionChart').getContext('2d');
            
            try {
                // Determine chart configuration based on type
                const chartConfig = getChartConfig(chartType, months, revenue, costs, profit);
                
                chartInstance = new Chart(ctx, chartConfig);
                
                console.log('Chart created successfully:', chartInstance);
            } catch (error) {
                console.error('Error creating chart:', error);
                document.getElementById('projectionChart').innerHTML = `
                    <div class="text-center py-5">
                        <i class="fas fa-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                        <h5 class="mt-3">Grafik tidak dapat ditampilkan</h5>
                        <p class="text-muted">Terjadi kesalahan saat memuat grafik. Silakan refresh halaman atau coba lagi.</p>
                        <button onclick="location.reload()" class="btn btn-primary btn-sm">
                            <i class="fas fa-refresh"></i> Refresh Halaman
                        </button>
                    </div>
                `;
            }
        }
        
        function getChartConfig(chartType, months, revenue, costs, profit) {
            // Base dataset configuration
            const datasets = [
                    {
                        label: 'Pendapatan',
                        data: revenue,
                        borderColor: '#4facfe',
                        backgroundColor: 'rgba(79, 172, 254, 0.1)',
                        tension: 0.4,
                    fill: chartType === 'area',
                    pointRadius: 4,
                    pointHoverRadius: 6
                    },
                    {
                        label: 'Total Biaya',
                        data: costs,
                        borderColor: '#43e97b',
                        backgroundColor: 'rgba(67, 233, 123, 0.1)',
                        tension: 0.4,
                    fill: chartType === 'area',
                    pointRadius: 4,
                    pointHoverRadius: 6
                    },
                    {
                        label: 'Laba Bersih',
                        data: profit,
                        borderColor: '#667eea',
                        backgroundColor: 'rgba(102, 126, 234, 0.1)',
                        tension: 0.4,
                    fill: chartType === 'area',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }
            ];
            
            // Adjust configuration based on chart type
            if (chartType === 'bar') {
                datasets.forEach(dataset => {
                    dataset.tension = 0;
                    dataset.pointRadius = 0;
                    dataset.pointHoverRadius = 0;
                    dataset.fill = false;
                });
            }
            
            return {
                type: chartType,
                data: {
                    labels: months,
                    datasets: datasets
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                    interaction: {
                        intersect: false,
                        mode: 'index'
                    },
                plugins: {
                    title: {
                        display: true,
                        text: 'Financial Projection Bulanan',
                        font: {
                            size: 16,
                            weight: 'bold'
                            },
                            color: '#1e293b'
                    },
                    legend: {
                            display: false // We have custom legend
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleColor: 'white',
                            bodyColor: 'white',
                            borderColor: 'rgba(255, 255, 255, 0.1)',
                            borderWidth: 1,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += 'Rp ' + context.parsed.y.toLocaleString('id-ID');
                                    return label;
                                }
                            }
                    }
                },
                scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Bulan',
                                color: '#64748b'
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Nilai (Rupiah)',
                                color: '#64748b'
                            },
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                                },
                                color: '#64748b'
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeInOutQuart'
                    }
                }
            };
        }
        
        function showSimpleChart() {
            console.log('Showing simple chart fallback');
            const projectionData = @json($projectionsData);
            
            if (!projectionData || projectionData.length === 0) {
                document.getElementById('chart-loading').innerHTML = '<p class="text-center text-muted">Tidak ada data proyeksi yang tersedia</p>';
                return;
            }
            
            // Hide loading
            document.getElementById('chart-loading').style.display = 'none';
            document.getElementById('projectionChart').style.display = 'block';
            
            // Create simple HTML table as chart alternative
            let tableHTML = `
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Bulan</th>
                                <th>Pendapatan</th>
                                <th>Total Biaya</th>
                                <th>Laba Bersih</th>
                            </tr>
                        </thead>
                        <tbody>
            `;
            
            projectionData.forEach(data => {
                const revenue = parseFloat(data.revenue) || 0;
                const costs = parseFloat(data.total_costs) || 0;
                const profit = parseFloat(data.net_profit) || 0;
                
                tableHTML += `
                    <tr>
                        <td><strong>Bulan ${data.month}</strong></td>
                        <td class="text-success">Rp ${revenue.toLocaleString('id-ID')}</td>
                        <td class="text-warning">Rp ${costs.toLocaleString('id-ID')}</td>
                        <td class="${profit >= 0 ? 'text-success' : 'text-danger'}">Rp ${profit.toLocaleString('id-ID')}</td>
                    </tr>
                `;
            });
            
            tableHTML += `
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <small class="text-muted">Grafik interaktif tidak tersedia. Data ditampilkan dalam bentuk tabel.</small>
                </div>
            `;
            
            document.getElementById('projectionChart').innerHTML = tableHTML;
        }

        // Print function
        function printProjection() {
            window.print();
        }
    </script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
