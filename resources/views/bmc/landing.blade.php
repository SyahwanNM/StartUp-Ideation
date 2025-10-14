<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideation - BMC Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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

        .hero-section {
            background: var(--primary);
            color: white;
            padding: 4rem 0;
        }
        .bmc-card {
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin: 0.5rem 0;
            transition: var(--transition);
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }
        .bmc-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        .bmc-card h5 {
            color: var(--gray-900);
            font-weight: 600;
        }
        .bmc-card p {
            color: var(--gray-600);
            font-size: 0.875rem;
        }
        .cta-button {
            background: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius);
            color: white;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: var(--transition);
        }
        .cta-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        .section-title {
            color: var(--gray-900);
            font-weight: 600;
            margin-bottom: 2rem;
        }
        
        /* Hero Illustration Styles */
        .hero-illustration {
            position: relative;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        /* BMC Canvas Background */
        .bmc-canvas-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            z-index: 1;
        }
        
        .bmc-grid-bg {
            position: relative;
            width: 100%;
            height: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            gap: 10px;
        }
        
        .bmc-box-bg {
            position: absolute;
            width: 80px;
            height: 60px;
            background: rgba(255,255,255,0.1);
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 10px;
            backdrop-filter: blur(5px);
        }
        
        .bmc-box-bg i {
            font-size: 16px;
            margin-bottom: 2px;
        }
        
        .bmc-box-bg span {
            font-size: 8px;
            text-align: center;
        }
        
        /* Central Business Person */
        .business-person {
            position: relative;
            z-index: 3;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.2));
        }
        
        .person-head {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #ffd700, #ffed4e, #ffc107);
            border-radius: 50%;
            position: relative;
            margin: 0 auto 20px;
            box-shadow: 
                0 20px 50px rgba(0,0,0,0.3),
                inset 0 5px 15px rgba(255,255,255,0.3),
                inset 0 -5px 15px rgba(0,0,0,0.1);
            border: 3px solid rgba(255,255,255,0.2);
        }
        
        .person-hair {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 40px;
            background: linear-gradient(135deg, #8b4513, #a0522d);
            border-radius: 50px 50px 20px 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            animation: hairSway 4s ease-in-out infinite;
        }
        
        .person-face {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
        }
        
        .person-eyes {
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
        }
        
        .eye {
            width: 12px;
            height: 12px;
            background: linear-gradient(135deg, #333, #000);
            border-radius: 50%;
            animation: blink 4s infinite;
            box-shadow: 
                0 2px 5px rgba(0,0,0,0.3),
                inset 0 1px 2px rgba(255,255,255,0.2);
            position: relative;
        }
        
        .eye::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 4px;
            height: 4px;
            background: rgba(255,255,255,0.8);
            border-radius: 50%;
        }
        
        .person-smile {
            position: absolute;
            bottom: 25px;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 15px;
            border: 3px solid #333;
            border-top: none;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            animation: smile 3s ease-in-out infinite;
        }
        
        .person-nose {
            position: absolute;
            top: 45px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 8px;
            background: linear-gradient(135deg, #ffd700, #ffed4e);
            border-radius: 50%;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .person-body {
            width: 90px;
            height: 130px;
            background: linear-gradient(135deg, #4a90e2, #357abd, #2c5aa0);
            border-radius: 45px 45px 20px 20px;
            position: relative;
            margin: 0 auto;
            box-shadow: 
                0 20px 50px rgba(0,0,0,0.3),
                inset 0 5px 15px rgba(255,255,255,0.2),
                inset 0 -5px 15px rgba(0,0,0,0.1);
            border: 2px solid rgba(255,255,255,0.1);
        }
        
        
        /* Floating BMC Elements */
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 2;
        }
        
        .bmc-element {
            position: absolute;
            width: 70px;
            height: 50px;
            background: rgba(255,255,255,0.15);
            border: 2px solid rgba(255,255,255,0.3);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 10px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }
        
        .bmc-element:hover {
            transform: scale(1.1);
            background: rgba(255,255,255,0.25);
        }
        
        .bmc-element i {
            font-size: 18px;
            margin-bottom: 3px;
        }
        
        .bmc-element span {
            font-size: 9px;
            text-align: center;
            font-weight: bold;
        }
        
        /* BMC Element Positions */
        .bmc-element.customers {
            top: 5%;
            left: 5%;
            animation: float 2s ease-in-out infinite;
        }
        
        .bmc-element.value {
            top: 5%;
            right: 5%;
            animation: float 2.5s ease-in-out infinite;
        }
        
        .bmc-element.channels {
            top: 15%;
            left: 50%;
            transform: translateX(-50%);
            animation: float 3s ease-in-out infinite;
        }
        
        .bmc-element.revenue {
            top: 50%;
            left: 5%;
            animation: float 2.2s ease-in-out infinite;
        }
        
        .bmc-element.resources {
            top: 50%;
            right: 5%;
            animation: float 2.8s ease-in-out infinite;
        }
        
        .bmc-element.activities {
            bottom: 15%;
            left: 5%;
            animation: float 3.2s ease-in-out infinite;
        }
        
        .bmc-element.partnerships {
            bottom: 15%;
            right: 5%;
            animation: float 2.7s ease-in-out infinite;
        }
        
        .bmc-element.costs {
            bottom: 5%;
            left: 50%;
            transform: translateX(-50%);
            animation: float 2.9s ease-in-out infinite;
        }
        
        /* Connection Lines */
        .connection-lines {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .line {
            position: absolute;
            background: linear-gradient(135deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0.1) 100%);
            border-radius: 2px;
            animation: pulse 2s ease-in-out infinite;
        }
        
        .line-1 {
            top: 30%;
            left: 20%;
            width: 100px;
            height: 2px;
            transform: rotate(15deg);
        }
        
        .line-2 {
            top: 40%;
            right: 20%;
            width: 80px;
            height: 2px;
            transform: rotate(-15deg);
        }
        
        .line-3 {
            bottom: 30%;
            left: 25%;
            width: 90px;
            height: 2px;
            transform: rotate(-10deg);
        }
        
        .line-4 {
            bottom: 40%;
            right: 25%;
            width: 85px;
            height: 2px;
            transform: rotate(10deg);
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }
        
        @keyframes blink {
            0%, 90%, 100% { transform: scaleY(1); }
            95% { transform: scaleY(0.1); }
        }
        
        @keyframes smile {
            0%, 100% { transform: translateX(-50%) scale(1); }
            50% { transform: translateX(-50%) scale(1.1); }
        }
        
        @keyframes hairSway {
            0%, 100% { transform: translateX(-50%) rotate(0deg); }
            50% { transform: translateX(-50%) rotate(3deg); }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.8; }
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero-section {
                padding: 3rem 0;
            }
            
            .hero-illustration {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 2rem 0;
                text-align: center;
            }
            
            .hero-section h1 {
                font-size: 2.5rem;
            }
            
            .hero-section .lead {
                font-size: 1.125rem;
            }
            
            .hero-illustration {
                height: 300px;
                margin-top: 2rem;
            }
            
            .person-head {
                width: 80px;
                height: 80px;
            }
            
            .person-body {
                width: 60px;
                height: 100px;
            }
            
            .bmc-element {
                width: 60px;
                height: 40px;
            }
            
            .bmc-element i {
                font-size: 14px;
            }
            
            .cta-button {
                padding: 0.75rem 1.5rem;
                font-size: 0.875rem;
                margin: 0.25rem;
            }
            
            .navbar-nav {
                text-align: center;
            }
            
            .navbar-nav .nav-link {
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 1.5rem 0;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .hero-section .lead {
                font-size: 1rem;
            }
            
            .hero-illustration {
                height: 250px;
            }
            
            .person-head {
                width: 60px;
                height: 60px;
            }
            
            .person-body {
                width: 45px;
                height: 75px;
            }
            
            .bmc-element {
                width: 45px;
                height: 30px;
            }
            
            .bmc-element i {
                font-size: 12px;
            }
            
            .cta-button {
                padding: 0.625rem 1rem;
                font-size: 0.8rem;
                margin: 0.125rem;
            }
        }
            
            .bmc-element span {
                font-size: 8px;
            }
            
            .bmc-card {
                height: 180px;
                padding: 1rem;
            }
            
            .feature-icon {
                font-size: 2rem;
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
                        <a class="nav-link" href="{{ route('projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="mb-4">
                        <h1 class="display-4 fw-bold mb-2">Ideation</h1>
                        <p class="lead mb-3 text-white-50 fs-4">Business Strategy Platform</p>
                    </div>
                    <p class="lead mb-4">Platform lengkap untuk mengembangkan strategi bisnis Anda. Buat Business Model Canvas, analisis TAM SAM SOM, dan Financial Projection dengan mudah dan profesional.</p>
                    <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('bmc.create') }}" class="cta-button">
                            <i class="fas fa-th-large me-2"></i>BMC
                        </a>
                        <a href="{{ route('tam-sam-som.create') }}" class="cta-button" style="background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);">
                            <i class="fas fa-chart-pie me-2"></i>Market Validation
                        </a>
                        <a href="{{ route('projection.create') }}" class="cta-button" style="background: linear-gradient(135deg, #27ae60 0%, #229954 100%);">
                            <i class="fas fa-chart-line me-2"></i>Financial Projection
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="hero-illustration">
                        <!-- BMC Canvas Background -->
                        <div class="bmc-canvas-bg">
                            <div class="bmc-grid-bg">
                                <div class="bmc-box-bg" style="top: 10%; left: 5%;">
                                    <i class="fas fa-users"></i>
                                    <span>Customers</span>
                                </div>
                                <div class="bmc-box-bg" style="top: 10%; left: 50%;">
                                    <i class="fas fa-gem"></i>
                                    <span>Value</span>
                                </div>
                                <div class="bmc-box-bg" style="top: 10%; right: 5%;">
                                    <i class="fas fa-broadcast-tower"></i>
                                    <span>Channels</span>
                                </div>
                                <div class="bmc-box-bg" style="top: 50%; left: 5%;">
                                    <i class="fas fa-handshake"></i>
                                    <span>Relations</span>
                                </div>
                                <div class="bmc-box-bg" style="top: 50%; left: 50%;">
                                    <i class="fas fa-dollar-sign"></i>
                                    <span>Revenue</span>
                                </div>
                                <div class="bmc-box-bg" style="top: 50%; right: 5%;">
                                    <i class="fas fa-key"></i>
                                    <span>Resources</span>
                                </div>
                                <div class="bmc-box-bg" style="bottom: 10%; left: 5%;">
                                    <i class="fas fa-tasks"></i>
                                    <span>Activities</span>
                                </div>
                                <div class="bmc-box-bg" style="bottom: 10%; left: 50%;">
                                    <i class="fas fa-handshake"></i>
                                    <span>Partners</span>
                                </div>
                                <div class="bmc-box-bg" style="bottom: 10%; right: 5%;">
                                    <i class="fas fa-calculator"></i>
                                    <span>Costs</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Central Business Person -->
                        <div class="business-person">
                            <div class="person-head">
                                <div class="person-hair"></div>
                                <div class="person-face">
                                    <div class="person-eyes">
                                        <div class="eye left-eye"></div>
                                        <div class="eye right-eye"></div>
                                    </div>
                                    <div class="person-nose"></div>
                                    <div class="person-smile"></div>
                                </div>
                            </div>
                            <div class="person-body">
                            </div>
                        </div>
                        
                        <!-- Floating BMC Elements -->
                        <div class="floating-elements">
                            <div class="bmc-element customers">
                                <i class="fas fa-users"></i>
                                <span>Customers</span>
                            </div>
                            <div class="bmc-element value">
                                <i class="fas fa-gem"></i>
                                <span>Value</span>
                            </div>
                            <div class="bmc-element channels">
                                <i class="fas fa-broadcast-tower"></i>
                                <span>Channels</span>
                            </div>
                            <div class="bmc-element revenue">
                                <i class="fas fa-dollar-sign"></i>
                                <span>Revenue</span>
                            </div>
                            <div class="bmc-element resources">
                                <i class="fas fa-key"></i>
                                <span>Resources</span>
                            </div>
                            <div class="bmc-element activities">
                                <i class="fas fa-tasks"></i>
                                <span>Activities</span>
                            </div>
                            <div class="bmc-element partnerships">
                                <i class="fas fa-handshake"></i>
                                <span>Partners</span>
                            </div>
                            <div class="bmc-element costs">
                                <i class="fas fa-calculator"></i>
                                <span>Costs</span>
                            </div>
                        </div>
                        
                        <!-- Connection Lines -->
                        <div class="connection-lines">
                            <div class="line line-1"></div>
                            <div class="line line-2"></div>
                            <div class="line line-3"></div>
                            <div class="line line-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Platform Overview Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h2 class="section-title">Platform Strategi Bisnis Lengkap</h2>
                    <p class="lead mb-5">Ideation menyediakan 3 tools utama untuk mengembangkan strategi bisnis yang komprehensif dan data-driven.</p>
                </div>
            </div>
            
            <div class="row">
                <!-- BMC Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3" style="color: #667eea;">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <h4 class="card-title mb-3">Business Model Canvas</h4>
                            <p class="card-text">Alat strategis untuk memvisualisasikan model bisnis Anda dalam 9 elemen kunci yang saling berhubungan.</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>9 Komponen BMC</li>
                                <li><i class="fas fa-check text-success me-2"></i>Template Profesional</li>
                                <li><i class="fas fa-check text-success me-2"></i>Download PDF/Image</li>
                                <li><i class="fas fa-check text-success me-2"></i>Print Ready</li>
                            </ul>
                            <a href="{{ route('bmc.create') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-plus me-2"></i>Buat BMC
                            </a>
                        </div>
                    </div>
                </div>

                <!-- TAM SAM SOM Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3" style="color: #e74c3c;">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <h4 class="card-title mb-3">Market Validation</h4>
                            <p class="card-text">Analisis mendalam tentang ukuran pasar untuk memvalidasi potensi bisnis dan peluang revenue.</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i><strong>TAM</strong> - Total Addressable Market</li>
                                <li><i class="fas fa-check text-success me-2"></i><strong>SAM</strong> - Serviceable Addressable Market</li>
                                <li><i class="fas fa-check text-success me-2"></i><strong>SOM</strong> - Serviceable Obtainable Market</li>
                                <li><i class="fas fa-check text-success me-2"></i>Asumsi & Proyeksi Pasar</li>
                            </ul>
                            <a href="{{ route('tam-sam-som.create') }}" class="btn btn-danger mt-3">
                                <i class="fas fa-chart-pie me-2"></i>Analisis Pasar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Financial Projection Card -->
                <div class="col-lg-4 mb-4">
                    <div class="card h-100 border-0 shadow-lg">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon mb-3" style="color: #27ae60;">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h4 class="card-title mb-3">Financial Projection</h4>
                            <p class="card-text">Financial Projection berbasis unit produk dengan perhitungan HPP otomatis dan analisis margin yang mendalam.</p>
                            <ul class="list-unstyled text-start mt-3">
                                <li><i class="fas fa-check text-success me-2"></i>Berbasis Unit Produk</li>
                                <li><i class="fas fa-check text-success me-2"></i>HPP Otomatis dari Bahan Baku</li>
                                <li><i class="fas fa-check text-success me-2"></i>Analisis Margin per Produk</li>
                                <li><i class="fas fa-check text-success me-2"></i>Multiple Produk & Distribusi</li>
                                <li><i class="fas fa-check text-success me-2"></i>Export Excel Profesional</li>
                            </ul>
                            <a href="{{ route('projection.create') }}" class="btn btn-success mt-3">
                                <i class="fas fa-chart-line me-2"></i>Financial Projection
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- BMC Components Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">9 Komponen Business Model Canvas</h2>
            <div class="row">
                <!-- Customer Segments -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-users text-primary me-2"></i>Customer Segments</h5>
                        <p>Identifikasi siapa pelanggan target Anda. Siapa yang akan membeli produk atau layanan Anda?</p>
                    </div>
                </div>

                <!-- Value Propositions -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-gem text-warning me-2"></i>Value Propositions</h5>
                        <p>Nilai unik yang Anda tawarkan kepada pelanggan. Mengapa mereka memilih Anda?</p>
                    </div>
                </div>

                <!-- Channels -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-broadcast-tower text-info me-2"></i>Channels</h5>
                        <p>Cara Anda berkomunikasi dan menjangkau pelanggan. Media sosial, website, toko fisik, dll.</p>
                    </div>
                </div>

                <!-- Customer Relationships -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-handshake text-success me-2"></i>Customer Relationships</h5>
                        <p>Jenis hubungan yang Anda bangun dengan pelanggan. Personal, otomatis, self-service, dll.</p>
                    </div>
                </div>

                <!-- Revenue Streams -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-dollar-sign text-success me-2"></i>Revenue Streams</h5>
                        <p>Bagaimana bisnis Anda menghasilkan uang. Penjualan, langganan, iklan, dll.</p>
                    </div>
                </div>

                <!-- Key Resources -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-key text-purple me-2"></i>Key Resources</h5>
                        <p>Sumber daya penting yang dibutuhkan untuk menjalankan bisnis. Manusia, fisik, intelektual, finansial.</p>
                    </div>
                </div>

                <!-- Key Activities -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-tasks text-info me-2"></i>Key Activities</h5>
                        <p>Aktivitas utama yang harus dilakukan untuk menjalankan model bisnis Anda.</p>
                    </div>
                </div>

                <!-- Key Partnerships -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-handshake text-warning me-2"></i>Key Partnerships</h5>
                        <p>Mitra strategis yang membantu Anda menjalankan bisnis. Supplier, distributor, dll.</p>
                    </div>
                </div>

                <!-- Cost Structure -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="bmc-card">
                        <h5><i class="fas fa-calculator text-danger me-2"></i>Cost Structure</h5>
                        <p>Biaya-biaya yang diperlukan untuk menjalankan model bisnis Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TAM SAM SOM Explanation Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4">
                    <h2 class="section-title text-danger">
                        <i class="fas fa-chart-pie me-2"></i>Memahami TAM SAM SOM
                    </h2>
                    <div class="mb-4">
                        <h5 class="text-danger">TAM (Total Addressable Market)</h5>
                        <p>Total keseluruhan pasar untuk produk/layanan Anda. Berapa besar pasar jika 100% orang membeli produk Anda?</p>
                        <small class="text-muted"><strong>Contoh:</strong> Seluruh pengguna smartphone di Indonesia (270 juta orang)</small>
                    </div>
                    <div class="mb-4">
                        <h5 class="text-primary">SAM (Serviceable Addressable Market)</h5>
                        <p>Bagian dari TAM yang realistis dapat Anda layani berdasarkan model bisnis dan geografis.</p>
                        <small class="text-muted"><strong>Contoh:</strong> Pengguna smartphone di kota besar dengan akses internet (50 juta orang)</small>
                    </div>
                    <div class="mb-4">
                        <h5 class="text-success">SOM (Serviceable Obtainable Market)</h5>
                        <p>Bagian dari SAM yang realistis dapat Anda raih berdasarkan kompetisi dan kapasitas bisnis.</p>
                        <small class="text-muted"><strong>Contoh:</strong> Target market share 2% dari SAM (1 juta pengguna)</small>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <h2 class="section-title text-success">
                        <i class="fas fa-chart-line me-2"></i>Financial Projection
                    </h2>
                    <div class="mb-4">
                        <h5 class="text-success">Proyeksi Revenue</h5>
                        <p>Perkiraan pendapatan berdasarkan harga produk, volume penjualan, dan pertumbuhan pasar.</p>
                        <small class="text-muted"><strong>Termasuk:</strong> Penjualan bulanan, seasonal trends, growth rate</small>
                    </div>
                    <div class="mb-4">
                        <h5 class="text-warning">Proyeksi Expenses</h5>
                        <p>Estimasi biaya operasional, marketing, gaji karyawan, dan biaya lainnya.</p>
                        <small class="text-muted"><strong>Termasuk:</strong> Fixed costs, variable costs, one-time expenses</small>
                    </div>
                    <div class="mb-4">
                        <h5 class="text-info">Asumsi Pasar & Keuangan</h5>
                        <p>Faktor-faktor yang mempengaruhi proyeksi seperti inflasi, kompetisi, dan tren industri.</p>
                        <small class="text-muted"><strong>Contoh:</strong> Pertumbuhan pasar 15%/tahun, customer acquisition cost</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center section-title">Mengapa Menggunakan Ideation?</h2>
            <div class="row">
                <div class="col-lg-3 text-center mb-4">
                    <i class="fas fa-magic feature-icon"></i>
                    <h4>Mudah Digunakan</h4>
                    <p>Interface yang intuitif dan user-friendly untuk membuat analisis bisnis profesional dalam hitungan menit.</p>
                </div>
                <div class="col-lg-3 text-center mb-4">
                    <i class="fas fa-download feature-icon"></i>
                    <h4>Download & Print</h4>
                    <p>Download dalam format PDF, PNG, JPG atau print langsung untuk presentasi dan sharing.</p>
                </div>
                <div class="col-lg-3 text-center mb-4">
                    <i class="fas fa-database feature-icon"></i>
                    <h4>History & Database</h4>
                    <p>Semua data tersimpan aman di database dengan history lengkap untuk tracking progress.</p>
                </div>
                <div class="col-lg-3 text-center mb-4">
                    <i class="fas fa-chart-bar feature-icon"></i>
                    <h4>Template Profesional</h4>
                    <p>Template yang sudah terbukti dan digunakan oleh startup dan perusahaan besar di Indonesia.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Siap Mengembangkan Strategi Bisnis Anda?</h2>
            <p class="lead mb-4">Mulai dengan salah satu tools kami dan kembangkan strategi bisnis yang solid untuk kesuksesan jangka panjang.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('bmc.create') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-th-large me-2"></i>Buat BMC
                </a>
                <a href="{{ route('tam-sam-som.create') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-chart-pie me-2"></i>Analisis Pasar
                </a>
                <a href="{{ route('projection.create') }}" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-chart-line me-2"></i>Financial Projection
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p>&copy; 2024 Ideation. Dibuat dengan ❤️ untuk pengusaha Indonesia.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
