<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyeksi Keuangan Usaha - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
            --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            --info-gradient: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
            --dark-gradient: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            --light-bg: #f8fafc;
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
            max-width: 1400px;
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
            width: 100px;
            height: 100px;
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

        .progress-indicator {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .progress-step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: white;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            font-weight: 500;
            color: #64748b;
            transition: var(--transition);
            font-size: 0.9rem;
        }

        .progress-step.active {
            background: var(--primary-gradient);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .progress-step.completed {
            background: var(--success-gradient);
            color: white;
        }

        /* Form Sections */
        .form-section {
            background: white;
            border-radius: var(--border-radius);
            padding: 3rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--primary-gradient);
        }

        .form-section:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1a202c;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .section-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .section-icon.primary { background: var(--primary-gradient); }
        .section-icon.success { background: var(--success-gradient); }
        .section-icon.warning { background: var(--warning-gradient); }
        .section-icon.danger { background: var(--danger-gradient); }
        .section-icon.info { background: var(--info-gradient); color: #1a202c; }

        /* Form Controls */
        .form-group {
            margin-bottom: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.75rem;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: var(--transition);
            background: #f8fafc;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
            transform: translateY(-1px);
        }

        .form-control::placeholder {
            color: #94a3b8;
            font-weight: 400;
        }

        /* Input Groups */
        .input-group {
            position: relative;
        }

        .input-group .form-control {
            padding-left: 3.5rem;
        }

        .input-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 1.1rem;
            z-index: 3;
        }

        /* Cost Items */
        .cost-item {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            transition: var(--transition);
            position: relative;
        }

        .cost-item:hover {
            border-color: #667eea;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.1);
        }

        .cost-item-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .cost-item-title {
            font-weight: 600;
            color: #374151;
            font-size: 1.1rem;
            margin: 0;
        }

        .remove-cost-btn {
            background: var(--danger-gradient);
            border: none;
            color: white;
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            cursor: pointer;
        }

        .remove-cost-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(250, 112, 154, 0.4);
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
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-success {
            background: var(--success-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 172, 254, 0.4);
            color: white;
        }

        .btn-warning {
            background: var(--warning-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(67, 233, 123, 0.4);
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
            box-shadow: 0 4px 15px rgba(100, 116, 139, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(100, 116, 139, 0.4);
            color: white;
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

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }
            
            .form-section {
                padding: 2rem 1.5rem;
            }
            
            .progress-indicator {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Tooltips */
        .tooltip {
            position: relative;
            cursor: help;
        }

        .tooltip::after {
            content: attr(data-tooltip);
            position: absolute;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            background: #1a202c;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 1000;
        }

        .tooltip::before {
            content: '';
            position: absolute;
            bottom: 120%;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: #1a202c;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .tooltip:hover::after,
        .tooltip:hover::before {
            opacity: 1;
            visibility: visible;
        }

        /* Yearly Growth Rate Section */
        .yearly-growth-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .yearly-growth-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .yearly-growth-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .year-input-group {
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 1.5rem;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .year-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }

        .year-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            background: rgba(255,255,255,0.1);
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .year-input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .year-input:focus {
            outline: none;
            border-color: rgba(255,255,255,0.6);
            background: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header fade-in-up">
            <h1 class="page-title">
                <i class="fas fa-chart-line me-3"></i>
                Proyeksi Keuangan Usaha
            </h1>
            <p class="page-subtitle">
                Buat proyeksi keuangan yang realistis dan detail untuk mengembangkan bisnis Anda dengan perhitungan aset, depresiasi, HPP, dan sumber permodalan
            </p>
            
            <!-- Progress Indicator -->
            <div class="progress-indicator">
                <div class="progress-step active">
                    <i class="fas fa-info-circle"></i>
                    <span>Informasi Dasar</span>
                </div>
                <div class="progress-step">
                    <i class="fas fa-chart-line"></i>
                    <span>Growth Rate</span>
                </div>
                <div class="progress-step">
                    <i class="fas fa-calculator"></i>
                    <span>Biaya & Aset</span>
                </div>
                <div class="progress-step">
                    <i class="fas fa-box"></i>
                    <span>Produk & HPP</span>
                </div>
                <div class="progress-step">
                    <i class="fas fa-money-bill-wave"></i>
                    <span>Permodalan</span>
                </div>
                <div class="progress-step">
                    <i class="fas fa-chart-bar"></i>
                    <span>Hasil Proyeksi</span>
                </div>
            </div>
        </div>

        <!-- Main Form -->
        <form method="POST" action="{{ route('projection.store') }}" id="projection-form">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon primary">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    Informasi Dasar Bisnis
                </h2>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="business_name" class="form-label">
                                <i class="fas fa-building"></i>
                                Nama Bisnis
                            </label>
                            <div class="input-group">
                                <i class="fas fa-building input-icon"></i>
                                <input type="text" 
                                       class="form-control" 
                                       id="business_name" 
                                       name="business_name" 
                                       placeholder="Masukkan nama bisnis Anda"
                                       value="{{ old('business_name') }}"
                                       required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baseline_revenue" class="form-label">
                                <i class="fas fa-dollar-sign"></i>
                                Pendapatan Awal per Bulan
                                <span class="tooltip" data-tooltip="Pendapatan bulanan yang Anda perkirakan di bulan pertama">
                                    <i class="fas fa-question-circle text-muted"></i>
                                </span>
                            </label>
                            <div class="input-group">
                                <i class="fas fa-dollar-sign input-icon"></i>
                                <input type="number" 
                                       class="form-control" 
                                       id="baseline_revenue" 
                                       name="baseline_revenue" 
                                       placeholder="Contoh: 10000000"
                                       value="{{ old('baseline_revenue') }}"
                                       min="0" 
                                       step="1000" 
                                       required>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projection_years" class="form-label">
                                <i class="fas fa-calendar-alt"></i>
                                Durasi Proyeksi
                                <span class="tooltip" data-tooltip="Berapa tahun proyeksi keuangan yang ingin Anda buat">
                                    <i class="fas fa-question-circle text-muted"></i>
                                </span>
                            </label>
                            <div class="input-group">
                                <i class="fas fa-calendar-alt input-icon"></i>
                                <select class="form-control" 
                                        id="projection_years" 
                                        name="projection_years" 
                                        required>
                                    <option value="">Pilih durasi proyeksi</option>
                                    <option value="1" {{ old('projection_years') == '1' ? 'selected' : '' }}>1 Tahun</option>
                                    <option value="2" {{ old('projection_years') == '2' ? 'selected' : '' }}>2 Tahun</option>
                                    <option value="3" {{ old('projection_years') == '3' ? 'selected' : '' }}>3 Tahun</option>
                                    <option value="4" {{ old('projection_years') == '4' ? 'selected' : '' }}>4 Tahun</option>
                                    <option value="5" {{ old('projection_years') == '5' ? 'selected' : '' }}>5 Tahun</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Yearly Growth Rate Section -->
            <div class="yearly-growth-section fade-in-up" id="yearly-growth-section" style="display: none;">
                <h3 class="yearly-growth-title">
                    <i class="fas fa-chart-line"></i>
                    Tingkat Pertumbuhan Tahunan (Dinamis)
                </h3>
                <p class="mb-4">Atur tingkat pertumbuhan yang berbeda untuk setiap tahun proyeksi</p>
                <div class="yearly-growth-grid" id="yearly-growth-grid">
                    <!-- Yearly growth rate inputs will be populated by JavaScript -->
                </div>
            </div>

            <!-- Fixed Costs Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon success">
                        <i class="fas fa-receipt"></i>
                    </div>
                    Biaya Tetap
                    <span class="tooltip" data-tooltip="Biaya yang harus dibayar setiap bulan dengan jumlah yang sama">
                        <i class="fas fa-question-circle text-muted"></i>
                    </span>
                </h2>
                
                <div id="fixed-costs-container">
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Biaya Tetap #1</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Biaya</label>
                                    <input type="text" 
                                           name="fixed_costs[0][name]" 
                                           class="form-control" 
                                           placeholder="Contoh: Sewa Kantor" 
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah per Bulan</label>
                                    <input type="number" 
                                           name="fixed_costs[0][amount]" 
                                           class="form-control" 
                                           placeholder="Contoh: 5000000" 
                                           min="0" 
                                           step="1000" 
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addFixedCost()">
                    <i class="fas fa-plus"></i>
                    Tambah Biaya Tetap
                </button>
            </div>

            <!-- Assets and Depreciation Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon info">
                        <i class="fas fa-cogs"></i>
                    </div>
                    Aset dan Depresiasi
                    <span class="tooltip" data-tooltip="Aset yang dibeli di awal usaha dan perhitungan depresiasi bulanan">
                        <i class="fas fa-question-circle text-muted"></i>
                    </span>
                </h2>
                
                <div id="assets-container">
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Aset #1</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Aset</label>
                                    <input type="text" 
                                           name="assets[0][name]" 
                                           class="form-control" 
                                           placeholder="Contoh: Mesin Produksi">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Perolehan</label>
                                    <input type="number" 
                                           name="assets[0][purchase_price]" 
                                           class="form-control" 
                                           placeholder="Contoh: 50000000" 
                                           min="0" 
                                           step="1000">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Beli</label>
                                    <input type="date" 
                                           name="assets[0][purchase_date]" 
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Umur Aset (Bulan)</label>
                                    <input type="number" 
                                           name="assets[0][useful_life_months]" 
                                           class="form-control" 
                                           placeholder="Contoh: 60 untuk 5 tahun" 
                                           min="1" 
                                           step="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addAsset()">
                    <i class="fas fa-plus"></i>
                    Tambah Aset
                </button>
            </div>

            <!-- Products and HPP Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon warning">
                        <i class="fas fa-box"></i>
                    </div>
                    Produk dan HPP
                    <span class="tooltip" data-tooltip="Produk yang dijual dan perhitungan Harga Pokok Penjualan">
                        <i class="fas fa-question-circle text-muted"></i>
                    </span>
                </h2>
                
                <div id="products-container">
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Produk #1</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" 
                                           name="products[0][name]" 
                                           class="form-control" 
                                           placeholder="Contoh: Kue Brownies">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Harga Jual</label>
                                    <input type="number" 
                                           name="products[0][selling_price]" 
                                           class="form-control" 
                                           placeholder="Contoh: 15000" 
                                           min="0" 
                                           step="100">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Bahan Baku</label>
                            <div id="raw-materials-0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="text" 
                                               name="products[0][raw_materials][0][name]" 
                                               class="form-control" 
                                               placeholder="Nama bahan">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" 
                                               name="products[0][raw_materials][0][cost_per_unit]" 
                                               class="form-control" 
                                               placeholder="Harga per unit" 
                                               min="0" 
                                               step="100">
                                    </div>
                                    <div class="col-md-4">
                                        <input type="number" 
                                               name="products[0][raw_materials][0][quantity]" 
                                               class="form-control" 
                                               placeholder="Jumlah" 
                                               min="0" 
                                               step="0.01">
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addRawMaterial(0)">
                                <i class="fas fa-plus"></i>
                                Tambah Bahan Baku
                            </button>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addProduct()">
                    <i class="fas fa-plus"></i>
                    Tambah Produk
                </button>
            </div>

            <!-- Variable Costs Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon warning">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    Biaya Variabel
                    <span class="tooltip" data-tooltip="Biaya yang berubah sesuai dengan pendapatan (opsional)">
                        <i class="fas fa-question-circle text-muted"></i>
                    </span>
                </h2>
                
                <div id="variable-costs-container">
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Biaya Variabel #1</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Biaya</label>
                                    <input type="text" 
                                           name="variable_costs[0][name]" 
                                           class="form-control" 
                                           placeholder="Contoh: Bahan Baku">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Persentase dari Pendapatan</label>
                                    <input type="number" 
                                           name="variable_costs[0][percentage]" 
                                           class="form-control" 
                                           placeholder="Contoh: 30 untuk 30%" 
                                           min="0" 
                                           max="100" 
                                           step="0.01">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addVariableCost()">
                    <i class="fas fa-plus"></i>
                    Tambah Biaya Variabel
                </button>
            </div>

            <!-- Funding Sources Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon danger">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    Sumber Permodalan
                    <span class="tooltip" data-tooltip="Modal awal, pinjaman, dan investasi untuk menjalankan usaha">
                        <i class="fas fa-question-circle text-muted"></i>
                    </span>
                </h2>
                
                <div id="funding-sources-container">
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Sumber Modal #1</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Jenis Modal</label>
                                    <select name="funding_sources[0][type]" class="form-control">
                                        <option value="equity">Modal Sendiri</option>
                                        <option value="loan">Pinjaman</option>
                                        <option value="investment">Investasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" 
                                           name="funding_sources[0][amount]" 
                                           class="form-control" 
                                           placeholder="Contoh: 100000000" 
                                           min="0" 
                                           step="1000">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Bunga per Tahun (%)</label>
                                    <input type="number" 
                                           name="funding_sources[0][interest_rate]" 
                                           class="form-control" 
                                           placeholder="Contoh: 12" 
                                           min="0" 
                                           max="100" 
                                           step="0.1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Tenor (Bulan)</label>
                                    <input type="number" 
                                           name="funding_sources[0][tenor_months]" 
                                           class="form-control" 
                                           placeholder="Contoh: 60" 
                                           min="1" 
                                           step="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addFundingSource()">
                    <i class="fas fa-plus"></i>
                    Tambah Sumber Modal
                </button>
            </div>

            <!-- Employees Section -->
            <div class="form-section fade-in-up">
                <h2 class="section-title">
                    <div class="section-icon danger">
                        <i class="fas fa-users"></i>
                    </div>
                    Data Karyawan
                    <span class="tooltip" data-tooltip="Informasi karyawan dan periode kerja mereka (opsional)">
                        <i class="fas fa-question-circle text-muted"></i>
                    </span>
                </h2>
                
                <div id="employees-container">
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Karyawan #1</h6>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Nama Karyawan</label>
                                    <input type="text" 
                                           name="employees[0][name]" 
                                           class="form-control" 
                                           placeholder="Nama lengkap">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Gaji per Bulan</label>
                                    <input type="number" 
                                           name="employees[0][salary]" 
                                           class="form-control" 
                                           placeholder="Contoh: 5000000" 
                                           min="0" 
                                           step="1000">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Durasi Kerja</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <label class="form-label small">Mulai Bulan</label>
                                            <select name="employees[0][start_month]" class="form-control form-control-sm">
                                                <option value="1">Jan (Bulan 1)</option>
                                                <option value="2">Feb (Bulan 2)</option>
                                                <option value="3">Mar (Bulan 3)</option>
                                                <option value="4">Apr (Bulan 4)</option>
                                                <option value="5">Mei (Bulan 5)</option>
                                                <option value="6">Jun (Bulan 6)</option>
                                                <option value="7">Jul (Bulan 7)</option>
                                                <option value="8">Agu (Bulan 8)</option>
                                                <option value="9">Sep (Bulan 9)</option>
                                                <option value="10">Okt (Bulan 10)</option>
                                                <option value="11">Nov (Bulan 11)</option>
                                                <option value="12">Des (Bulan 12)</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label small">Selesai Bulan</label>
                                            <select name="employees[0][end_month]" class="form-control form-control-sm" id="end-month-select-0">
                                                <!-- Options will be populated by JavaScript -->
                                            </select>
                                        </div>
                                    </div>
                                    <small class="text-muted">Pilih kapan karyawan mulai dan selesai bekerja</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addEmployee()">
                    <i class="fas fa-plus"></i>
                    Tambah Karyawan
                </button>
            </div>

            <!-- Submit Section -->
            <div class="form-section fade-in-up">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">
                                <i class="fas fa-calculator"></i>
                                Generate Proyeksi Keuangan
                            </button>
                            <a href="{{ route('bmc.landing') }}" class="btn btn-secondary btn-lg">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <small class="text-muted">
                            <i class="fas fa-info-circle"></i>
                            Pastikan semua data sudah diisi dengan benar
                        </small>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let fixedCostCounter = 1;
        let variableCostCounter = 1;
        let employeeCounter = 1;
        let assetCounter = 1;
        let productCounter = 1;
        let fundingSourceCounter = 1;

        // Form validation
        function validateForm() {
            const businessName = document.querySelector('input[name="business_name"]').value.trim();
            const baselineRevenue = document.querySelector('input[name="baseline_revenue"]').value.trim();
            const projectionYears = document.querySelector('select[name="projection_years"]').value;

            if (!businessName || !baselineRevenue || !projectionYears) {
                alert('Mohon lengkapi semua informasi dasar!');
                return false;
            }

            // Check yearly growth rates
            const yearlyGrowthRates = document.querySelectorAll('input[name^="yearly_growth_rates"]');
            let hasValidGrowthRate = false;
            yearlyGrowthRates.forEach(input => {
                if (input.value && parseFloat(input.value) >= 0) {
                    hasValidGrowthRate = true;
                }
            });

            if (!hasValidGrowthRate) {
                alert('Minimal harus ada 1 tingkat pertumbuhan tahunan yang diisi!');
                return false;
            }

            // Check fixed costs
            const fixedCosts = document.querySelectorAll('#fixed-costs-container .cost-item');
            let hasValidFixedCost = false;
            fixedCosts.forEach(item => {
                const name = item.querySelector('input[name*="[name]"]').value.trim();
                const amount = item.querySelector('input[name*="[amount]"]').value.trim();
                if (name && amount && parseFloat(amount) > 0) {
                    hasValidFixedCost = true;
                }
            });

            if (!hasValidFixedCost) {
                alert('Minimal harus ada 1 biaya tetap yang diisi!');
                return false;
            }

            return true;
        }

        // Update yearly growth rate section
        function updateYearlyGrowthSection() {
            const projectionYears = parseInt(document.querySelector('select[name="projection_years"]').value) || 0;
            const section = document.getElementById('yearly-growth-section');
            const grid = document.getElementById('yearly-growth-grid');
            
            if (projectionYears > 0) {
                section.style.display = 'block';
                grid.innerHTML = '';
                
                for (let year = 1; year <= projectionYears; year++) {
                    const yearInput = document.createElement('div');
                    yearInput.className = 'year-input-group';
                    yearInput.innerHTML = `
                        <label class="year-label">Tahun ${year}</label>
                        <input type="number" 
                               name="yearly_growth_rates[${year}]" 
                               class="year-input" 
                               placeholder="0" 
                               min="0" 
                               max="100" 
                               step="0.1"
                               value="{{ old('yearly_growth_rates.${year}') }}">
                    `;
                    grid.appendChild(yearInput);
                }
            } else {
                section.style.display = 'none';
            }
        }

        // Add functions for all sections
        function addFixedCost() {
            const container = document.getElementById('fixed-costs-container');
            const costItem = document.createElement('div');
            costItem.className = 'cost-item fade-in-up';
            
            costItem.innerHTML = `
                <div class="cost-item-header">
                    <h6 class="cost-item-title">Biaya Tetap #${fixedCostCounter + 1}</h6>
                    <button type="button" class="remove-cost-btn" onclick="removeFixedCost(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Biaya</label>
                            <input type="text" name="fixed_costs[${fixedCostCounter}][name]" class="form-control" placeholder="Contoh: Sewa Kantor" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Jumlah per Bulan</label>
                            <input type="number" name="fixed_costs[${fixedCostCounter}][amount]" class="form-control" placeholder="Contoh: 5000000" min="0" step="1000" required>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(costItem);
            fixedCostCounter++;
        }

        function addAsset() {
            const container = document.getElementById('assets-container');
            const assetItem = document.createElement('div');
            assetItem.className = 'cost-item fade-in-up';
            
            assetItem.innerHTML = `
                <div class="cost-item-header">
                    <h6 class="cost-item-title">Aset #${assetCounter + 1}</h6>
                    <button type="button" class="remove-cost-btn" onclick="removeAsset(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Aset</label>
                            <input type="text" name="assets[${assetCounter}][name]" class="form-control" placeholder="Contoh: Mesin Produksi">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Harga Perolehan</label>
                            <input type="number" name="assets[${assetCounter}][purchase_price]" class="form-control" placeholder="Contoh: 50000000" min="0" step="1000">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Tanggal Beli</label>
                            <input type="date" name="assets[${assetCounter}][purchase_date]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Umur Aset (Bulan)</label>
                            <input type="number" name="assets[${assetCounter}][useful_life_months]" class="form-control" placeholder="Contoh: 60 untuk 5 tahun" min="1" step="1">
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(assetItem);
            assetCounter++;
        }

        function addProduct() {
            const container = document.getElementById('products-container');
            const productItem = document.createElement('div');
            productItem.className = 'cost-item fade-in-up';
            
            productItem.innerHTML = `
                <div class="cost-item-header">
                    <h6 class="cost-item-title">Produk #${productCounter + 1}</h6>
                    <button type="button" class="remove-cost-btn" onclick="removeProduct(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="products[${productCounter}][name]" class="form-control" placeholder="Contoh: Kue Brownies">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Harga Jual</label>
                            <input type="number" name="products[${productCounter}][selling_price]" class="form-control" placeholder="Contoh: 15000" min="0" step="100">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Bahan Baku</label>
                    <div id="raw-materials-${productCounter}">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="products[${productCounter}][raw_materials][0][name]" class="form-control" placeholder="Nama bahan">
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="products[${productCounter}][raw_materials][0][cost_per_unit]" class="form-control" placeholder="Harga per unit" min="0" step="100">
                            </div>
                            <div class="col-md-4">
                                <input type="number" name="products[${productCounter}][raw_materials][0][quantity]" class="form-control" placeholder="Jumlah" min="0" step="0.01">
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-outline-primary mt-2" onclick="addRawMaterial(${productCounter})">
                        <i class="fas fa-plus"></i>
                        Tambah Bahan Baku
                    </button>
                </div>
            `;
            container.appendChild(productItem);
            productCounter++;
        }

        function addRawMaterial(productIndex) {
            const container = document.getElementById(`raw-materials-${productIndex}`);
            const materialCount = container.children.length;
            
            const materialRow = document.createElement('div');
            materialRow.className = 'row mt-2';
            materialRow.innerHTML = `
                <div class="col-md-4">
                    <input type="text" name="products[${productIndex}][raw_materials][${materialCount}][name]" class="form-control" placeholder="Nama bahan">
                </div>
                <div class="col-md-4">
                    <input type="number" name="products[${productIndex}][raw_materials][${materialCount}][cost_per_unit]" class="form-control" placeholder="Harga per unit" min="0" step="100">
                </div>
                <div class="col-md-4">
                    <input type="number" name="products[${productIndex}][raw_materials][${materialCount}][quantity]" class="form-control" placeholder="Jumlah" min="0" step="0.01">
                </div>
            `;
            container.appendChild(materialRow);
        }

        function addFundingSource() {
            const container = document.getElementById('funding-sources-container');
            const fundingItem = document.createElement('div');
            fundingItem.className = 'cost-item fade-in-up';
            
            fundingItem.innerHTML = `
                <div class="cost-item-header">
                    <h6 class="cost-item-title">Sumber Modal #${fundingSourceCounter + 1}</h6>
                    <button type="button" class="remove-cost-btn" onclick="removeFundingSource(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Jenis Modal</label>
                            <select name="funding_sources[${fundingSourceCounter}][type]" class="form-control">
                                <option value="equity">Modal Sendiri</option>
                                <option value="loan">Pinjaman</option>
                                <option value="investment">Investasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Jumlah</label>
                            <input type="number" name="funding_sources[${fundingSourceCounter}][amount]" class="form-control" placeholder="Contoh: 100000000" min="0" step="1000">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Bunga per Tahun (%)</label>
                            <input type="number" name="funding_sources[${fundingSourceCounter}][interest_rate]" class="form-control" placeholder="Contoh: 12" min="0" max="100" step="0.1">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Tenor (Bulan)</label>
                            <input type="number" name="funding_sources[${fundingSourceCounter}][tenor_months]" class="form-control" placeholder="Contoh: 60" min="1" step="1">
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(fundingItem);
            fundingSourceCounter++;
        }

        function addVariableCost() {
            const container = document.getElementById('variable-costs-container');
            const costItem = document.createElement('div');
            costItem.className = 'cost-item fade-in-up';
            
            costItem.innerHTML = `
                <div class="cost-item-header">
                    <h6 class="cost-item-title">Biaya Variabel #${variableCostCounter + 1}</h6>
                    <button type="button" class="remove-cost-btn" onclick="removeVariableCost(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Nama Biaya</label>
                            <input type="text" name="variable_costs[${variableCostCounter}][name]" class="form-control" placeholder="Contoh: Bahan Baku">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Persentase dari Pendapatan</label>
                            <input type="number" name="variable_costs[${variableCostCounter}][percentage]" class="form-control" placeholder="Contoh: 30 untuk 30%" min="0" max="100" step="0.01">
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(costItem);
            variableCostCounter++;
        }

        function addEmployee() {
            const container = document.getElementById('employees-container');
            const projectionYears = parseInt(document.querySelector('select[name="projection_years"]').value) || 3;
            
            const employeeItem = document.createElement('div');
            employeeItem.className = 'cost-item employee-item fade-in-up';
            
            employeeItem.innerHTML = `
                <div class="cost-item-header">
                    <h6 class="cost-item-title">Karyawan #${employeeCounter + 1}</h6>
                    <button type="button" class="remove-cost-btn" onclick="removeEmployee(this)">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Nama Karyawan</label>
                            <input type="text" name="employees[${employeeCounter}][name]" class="form-control" placeholder="Nama lengkap">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Gaji per Bulan</label>
                            <input type="number" name="employees[${employeeCounter}][salary]" class="form-control" placeholder="Contoh: 5000000" min="0" step="1000">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Durasi Kerja</label>
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label small">Mulai Bulan</label>
                                    <select name="employees[${employeeCounter}][start_month]" class="form-control form-control-sm">
                                        <option value="1">Jan (Bulan 1)</option>
                                        <option value="2">Feb (Bulan 2)</option>
                                        <option value="3">Mar (Bulan 3)</option>
                                        <option value="4">Apr (Bulan 4)</option>
                                        <option value="5">Mei (Bulan 5)</option>
                                        <option value="6">Jun (Bulan 6)</option>
                                        <option value="7">Jul (Bulan 7)</option>
                                        <option value="8">Agu (Bulan 8)</option>
                                        <option value="9">Sep (Bulan 9)</option>
                                        <option value="10">Okt (Bulan 10)</option>
                                        <option value="11">Nov (Bulan 11)</option>
                                        <option value="12">Des (Bulan 12)</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label class="form-label small">Selesai Bulan</label>
                                    <select name="employees[${employeeCounter}][end_month]" class="form-control form-control-sm" id="end-month-select-${employeeCounter}">
                                        <!-- Options will be populated by JavaScript -->
                                    </select>
                                </div>
                            </div>
                            <small class="text-muted">Pilih kapan karyawan mulai dan selesai bekerja</small>
                        </div>
                    </div>
                </div>
            `;
            container.appendChild(employeeItem);
            
            // Populate end month options for the new employee
            updateEndMonthOptions();
            
            employeeCounter++;
        }

        // Remove functions
        function removeFixedCost(button) {
            const container = document.getElementById('fixed-costs-container');
            const items = container.querySelectorAll('.cost-item');
            if (items.length > 1) {
                button.closest('.cost-item').remove();
            } else {
                alert('Minimal harus ada 1 biaya tetap!');
            }
        }

        function removeAsset(button) {
            button.closest('.cost-item').remove();
        }

        function removeProduct(button) {
            button.closest('.cost-item').remove();
        }

        function removeFundingSource(button) {
            button.closest('.cost-item').remove();
        }

        function removeVariableCost(button) {
            button.closest('.cost-item').remove();
        }

        function removeEmployee(button) {
            button.closest('.cost-item').remove();
        }

        // Update end month options
        function updateEndMonthOptions() {
            const projectionYears = parseInt(document.querySelector('select[name="projection_years"]').value) || 3;
            const maxMonth = projectionYears * 12;
            
            const endMonthSelects = document.querySelectorAll('select[name*="[end_month]"]');
            endMonthSelects.forEach(select => {
                const currentValue = select.value;
                select.innerHTML = '';
                
                for (let month = 1; month <= maxMonth; month++) {
                    const year = Math.ceil(month / 12);
                    const monthInYear = ((month - 1) % 12) + 1;
                    const monthNames = ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                    
                    const option = document.createElement('option');
                    option.value = month;
                    option.textContent = `${monthNames[monthInYear]} Tahun ${year} (Bulan ${month})`;
                    if (month == currentValue) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                }
            });
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize end month options
            updateEndMonthOptions();
            
            // Form submission
            document.getElementById('projection-form').addEventListener('submit', function(e) {
                if (!validateForm()) {
                    e.preventDefault();
                    return false;
                }
                
                // Show loading state
                const submitBtn = document.getElementById('submit-btn');
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
                submitBtn.disabled = true;
            });
        });

        // Update yearly growth section and end month options when projection years change
        document.querySelector('select[name="projection_years"]').addEventListener('change', function() {
            updateYearlyGrowthSection();
            updateEndMonthOptions();
        });
    </script>
</body>
</html>