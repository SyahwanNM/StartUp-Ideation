<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ideation - BMC Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
        }
        .bmc-card {
            border: 2px solid #e9ecef;
            border-radius: 15px;
            padding: 20px;
            margin: 10px 0;
            transition: all 0.3s ease;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .bmc-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .bmc-card h5 {
            color: #495057;
            font-weight: bold;
        }
        .bmc-card p {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .cta-button {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            color: white;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        .feature-icon {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 20px;
        }
        .section-title {
            color: #495057;
            font-weight: bold;
            margin-bottom: 30px;
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
            background: linear-gradient(45deg, rgba(255,255,255,0.3), rgba(255,255,255,0.1));
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
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-illustration {
                height: 350px;
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
            
            .bmc-element span {
                font-size: 8px;
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
                        <a class="nav-link" href="{{ route('bmc.create') }}">Buat BMC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tam-sam-som.create') }}">TAM SAM SOM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('financial-projection.create') }}">Financial Projection</a>
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
                        <p class="lead mb-3 text-white-50 fs-4">BMC Generator</p>
                    </div>
                    <p class="lead mb-4">Buat Business Model Canvas profesional untuk bisnis Anda dengan mudah. Template yang sudah terbukti untuk mengembangkan strategi bisnis yang solid.</p>
                    <a href="{{ route('bmc.create') }}" class="cta-button">
                        <i class="fas fa-plus me-2"></i>Buat BMC Sekarang
                    </a>
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

    <!-- What is BMC Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-title">Apa itu Business Model Canvas?</h2>
                    <p class="lead">Business Model Canvas adalah alat strategis yang membantu Anda memvisualisasikan dan mengembangkan model bisnis Anda. Terdiri dari 9 elemen kunci yang saling berhubungan untuk menciptakan strategi bisnis yang komprehensif.</p>
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

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center section-title">Mengapa Menggunakan Ideation?</h2>
            <div class="row">
                <div class="col-lg-4 text-center mb-4">
                    <i class="fas fa-magic feature-icon"></i>
                    <h4>Mudah Digunakan</h4>
                    <p>Interface yang intuitif dan user-friendly untuk membuat BMC profesional dalam hitungan menit.</p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <i class="fas fa-download feature-icon"></i>
                    <h4>Download & Share</h4>
                    <p>Download BMC Anda dalam format PDF atau gambar untuk presentasi dan sharing.</p>
                </div>
                <div class="col-lg-4 text-center mb-4">
                    <i class="fas fa-chart-bar feature-icon"></i>
                    <h4>Template Profesional</h4>
                    <p>Template BMC yang sudah terbukti dan digunakan oleh startup dan perusahaan besar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="mb-4">Siap Membuat Business Model Canvas?</h2>
            <p class="lead mb-4">Mulai sekarang dan kembangkan strategi bisnis yang solid untuk kesuksesan jangka panjang.</p>
            <a href="{{ route('bmc.create') }}" class="btn btn-light btn-lg">
                <i class="fas fa-rocket me-2"></i>Mulai Sekarang
            </a>
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
