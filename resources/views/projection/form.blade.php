<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Projection Berbasis Unit - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Progress Indicator */
        .progress-container {
            background: white;
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
        }

        .progress-steps {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            transition: var(--transition);
        }

        .step-circle.active {
            background: var(--primary);
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
        }

        .step-circle.completed {
            background: var(--success);
            color: white;
        }

        .step-circle.pending {
            background: var(--gray-200);
            color: var(--gray-500);
        }

        .step-label {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--gray-600);
            text-align: center;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--gray-200);
            z-index: 1;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary);
            transition: width 0.3s ease;
        }

        /* Form Sections */
        .form-section {
            background: white;
            border-radius: var(--radius-lg);
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
        }

        .form-section:hover {
            box-shadow: var(--shadow-md);
        }

        .form-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary);
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-icon {
            width: 36px;
            height: 36px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            color: white;
        }

        .section-icon.business { background: var(--primary); }
        .section-icon.products { background: var(--info); }
        .section-icon.costs { background: var(--warning); }
        .section-icon.employees { background: var(--success); }
        .section-icon.assets { background: var(--danger); }
        .section-icon.funding { background: var(--secondary); }

        /* Form Controls */
        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.875rem;
        }

        .form-control {
            border: 1px solid var(--gray-300);
            border-radius: var(--radius);
            padding: 0.75rem 1rem;
            font-size: 0.875rem;
            transition: var(--transition);
            background: white;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
            background: white;
            outline: none;
        }

        .form-control.is-invalid {
            border-color: var(--danger);
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
        }

        .invalid-feedback {
            color: var(--danger);
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        /* Dynamic Fields */
        .dynamic-field {
            background: var(--gray-50);
            border: 1px dashed var(--gray-300);
            border-radius: var(--radius);
            padding: 1.25rem;
            margin-bottom: 1rem;
            transition: var(--transition);
        }

        .dynamic-field:hover {
            border-color: var(--gray-400);
            background: var(--gray-100);
        }

        .dynamic-field-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .field-number {
            background: var(--primary);
            color: white;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .btn-remove {
            background: var(--danger);
            color: white;
            border: none;
            border-radius: var(--radius);
            padding: 0.5rem 0.75rem;
            font-size: 0.75rem;
            font-weight: 500;
            transition: var(--transition);
            cursor: pointer;
        }

        .btn-remove:hover {
            background: #dc2626;
            transform: translateY(-1px);
        }

        /* Buttons */
        .btn {
            border-radius: var(--radius);
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            font-size: 0.875rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            box-shadow: var(--shadow-md);
            color: white;
        }

        .btn-success {
            background: var(--success);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-success:hover {
            background: #059669;
            box-shadow: var(--shadow-md);
            color: white;
        }

        .btn-warning {
            background: var(--warning);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-warning:hover {
            background: #d97706;
            box-shadow: var(--shadow-md);
            color: white;
        }

        .btn-info {
            background: var(--info);
            color: white;
            box-shadow: var(--shadow-sm);
        }

        .btn-info:hover {
            background: #0891b2;
            box-shadow: var(--shadow-md);
            color: white;
        }

        /* Product Distribution */
        .distribution-preview {
            background: var(--gray-50);
            border: 1px solid var(--info);
            border-radius: var(--radius);
            padding: 1rem;
            margin-top: 1rem;
        }

        .distribution-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e0f2fe;
        }

        .distribution-item:last-child {
            border-bottom: none;
        }

        .distribution-total {
            font-weight: 700;
            color: #0369a1;
            border-top: 2px solid #0ea5e9;
            padding-top: 0.5rem;
            margin-top: 0.5rem;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .form-section {
                padding: 1.5rem;
            }
            
            .form-group {
                margin-bottom: 1rem;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem 0.5rem;
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

            .form-section {
                padding: 1rem;
                margin-bottom: 1rem;
            }

            .section-title {
                font-size: 1.25rem;
            }

            .progress-steps {
                flex-direction: column;
                gap: 1rem;
            }

            .progress-line {
                display: none;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .form-control {
                font-size: 0.875rem;
                padding: 0.75rem;
            }

            .btn {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
            }

            .dynamic-field {
                padding: 1rem;
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

            .form-section {
                padding: 0.75rem;
            }

            .section-title {
                font-size: 1.125rem;
            }

            .form-control {
                font-size: 0.8rem;
                padding: 0.625rem;
            }

            .btn {
                padding: 0.625rem 1rem;
                font-size: 0.8rem;
            }

            .dynamic-field {
                padding: 0.75rem;
            }

            .form-label {
                font-size: 0.875rem;
            }

            .invalid-feedback {
                font-size: 0.75rem;
            }
        }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
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

        .slide-in-right {
            animation: slideInRight 0.4s ease-out;
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
            <h1 class="page-title">Financial Projection Berbasis Unit</h1>
            <p class="page-subtitle">Buat Financial Projection yang realistis berdasarkan penjualan produk dan bahan baku</p>
        </div>

        <!-- Progress Indicator -->
        <div class="progress-container fade-in-up">
            <div class="progress-steps">
                <div class="progress-step">
                    <div class="step-circle active" id="step-1">1</div>
                    <div class="step-label">Info Bisnis</div>
                </div>
                <div class="progress-step">
                    <div class="step-circle pending" id="step-2">2</div>
                    <div class="step-label">Aset & Pendanaan</div>
                </div>
                <div class="progress-step">
                    <div class="step-circle pending" id="step-3">3</div>
                    <div class="step-label">Produk & Bahan Baku</div>
                </div>
                <div class="progress-step">
                    <div class="step-circle pending" id="step-4">4</div>
                    <div class="step-label">Biaya & Karyawan</div>
                </div>
                <div class="progress-line">
                    <div class="progress-fill" id="progress-fill" style="width: 0%"></div>
                </div>
            </div>
        </div>

        <form action="{{ route('projection.store') }}" method="POST" id="projectionForm">
            @csrf
            
            <!-- Step 1: Business Information -->
            <div class="form-section fade-in-up" id="section-1">
                <h2 class="section-title">
                    <div class="section-icon business">
                        <i class="fas fa-building"></i>
                    </div>
                    Informasi Bisnis
                </h2>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="business_name" class="form-label">Nama Bisnis</label>
                            <input type="text" class="form-control" id="business_name" name="business_name" 
                                   value="{{ old('business_name') }}" required>
                            @error('business_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="industry" class="form-label">Industri</label>
                            <select class="form-select" id="industry" name="industry" required>
                                <option value="">Pilih Industri</option>
                                <option value="Food & Beverage" {{ old('industry') == 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                                <option value="Technology" {{ old('industry') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                <option value="Fashion" {{ old('industry') == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="Healthcare" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="Education" {{ old('industry') == 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Finance" {{ old('industry') == 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="Manufacturing" {{ old('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                <option value="Retail" {{ old('industry') == 'Retail' ? 'selected' : '' }}>Retail</option>
                                <option value="Services" {{ old('industry') == 'Services' ? 'selected' : '' }}>Services</option>
                                <option value="Agriculture" {{ old('industry') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                <option value="Transportation" {{ old('industry') == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                <option value="Real Estate" {{ old('industry') == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                <option value="Entertainment" {{ old('industry') == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                                <option value="Energy" {{ old('industry') == 'Energy' ? 'selected' : '' }}>Energy</option>
                                <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                            @error('industry')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="baseline_units_sold" class="form-label">Total Unit Terjual Bulan Pertama</label>
                            <input type="number" class="form-control" id="baseline_units_sold" name="baseline_units_sold" 
                                   value="{{ old('baseline_units_sold') }}" min="1" required>
                            @error('baseline_units_sold')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="projection_years" class="form-label">Durasi Proyeksi (Tahun)</label>
                            <select class="form-control" id="projection_years" name="projection_years" required>
                                <option value="">Pilih Durasi</option>
                                <option value="1" {{ old('projection_years') == '1' ? 'selected' : '' }}>1 Tahun</option>
                                <option value="2" {{ old('projection_years') == '2' ? 'selected' : '' }}>2 Tahun</option>
                                <option value="3" {{ old('projection_years') == '3' ? 'selected' : '' }}>3 Tahun</option>
                                <option value="4" {{ old('projection_years') == '4' ? 'selected' : '' }}>4 Tahun</option>
                                <option value="5" {{ old('projection_years') == '5' ? 'selected' : '' }}>5 Tahun</option>
                            </select>
                            @error('projection_years')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Growth Rates per Year -->
                <div class="form-group">
                    <label class="form-label">Growth Rate Tahunan (%)</label>
                    <div id="yearly_growth_rates">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
            </div>

            <!-- Step 2: Assets and Funding -->
            <div class="form-section fade-in-up" id="section-2">
                <h2 class="section-title">
                    <div class="section-icon assets">
                        <i class="fas fa-tools"></i>
                    </div>
                    Aset & Pendanaan
                </h2>

                <!-- Assets -->
                <div class="form-group">
                    <label class="form-label">Aset & Depresiasi</label>
                    <div id="assets_container">
                        <!-- Assets will be added here -->
                    </div>
                    <button type="button" class="btn btn-warning" id="add_asset">
                        <i class="fas fa-plus"></i>
                        Tambah Aset
                    </button>
                </div>

                <!-- Funding Sources -->
                <div class="form-group">
                    <label class="form-label">Sumber Permodalan</label>
                    <div id="funding_sources_container">
                        <!-- Funding sources will be added here -->
                    </div>
                    <button type="button" class="btn btn-info" id="add_funding_source">
                        <i class="fas fa-plus"></i>
                        Tambah Sumber Modal
                    </button>
                </div>
            </div>

            <!-- Step 3: Products and Raw Materials -->
            <div class="form-section fade-in-up" id="section-3">
                <h2 class="section-title">
                    <div class="section-icon products">
                        <i class="fas fa-box"></i>
                    </div>
                    Produk & Bahan Baku
                </h2>
                
                <div id="products_container">
                    <!-- Products will be added here by JavaScript -->
                </div>

                <button type="button" class="btn btn-success" id="add-product">
                    <i class="fas fa-plus"></i>
                    Tambah Produk
                </button>

                <!-- Distribution Preview -->
                <div class="distribution-preview" id="distribution-preview" style="display: none;">
                    <h6 class="mb-3">Distribusi Penjualan Produk:</h6>
                    <div id="distribution-items"></div>
                    <div class="distribution-total" id="distribution-total">Total: 0%</div>
                </div>
            </div>

            <!-- Step 4: Costs and Employees -->
            <div class="form-section fade-in-up" id="section-4">
                <h2 class="section-title">
                    <div class="section-icon costs">
                        <i class="fas fa-calculator"></i>
                    </div>
                    Biaya & Karyawan
                </h2>

                <!-- Fixed Costs -->
                <div class="form-group">
                    <label class="form-label">Biaya Tetap (Bulanan)</label>
                    <div id="fixed_costs_container">
                        <div class="dynamic-field">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="fixed_costs[0][name]" class="form-control" placeholder="Nama Biaya" required>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" name="fixed_costs[0][amount]" class="form-control" placeholder="Nominal" min="0" step="1000" required oninput="formatCurrencyInput(this)">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeFixedCost(0)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-warning" id="add_fixed_cost">
                        <i class="fas fa-plus"></i>
                        Tambah Biaya Tetap
                    </button>
                </div>

                <!-- Variable Costs -->
                <div class="form-group">
                    <label class="form-label">Biaya Variabel (% dari Pendapatan)</label>
                    <div id="variable_costs_container">
                        <!-- Variable costs will be added here -->
                    </div>
                    <button type="button" class="btn btn-info" id="add_variable_cost">
                        <i class="fas fa-plus"></i>
                        Tambah Biaya Variabel
                    </button>
                </div>

                <!-- Employees -->
                <div class="form-group">
                    <label class="form-label">Karyawan</label>
                    <div id="employees_container">
                        <!-- Employees will be added here -->
                    </div>
                    <button type="button" class="btn btn-primary" id="add_employee">
                        <i class="fas fa-plus"></i>
                        Tambah Karyawan
                    </button>
                </div>
            </div>


            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg" id="submit-btn">
                    <i class="fas fa-calculator"></i>
                    Generate Financial Projection
                </button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Global variables
        let productCounter = 0;
        let fixedCostCounter = 1;
        let variableCostCounter = 0;
        let employeeCounter = 0;
        let assetCounter = 0;
        let fundingSourceCounter = 0;

        // Format currency functions
        function formatCurrency(value) {
            if (!value) return '';
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(value).replace('IDR', '').trim();
        }

        function formatNumber(value) {
            if (!value) return '';
            return new Intl.NumberFormat('id-ID').format(value);
        }

        function formatPercentage(value) {
            if (!value) return '';
            return value + '%';
        }

        // Input formatting functions
        function formatCurrencyInput(input) {
            // Remove all non-digit characters
            let value = input.value.replace(/[^\d]/g, '');
            
            if (value) {
                // Convert to number and format with dots
                let numValue = parseInt(value);
                input.value = formatNumber(numValue);
            } else {
                input.value = '';
            }
        }

        // Function to clean currency input before form submission
        function cleanCurrencyInputs() {
            document.querySelectorAll('input[oninput*="formatCurrencyInput"]').forEach(input => {
                // Remove formatting dots and convert to clean number
                let cleanValue = input.value.replace(/\./g, '');
                input.value = cleanValue;
            });
        }

        function formatPercentageInput(input) {
            // Allow only numbers and decimal point
            let value = input.value.replace(/[^\d.,]/g, '');
            
            // Replace comma with dot for decimal
            value = value.replace(',', '.');
            
            // Limit to 2 decimal places
            if (value.includes('.')) {
                let parts = value.split('.');
                if (parts[1] && parts[1].length > 2) {
                    parts[1] = parts[1].substring(0, 2);
                    value = parts.join('.');
                }
            }
            
            // Ensure value is within valid range
            let numValue = parseFloat(value);
            if (numValue > 100) {
                value = '100';
            } else if (numValue < 0) {
                value = '0';
            }
            
            input.value = value;
            
            // Update distribution preview
            updateDistribution();
        }

        // Auto-format on input for all currency fields
        function setupCurrencyFormatting() {
            // Format existing currency inputs
            document.querySelectorAll('input[oninput*="formatCurrencyInput"]').forEach(input => {
                if (input.value) {
                    formatCurrencyInput(input);
                }
            });
        }

        // Variable costs management
        function addVariableCost() {
            const container = document.getElementById('variable_costs_container');
            const costDiv = document.createElement('div');
            costDiv.className = 'dynamic-field';
            costDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="variable_costs[${variableCostCounter}][name]" class="form-control" placeholder="Nama Biaya Variabel">
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <input type="text" name="variable_costs[${variableCostCounter}][percentage]" class="form-control" placeholder="Persentase" min="0" max="100" step="0.01" oninput="formatPercentageInput(this)">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeVariableCost(${variableCostCounter})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(costDiv);
            variableCostCounter++;
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeVariableCost(index) {
            const costDiv = document.querySelector(`input[name="variable_costs[${index}][name]"]`).closest('.dynamic-field');
            costDiv.remove();
        }

        // Employee management
        function addEmployee() {
            const container = document.getElementById('employees_container');
            const employeeDiv = document.createElement('div');
            employeeDiv.className = 'dynamic-field';
            employeeDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="employees[${employeeCounter}][name]" class="form-control" placeholder="Nama Karyawan">
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="employees[${employeeCounter}][salary]" class="form-control" placeholder="Gaji" min="0" step="1000" oninput="formatCurrencyInput(this)">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="employees[${employeeCounter}][start_month]" class="form-control" placeholder="Mulai Bulan" min="1">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="employees[${employeeCounter}][end_month]" class="form-control" placeholder="Selesai Bulan" min="1">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeEmployee(${employeeCounter})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(employeeDiv);
            employeeCounter++;
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeEmployee(index) {
            const employeeDiv = document.querySelector(`input[name="employees[${index}][name]"]`).closest('.dynamic-field');
            employeeDiv.remove();
        }

        // Initialize form
        document.addEventListener('DOMContentLoaded', function() {
            updateProgress();
            generateYearlyGrowthRates();
            addAsset();
            addFundingSource();
            addProduct();
            addFixedCost();
            // Don't add default variable costs and employees - they are optional
            
            // Setup currency formatting for existing fields
            setupCurrencyFormatting();
            
            // Event listeners
            document.getElementById('projection_years').addEventListener('change', generateYearlyGrowthRates);
            document.getElementById('add-product').addEventListener('click', addProduct);
            document.getElementById('add_fixed_cost').addEventListener('click', addFixedCost);
            document.getElementById('add_variable_cost').addEventListener('click', addVariableCost);
            document.getElementById('add_employee').addEventListener('click', addEmployee);
            document.getElementById('add_asset').addEventListener('click', addAsset);
            document.getElementById('add_funding_source').addEventListener('click', addFundingSource);
        });

        // Update progress indicator
        function updateProgress() {
            const currentStep = getCurrentStep();
            const progressFill = document.getElementById('progress-fill');
            const progressPercentage = (currentStep / 4) * 100;
            
            progressFill.style.width = progressPercentage + '%';
            
            // Update step circles
            for (let i = 1; i <= 4; i++) {
                const stepCircle = document.getElementById(`step-${i}`);
                if (i < currentStep) {
                    stepCircle.className = 'step-circle completed';
                } else if (i === currentStep) {
                    stepCircle.className = 'step-circle active';
                } else {
                    stepCircle.className = 'step-circle pending';
                }
            }
        }

        function getCurrentStep() {
            const sections = ['section-1', 'section-2', 'section-3', 'section-4'];
            for (let i = 0; i < sections.length; i++) {
                const section = document.getElementById(sections[i]);
                const rect = section.getBoundingClientRect();
                if (rect.top > window.innerHeight / 2) {
                    return i + 1;
                }
            }
            return 4;
        }

        // Generate yearly growth rate inputs
        function generateYearlyGrowthRates() {
            const projectionYears = document.getElementById('projection_years').value;
            const container = document.getElementById('yearly_growth_rates');
            
            if (!projectionYears) {
                container.innerHTML = '<p class="text-muted">Pilih durasi proyeksi terlebih dahulu</p>';
                return;
            }

            container.innerHTML = '';
            for (let year = 1; year <= projectionYears; year++) {
                const div = document.createElement('div');
                div.className = 'row mb-2';
                div.innerHTML = `
                    <div class="col-md-6">
                        <label class="form-label">Tahun ${year}</label>
                        <input type="number" name="yearly_growth_rates[${year}]" class="form-control" 
                               placeholder="Growth rate tahunan (%)" min="0" max="100" step="0.01" required>
                    </div>
                `;
                container.appendChild(div);
            }
        }

        // Product management
        function addProduct() {
            const container = document.getElementById('products_container');
            const productDiv = document.createElement('div');
            productDiv.className = 'dynamic-field';
            productDiv.id = `product-${productCounter}`;
            
            productDiv.innerHTML = `
                <div class="dynamic-field-header">
                    <div class="field-number">${productCounter + 1}</div>
                    <button type="button" class="btn-remove" onclick="removeProduct(${productCounter})">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" name="products[${productCounter}][name]" class="form-control" placeholder="Nama Produk" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Harga Jual per Unit</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="products[${productCounter}][selling_price]" class="form-control" 
                                   placeholder="Harga Jual" min="0" step="1000" required oninput="formatCurrencyInput(this)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Biaya Kemasan</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="products[${productCounter}][packaging_cost]" class="form-control" 
                                   placeholder="Biaya Kemasan" min="0" step="100" oninput="formatCurrencyInput(this)">
                        </div>
                        <small class="text-muted">Opsional</small>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Tenaga Kerja Langsung</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="products[${productCounter}][direct_labor_cost]" class="form-control" 
                                   placeholder="Biaya Tenaga Kerja" min="0" step="100" oninput="formatCurrencyInput(this)">
                        </div>
                        <small class="text-muted">Opsional</small>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="form-label">Persentase Penjualan</label>
                        <div class="input-group">
                            <input type="number" name="products[${productCounter}][sales_percentage]" class="form-control sales-percentage" 
                                   placeholder="Persentase" min="0" max="100" step="0.01" required oninput="formatPercentageInput(this)" onchange="updateDistribution()">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="form-label">Bahan Baku</label>
                    <div id="raw-materials-${productCounter}">
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <input type="text" name="products[${productCounter}][raw_materials][0][name]" class="form-control" placeholder="Nama Bahan" required>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" name="products[${productCounter}][raw_materials][0][cost_per_unit]" class="form-control" 
                                           placeholder="Harga per Unit" min="0" step="100" required oninput="formatCurrencyInput(this)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="products[${productCounter}][raw_materials][0][quantity]" class="form-control" 
                                       placeholder="Jumlah" min="0" step="0.01" required>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-warning btn-sm" onclick="addRawMaterial(${productCounter})">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            container.appendChild(productDiv);
            productCounter++;
            updateDistribution();
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeProduct(index) {
            document.getElementById(`product-${index}`).remove();
            updateDistribution();
        }

        function addRawMaterial(productIndex) {
            const container = document.getElementById(`raw-materials-${productIndex}`);
            const materialCount = container.children.length;
            
            const materialRow = document.createElement('div');
            materialRow.className = 'row mb-2';
            materialRow.innerHTML = `
                <div class="col-md-4">
                    <input type="text" name="products[${productIndex}][raw_materials][${materialCount}][name]" class="form-control" placeholder="Nama Bahan" required>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" name="products[${productIndex}][raw_materials][${materialCount}][cost_per_unit]" class="form-control" 
                               placeholder="Harga per Unit" min="0" step="100" required oninput="formatCurrencyInput(this)">
                    </div>
                </div>
                <div class="col-md-3">
                    <input type="number" name="products[${productIndex}][raw_materials][${materialCount}][quantity]" class="form-control" 
                           placeholder="Jumlah" min="0" step="0.01" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeRawMaterial(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            
            container.appendChild(materialRow);
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeRawMaterial(button) {
            button.closest('.row').remove();
        }

        function updateDistribution() {
            const percentages = document.querySelectorAll('.sales-percentage');
            const preview = document.getElementById('distribution-preview');
            const items = document.getElementById('distribution-items');
            const total = document.getElementById('distribution-total');
            
            let totalPercentage = 0;
            items.innerHTML = '';
            
            percentages.forEach((input, index) => {
                const value = parseFloat(input.value) || 0;
                totalPercentage += value;
                
                const productName = input.closest('.dynamic-field').querySelector('input[name*="[name]"]').value || `Produk ${index + 1}`;
                
                const item = document.createElement('div');
                item.className = 'distribution-item';
                item.innerHTML = `
                    <span>${productName}</span>
                    <span>${value.toFixed(2)}%</span>
                `;
                items.appendChild(item);
            });
            
            total.textContent = `Total: ${totalPercentage.toFixed(2)}%`;
            preview.style.display = totalPercentage > 0 ? 'block' : 'none';
            
            // Highlight if total is not 100%
            if (Math.abs(totalPercentage - 100) > 0.01) {
                total.style.color = totalPercentage > 100 ? '#ef4444' : '#f59e0b';
            } else {
                total.style.color = '#0369a1';
            }
        }

        // Fixed costs management
        function addFixedCost() {
            const container = document.getElementById('fixed_costs_container');
            const costDiv = document.createElement('div');
            costDiv.className = 'dynamic-field';
            costDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="fixed_costs[${fixedCostCounter}][name]" class="form-control" placeholder="Nama Biaya" required>
                    </div>
                    <div class="col-md-5">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="fixed_costs[${fixedCostCounter}][amount]" class="form-control" placeholder="Nominal" min="0" step="1000" required oninput="formatCurrencyInput(this)">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeFixedCost(${fixedCostCounter})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(costDiv);
            fixedCostCounter++;
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeFixedCost(index) {
            const costDiv = document.querySelector(`input[name="fixed_costs[${index}][name]"]`).closest('.dynamic-field');
            costDiv.remove();
        }

        // Asset management
        function addAsset() {
            const container = document.getElementById('assets_container');
            const assetDiv = document.createElement('div');
            assetDiv.className = 'dynamic-field';
            assetDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="assets[${assetCounter}][name]" class="form-control" placeholder="Nama Aset" required>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="assets[${assetCounter}][purchase_price]" class="form-control" placeholder="Harga Beli" min="0" step="1000" required oninput="formatCurrencyInput(this)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="assets[${assetCounter}][purchase_date]" class="form-control" required>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeAsset(${assetCounter})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>
                            Masa manfaat aset akan dihitung otomatis berdasarkan durasi proyeksi yang dipilih
                        </small>
                    </div>
                </div>
            `;
            container.appendChild(assetDiv);
            assetCounter++;
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeAsset(index) {
            const assetDiv = document.querySelector(`input[name="assets[${index}][name]"]`).closest('.dynamic-field');
            assetDiv.remove();
        }

        // Funding source management
        function addFundingSource() {
            const container = document.getElementById('funding_sources_container');
            const fundingDiv = document.createElement('div');
            fundingDiv.className = 'dynamic-field';
            fundingDiv.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <select name="funding_sources[${fundingSourceCounter}][type]" class="form-control" required>
                            <option value="">Pilih Jenis</option>
                            <option value="equity">Modal Sendiri</option>
                            <option value="loan">Pinjaman</option>
                            <option value="investment">Investasi</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" name="funding_sources[${fundingSourceCounter}][amount]" class="form-control" placeholder="Jumlah" min="0" step="1000" required oninput="formatCurrencyInput(this)">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="funding_sources[${fundingSourceCounter}][interest_rate]" class="form-control" placeholder="Bunga" min="0" max="100" step="0.01" oninput="formatPercentageInput(this)">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-sm btn-remove" onclick="removeFundingSource(${fundingSourceCounter})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <input type="number" name="funding_sources[${fundingSourceCounter}][tenor_months]" class="form-control" placeholder="Tenor (Bulan)" min="1">
                    </div>
                </div>
            `;
            container.appendChild(fundingDiv);
            fundingSourceCounter++;
            
            // Setup formatting for new field
            setupCurrencyFormatting();
        }

        function removeFundingSource(index) {
            const fundingDiv = document.querySelector(`input[name="funding_sources[${index}][amount]"]`).closest('.dynamic-field');
            fundingDiv.remove();
        }


        // Form validation
        document.getElementById('projectionForm').addEventListener('submit', function(e) {
            console.log('Form submission started...');
            
            // Clean currency inputs before validation
            cleanCurrencyInputs();
            
            const percentages = document.querySelectorAll('.sales-percentage');
            let totalPercentage = 0;
            let emptyFields = [];
            
            console.log('Found percentage fields:', percentages.length);
            
            percentages.forEach((input, index) => {
                let value = parseFloat(input.value) || 0;
                totalPercentage += value;
                console.log(`Field ${index + 1}: ${input.value} (parsed: ${value})`);
                
                if (!input.value || input.value.trim() === '') {
                    emptyFields.push(`Produk ${index + 1}`);
                }
            });
            
            console.log('Total percentage:', totalPercentage);
            
            // Check for empty fields
            if (emptyFields.length > 0) {
                e.preventDefault();
                alert(`Harap isi persentase untuk: ${emptyFields.join(', ')}`);
                return false;
            }
            
            // Check percentage total
            if (Math.abs(totalPercentage - 100) > 0.01) {
                e.preventDefault();
                alert(`Total persentase distribusi produk harus 100%. Saat ini: ${totalPercentage.toFixed(2)}%`);
                return false;
            }
            
            // Validate variable costs if any are filled
            const variableCostInputs = document.querySelectorAll('input[name*="variable_costs"][name*="name"]');
            let incompleteVariableCosts = [];
            variableCostInputs.forEach((input, index) => {
                const name = input.value.trim();
                const percentageInput = input.closest('.dynamic-field').querySelector('input[name*="percentage"]');
                const percentage = percentageInput ? percentageInput.value.trim() : '';
                
                if ((name && !percentage) || (!name && percentage)) {
                    incompleteVariableCosts.push(`Biaya Variabel ${index + 1}`);
                }
            });
            
            if (incompleteVariableCosts.length > 0) {
                e.preventDefault();
                alert(`Harap lengkapi data untuk: ${incompleteVariableCosts.join(', ')}`);
                return false;
            }
            
            // Validate employees if any are filled
            const employeeInputs = document.querySelectorAll('input[name*="employees"][name*="name"]');
            let incompleteEmployees = [];
            employeeInputs.forEach((input, index) => {
                const name = input.value.trim();
                const salaryInput = input.closest('.dynamic-field').querySelector('input[name*="salary"]');
                const startMonthInput = input.closest('.dynamic-field').querySelector('input[name*="start_month"]');
                const endMonthInput = input.closest('.dynamic-field').querySelector('input[name*="end_month"]');
                
                const salary = salaryInput ? salaryInput.value.trim() : '';
                const startMonth = startMonthInput ? startMonthInput.value.trim() : '';
                const endMonth = endMonthInput ? endMonthInput.value.trim() : '';
                
                if ((name || salary || startMonth || endMonth) && (!name || !salary || !startMonth || !endMonth)) {
                    incompleteEmployees.push(`Karyawan ${index + 1}`);
                }
            });
            
            if (incompleteEmployees.length > 0) {
                e.preventDefault();
                alert(`Harap lengkapi data untuk: ${incompleteEmployees.join(', ')}`);
                return false;
            }
            
            console.log('Form validation passed, submitting...');
        });

        // Scroll to sections
        window.addEventListener('scroll', updateProgress);
    </script>
</body>
</html>
