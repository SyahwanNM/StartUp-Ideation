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
            margin: 0;
            min-height: 100vh;
            font-family: 'Segoe UI', 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--gray-800);
            font-size: 16px;
            background: linear-gradient(160deg, #4f46e5 0%, #7c3aed 45%, #a855f7 100%);
        }

        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }

        .fp-page {
            position: relative;
            min-height: 100vh;
            padding: 3.5rem 0 4.5rem;
        }

        .fp-page::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.18), transparent 55%),
                        radial-gradient(circle at 80% 10%, rgba(79,70,229,0.25), transparent 60%);
            opacity: 0.85;
            pointer-events: none;
        }

        .fp-container {
            position: relative;
            z-index: 1;
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .fp-hero {
            text-align: center;
            color: #f8fafc;
            max-width: 760px;
            margin: 0 auto 2.5rem;
        }

        .fp-hero span {
            display: inline-block;
            font-size: 0.9rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(226, 232, 240, 0.85);
        }

        .fp-hero h1 {
            font-size: 2.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin: 1.1rem 0 0.6rem;
        }

        .fp-hero p {
            margin: 0;
            font-size: 1.05rem;
            color: rgba(226, 232, 240, 0.85);
        }

        .fp-shell {
            background: rgba(248, 250, 252, 0.96);
            border-radius: 32px;
            padding: 3rem 3.25rem;
            box-shadow: 0 34px 60px rgba(15, 23, 42, 0.28);
            border: 1px solid rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        /* Form Sections */
        .form-section {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.92));
            border-radius: 26px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            border: 1px solid rgba(148, 163, 184, 0.16);
            box-shadow: 0 24px 44px rgba(15, 23, 42, 0.18);
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            z-index: 0;
        }

        .form-section:hover {
            transform: translateY(-3px);
            box-shadow: 0 28px 50px rgba(15, 23, 42, 0.22);
        }

        .form-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(99, 102, 241, 0.12), transparent 55%);
            pointer-events: none;
            z-index: 0;
        }

        .form-section > * {
            position: relative;
            z-index: 1;
        }

        .section-title {
            font-size: 1.45rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.75rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            z-index: 1;
        }

        .section-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            font-size: 1.25rem;
            color: #1f2937;
            background: rgba(99, 102, 241, 0.15);
            box-shadow: 0 16px 28px rgba(99, 102, 241, 0.18);
        }

        .section-icon.business {
            background: rgba(59, 130, 246, 0.18);
            color: #1d4ed8;
        }

        .section-icon.assets {
            background: rgba(248, 113, 113, 0.18);
            color: #b91c1c;
        }

        .section-icon.funding {
            background: rgba(45, 212, 191, 0.18);
            color: #0f766e;
        }

        .section-icon.products {
            background: rgba(14, 165, 233, 0.18);
            color: #0369a1;
        }

        .section-icon.costs {
            background: rgba(249, 115, 22, 0.2);
            color: #b45309;
        }

        .section-icon.employees {
            background: rgba(139, 92, 246, 0.2);
            color: #5b21b6;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 1.6rem;
        }

        .form-label {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.55rem;
            display: block;
            font-size: 0.95rem;
        }

        .form-control,
        .form-select {
            border: 1px solid rgba(148, 163, 184, 0.35);
            border-radius: 18px;
            padding: 0.85rem 1.1rem;
            font-size: 0.95rem;
            min-height: 52px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            background: rgba(255, 255, 255, 0.95);
            color: #1f2937;
        }

        .form-select {
            appearance: none;
            background-image: linear-gradient(45deg, transparent 50%, #6366f1 50%), linear-gradient(135deg, #6366f1 50%, transparent 50%);
            background-position: calc(100% - 22px) calc(50% - 5px), calc(100% - 17px) calc(50% - 5px);
            background-size: 7px 7px, 7px 7px;
            background-repeat: no-repeat;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
            background: rgba(255, 255, 255, 0.98);
            outline: none;
        }

        .input-group-text {
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(244, 247, 254, 0.9);
            border-radius: 16px;
            padding: 0.85rem 1rem;
            min-height: 52px;
            font-weight: 600;
            color: #4338ca;
        }

        .input-group .form-control {
            border-left: 0;
            border-radius: 0 18px 18px 0;
            min-height: 52px;
        }

        .input-group .input-group-text:first-child {
            border-right: 0;
            border-radius: 18px 0 0 18px;
        }

        input::placeholder,
        textarea::placeholder {
            color: rgba(71, 85, 105, 0.85);
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
            background: rgba(255, 255, 255, 0.94);
            border: 1px solid rgba(148, 163, 184, 0.28);
            border-radius: 22px;
            padding: 1.65rem;
            margin-bottom: 1.25rem;
            box-shadow: 0 18px 32px rgba(15, 23, 42, 0.12);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
        }

        .dynamic-field:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 38px rgba(15, 23, 42, 0.18);
        }

        .asset-card {
            background: linear-gradient(135deg, rgba(255, 248, 237, 0.95), rgba(254, 243, 199, 0.85));
            border-color: rgba(249, 115, 22, 0.35);
        }

        .funding-card {
            background: linear-gradient(135deg, rgba(236, 254, 255, 0.96), rgba(207, 250, 254, 0.85));
            border-color: rgba(14, 165, 233, 0.35);
        }

        .product-card {
            background: linear-gradient(135deg, rgba(239, 246, 255, 0.96), rgba(221, 239, 255, 0.85));
            border-color: rgba(59, 130, 246, 0.35);
        }

        .fixed-cost-card {
            background: linear-gradient(135deg, rgba(255, 247, 237, 0.95), rgba(255, 229, 204, 0.82));
            border-color: rgba(249, 115, 22, 0.32);
        }

        .variable-cost-card {
            background: linear-gradient(135deg, rgba(236, 255, 250, 0.95), rgba(209, 250, 229, 0.82));
            border-color: rgba(16, 185, 129, 0.3);
        }

        .employee-card {
            background: linear-gradient(135deg, rgba(243, 232, 255, 0.95), rgba(233, 213, 255, 0.82));
            border-color: rgba(147, 51, 234, 0.28);
        }

        .dynamic-field-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .field-number {
            background: rgba(99, 102, 241, 0.18);
            color: #4338ca;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .product-card .field-number {
            background: rgba(37, 99, 235, 0.22);
            color: #1d4ed8;
        }

        .btn-remove {
            background: rgba(239, 68, 68, 0.12);
            color: #b91c1c;
            border: none;
            border-radius: 14px;
            padding: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            transition: background 0.2s ease, transform 0.2s ease;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .btn-remove:hover {
            background: rgba(220, 38, 38, 0.18);
            transform: translateY(-1px);
        }

        .dynamic-field small.text-muted {
            display: inline-block;
            margin-top: 0.45rem;
            color: rgba(71, 85, 105, 0.8) !important;
        }

        .fp-empty-state {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.9rem 1.15rem;
            background: rgba(226, 232, 240, 0.45);
            border: 1px dashed rgba(148, 163, 184, 0.5);
            border-radius: 16px;
            color: rgba(71, 85, 105, 0.9);
            font-size: 0.92rem;
        }

        .fp-empty-state i {
            color: #6366f1;
        }

        /* Buttons */
        .btn {
            border-radius: 999px;
            padding: 0.8rem 1.6rem;
            font-weight: 600;
            font-size: 0.9rem;
            min-height: 3rem;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #4338ca);
            color: #f8fafc;
            box-shadow: 0 18px 30px rgba(99, 102, 241, 0.35);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 22px 36px rgba(79, 70, 229, 0.42);
            color: #f8fafc;
        }

        .btn-success {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            color: #ecfdf5;
            box-shadow: 0 16px 26px rgba(34, 197, 94, 0.32);
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 30px rgba(22, 163, 74, 0.38);
            color: #ecfdf5;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f97316, #ea580c);
            color: #fff7ed;
            box-shadow: 0 16px 26px rgba(234, 88, 12, 0.28);
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 30px rgba(234, 88, 12, 0.35);
            color: #fff7ed;
        }

        .btn-info {
            background: linear-gradient(135deg, #14b8a6, #0d9488);
            color: #ecfeff;
            box-shadow: 0 16px 26px rgba(20, 184, 166, 0.28);
        }

        .btn-info:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 30px rgba(13, 148, 136, 0.36);
            color: #ecfeff;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: #fef2f2;
            box-shadow: 0 16px 26px rgba(239, 68, 68, 0.28);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 32px rgba(220, 38, 38, 0.36);
            color: #fef2f2;
        }

        /* Product Distribution */
        .distribution-preview {
            background: linear-gradient(135deg, rgba(236, 254, 255, 0.9), rgba(219, 244, 255, 0.85));
            border: 1px solid rgba(14, 165, 233, 0.28);
            border-radius: 20px;
            padding: 1.5rem;
            margin-top: 1.75rem;
            box-shadow: 0 18px 34px rgba(14, 165, 233, 0.22);
        }

        .distribution-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 0;
            border-bottom: 1px solid rgba(14, 165, 233, 0.12);
        }

        .distribution-item:last-child {
            border-bottom: none;
        }

        .distribution-item span {
            font-size: 0.9rem;
            color: rgba(30, 64, 175, 0.78);
        }

        .distribution-total {
            font-weight: 700;
            color: #1d4ed8;
            padding-top: 0.75rem;
            margin-top: 0.75rem;
            text-align: right;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .fp-shell {
                padding: 2.5rem;
            }

            .form-section {
                padding: 2rem;
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 768px) {
            .fp-page {
                padding: 2.5rem 0 3rem;
            }

            .fp-container {
                padding: 0 1rem;
            }

            .fp-hero h1 {
                font-size: 2.25rem;
            }

            .fp-hero p {
                font-size: 0.95rem;
            }

            .fp-shell {
                padding: 2rem;
                border-radius: 26px;
            }

            .form-section {
                padding: 1.6rem;
                margin-bottom: 1.75rem;
            }

            .section-title {
                font-size: 1.25rem;
            }

            .form-group {
                margin-bottom: 1.1rem;
            }

            .form-control,
            .form-select {
                font-size: 0.9rem;
                padding: 0.75rem 1rem;
            }

            .btn {
                padding: 0.75rem 1.45rem;
                font-size: 0.85rem;
            }

            .dynamic-field {
                padding: 1.25rem;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-link {
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .fp-container {
                padding: 0 0.75rem;
            }

            .fp-hero h1 {
                font-size: 1.9rem;
            }

            .fp-hero p {
                font-size: 0.9rem;
            }

            .fp-shell {
                padding: 1.65rem;
                border-radius: 22px;
            }

            .form-section {
                padding: 1.2rem;
                margin-bottom: 1.25rem;
            }

            .section-title {
                font-size: 1.1rem;
            }

            .form-control,
            .form-select {
                font-size: 0.85rem;
                padding: 0.7rem 0.9rem;
            }

            .btn {
                padding: 0.65rem 1.2rem;
                font-size: 0.82rem;
            }

            .dynamic-field {
                padding: 1rem;
            }

            .form-label {
                font-size: 0.85rem;
            }

            .invalid-feedback {
                font-size: 0.72rem;
            }
        }

        /* Animations */
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
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

    <div class="fp-page">
        <div class="fp-container">
            <div class="fp-hero fade-in-up">
                <span>Financial Projection</span>
                <h1>Financial Projection Berbasis Unit</h1>
                <p>Buat Financial Projection yang realistis berdasarkan penjualan produk dan bahan baku.</p>
            </div>

            <div class="fp-shell fade-in-up">
                <form action="{{ route('projection.store') }}" method="POST" id="projectionForm">
            @csrf
            
            <!-- Step 1: Business Information -->
            <div class="form-section fade-in-up fp-section fp-business" id="section-1">
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
            <div class="form-section fade-in-up fp-section fp-assets" id="section-2">
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
            <div class="form-section fade-in-up fp-section fp-products" id="section-3">
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
            <div class="form-section fade-in-up fp-section fp-costs" id="section-4">
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
                                    <button type="button" class="btn-remove" onclick="removeFixedCost(0)">
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
        </div>
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
            costDiv.className = 'dynamic-field variable-cost-card';
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
                        <button type="button" class="btn-remove" onclick="removeVariableCost(${variableCostCounter})">
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
            employeeDiv.className = 'dynamic-field employee-card';
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
                    <div class="col-md-3">
                        <input type="number" name="employees[${employeeCounter}][start_month]" class="form-control" placeholder="Mulai Bulan" min="1">
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="employees[${employeeCounter}][end_month]" class="form-control" placeholder="Selesai Bulan" min="1">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn-remove" onclick="removeEmployee(${employeeCounter})">
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
        // Generate yearly growth rate inputs
        function generateYearlyGrowthRates() {
            const projectionYears = document.getElementById('projection_years').value;
            const container = document.getElementById('yearly_growth_rates');
            
            if (!projectionYears) {
                container.innerHTML = '<div class="fp-empty-state"><i class="fas fa-info-circle"></i><span>Pilih durasi proyeksi terlebih dahulu untuk menentukan growth rate tahunan.</span></div>';
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
            productDiv.className = 'dynamic-field product-card';
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
                        <button type="button" class="btn-remove" onclick="removeFixedCost(${fixedCostCounter})">
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
            assetDiv.className = 'dynamic-field asset-card';
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
                        <button type="button" class="btn-remove" onclick="removeAsset(${assetCounter})">
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
            fundingDiv.className = 'dynamic-field funding-card';
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
                        <button type="button" class="btn-remove" onclick="removeFundingSource(${fundingSourceCounter})">
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
            // Clean currency inputs before validation
            cleanCurrencyInputs();
            
            const percentages = document.querySelectorAll('.sales-percentage');
            let totalPercentage = 0;
            let emptyFields = [];
            
            percentages.forEach((input, index) => {
                let value = parseFloat(input.value) || 0;
                totalPercentage += value;
                
                if (!input.value || input.value.trim() === '') {
                    emptyFields.push(`Produk ${index + 1}`);
                }
            });
            
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
            
        });
    </script>
</body>
</html>
