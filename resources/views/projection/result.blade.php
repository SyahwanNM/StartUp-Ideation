<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Proyeksi Keuangan - {{ $projection->business_name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --info-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --card-shadow: 0 20px 40px rgba(0,0,0,0.1);
            --card-shadow-hover: 0 30px 60px rgba(0,0,0,0.15);
            --border-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #2d3748;
        }

        .main-container {
            max-width: 1600px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Header Section */
        .page-header {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 120px;
            background: var(--primary-gradient);
            border-radius: 50%;
            opacity: 0.1;
            z-index: -1;
        }

        .page-title {
            font-size: 3.5rem;
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .page-subtitle {
            font-size: 1.25rem;
            color: #64748b;
            max-width: 700px;
            margin: 0 auto 2rem;
            font-weight: 400;
        }

        .business-info {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }

        .business-details {
            margin-bottom: 2rem;
        }

        .detail-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--card-shadow);
            height: 100%;
            border-left: 4px solid #667eea;
        }

        .detail-card h5 {
            color: #2d3748;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .detail-content {
            max-height: 200px;
            overflow-y: auto;
        }

        .detail-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .business-name {
            font-size: 2rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .business-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 3rem;
        }

        .btn {
            border-radius: 12px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-success {
            background: var(--success-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
            color: white;
        }

        .btn-warning {
            background: var(--warning-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(67, 233, 123, 0.4);
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
            color: white;
        }


        /* Summary Cards */
        .summary-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .summary-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .summary-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .summary-card.revenue::before { background: var(--success-gradient); }
        .summary-card.cost::before { background: var(--danger-gradient); }
        .summary-card.profit::before { background: var(--warning-gradient); }
        .summary-card.growth::before { background: var(--info-gradient); }

        .summary-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
        }

        .summary-value {
            font-size: 2rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 0.5rem;
            line-height: 1;
        }

        .summary-label {
            font-size: 1rem;
            color: #64748b;
            font-weight: 500;
        }

        .summary-change {
            font-size: 0.875rem;
            margin-top: 0.5rem;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
        }

        .summary-change.positive {
            background: rgba(67, 233, 123, 0.1);
            color: #059669;
        }

        .summary-change.negative {
            background: rgba(250, 112, 154, 0.1);
            color: #dc2626;
        }

        /* Chart Section */
        .chart-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }

        .chart-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .chart-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a202c;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .chart-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--primary-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .chart-container {
            position: relative;
            height: 400px;
            margin-bottom: 2rem;
        }

        .chart-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .chart-tab {
            padding: 0.75rem 1.5rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            background: white;
            color: #64748b;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .chart-tab.active {
            background: var(--primary-gradient);
            color: white;
            border-color: transparent;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .chart-tab:hover:not(.active) {
            border-color: #667eea;
            color: #667eea;
        }

        /* Data Table */
        .data-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }

        .data-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .data-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a202c;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .data-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: var(--success-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .table-container {
            overflow-x: auto;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .table {
            margin-bottom: 0;
            background: white;
        }

        .table thead th {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 1.25rem 1rem;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 1.25rem 1rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
            font-weight: 500;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .value-cell {
            font-weight: 600;
            color: #1a202c;
        }

        .value-cell.positive {
            color: #059669;
        }

        .value-cell.negative {
            color: #dc2626;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
        }

        .badge.bg-success {
            background: var(--success-gradient) !important;
        }

        .badge.bg-warning {
            background: var(--warning-gradient) !important;
        }

        .badge.bg-info {
            background: var(--info-gradient) !important;
            color: #1a202c !important;
        }

        /* Animations */
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

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        .slide-in-left {
            animation: slideInLeft 0.6s ease-out;
        }

        .slide-in-right {
            animation: slideInRight 0.6s ease-out;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }
            
            .summary-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .chart-container {
                height: 300px;
            }
            
            .data-section,
            .chart-section {
                padding: 2rem 1.5rem;
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 40px;
            height: 40px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }

        /* Print Styles */
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
            
            .action-buttons,
            .btn {
                display: none !important;
            }
            
            .page-header {
                background: white !important;
                color: black !important;
                padding: 1rem 0 !important;
                border-bottom: 3px solid #000 !important;
                margin-bottom: 2rem !important;
            }
            
            .page-title {
                color: black !important;
                -webkit-text-fill-color: unset !important;
                font-size: 24px !important;
                font-weight: bold !important;
                text-align: center !important;
                margin-bottom: 0.5rem !important;
            }
            
            .page-subtitle {
                color: #666 !important;
                font-size: 14px !important;
                text-align: center !important;
            }
            
            .data-section {
                background: white !important;
                border: 2px solid #000 !important;
                box-shadow: none !important;
                margin-bottom: 2rem !important;
                page-break-inside: avoid;
                padding: 1.5rem !important;
            }
            
            .data-title {
                color: #000 !important;
                font-size: 16px !important;
                font-weight: bold !important;
                margin-bottom: 1rem !important;
                border-bottom: 2px solid #000 !important;
                padding-bottom: 0.5rem !important;
            }
            
            .table {
                font-size: 11px !important;
                border-collapse: collapse !important;
                width: 100% !important;
            }
            
            .table th,
            .table td {
                border: 1px solid #000 !important;
                padding: 6px !important;
                text-align: left !important;
                vertical-align: top !important;
            }
            
            .table thead th {
                background: #f0f0f0 !important;
                color: #000 !important;
                font-weight: bold !important;
                text-align: center !important;
            }
            
            .table tbody tr:nth-child(even) {
                background: #f9f9f9 !important;
            }
            
            .value-cell.positive {
                color: #000 !important;
                font-weight: bold !important;
            }
            
            .value-cell.negative {
                color: #000 !important;
                font-weight: bold !important;
            }
            
            .badge {
                background: #e0e0e0 !important;
                color: #000 !important;
                border: 1px solid #000 !important;
                padding: 2px 6px !important;
                font-size: 10px !important;
            }
            
            .bg-success {
                background: #d4edda !important;
                color: #000 !important;
            }
            
            .bg-warning {
                background: #fff3cd !important;
                color: #000 !important;
            }
            
            .business-info {
                background: #f8f9fa !important;
                border: 1px solid #000 !important;
                padding: 1rem !important;
                margin-bottom: 1rem !important;
            }
            
            .business-details {
                background: #f8f9fa !important;
                border: 1px solid #000 !important;
                padding: 1rem !important;
                margin-bottom: 1rem !important;
            }
            
            .detail-card {
                background: white !important;
                border: 1px solid #ccc !important;
                padding: 0.5rem !important;
                margin-bottom: 0.5rem !important;
            }
            
            .detail-card h5 {
                color: #000 !important;
                font-size: 12px !important;
                font-weight: bold !important;
                margin-bottom: 0.25rem !important;
            }
            
            .detail-item {
                color: #000 !important;
                font-size: 11px !important;
                margin-bottom: 0.25rem !important;
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
            
            .print-header {
                display: block !important;
                text-align: center !important;
                margin-bottom: 2rem !important;
                border-bottom: 3px solid #000 !important;
                padding-bottom: 1rem !important;
            }
            
            .print-header h2 {
                font-size: 20px !important;
                font-weight: bold !important;
                margin-bottom: 0.5rem !important;
                color: #000 !important;
            }
            
            .print-header p {
                font-size: 12px !important;
                margin-bottom: 0.25rem !important;
                color: #666 !important;
            }
            
            .print-footer {
                position: fixed !important;
                bottom: 0 !important;
                left: 0 !important;
                right: 0 !important;
                text-align: center !important;
                font-size: 10px !important;
                color: #666 !important;
                border-top: 1px solid #000 !important;
                padding: 0.5rem !important;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header fade-in-up">
            <h1 class="page-title">
                <i class="fas fa-chart-line me-3"></i>
                Hasil Proyeksi Keuangan
            </h1>
            <p class="page-subtitle">
                Analisis mendalam untuk mengembangkan bisnis {{ $projection->business_name }}
            </p>
            <div class="print-header" style="display: none;">
                <div class="print-logo">
                    <h2>LAPORAN PROYEKSI KEUANGAN</h2>
                    <p>Bisnis: {{ $projection->business_name }}</p>
                    <p>Tanggal: {{ date('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Business Info -->
        <div class="business-info fade-in-up">
            <div class="business-name">
                <div class="business-icon">
                    <i class="fas fa-building"></i>
                </div>
                {{ $projection->business_name }}
            </div>
            <div class="row">
                <div class="col-md-3">
                    <strong>Pendapatan Awal:</strong> Rp {{ number_format($projection->baseline_revenue, 0, ',', '.') }}/bulan
                </div>
                <div class="col-md-3">
                    <strong>Durasi Proyeksi:</strong> {{ $projection->projection_years }} Tahun
                </div>
                <div class="col-md-3">
                    <strong>Total Aset:</strong> {{ count($projection->assets) }} item
                </div>
                <div class="col-md-3">
                    <strong>Total Produk:</strong> {{ count($projection->products) }} item
                </div>
            </div>
            
            <!-- Growth Rates per Tahun -->
            <div class="row mt-3">
                <div class="col-12">
                    <strong>Pertumbuhan Tahunan:</strong>
                    @foreach($projection->yearly_growth_rates as $year => $rate)
                        <span class="badge bg-primary me-2">Tahun {{ $year }}: {{ $rate }}%</span>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Business Details -->
        <div class="business-details fade-in-up">
            <div class="row">
                <!-- Assets Information -->
                @if(count($projection->assets) > 0)
                <div class="col-md-4">
                    <div class="detail-card">
                        <h5><i class="fas fa-industry me-2"></i>Aset & Depresiasi</h5>
                        <div class="detail-content">
                            @foreach($projection->assets as $asset)
                            <div class="detail-item">
                                <strong>{{ $asset['name'] }}</strong><br>
                                <small class="text-muted">
                                    Harga: Rp {{ number_format($asset['purchase_price'], 0, ',', '.') }}<br>
                                    Umur: {{ $asset['useful_life_months'] }} bulan<br>
                                    Depresiasi: Rp {{ number_format($asset['purchase_price'] / $asset['useful_life_months'], 0, ',', '.') }}/bulan
                                </small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Products Information -->
                @if(count($projection->products) > 0)
                <div class="col-md-4">
                    <div class="detail-card">
                        <h5><i class="fas fa-box me-2"></i>Produk & HPP</h5>
                        <div class="detail-content">
                            @foreach($projection->products as $index => $product)
                            <div class="detail-item">
                                <strong>{{ $product['name'] }}</strong><br>
                                <small class="text-muted">
                                    Harga Jual: Rp {{ number_format($product['selling_price'], 0, ',', '.') }}<br>
                                    HPP: Rp {{ number_format($projection->getProductHPP($index), 0, ',', '.') }}<br>
                                    Margin: {{ number_format(($projection->getProductGrossProfit($index) / $product['selling_price']) * 100, 1) }}%
                                </small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                <!-- Funding Sources Information -->
                @if(count($projection->funding_sources) > 0)
                <div class="col-md-4">
                    <div class="detail-card">
                        <h5><i class="fas fa-money-bill-wave me-2"></i>Sumber Permodalan</h5>
                        <div class="detail-content">
                            @foreach($projection->funding_sources as $source)
                            <div class="detail-item">
                                <strong>
                                    @if($source['type'] == 'equity')
                                        Modal Sendiri
                                    @elseif($source['type'] == 'loan')
                                        Pinjaman
                                    @else
                                        Investasi
                                    @endif
                                </strong><br>
                                <small class="text-muted">
                                    Jumlah: Rp {{ number_format($source['amount'], 0, ',', '.') }}<br>
                                    @if($source['type'] == 'loan')
                                        Bunga: {{ $source['interest_rate'] }}%/tahun<br>
                                        Tenor: {{ $source['tenor_months'] }} bulan<br>
                                        Bunga Bulanan: Rp {{ number_format(($source['amount'] * $source['interest_rate'] / 100) / 12, 0, ',', '.') }}
                                    @endif
                                </small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons fade-in-up">
            <a href="{{ route('projection.export', $projection->id) }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i>
                Download Excel
            </a>
            <a href="{{ route('projection.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Buat Proyeksi Baru
            </a>
            @if(auth()->check() && auth()->user()->role === 'admin')
            <a href="{{ route('projection.index') }}" class="btn btn-warning">
                <i class="fas fa-list"></i>
                Daftar Proyeksi
            </a>
            @endif
            <a href="{{ route('bmc.landing') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>

        <!-- Summary Cards -->
        <div class="summary-grid">
            @php
                $totalRevenue = 0;
                $totalCosts = 0;
                $totalProfit = 0;
                $finalRevenue = 0;
                
                foreach($projections as $month => $data) {
                    $totalRevenue += $data['revenue'];
                    $totalCosts += $data['total_costs'];
                    $totalProfit += $data['profit'];
                    if($month == count($projections)) {
                        $finalRevenue = $data['revenue'];
                    }
                }
                
                $growthRate = $projection->yearly_growth_rates[1] ?? 0;
                $initialRevenue = $projection->baseline_revenue;
                $revenueGrowth = (($finalRevenue - $initialRevenue) / $initialRevenue) * 100;
            @endphp

            <div class="summary-card revenue slide-in-left">
                <div class="summary-icon" style="background: var(--success-gradient);">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="summary-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
                <div class="summary-label">Total Pendapatan</div>
                <div class="summary-change positive">
                    <i class="fas fa-arrow-up"></i>
                    {{ number_format($revenueGrowth, 1) }}% dari awal
                </div>
            </div>

            <div class="summary-card cost slide-in-left">
                <div class="summary-icon" style="background: var(--danger-gradient);">
                    <i class="fas fa-receipt"></i>
                </div>
                <div class="summary-value">Rp {{ number_format($totalCosts, 0, ',', '.') }}</div>
                <div class="summary-label">Total Biaya</div>
                <div class="summary-change">
                    <i class="fas fa-info-circle"></i>
                    {{ count($projection->fixed_costs) }} biaya tetap
                </div>
            </div>

            <div class="summary-card profit slide-in-right">
                <div class="summary-icon" style="background: var(--warning-gradient);">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="summary-value {{ $totalProfit >= 0 ? 'positive' : 'negative' }}">
                    Rp {{ number_format($totalProfit, 0, ',', '.') }}
                </div>
                <div class="summary-label">Total Keuntungan</div>
                <div class="summary-change {{ $totalProfit >= 0 ? 'positive' : 'negative' }}">
                    <i class="fas fa-{{ $totalProfit >= 0 ? 'arrow-up' : 'arrow-down' }}"></i>
                    {{ $totalProfit >= 0 ? 'Positif' : 'Negatif' }}
                </div>
            </div>

            <div class="summary-card growth slide-in-right">
                <div class="summary-icon" style="background: var(--info-gradient); color: #1a202c;">
                    <i class="fas fa-percentage"></i>
                </div>
                <div class="summary-value">{{ $growthRate }}%</div>
                <div class="summary-label">Pertumbuhan Tahunan</div>
                <div class="summary-change positive">
                    <i class="fas fa-trending-up"></i>
                    Konsisten
                </div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="chart-section fade-in-up">
            <div class="chart-header">
                <h2 class="chart-title">
                    <div class="chart-icon">
                        <i class="fas fa-chart-bar"></i>
                    </div>
                    Grafik Proyeksi Keuangan
                </h2>
            </div>
            
            <div class="chart-tabs">
                <button class="chart-tab active" onclick="showChart('revenue')">
                    <i class="fas fa-dollar-sign me-2"></i>
                    Pendapatan
                </button>
                <button class="chart-tab" onclick="showChart('costs')">
                    <i class="fas fa-receipt me-2"></i>
                    Biaya
                </button>
                <button class="chart-tab" onclick="showChart('profit')">
                    <i class="fas fa-chart-line me-2"></i>
                    Keuntungan
                </button>
                <button class="chart-tab" onclick="showChart('cumulative')">
                    <i class="fas fa-chart-area me-2"></i>
                    Kumulatif
                </button>
            </div>
            
            <div class="chart-container">
                <canvas id="projectionChart"></canvas>
            </div>
        </div>

        <!-- Data Table Section -->
        <div class="data-section fade-in-up">
            <div class="data-header">
                <h2 class="data-title">
                    <div class="data-icon">
                        <i class="fas fa-table"></i>
                    </div>
                    Detail Proyeksi Bulanan
                </h2>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Pendapatan</th>
                            <th>Biaya Tetap</th>
                            <th>Biaya Variabel</th>
                            <th>Gaji Karyawan</th>
                            <th>Depresiasi</th>
                            <th>Bunga Pinjaman</th>
                            <th>Total Biaya</th>
                            <th>Keuntungan</th>
                            <th>Keuntungan Kumulatif</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $cumulativeProfit = 0; @endphp
                        @foreach($projections as $month => $data)
                        @php $cumulativeProfit += $data['profit']; @endphp
                        <tr>
                            <td>
                                <strong>{{ $data['month_name'] }}</strong>
                                <br>
                                <small class="text-muted">Tahun {{ $data['year'] }}</small>
                            </td>
                            <td class="value-cell positive">
                                <strong>Rp {{ number_format($data['revenue'], 0, ',', '.') }}</strong>
                            </td>
                            <td class="value-cell">
                                Rp {{ number_format($data['fixed_costs'], 0, ',', '.') }}
                            </td>
                            <td class="value-cell">
                                Rp {{ number_format($data['variable_costs'], 0, ',', '.') }}
                            </td>
                            <td class="value-cell">
                                Rp {{ number_format($data['payroll'], 0, ',', '.') }}
                            </td>
                            <td class="value-cell">
                                Rp {{ number_format($data['depreciation'], 0, ',', '.') }}
                            </td>
                            <td class="value-cell">
                                Rp {{ number_format($data['interest_expense'], 0, ',', '.') }}
                            </td>
                            <td class="value-cell">
                                <strong>Rp {{ number_format($data['total_costs'], 0, ',', '.') }}</strong>
                            </td>
                            <td class="value-cell {{ $data['profit'] >= 0 ? 'positive' : 'negative' }}">
                                <strong>Rp {{ number_format($data['profit'], 0, ',', '.') }}</strong>
                            </td>
                            <td class="value-cell {{ $cumulativeProfit >= 0 ? 'positive' : 'negative' }}">
                                <strong>Rp {{ number_format($cumulativeProfit, 0, ',', '.') }}</strong>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Annual Summary -->
        <div class="data-section fade-in-up page-break">
            <div class="data-header">
                <h2 class="data-title">
                    <div class="data-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    Ringkasan Tahunan
                </h2>
            </div>
            
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Total Pendapatan</th>
                            <th>Total Biaya</th>
                            <th>Total Keuntungan</th>
                            <th>Keuntungan Rata-rata/Bulan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $yearlyData = [];
                            $currentYear = 1;
                            $yearStartMonth = 1;
                            $yearRevenue = 0;
                            $yearCosts = 0;
                            $yearProfit = 0;
                        @endphp
                        
                        @foreach($projections as $month => $data)
                            @if($data['year'] != $currentYear)
                                @if($currentYear > 0)
                                    <tr>
                                        <td><strong>Tahun {{ $currentYear }}</strong></td>
                                        <td class="value-cell positive">Rp {{ number_format($yearRevenue, 0, ',', '.') }}</td>
                                        <td class="value-cell">Rp {{ number_format($yearCosts, 0, ',', '.') }}</td>
                                        <td class="value-cell {{ $yearProfit >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($yearProfit, 0, ',', '.') }}</td>
                                        <td class="value-cell {{ $yearProfit >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($yearProfit / 12, 0, ',', '.') }}</td>
                                        <td>
                                            <span class="badge {{ $yearProfit >= 0 ? 'bg-success' : 'bg-warning' }}">
                                                {{ $yearProfit >= 0 ? 'Menguntungkan' : 'Rugi' }}
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                                @php
                                    $currentYear = $data['year'];
                                    $yearRevenue = 0;
                                    $yearCosts = 0;
                                    $yearProfit = 0;
                                @endphp
                            @endif
                            
                            @php
                                $yearRevenue += $data['revenue'];
                                $yearCosts += $data['total_costs'];
                                $yearProfit += $data['profit'];
                            @endphp
                        @endforeach
                        
                        <!-- Last year -->
                        <tr>
                            <td><strong>Tahun {{ $currentYear }}</strong></td>
                            <td class="value-cell positive">Rp {{ number_format($yearRevenue, 0, ',', '.') }}</td>
                            <td class="value-cell">Rp {{ number_format($yearCosts, 0, ',', '.') }}</td>
                            <td class="value-cell {{ $yearProfit >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($yearProfit, 0, ',', '.') }}</td>
                            <td class="value-cell {{ $yearProfit >= 0 ? 'positive' : 'negative' }}">Rp {{ number_format($yearProfit / 12, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge {{ $yearProfit >= 0 ? 'bg-success' : 'bg-warning' }}">
                                    {{ $yearProfit >= 0 ? 'Menguntungkan' : 'Rugi' }}
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Chart data
        const chartData = {
            revenue: {
                labels: [
                    @foreach($projections as $month => $data)
                        "{{ $data['month_name'] }} {{ $data['year'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Pendapatan',
                    data: [
                        @foreach($projections as $month => $data)
                            {{ $data['revenue'] }},
                        @endforeach
                    ],
                    borderColor: 'rgb(79, 172, 254)',
                    backgroundColor: 'rgba(79, 172, 254, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            costs: {
                labels: [
                    @foreach($projections as $month => $data)
                        "{{ $data['month_name'] }} {{ $data['year'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Total Biaya',
                    data: [
                        @foreach($projections as $month => $data)
                            {{ $data['total_costs'] }},
                        @endforeach
                    ],
                    borderColor: 'rgb(250, 112, 154)',
                    backgroundColor: 'rgba(250, 112, 154, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            profit: {
                labels: [
                    @foreach($projections as $month => $data)
                        "{{ $data['month_name'] }} {{ $data['year'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Keuntungan',
                    data: [
                        @foreach($projections as $month => $data)
                            {{ $data['profit'] }},
                        @endforeach
                    ],
                    borderColor: 'rgb(67, 233, 123)',
                    backgroundColor: 'rgba(67, 233, 123, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            },
            cumulative: {
                labels: [
                    @foreach($projections as $month => $data)
                        "{{ $data['month_name'] }} {{ $data['year'] }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Keuntungan Kumulatif',
                    data: [
                        @php $cumulative = 0; @endphp
                        @foreach($projections as $month => $data)
                            @php $cumulative += $data['profit']; @endphp
                            <?php echo $cumulative; ?>,
                        @endforeach
                    ],
                    borderColor: 'rgb(102, 126, 234)',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            }
        };

        // Initialize chart
        const ctx = document.getElementById('projectionChart').getContext('2d');
        let currentChart = new Chart(ctx, {
            type: 'line',
            data: chartData.revenue,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Proyeksi Pendapatan Bulanan',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    },
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });

        // Chart tab functionality
        function showChart(type) {
            // Update active tab
            document.querySelectorAll('.chart-tab').forEach(tab => {
                tab.classList.remove('active');
            });
            event.target.classList.add('active');

            // Update chart
            currentChart.data = chartData[type];
            currentChart.update('active');

            // Update chart title
            const titles = {
                revenue: 'Proyeksi Pendapatan Bulanan',
                costs: 'Proyeksi Biaya Bulanan',
                profit: 'Proyeksi Keuntungan Bulanan',
                cumulative: 'Proyeksi Keuntungan Kumulatif'
            };
            currentChart.options.plugins.title.text = titles[type];
            currentChart.update();
        }

        // Add animation to summary cards
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.summary-card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });
        });

        // Print functionality
        function printProjection() {
            // Show print header and footer
            document.querySelector('.print-header').style.display = 'block';
            document.querySelector('.print-footer').style.display = 'block';
            
            // Hide web elements
            document.querySelector('.page-title').style.display = 'none';
            document.querySelector('.page-subtitle').style.display = 'none';
            
            // Print
            window.print();
            
            // Hide print elements after printing
            setTimeout(() => {
                document.querySelector('.print-header').style.display = 'none';
                document.querySelector('.print-footer').style.display = 'none';
                document.querySelector('.page-title').style.display = 'block';
                document.querySelector('.page-subtitle').style.display = 'block';
            }, 1000);
        }

        // Add print button
        document.addEventListener('DOMContentLoaded', function() {
            const actionButtons = document.querySelector('.action-buttons');
            const printBtn = document.createElement('button');
            printBtn.className = 'btn btn-secondary';
            printBtn.innerHTML = '<i class="fas fa-print"></i> Print';
            printBtn.onclick = printProjection;
            actionButtons.appendChild(printBtn);
        });
    </script>
    
    <!-- Print Footer -->
    <div class="print-footer" style="display: none;">
        <p>Laporan Proyeksi Keuangan - {{ $projection->business_name }} | Generated on {{ date('d F Y H:i:s') }} | Page <span class="page-number"></span></p>
    </div>
</body>
</html>