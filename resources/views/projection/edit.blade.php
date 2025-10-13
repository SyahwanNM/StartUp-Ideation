<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyeksi Keuangan - {{ $projection->business_name }}</title>
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

        .edit-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            background: var(--warning-gradient);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(67, 233, 123, 0.3);
            margin-bottom: 2rem;
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

        .pulse {
            animation: pulse 2s infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2.5rem;
            }
            
            .form-section {
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
            width: 30px;
            height: 30px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: translate(-50%, -50%) rotate(0deg); }
            100% { transform: translate(-50%, -50%) rotate(360deg); }
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
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header fade-in-up">
            <h1 class="page-title">
                <i class="fas fa-edit me-3"></i>
                Edit Proyeksi Keuangan
            </h1>
            <p class="page-subtitle">
                Perbarui data proyeksi keuangan untuk {{ $projection->business_name }}
            </p>
            
            <div class="edit-badge">
                <i class="fas fa-edit"></i>
                <span>Mode Edit</span>
            </div>
        </div>

        <!-- Main Form -->
        <form method="POST" action="{{ route('projection.update', $projection->id) }}" id="projection-form">
            @csrf
            @method('PUT')
            
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
                                       value="{{ old('business_name', $projection->business_name) }}"
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
                                       value="{{ old('baseline_revenue', $projection->baseline_revenue) }}"
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
                            <label for="annual_growth_rate" class="form-label">
                                <i class="fas fa-percentage"></i>
                                Tingkat Pertumbuhan Tahunan
                                <span class="tooltip" data-tooltip="Persentase pertumbuhan pendapatan per tahun (0-100%)">
                                    <i class="fas fa-question-circle text-muted"></i>
                                </span>
                            </label>
                            <div class="input-group">
                                <i class="fas fa-percentage input-icon"></i>
                                <input type="number" 
                                       class="form-control" 
                                       id="annual_growth_rate" 
                                       name="annual_growth_rate" 
                                       placeholder="Contoh: 20 untuk 20%"
                                       value="{{ old('annual_growth_rate', $projection->annual_growth_rate) }}"
                                       min="0" 
                                       max="100" 
                                       step="0.1" 
                                       required>
                            </div>
                        </div>
                    </div>
                    
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
                                    <option value="1" {{ old('projection_years', $projection->projection_years) == '1' ? 'selected' : '' }}>1 Tahun</option>
                                    <option value="2" {{ old('projection_years', $projection->projection_years) == '2' ? 'selected' : '' }}>2 Tahun</option>
                                    <option value="3" {{ old('projection_years', $projection->projection_years) == '3' ? 'selected' : '' }}>3 Tahun</option>
                                    <option value="4" {{ old('projection_years', $projection->projection_years) == '4' ? 'selected' : '' }}>4 Tahun</option>
                                    <option value="5" {{ old('projection_years', $projection->projection_years) == '5' ? 'selected' : '' }}>5 Tahun</option>
                                </select>
                            </div>
                        </div>
                    </div>
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
                    @foreach($projection->fixed_costs as $index => $cost)
                    <div class="cost-item">
                        <div class="cost-item-header">
                            <h6 class="cost-item-title">Biaya Tetap #{{ $index + 1 }}</h6>
                            @if($index > 0)
                            <button type="button" class="remove-cost-btn" onclick="removeFixedCost(this)">
                                <i class="fas fa-times"></i>
                            </button>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama Biaya</label>
                                    <input type="text" 
                                           name="fixed_costs[{{ $index }}][name]" 
                                           class="form-control" 
                                           placeholder="Contoh: Sewa Kantor" 
                                           value="{{ old('fixed_costs.'.$index.'.name', $cost['name']) }}"
                                           required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Jumlah per Bulan</label>
                                    <input type="number" 
                                           name="fixed_costs[{{ $index }}][amount]" 
                                           class="form-control" 
                                           placeholder="Contoh: 5000000" 
                                           value="{{ old('fixed_costs.'.$index.'.amount', $cost['amount']) }}"
                                           min="0" 
                                           step="1000" 
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addFixedCost()">
                    <i class="fas fa-plus"></i>
                    Tambah Biaya Tetap
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
                    @if(count($projection->variable_costs) > 0)
                        @foreach($projection->variable_costs as $index => $cost)
                        <div class="cost-item">
                            <div class="cost-item-header">
                                <h6 class="cost-item-title">Biaya Variabel #{{ $index + 1 }}</h6>
                                <button type="button" class="remove-cost-btn" onclick="removeVariableCost(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nama Biaya</label>
                                        <input type="text" 
                                               name="variable_costs[{{ $index }}][name]" 
                                               class="form-control" 
                                               placeholder="Contoh: Bahan Baku"
                                               value="{{ old('variable_costs.'.$index.'.name', $cost['name']) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Persentase dari Pendapatan</label>
                                        <input type="number" 
                                               name="variable_costs[{{ $index }}][percentage]" 
                                               class="form-control" 
                                               placeholder="Contoh: 30 untuk 30%" 
                                               value="{{ old('variable_costs.'.$index.'.percentage', $cost['percentage']) }}"
                                               min="0" 
                                               max="100" 
                                               step="0.01">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
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
                    @endif
                </div>
                
                <button type="button" class="btn btn-warning" onclick="addVariableCost()">
                    <i class="fas fa-plus"></i>
                    Tambah Biaya Variabel
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
                    @if(count($projection->employees) > 0)
                        @foreach($projection->employees as $index => $employee)
                        <div class="cost-item employee-item">
                            <div class="cost-item-header">
                                <h6 class="cost-item-title">Karyawan #{{ $index + 1 }}</h6>
                                <button type="button" class="remove-cost-btn" onclick="removeEmployee(this)">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Nama Karyawan</label>
                                        <input type="text" 
                                               name="employees[{{ $index }}][name]" 
                                               class="form-control" 
                                               placeholder="Nama lengkap"
                                               value="{{ old('employees.'.$index.'.name', $employee['name']) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Gaji per Bulan</label>
                                        <input type="number" 
                                               name="employees[{{ $index }}][salary]" 
                                               class="form-control" 
                                               placeholder="Contoh: 5000000" 
                                               value="{{ old('employees.'.$index.'.salary', $employee['salary']) }}"
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
                                                <select name="employees[{{ $index }}][start_month]" class="form-control form-control-sm">
                                                    @for($i = 1; $i <= 12; $i++)
                                                    <option value="{{ $i }}" {{ old('employees.'.$index.'.start_month', $employee['start_month']) == $i ? 'selected' : '' }}>
                                                        {{ ['', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'][$i] }} (Bulan {{ $i }})
                                                    </option>
                                                    @endfor
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label small">Selesai Bulan</label>
                                                <select name="employees[{{ $index }}][end_month]" class="form-control form-control-sm" id="end-month-select-{{ $index }}">
                                                    <!-- Options will be populated by JavaScript -->
                                                </select>
                                            </div>
                                        </div>
                                        <small class="text-muted">Pilih kapan karyawan mulai dan selesai bekerja</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="cost-item employee-item">
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
                    @endif
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
                                <i class="fas fa-save"></i>
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('projection.show', $projection->id) }}" class="btn btn-success btn-lg">
                                <i class="fas fa-eye"></i>
                                Lihat Hasil
                            </a>
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
        let fixedCostCounter = {{ count($projection->fixed_costs) }};
        let variableCostCounter = {{ count($projection->variable_costs) }};
        let employeeCounter = {{ count($projection->employees) }};

        // Form validation
        function validateForm() {
            const businessName = document.querySelector('input[name="business_name"]').value.trim();
            const baselineRevenue = document.querySelector('input[name="baseline_revenue"]').value.trim();
            const annualGrowthRate = document.querySelector('input[name="annual_growth_rate"]').value.trim();
            const projectionYears = document.querySelector('select[name="projection_years"]').value;

            if (!businessName || !baselineRevenue || !annualGrowthRate || !projectionYears) {
                alert('Mohon lengkapi semua informasi dasar!');
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

        // Add fixed cost
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

        // Add variable cost
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

        // Add employee
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
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;
            });
        });

        // Update end month options when projection years change
        document.querySelector('select[name="projection_years"]').addEventListener('change', function() {
            updateEndMonthOptions();
        });
    </script>
</body>
</html>