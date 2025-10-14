@extends('layouts.head')

@section('title', 'Buat Market Validation - Ideation')

@section('styles')
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

    body {
        background: var(--gray-50);
        min-height: 100vh;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        line-height: 1.6;
        color: var(--gray-800);
        font-size: 14px;
    }

    .main-container {
        padding: 2rem 0;
        min-height: 100vh;
    }

    .wizard-container {
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        padding: 0;
        margin: 2rem auto;
        max-width: 900px;
        overflow: hidden;
    }

    .wizard-header {
        background: var(--primary);
        color: white;
        padding: 2rem;
        text-align: center;
    }

    .wizard-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 0.5rem;
        letter-spacing: -0.025em;
    }

    .wizard-subtitle {
        font-size: 1.125rem;
        color: var(--gray-600);
        font-weight: 400;
        line-height: 1.6;
        opacity: 0.9;
    }

    .progress-container {
        background: rgba(255,255,255,0.1);
        border-radius: var(--radius);
        padding: 1rem;
        margin-top: 1.5rem;
    }

    .progress-steps {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .progress-line {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 2px;
        background: rgba(255,255,255,0.3);
        z-index: 1;
    }

    .progress-line-fill {
        height: 100%;
        background: white;
        transition: width 0.3s ease;
        width: 0%;
    }

    .step {
        background: rgba(255,255,255,0.3);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 0.875rem;
        position: relative;
        z-index: 2;
        transition: var(--transition);
    }

    .step.active {
        background: white;
        color: var(--primary);
        transform: scale(1.05);
    }

    .step.completed {
        background: var(--success);
        color: white;
    }

    .step-labels {
        display: flex;
        justify-content: space-between;
        margin-top: 0.5rem;
    }

    .step-label {
        font-size: 0.75rem;
        opacity: 0.8;
        text-align: center;
        flex: 1;
    }

    .wizard-content {
        padding: 2rem;
    }

    .step-content {
        display: none;
        animation: fadeIn 0.3s ease;
    }

    .step-content.active {
        display: block;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .step-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .step-title {
        color: var(--gray-900);
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .step-description {
        color: var(--gray-600);
        font-size: 1rem;
        line-height: 1.6;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 500;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius);
        font-size: 0.875rem;
        transition: var(--transition);
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        background: white;
    }

    .form-control.large {
        min-height: 120px;
        resize: vertical;
    }

    .input-group {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .input-with-label {
        flex: 1;
    }

    .currency-input {
        position: relative;
    }

    .currency-symbol {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #718096;
        font-weight: 600;
    }

    .currency-input .form-control {
        padding-left: 3rem;
    }

    .percentage-input {
        position: relative;
    }

    .percentage-symbol {
        position: absolute;
        right: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #718096;
        font-weight: 600;
    }

    .percentage-input .form-control {
        padding-right: 3rem;
    }

    .calculated-field {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border-color: #0ea5e9;
        color: #0c4a6e;
        font-weight: 600;
    }

    .info-box {
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border: 1px solid #f59e0b;
        border-radius: 12px;
        padding: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-box-icon {
        color: #d97706;
        margin-right: 0.5rem;
    }

    .info-box-text {
        color: #92400e;
        font-size: 0.95rem;
        line-height: 1.5;
        margin: 0;
    }

    .calculation-preview {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
        border: 2px solid #0ea5e9;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }

    .calculation-title {
        color: #0c4a6e;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .calculation-result {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0ea5e9;
        text-align: center;
    }

    .calculation-formula {
        font-size: 0.9rem;
        color: #64748b;
        text-align: center;
        margin-top: 0.5rem;
    }

    .reference-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border: 2px solid #dee2e6;
        border-radius: 12px;
        padding: 1.5rem;
        margin: 1.5rem 0;
    }

    .reference-title {
        color: #495057;
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .reference-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
    }

    .reference-item {
        background: white;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        padding: 1rem;
        text-align: center;
    }

    .reference-label {
        display: block;
        font-size: 0.85rem;
        color: #6c757d;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .reference-value {
        font-size: 1.1rem;
        font-weight: 700;
        color: #495057;
    }

    /* Data Sources Section - Minimalist Design */
    .data-sources-section {
        background: #fafbfc;
        border: 1px solid #e1e5e9;
        border-radius: 8px;
        padding: 1.5rem;
        margin: 1.5rem 0;
    }

    .data-sources-title {
        color: #2d3748;
        font-weight: 600;
        font-size: 1.1rem;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
    }

    .data-sources-description {
        color: #718096;
        font-size: 0.9rem;
        margin-bottom: 1.25rem;
        line-height: 1.5;
    }

    .data-sources-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .data-source-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 1rem;
        transition: all 0.2s ease;
        position: relative;
    }

    .data-source-card:hover {
        border-color: #3182ce;
        box-shadow: 0 2px 8px rgba(49, 130, 206, 0.1);
    }

    .data-source-header {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .data-source-logo {
        width: 32px;
        height: 32px;
        margin-right: 0.75rem;
        border-radius: 4px;
        object-fit: contain;
        background: #f7fafc;
        padding: 4px;
    }

    .data-source-header h5 {
        color: #2d3748;
        font-weight: 600;
        font-size: 0.95rem;
        margin: 0;
        line-height: 1.3;
    }

    .data-source-description {
        color: #718096;
        font-size: 0.85rem;
        line-height: 1.4;
        margin-bottom: 0.75rem;
    }

    .data-source-link {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        background: #3182ce;
        color: white;
        text-decoration: none;
        padding: 0.375rem 0.75rem;
        border-radius: 4px;
        font-size: 0.8rem;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .data-source-link:hover {
        background: #2c5282;
        color: white;
        text-decoration: none;
    }

    .data-tips {
        background: #f7fafc;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        padding: 1rem;
        margin-top: 1rem;
    }

    .data-tips h5 {
        color: #2d3748;
        font-weight: 600;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .data-tips ul {
        margin: 0;
        padding-left: 1.25rem;
    }

    .data-tips li {
        color: #4a5568;
        font-size: 0.85rem;
        line-height: 1.5;
        margin-bottom: 0.375rem;
    }

    .wizard-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #e2e8f0;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: var(--radius);
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        font-size: 0.875rem;
        transition: var(--transition);
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .btn-secondary {
        background: var(--secondary);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .btn-success {
        background: var(--success);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .btn:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .dynamic-inputs {
        margin-top: 1rem;
    }

    .dynamic-input-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
    }

    .dynamic-input-group input {
        flex: 1;
    }

    .btn-remove {
        background: #dc3545;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-remove:hover {
        background: #c82333;
        transform: scale(1.1);
    }

    .btn-add {
        background: #28a745;
        color: white;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-add:hover {
        background: #218838;
        transform: translateY(-1px);
    }

    .summary-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 12px;
        padding: 2rem;
        margin-top: 2rem;
    }

    .summary-title {
        color: #2d3748;
        font-weight: 700;
        font-size: 1.3rem;
        margin-bottom: 1.5rem;
        text-align: center;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 1rem;
    }

    .summary-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .summary-card.tam {
        border-top: 4px solid #e53e3e;
    }

    .summary-card.sam {
        border-top: 4px solid #3182ce;
    }

    .summary-card.som {
        border-top: 4px solid #38a169;
    }

    .summary-card-title {
        font-weight: 700;
        font-size: 1.1rem;
        margin-bottom: 0.5rem;
    }

    .summary-card.tam .summary-card-title {
        color: #e53e3e;
    }

    .summary-card.sam .summary-card-title {
        color: #3182ce;
    }

    .summary-card.som .summary-card-title {
        color: #38a169;
    }

    .summary-card-value {
        font-size: 1.2rem;
        font-weight: 700;
        color: #2d3748;
    }

    .alert {
        border-radius: 10px;
        padding: 1rem;
        margin-bottom: 1rem;
        border: none;
    }

    .alert-success {
        background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
        color: #155724;
    }

    .alert-danger {
        background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
        color: #721c24;
    }

    /* Navigation Styles */
    .navbar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
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
        transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        padding: 0.5rem 1rem;
    }

    .navbar-nav .nav-link:hover {
        color: #a5b4fc !important;
        transform: translateY(-1px);
    }

    .navbar-nav .nav-link.active {
        color: #a5b4fc !important;
        font-weight: 600;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .wizard-container {
            margin: 1.5rem;
        }
        
        .wizard-content {
            padding: 2.5rem;
        }
    }

    @media (max-width: 768px) {
        .wizard-container {
            margin: 1rem;
        }
        
        .wizard-header {
            padding: 1rem 0;
            text-align: center;
        }
        
        .wizard-title {
            font-size: 1.75rem;
        }
        
        .wizard-subtitle {
            font-size: 1rem;
        }
        
        .wizard-content {
            padding: 1.5rem;
        }
        
        .step-content {
            padding: 1rem;
        }
        
        .step-title {
            font-size: 1.25rem;
        }
        
        .step-description {
            font-size: 0.875rem;
        }
        
        .summary-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .wizard-actions {
            flex-direction: column;
            gap: 1rem;
        }
        
        .step-labels {
            font-size: 0.8rem;
        }
        
        .form-control {
            font-size: 0.875rem;
            padding: 0.75rem;
        }
        
        .btn {
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
        }
        
        .navbar-nav {
            text-align: center;
        }
        
        .navbar-nav .nav-link {
            padding: 0.75rem 1rem;
        }
    }

    @media (max-width: 576px) {
        .wizard-container {
            margin: 0.5rem;
        }
        
        .wizard-title {
            font-size: 1.5rem;
        }
        
        .wizard-subtitle {
            font-size: 0.875rem;
        }
        
        .wizard-content {
            padding: 1rem;
        }
        
        .step-content {
            padding: 0.75rem;
        }
        
        .step-title {
            font-size: 1.125rem;
        }
        
        .step-description {
            font-size: 0.8rem;
        }
        
        .form-control {
            font-size: 0.8rem;
            padding: 0.625rem;
        }
        
        .btn {
            padding: 0.625rem 1rem;
            font-size: 0.8rem;
        }
        
        .step-labels {
            font-size: 0.7rem;
        }
    }
</style>
@endsection

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
                        <a class="nav-link" href="{{ route('projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container main-container">
        <div class="wizard-container">
            <!-- Wizard Header -->
            <div class="wizard-header">
                <h1 class="wizard-title">Market Validation Analysis</h1>
                <p class="wizard-subtitle">Analisis pasar yang komprehensif untuk validasi bisnis Anda</p>
                
                <!-- Progress Indicator -->
                <div class="progress-container">
                    <div class="progress-steps">
                        <div class="progress-line">
                            <div class="progress-line-fill" id="progressFill"></div>
                        </div>
                        <div class="step active" data-step="1">1</div>
                        <div class="step" data-step="2">2</div>
                        <div class="step" data-step="3">3</div>
                        <div class="step" data-step="4">4</div>
                        <div class="step" data-step="5">5</div>
                    </div>
                    <div class="step-labels">
                        <div class="step-label">Info Bisnis</div>
                        <div class="step-label">TAM</div>
                        <div class="step-label">SAM</div>
                        <div class="step-label">SOM</div>
                        <div class="step-label">Review</div>
                    </div>
                </div>
            </div>

            <!-- Wizard Content -->
            <div class="wizard-content">
                <form id="tamSamSomForm" method="POST" action="{{ route('tam-sam-som.store') }}">
                    @csrf
                    
                    <!-- Step 1: Business Information -->
                    <div class="step-content active" data-step="1">
                        <div class="step-header">
                            <h2 class="step-title">Informasi Bisnis</h2>
                            <p class="step-description">Mulai dengan informasi dasar tentang bisnis Anda</p>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Bisnis</label>
                            <input type="text" name="business_name" class="form-control" 
                                   placeholder="Contoh: EduTech Platform" 
                                   value="{{ old('business_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Pemilik</label>
                            <input type="text" name="owner_name" class="form-control" 
                                   placeholder="Contoh: Ahmad Rizki" 
                                   value="{{ old('owner_name') }}" required>
                        </div>

                        <div class="input-group">
                            <div class="input-with-label">
                                <label class="form-label">Industri</label>
                                <select name="industry" class="form-control" required>
                                    <option value="">Pilih Industri</option>
                                    <option value="Technology" {{ old('industry') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="Education Technology" {{ old('industry') == 'Education Technology' ? 'selected' : '' }}>Education Technology</option>
                                    <option value="Healthcare" {{ old('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                    <option value="Financial Services" {{ old('industry') == 'Financial Services' ? 'selected' : '' }}>Financial Services</option>
                                    <option value="E-commerce" {{ old('industry') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                                    <option value="Food & Beverage" {{ old('industry') == 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                                    <option value="Retail" {{ old('industry') == 'Retail' ? 'selected' : '' }}>Retail</option>
                                    <option value="Manufacturing" {{ old('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                    <option value="Real Estate" {{ old('industry') == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                    <option value="Transportation & Logistics" {{ old('industry') == 'Transportation & Logistics' ? 'selected' : '' }}>Transportation & Logistics</option>
                                    <option value="Entertainment & Media" {{ old('industry') == 'Entertainment & Media' ? 'selected' : '' }}>Entertainment & Media</option>
                                    <option value="Energy & Utilities" {{ old('industry') == 'Energy & Utilities' ? 'selected' : '' }}>Energy & Utilities</option>
                                    <option value="Agriculture" {{ old('industry') == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                    <option value="Tourism & Hospitality" {{ old('industry') == 'Tourism & Hospitality' ? 'selected' : '' }}>Tourism & Hospitality</option>
                                    <option value="Professional Services" {{ old('industry') == 'Professional Services' ? 'selected' : '' }}>Professional Services</option>
                                    <option value="Construction" {{ old('industry') == 'Construction' ? 'selected' : '' }}>Construction</option>
                                    <option value="Automotive" {{ old('industry') == 'Automotive' ? 'selected' : '' }}>Automotive</option>
                                    <option value="Fashion & Beauty" {{ old('industry') == 'Fashion & Beauty' ? 'selected' : '' }}>Fashion & Beauty</option>
                                    <option value="Sports & Fitness" {{ old('industry') == 'Sports & Fitness' ? 'selected' : '' }}>Sports & Fitness</option>
                                    <option value="Gaming" {{ old('industry') == 'Gaming' ? 'selected' : '' }}>Gaming</option>
                                    <option value="Social Media" {{ old('industry') == 'Social Media' ? 'selected' : '' }}>Social Media</option>
                                    <option value="Consulting" {{ old('industry') == 'Consulting' ? 'selected' : '' }}>Consulting</option>
                                    <option value="Non-profit" {{ old('industry') == 'Non-profit' ? 'selected' : '' }}>Non-profit</option>
                                    <option value="Government" {{ old('industry') == 'Government' ? 'selected' : '' }}>Government</option>
                                    <option value="Other" {{ old('industry') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="input-with-label">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="location" class="form-control" 
                                       placeholder="Contoh: Jakarta, Indonesia" 
                                       value="{{ old('location') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: TAM -->
                    <div class="step-content" data-step="2">
                        <div class="step-header">
                            <h2 class="step-title">TAM - Total Addressable Market</h2>
                            <p class="step-description">Berapa besar total pasar jika 100% target audience membeli produk Anda?</p>
                        </div>

                        <div class="info-box">
                            <i class="fas fa-info-circle info-box-icon"></i>
                            <p class="info-box-text">
                                <strong>TAM</strong> adalah total keseluruhan pasar untuk produk/layanan Anda. 
                                Contoh: Seluruh pengguna smartphone di Indonesia yang membutuhkan aplikasi produktivitas.
                            </p>
                        </div>

                        <!-- Data Sources Section -->
                        <div class="data-sources-section">
                            <h4 class="data-sources-title">
                                <i class="fas fa-database me-2"></i>Sumber Data untuk TAM
                            </h4>
                            <p class="data-sources-description">
                                Gunakan sumber data terpercaya untuk mendapatkan informasi pasar yang akurat:
                            </p>
                            <div class="data-sources-grid">
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 14px;">BPS</div>
                                        <h5>Badan Pusat Statistik</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Data demografi, ekonomi, dan sosial Indonesia yang resmi
                                    </p>
                                    <a href="https://www.bps.go.id" target="_blank" class="data-source-link">
                                        Kunjungi BPS
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #059669, #10b981); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 12px;">STAT</div>
                                        <h5>Statista</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Database statistik global dengan data pasar Indonesia
                                    </p>
                                    <a href="https://www.statista.com" target="_blank" class="data-source-link">
                                        Kunjungi Statista
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #7c3aed, #a855f7); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">WAS</div>
                                        <h5>We Are Social</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Laporan digital dan media sosial Indonesia tahunan
                                    </p>
                                    <a href="https://wearesocial.com" target="_blank" class="data-source-link">
                                        Kunjungi We Are Social
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #dc2626, #ef4444); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">KEM</div>
                                        <h5>Kementerian Perindustrian</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Data industri dan sektor ekonomi Indonesia
                                    </p>
                                    <a href="https://www.kemenperin.go.id" target="_blank" class="data-source-link">
                                        Kunjungi Kemenperin
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="Google Logo" class="data-source-logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #4285f4, #34a853); color: white; display: none; align-items: center; justify-content: center; font-weight: bold; font-size: 12px;">GOOGLE</div>
                                        <h5>Google Trends</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Analisis tren pencarian dan minat pasar
                                    </p>
                                    <a href="https://trends.google.com" target="_blank" class="data-source-link">
                                        Kunjungi Google Trends
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #4f46e5, #6366f1); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">AI</div>
                                        <h5>Asosiasi Industri</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Data spesifik industri dari asosiasi terkait
                                    </p>
                                    <a href="#" class="data-source-link" onclick="showIndustryAssociations()">
                                        Lihat Daftar Asosiasi
                                    </a>
                                </div>
                            </div>
                            
                            <div class="data-tips">
                                <h5><i class="fas fa-lightbulb me-2"></i>Tips Mencari Data TAM:</h5>
                                <ul>
                                    <li>Gunakan kata kunci: "market size", "total addressable market", "industri [nama industri]"</li>
                                    <li>Gabungkan data dari beberapa sumber untuk validasi</li>
                                    <li>Perhatikan tahun data dan pastikan masih relevan</li>
                                    <li>Gunakan data demografi BPS untuk estimasi populasi target</li>
                                </ul>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Deskripsi TAM</label>
                            <textarea name="tam_description" class="form-control large" 
                                      placeholder="Jelaskan total pasar yang dapat dialamatkan. Contoh: Seluruh pelajar dan mahasiswa di Indonesia yang membutuhkan platform pembelajaran online..." 
                                      required>{{ old('tam_description') }}</textarea>
                        </div>

                        <div class="input-group">
                            <div class="input-with-label">
                                <label class="form-label">Jumlah Total Pasar</label>
                                <input type="text" name="tam_market_size" id="tamMarketSize" class="form-control" 
                                       placeholder="50.000.000" value="{{ old('tam_market_size') ? number_format(old('tam_market_size'), 0, ',', '.') : '' }}" required>
                                <small class="text-muted">Jumlah total konsumen/unit dalam pasar</small>
                            </div>
                            <div class="input-with-label">
                                <label class="form-label">Nilai per Unit</label>
                                <div class="currency-input">
                                    <span class="currency-symbol">Rp</span>
                                    <input type="text" name="tam_unit_value" id="tamUnitValue" class="form-control" 
                                           placeholder="200.000" value="{{ old('tam_unit_value') ? number_format(old('tam_unit_value'), 0, ',', '.') : '' }}" required>
                                </div>
                                <small class="text-muted">Nilai rata-rata per konsumen/unit</small>
                            </div>
                        </div>

                        <div class="calculation-preview">
                            <div class="calculation-title">
                                <i class="fas fa-calculator"></i>
                                Total Nilai TAM
                            </div>
                            <div class="calculation-result" id="tamResult">Rp 0</div>
                            <div class="calculation-formula">Jumlah Pasar × Nilai per Unit</div>
                        </div>
                    </div>

                    <!-- Step 3: SAM -->
                    <div class="step-content" data-step="3">
                        <div class="step-header">
                            <h2 class="step-title">SAM - Serviceable Addressable Market</h2>
                            <p class="step-description">Bagian dari TAM yang realistis dapat Anda layani</p>
                        </div>

                        <div class="info-box">
                            <i class="fas fa-info-circle info-box-icon"></i>
                            <p class="info-box-text">
                                <strong>SAM</strong> adalah bagian dari TAM yang realistis dapat Anda layani berdasarkan 
                                model bisnis, geografis, dan kemampuan operasional Anda.
                            </p>
                        </div>

                        <!-- Data Sources Section for SAM -->
                        <div class="data-sources-section">
                            <h4 class="data-sources-title">
                                <i class="fas fa-target me-2"></i>Sumber Data untuk SAM
                            </h4>
                            <p class="data-sources-description">
                                Analisis segmentasi pasar dan kemampuan layanan untuk menentukan SAM:
                            </p>
                            <div class="data-sources-grid">
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 12px;">BPS</div>
                                        <h5>Data Geografis BPS</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Data populasi dan ekonomi per provinsi/kota
                                    </p>
                                    <a href="https://www.bps.go.id/subject/12/geografi.html" target="_blank" class="data-source-link">
                                        Data Geografis BPS
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #059669, #10b981); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 12px;">APJII</div>
                                        <h5>APJII Internet Report</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Penetrasi internet dan demografi pengguna digital
                                    </p>
                                    <a href="https://apjii.or.id" target="_blank" class="data-source-link">
                                        Kunjungi APJII
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #dc2626, #ef4444); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">EC</div>
                                        <h5>E-commerce Indonesia</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Data penetrasi e-commerce dan perilaku konsumen online
                                    </p>
                                    <a href="https://www.ecommerce.id" target="_blank" class="data-source-link">
                                        Kunjungi E-commerce ID
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">EDU</div>
                                        <h5>Data Pendidikan</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Statistik pendidikan dan literasi digital
                                    </p>
                                    <a href="https://www.bps.go.id/subject/28/pendidikan.html" target="_blank" class="data-source-link">
                                        Data Pendidikan BPS
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #7c3aed, #a855f7); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">MCK</div>
                                        <h5>McKinsey Indonesia</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Laporan ekonomi dan konsumen Indonesia
                                    </p>
                                    <a href="https://www.mckinsey.com/id" target="_blank" class="data-source-link">
                                        Kunjungi McKinsey
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #4f46e5, #6366f1); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">SV</div>
                                        <h5>Survei Konsumen</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Lembaga survei seperti Ipsos, Nielsen, atau Roy Morgan
                                    </p>
                                    <a href="#" class="data-source-link" onclick="showSurveyCompanies()">
                                        Lihat Daftar Survei
                                    </a>
                                </div>
                            </div>
                            
                            <div class="data-tips">
                                <h5><i class="fas fa-lightbulb me-2"></i>Tips Menentukan SAM:</h5>
                                <ul>
                                    <li>Pertimbangkan jangkauan geografis operasional Anda</li>
                                    <li>Analisis demografi yang sesuai dengan produk/layanan</li>
                                    <li>Evaluasi kemampuan distribusi dan layanan</li>
                                    <li>Gunakan data penetrasi teknologi untuk estimasi realistis</li>
                                </ul>
                            </div>
                        </div>

                        <!-- TAM Data Reference -->
                        <div class="reference-section">
                            <h4 class="reference-title">
                                <i class="fas fa-chart-pie me-2"></i>Data TAM sebagai Referensi
                            </h4>
                            <div class="reference-grid">
                                <div class="reference-item">
                                    <label class="reference-label">Total Nilai TAM</label>
                                    <div class="reference-value" id="tamReferenceValue">Rp 0</div>
                                </div>
                                <div class="reference-item">
                                    <label class="reference-label">Jumlah Pasar TAM</label>
                                    <div class="reference-value" id="tamMarketSizeReference">0 unit</div>
                                </div>
                                <div class="reference-item">
                                    <label class="reference-label">Nilai per Unit TAM</label>
                                    <div class="reference-value" id="tamUnitValueReference">Rp 0</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Deskripsi SAM</label>
                            <textarea name="sam_description" class="form-control large" 
                                      placeholder="Jelaskan pasar yang dapat Anda layani. Contoh: Pelajar SMA dan mahasiswa di kota-kota besar dengan akses internet stabil..." 
                                      required>{{ old('sam_description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Persentase dari TAM</label>
                            <div class="percentage-input">
                                <input type="number" name="sam_percentage" id="samPercentage" class="form-control" 
                                       placeholder="25" value="{{ old('sam_percentage') }}" min="0" max="100" step="0.1" required>
                                <span class="percentage-symbol">%</span>
                            </div>
                            <small class="text-muted">Berapa persen dari TAM yang dapat Anda layani?</small>
                        </div>

                        <div class="calculation-preview">
                            <div class="calculation-title">
                                <i class="fas fa-calculator"></i>
                                Total Nilai SAM
                            </div>
                            <div class="calculation-result" id="samResult">Rp 0</div>
                            <div class="calculation-formula">TAM × Persentase SAM</div>
                        </div>

                        <input type="hidden" name="sam_market_size" id="samMarketSize">
                        <input type="hidden" name="sam_value" id="samValue">
                    </div>

                    <!-- Step 4: SOM -->
                    <div class="step-content" data-step="4">
                        <div class="step-header">
                            <h2 class="step-title">SOM - Serviceable Obtainable Market</h2>
                            <p class="step-description">Bagian dari SAM yang realistis dapat Anda raih</p>
                        </div>

                        <div class="info-box">
                            <i class="fas fa-info-circle info-box-icon"></i>
                            <p class="info-box-text">
                                <strong>SOM</strong> adalah bagian dari SAM yang realistis dapat Anda raih berdasarkan 
                                kompetisi, kapasitas bisnis, dan strategi marketing yang dimiliki.
                            </p>
                        </div>

                        <!-- Data Sources Section for SOM -->
                        <div class="data-sources-section">
                            <h4 class="data-sources-title">
                                <i class="fas fa-trophy me-2"></i>Sumber Data untuk SOM
                            </h4>
                            <p class="data-sources-description">
                                Analisis kompetisi dan kapasitas untuk menentukan market share yang realistis:
                            </p>
                            <div class="data-sources-grid">
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" alt="Google Logo" class="data-source-logo" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #4285f4, #34a853); color: white; display: none; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">GSC</div>
                                        <h5>Google Search Console</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Analisis kompetitor dan kata kunci populer
                                    </p>
                                    <a href="https://search.google.com/search-console" target="_blank" class="data-source-link">
                                        Kunjungi Search Console
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #059669, #10b981); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">SW</div>
                                        <h5>SimilarWeb</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Analisis traffic dan market share kompetitor
                                    </p>
                                    <a href="https://www.similarweb.com" target="_blank" class="data-source-link">
                                        Kunjungi SimilarWeb
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #7c3aed, #a855f7); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">CB</div>
                                        <h5>Crunchbase</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Database startup dan funding untuk analisis kompetitor
                                    </p>
                                    <a href="https://www.crunchbase.com" target="_blank" class="data-source-link">
                                        Kunjungi Crunchbase
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #dc2626, #ef4444); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">TIA</div>
                                        <h5>Tech in Asia</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Analisis berita industri dan pengumuman kompetitor
                                    </p>
                                    <a href="https://www.techinasia.com" target="_blank" class="data-source-link">
                                        Kunjungi Tech in Asia
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #4f46e5, #6366f1); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">SB</div>
                                        <h5>Socialbakers</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Analisis engagement dan follower kompetitor
                                    </p>
                                    <a href="https://www.socialbakers.com" target="_blank" class="data-source-link">
                                        Kunjungi Socialbakers
                                    </a>
                                </div>
                                
                                <div class="data-source-card">
                                    <div class="data-source-header">
                                        <div class="data-source-logo" style="background: linear-gradient(135deg, #1e3a8a, #3b82f6); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">MR</div>
                                        <h5>Market Research Reports</h5>
                                    </div>
                                    <p class="data-source-description">
                                        Laporan riset pasar dari Frost & Sullivan, Gartner
                                    </p>
                                    <a href="#" class="data-source-link" onclick="showMarketResearch()">
                                        Lihat Daftar Lembaga Riset
                                    </a>
                                </div>
                            </div>
                            
                            <div class="data-tips">
                                <h5><i class="fas fa-lightbulb me-2"></i>Tips Menentukan SOM:</h5>
                                <ul>
                                    <li>Analisis market share kompetitor utama di industri</li>
                                    <li>Evaluasi kapasitas produksi dan operasional Anda</li>
                                    <li>Pertimbangkan budget marketing dan sales yang tersedia</li>
                                    <li>Gunakan data historis pertumbuhan startup sejenis</li>
                                </ul>
                            </div>
                        </div>

                        <!-- SAM Data Reference -->
                        <div class="reference-section">
                            <h4 class="reference-title">
                                <i class="fas fa-chart-bar me-2"></i>Data SAM sebagai Referensi
                            </h4>
                            <div class="reference-grid">
                                <div class="reference-item">
                                    <label class="reference-label">Total Nilai SAM</label>
                                    <div class="reference-value" id="samReferenceValue">Rp 0</div>
                                </div>
                                <div class="reference-item">
                                    <label class="reference-label">Jumlah Pasar SAM</label>
                                    <div class="reference-value" id="samMarketSizeReference">0 unit</div>
                                </div>
                                <div class="reference-item">
                                    <label class="reference-label">Persentase dari TAM</label>
                                    <div class="reference-value" id="samPercentageReference">0%</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Deskripsi SOM</label>
                            <textarea name="som_description" class="form-control large" 
                                      placeholder="Jelaskan pasar yang dapat Anda peroleh. Contoh: Target 8% market share melalui strategi digital marketing dan partnership..." 
                                      required>{{ old('som_description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Persentase dari SAM</label>
                            <div class="percentage-input">
                                <input type="number" name="som_percentage" id="somPercentage" class="form-control" 
                                       placeholder="8" value="{{ old('som_percentage') }}" min="0" max="100" step="0.1" required>
                                <span class="percentage-symbol">%</span>
                            </div>
                            <small class="text-muted">Berapa persen dari SAM yang realistis dapat Anda raih?</small>
                        </div>

                        <div class="calculation-preview">
                            <div class="calculation-title">
                                <i class="fas fa-calculator"></i>
                                Total Nilai SOM
                            </div>
                            <div class="calculation-result" id="somResult">Rp 0</div>
                            <div class="calculation-formula">SAM × Persentase SOM</div>
                        </div>

                        <!-- Additional Information -->
                        <div class="form-group">
                            <label class="form-label">Asumsi Pasar (Opsional)</label>
                            <div id="marketAssumptions">
                                <div class="dynamic-input-group">
                                    <input type="text" name="market_assumptions[]" class="form-control" 
                                           placeholder="Contoh: Penetrasi internet di Indonesia mencapai 80% pada 2025">
                                    <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
                                </div>
                            </div>
                            <button type="button" class="btn-add" onclick="addMarketAssumption()">
                                <i class="fas fa-plus"></i> Tambah Asumsi
                            </button>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Proyeksi Pertumbuhan (Opsional)</label>
                            <div id="growthProjections">
                                <div class="dynamic-input-group">
                                    <input type="text" name="growth_projections[]" class="form-control" 
                                           placeholder="Contoh: Pertumbuhan pasar e-commerce 25% per tahun selama 3 tahun">
                                    <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
                                </div>
                            </div>
                            <button type="button" class="btn-add" onclick="addGrowthProjection()">
                                <i class="fas fa-plus"></i> Tambah Proyeksi
                            </button>
                        </div>

                        <input type="hidden" name="som_market_size" id="somMarketSize">
                        <input type="hidden" name="som_value" id="somValue">
                        <input type="hidden" name="tam_value" id="tamValueHidden">
                        <input type="hidden" name="tam_market_size_raw" id="tamMarketSizeRaw">
                        <input type="hidden" name="tam_unit_value_raw" id="tamUnitValueRaw">
                    </div>

                    <!-- Step 5: Review & Submit -->
                    <div class="step-content" data-step="5">
                        <div class="step-header">
                            <h2 class="step-title">Review & Submit</h2>
                            <p class="step-description">Periksa kembali analisis Market Validation Anda sebelum menyimpan</p>
                        </div>

                        <div class="summary-section">
                            <h3 class="summary-title">Ringkasan Analisis</h3>
                            <div class="summary-grid">
                                <div class="summary-card tam">
                                    <div class="summary-card-title">TAM</div>
                                    <div class="summary-card-value" id="finalTamValue">Rp 0</div>
                                </div>
                                <div class="summary-card sam">
                                    <div class="summary-card-title">SAM</div>
                                    <div class="summary-card-value" id="finalSamValue">Rp 0</div>
                                </div>
                                <div class="summary-card som">
                                    <div class="summary-card-title">SOM</div>
                                    <div class="summary-card-value" id="finalSomValue">Rp 0</div>
                                </div>
                            </div>
                        </div>

                        <!-- Success/Error Messages -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <!-- Wizard Actions -->
                    <div class="wizard-actions">
                        <button type="button" id="prevBtn" class="btn btn-secondary" onclick="changeStep(-1)">
                            <i class="fas fa-arrow-left"></i> Sebelumnya
                        </button>
                        <div>
                            <span id="stepInfo">Langkah 1 dari 5</span>
                        </div>
                        <button type="button" id="nextBtn" class="btn btn-primary" onclick="changeStep(1)">
                            Selanjutnya <i class="fas fa-arrow-right"></i>
                        </button>
                        <button type="submit" id="submitBtn" class="btn btn-success" style="display: none;">
                            <i class="fas fa-save"></i> Simpan Market Validation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        let currentStep = 1;
        const totalSteps = 5;

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateStepDisplay();
            
            // Format existing values on page load
            const tamMarketSizeInput = document.getElementById('tamMarketSize');
            if (tamMarketSizeInput.value) {
                formatInputWithSeparator(tamMarketSizeInput);
            }
            
            // Add event listeners for calculations
            tamMarketSizeInput.addEventListener('input', function() {
                formatInputWithSeparator(this);
                calculateTAM();
            });
            tamMarketSizeInput.addEventListener('blur', function() {
                formatInputWithSeparator(this);
                calculateTAM();
            });
            document.getElementById('tamUnitValue').addEventListener('input', function() {
                formatInputWithSeparator(this);
                calculateTAM();
            });
            document.getElementById('tamUnitValue').addEventListener('blur', function() {
                formatInputWithSeparator(this);
                calculateTAM();
            });
            document.getElementById('samPercentage').addEventListener('input', calculateSAM);
            document.getElementById('somPercentage').addEventListener('input', calculateSOM);
            
            // Add form submit event listener
            document.getElementById('tamSamSomForm').addEventListener('submit', function(e) {
                // Ensure all calculations are done before submit
                calculateTAM();
                calculateSAM();
                calculateSOM();
            });
        });

        function changeStep(direction) {
            if (direction === 1 && !validateCurrentStep()) {
                return;
            }

            const newStep = currentStep + direction;
            
            if (newStep < 1 || newStep > totalSteps) {
                return;
            }

            // Hide current step
            document.querySelector(`.step-content[data-step="${currentStep}"]`).classList.remove('active');
            
            // Show new step
            currentStep = newStep;
            document.querySelector(`.step-content[data-step="${currentStep}"]`).classList.add('active');
            
            updateStepDisplay();
            updateFinalSummary();
            
            // Update reference data when moving to SAM or SOM steps
            if (currentStep === 3) {
                // Moving to SAM step, update TAM reference
                const marketSize = parseFormattedNumber(document.getElementById('tamMarketSize').value);
                const unitValue = parseFormattedNumber(document.getElementById('tamUnitValue').value) || 0;
                const tamValue = marketSize * unitValue;
                updateTAMReference(marketSize, unitValue, tamValue);
            } else if (currentStep === 4) {
                // Moving to SOM step, update SAM reference
                const samValue = parseFloat(document.getElementById('samValue').value) || 0;
                const samMarketSize = parseFloat(document.getElementById('samMarketSize').value) || 0;
                const samPercentage = parseFloat(document.getElementById('samPercentage').value) || 0;
                updateSAMReference(samValue, samMarketSize, samPercentage);
            }
        }

        function updateStepDisplay() {
            // Update progress
            const progressFill = document.getElementById('progressFill');
            const progressPercentage = ((currentStep - 1) / (totalSteps - 1)) * 100;
            progressFill.style.width = progressPercentage + '%';

            // Update step indicators
            document.querySelectorAll('.step').forEach((step, index) => {
                const stepNumber = index + 1;
                step.classList.remove('active', 'completed');
                
                if (stepNumber === currentStep) {
                    step.classList.add('active');
                } else if (stepNumber < currentStep) {
                    step.classList.add('completed');
                    step.innerHTML = '<i class="fas fa-check"></i>';
                } else {
                    step.innerHTML = stepNumber;
                }
            });

            // Update buttons
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const submitBtn = document.getElementById('submitBtn');
            const stepInfo = document.getElementById('stepInfo');

            prevBtn.style.display = currentStep === 1 ? 'none' : 'inline-flex';
            nextBtn.style.display = currentStep === totalSteps ? 'none' : 'inline-flex';
            submitBtn.style.display = currentStep === totalSteps ? 'inline-flex' : 'none';
            
            stepInfo.textContent = `Langkah ${currentStep} dari ${totalSteps}`;
        }

        function validateCurrentStep() {
            const currentStepElement = document.querySelector(`.step-content[data-step="${currentStep}"]`);
            const requiredFields = currentStepElement.querySelectorAll('input[required], textarea[required]');
            
            for (let field of requiredFields) {
                if (!field.value.trim()) {
                    field.focus();
                    field.style.borderColor = '#dc3545';
                    setTimeout(() => {
                        field.style.borderColor = '';
                    }, 3000);
                    return false;
                }
            }
            return true;
        }

        function calculateTAM() {
            const marketSize = parseFormattedNumber(document.getElementById('tamMarketSize').value);
            const unitValue = parseFormattedNumber(document.getElementById('tamUnitValue').value) || 0;
            const tamValue = marketSize * unitValue;
            
            document.getElementById('tamResult').textContent = formatCurrency(tamValue);
            document.getElementById('tamValueHidden').value = tamValue;
            document.getElementById('tamMarketSizeRaw').value = marketSize;
            document.getElementById('tamUnitValueRaw').value = unitValue;
            
            // Update TAM reference data
            updateTAMReference(marketSize, unitValue, tamValue);
            
            // Trigger SAM calculation
            calculateSAM();
        }

        function calculateSAM() {
            const tamValue = parseFloat(document.getElementById('tamValueHidden').value) || 0;
            const tamMarketSize = parseFormattedNumber(document.getElementById('tamMarketSize').value);
            const samPercentage = parseFloat(document.getElementById('samPercentage').value) || 0;
            
            const samValue = tamValue * (samPercentage / 100);
            const samMarketSize = tamMarketSize * (samPercentage / 100);
            
            document.getElementById('samResult').textContent = formatCurrency(samValue);
            document.getElementById('samValue').value = samValue;
            document.getElementById('samMarketSize').value = samMarketSize; // Tidak dibulatkan agar presisi tetap terjaga
            
            // Update SAM reference data
            updateSAMReference(samValue, samMarketSize, samPercentage);
            
            // Trigger SOM calculation
            calculateSOM();
        }

        function calculateSOM() {
            const samValue = parseFloat(document.getElementById('samValue').value) || 0;
            const samMarketSize = parseFloat(document.getElementById('samMarketSize').value) || 0;
            const somPercentage = parseFloat(document.getElementById('somPercentage').value) || 0;
            
            const somValue = samValue * (somPercentage / 100);
            const somMarketSize = samMarketSize * (somPercentage / 100);
            
            document.getElementById('somResult').textContent = formatCurrency(somValue);
            document.getElementById('somValue').value = somValue;
            document.getElementById('somMarketSize').value = Math.round(somMarketSize);
        }

        function updateFinalSummary() {
            if (currentStep === 5) {
                const tamValue = parseFloat(document.getElementById('tamValueHidden').value) || 0;
                const samValue = parseFloat(document.getElementById('samValue').value) || 0;
                const somValue = parseFloat(document.getElementById('somValue').value) || 0;
                
                document.getElementById('finalTamValue').textContent = formatCurrency(tamValue);
                document.getElementById('finalSamValue').textContent = formatCurrency(samValue);
                document.getElementById('finalSomValue').textContent = formatCurrency(somValue);
            }
        }

        function formatCurrency(value) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(value);
        }

        function addMarketAssumption() {
            const container = document.getElementById('marketAssumptions');
            const div = document.createElement('div');
            div.className = 'dynamic-input-group';
            div.innerHTML = `
                <input type="text" name="market_assumptions[]" class="form-control" 
                       placeholder="Masukkan asumsi pasar...">
                <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
            `;
            container.appendChild(div);
        }

        function addGrowthProjection() {
            const container = document.getElementById('growthProjections');
            const div = document.createElement('div');
            div.className = 'dynamic-input-group';
            div.innerHTML = `
                <input type="text" name="growth_projections[]" class="form-control" 
                       placeholder="Masukkan proyeksi pertumbuhan...">
                <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
            `;
            container.appendChild(div);
        }

        function removeInput(button) {
            const container = button.parentElement.parentElement;
            if (container.children.length > 1) {
                button.parentElement.remove();
            }
        }

        // Update TAM reference data
        function updateTAMReference(marketSize, unitValue, tamValue) {
            document.getElementById('tamReferenceValue').textContent = formatCurrency(tamValue);
            document.getElementById('tamMarketSizeReference').textContent = formatNumber(marketSize) + ' unit';
            document.getElementById('tamUnitValueReference').textContent = formatCurrency(unitValue);
        }

        // Update SAM reference data
        function updateSAMReference(samValue, samMarketSize, samPercentage) {
            document.getElementById('samReferenceValue').textContent = formatCurrency(samValue);
            document.getElementById('samMarketSizeReference').textContent = formatNumber(samMarketSize) + ' unit';
            document.getElementById('samPercentageReference').textContent = samPercentage.toFixed(1) + '%';
        }

        // Format number with thousand separators
        function formatNumber(value) {
            return new Intl.NumberFormat('id-ID').format(value);
        }

        // Format input with thousand separators
        function formatInputWithSeparator(input) {
            // Remove all non-numeric characters
            let value = input.value.replace(/[^\d]/g, '');
            
            // Add thousand separators
            if (value) {
                value = parseInt(value).toLocaleString('id-ID');
                input.value = value;
            }
        }

        // Parse formatted number back to integer
        function parseFormattedNumber(formattedValue) {
            return parseInt(formattedValue.replace(/[^\d]/g, '')) || 0;
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.ctrlKey) {
                if (currentStep < totalSteps) {
                    changeStep(1);
                } else {
                    document.getElementById('submitBtn').click();
                }
            }
        });

        // Show Industry Associations Modal
        function showIndustryAssociations() {
            const associations = [
                { name: "Asosiasi E-commerce Indonesia (idEA)", url: "https://www.idea.or.id", description: "Data e-commerce dan digital economy", logo: "idEA", color: "#FF6B35" },
                { name: "Asosiasi Fintech Indonesia (AFI)", url: "https://www.afi.or.id", description: "Data fintech dan financial services", logo: "AFI", color: "#4A90E2" },
                { name: "Asosiasi Startup Indonesia (ASI)", url: "https://www.startupindonesia.id", description: "Data startup dan teknologi", logo: "ASI", color: "#2ECC71" },
                { name: "Asosiasi Perusahaan Rintisan Indonesia (APRI)", url: "https://www.apri.or.id", description: "Data startup dan venture capital", logo: "APRI", color: "#9B59B6" },
                { name: "Asosiasi Cloud Computing Indonesia (ACCI)", url: "https://www.acci.or.id", description: "Data cloud dan infrastructure", logo: "ACCI", color: "#3498DB" },
                { name: "Asosiasi Game Indonesia (AGI)", url: "https://www.agi.or.id", description: "Data gaming dan entertainment", logo: "AGI", color: "#E74C3C" },
                { name: "Asosiasi Media Digital Indonesia (AMDI)", url: "https://www.amdi.or.id", description: "Data media dan advertising", logo: "AMDI", color: "#F39C12" },
                { name: "Asosiasi Logistik Indonesia (ALI)", url: "https://www.ali.or.id", description: "Data logistics dan supply chain", logo: "ALI", color: "#34495E" }
            ];
            
            showModal('Asosiasi Industri Indonesia', associations);
        }

        // Show Survey Companies Modal
        function showSurveyCompanies() {
            const companies = [
                { name: "Ipsos Indonesia", url: "https://www.ipsos.com/id", description: "Riset pasar dan survei konsumen", logo: "IP", color: "#FF6B35" },
                { name: "Nielsen Indonesia", url: "https://www.nielsen.com/id", description: "Data konsumen dan media", logo: "NI", color: "#4A90E2" },
                { name: "Roy Morgan Indonesia", url: "https://www.roymorgan.com", description: "Survei dan analisis konsumen", logo: "RM", color: "#2ECC71" },
                { name: "MarkPlus Indonesia", url: "https://www.markplus.co.id", description: "Riset pasar dan strategi", logo: "MP", color: "#9B59B6" },
                { name: "Jakpat", url: "https://www.jakpat.net", description: "Platform survei online Indonesia", logo: "JP", color: "#3498DB" },
                { name: "Populix", url: "https://www.populix.co", description: "Platform riset konsumen digital", logo: "PX", color: "#E74C3C" },
                { name: "Alvara Research", url: "https://www.alvara.id", description: "Riset digital dan teknologi", logo: "AR", color: "#F39C12" },
                { name: "Kompas Research", url: "https://www.kompas.id", description: "Riset media dan komunikasi", logo: "KR", color: "#34495E" }
            ];
            
            showModal('Lembaga Survei Indonesia', companies);
        }

        // Show Market Research Modal
        function showMarketResearch() {
            const research = [
                { name: "Frost & Sullivan", url: "https://www.frost.com", description: "Laporan riset pasar global", logo: "FS", color: "#FF6B35" },
                { name: "Gartner", url: "https://www.gartner.com", description: "Riset teknologi dan IT", logo: "GT", color: "#4A90E2" },
                { name: "McKinsey Global Institute", url: "https://www.mckinsey.com/mgi", description: "Laporan ekonomi global", logo: "MCK", color: "#7c3aed" },
                { name: "Boston Consulting Group", url: "https://www.bcg.com", description: "Strategi dan riset bisnis", logo: "BCG", color: "#2ECC71" },
                { name: "Deloitte Insights", url: "https://www2.deloitte.com/insights", description: "Riset industri dan teknologi", logo: "DT", color: "#9B59B6" },
                { name: "PwC Indonesia", url: "https://www.pwc.com/id", description: "Laporan ekonomi Indonesia", logo: "PwC", color: "#3498DB" },
                { name: "EY Indonesia", url: "https://www.ey.com/id", description: "Riset bisnis dan teknologi", logo: "EY", color: "#E74C3C" },
                { name: "KPMG Indonesia", url: "https://home.kpmg/id", description: "Laporan industri dan ekonomi", logo: "KP", color: "#F39C12" }
            ];
            
            showModal('Lembaga Riset Pasar', research);
        }

        // Show Modal Function
        function showModal(title, data) {
            const modalHtml = `
                <div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background: #f8f9fa; border-bottom: 1px solid #e9ecef;">
                                <h5 class="modal-title" id="dataModalLabel" style="color: #2d3748; font-weight: 600;">
                                    <i class="fas fa-database me-2" style="color: #3182ce;"></i>${title}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" style="padding: 1.5rem;">
                                <div class="row">
                                    ${data.map(item => `
                                        <div class="col-md-6 mb-3">
                                            <div class="card h-100" style="border: 1px solid #e2e8f0; border-radius: 6px;">
                                                <div class="card-body" style="padding: 1rem;">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div style="width: 24px; height: 24px; margin-right: 0.5rem; border-radius: 3px; background: linear-gradient(135deg, ${item.color}, ${item.color}dd); color: white; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 10px;">${item.logo}</div>
                                                        <h6 class="card-title mb-0" style="color: #2d3748; font-weight: 600; font-size: 0.9rem;">${item.name}</h6>
                                                    </div>
                                                    <p class="card-text small" style="color: #718096; font-size: 0.8rem; line-height: 1.4; margin-bottom: 0.75rem;">${item.description}</p>
                                                    <a href="${item.url}" target="_blank" class="btn btn-sm" style="background: #3182ce; color: white; border: none; padding: 0.375rem 0.75rem; border-radius: 4px; font-size: 0.75rem; text-decoration: none;">
                                                        Kunjungi
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>
                            <div class="modal-footer" style="background: #f8f9fa; border-top: 1px solid #e9ecef;">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal" style="background: #6c757d; border: none; padding: 0.375rem 0.75rem; border-radius: 4px;">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            // Remove existing modal if any
            const existingModal = document.getElementById('dataModal');
            if (existingModal) {
                existingModal.remove();
            }
            
            // Add modal to body
            document.body.insertAdjacentHTML('beforeend', modalHtml);
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('dataModal'));
            modal.show();
        }
    </script>
</body>
</html>
