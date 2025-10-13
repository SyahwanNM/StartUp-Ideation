<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Business Model Canvas - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }
        
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .page-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .form-section {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }

        /* BMC Grid Layout */
        .bmc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            gap: 15px;
            margin: 2rem 0;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        .bmc-component {
            background: white;
            border: 3px solid #e9ecef;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-height: 200px;
            display: flex;
            flex-direction: column;
        }

        .bmc-component:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .bmc-component::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        /* Specific component colors */
        .bmc-customer-segments {
            border-color: #e74c3c;
            background: linear-gradient(135deg, #fff5f5 0%, #ffeaea 100%);
        }
        .bmc-customer-segments::before {
            background: linear-gradient(90deg, #e74c3c, #c0392b);
        }

        .bmc-value-propositions {
            border-color: #f39c12;
            background: linear-gradient(135deg, #fffbf0 0%, #fff2e0 100%);
        }
        .bmc-value-propositions::before {
            background: linear-gradient(90deg, #f39c12, #e67e22);
        }

        .bmc-channels {
            border-color: #27ae60;
            background: linear-gradient(135deg, #f0fff4 0%, #e8f5e8 100%);
        }
        .bmc-channels::before {
            background: linear-gradient(90deg, #27ae60, #2ecc71);
        }

        .bmc-customer-relationships {
            border-color: #9b59b6;
            background: linear-gradient(135deg, #faf5ff 0%, #f0e6ff 100%);
        }
        .bmc-customer-relationships::before {
            background: linear-gradient(90deg, #9b59b6, #8e44ad);
        }

        .bmc-revenue-streams {
            border-color: #3498db;
            background: linear-gradient(135deg, #f0f8ff 0%, #e6f3ff 100%);
        }
        .bmc-revenue-streams::before {
            background: linear-gradient(90deg, #3498db, #2980b9);
        }

        .bmc-key-resources {
            border-color: #e67e22;
            background: linear-gradient(135deg, #fff8f0 0%, #fff0e6 100%);
        }
        .bmc-key-resources::before {
            background: linear-gradient(90deg, #e67e22, #d35400);
        }

        .bmc-key-activities {
            border-color: #1abc9c;
            background: linear-gradient(135deg, #f0fffe 0%, #e6fffc 100%);
        }
        .bmc-key-activities::before {
            background: linear-gradient(90deg, #1abc9c, #16a085);
        }

        .bmc-key-partnerships {
            border-color: #34495e;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        .bmc-key-partnerships::before {
            background: linear-gradient(90deg, #34495e, #2c3e50);
        }

        .bmc-cost-structure {
            border-color: #e91e63;
            background: linear-gradient(135deg, #fff0f5 0%, #ffe6f0 100%);
        }
        .bmc-cost-structure::before {
            background: linear-gradient(90deg, #e91e63, #c2185b);
        }

        .bmc-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .bmc-description {
            font-size: 0.85rem;
            color: #6c757d;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .bmc-inputs {
            flex: 1;
        }

        .bmc-input-item {
            background: rgba(255,255,255,0.8);
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 0.5rem 0.75rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .bmc-input-item:hover {
            border-color: #667eea;
            background: white;
        }

        .bmc-input-item input {
            border: none;
            background: transparent;
            flex: 1;
            font-size: 0.9rem;
            padding: 0.25rem;
        }

        .bmc-input-item input:focus {
            outline: none;
        }

        .bmc-add-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 0.5rem;
        }

        .bmc-add-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
        }

        .bmc-remove-btn {
            background: #e74c3c;
            border: none;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 50%;
            font-size: 0.7rem;
            transition: all 0.3s ease;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bmc-remove-btn:hover {
            background: #c0392b;
            transform: scale(1.1);
        }

        /* Grid positioning for BMC components */
        .bmc-customer-segments { grid-column: 1; grid-row: 1; }
        .bmc-value-propositions { grid-column: 2; grid-row: 1; }
        .bmc-channels { grid-column: 3; grid-row: 1; }
        .bmc-customer-relationships { grid-column: 1; grid-row: 2; }
        .bmc-revenue-streams { grid-column: 2; grid-row: 2; }
        .bmc-key-resources { grid-column: 3; grid-row: 2; }
        .bmc-key-activities { grid-column: 1; grid-row: 3; }
        .bmc-key-partnerships { grid-column: 2; grid-row: 3; }
        .bmc-cost-structure { grid-column: 3; grid-row: 3; }

        /* Responsive design */
        @media (max-width: 992px) {
            .bmc-grid {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: repeat(5, 1fr);
            }
            
            .bmc-customer-segments { grid-column: 1; grid-row: 1; }
            .bmc-value-propositions { grid-column: 2; grid-row: 1; }
            .bmc-channels { grid-column: 1; grid-row: 2; }
            .bmc-customer-relationships { grid-column: 2; grid-row: 2; }
            .bmc-revenue-streams { grid-column: 1; grid-row: 3; }
            .bmc-key-resources { grid-column: 2; grid-row: 3; }
            .bmc-key-activities { grid-column: 1; grid-row: 4; }
            .bmc-key-partnerships { grid-column: 2; grid-row: 4; }
            .bmc-cost-structure { grid-column: 1; grid-row: 5; }
        }

        @media (max-width: 768px) {
            .bmc-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(9, 1fr);
            }
            
            .bmc-customer-segments { grid-column: 1; grid-row: 1; }
            .bmc-value-propositions { grid-column: 1; grid-row: 2; }
            .bmc-channels { grid-column: 1; grid-row: 3; }
            .bmc-customer-relationships { grid-column: 1; grid-row: 4; }
            .bmc-revenue-streams { grid-column: 1; grid-row: 5; }
            .bmc-key-resources { grid-column: 1; grid-row: 6; }
            .bmc-key-activities { grid-column: 1; grid-row: 7; }
            .bmc-key-partnerships { grid-column: 1; grid-row: 8; }
            .bmc-cost-structure { grid-column: 1; grid-row: 9; }
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .section-title::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            margin-left: 1rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }
        
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafbfc;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            background: white;
        }
        
        .bmc-input {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            background: #fafbfc;
            font-size: 0.9rem;
        }
        
        .bmc-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            background: white;
        }
        
        .add-item-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .add-item-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        .remove-item-btn {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            border: none;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .remove-item-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
            padding: 1rem 3rem;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.3);
            width: 100%;
            max-width: 300px;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
        }
        
        .back-btn {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 25px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }
        
        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .item-container {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .item-container:hover {
            background: #e9ecef;
            border-color: #667eea;
        }
        
        .btn-container {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .form-section {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }
            
            .section-title {
                font-size: 1.25rem;
            }
            
            .btn-container {
                flex-direction: column;
                align-items: center;
            }
            
            .submit-btn, .back-btn {
                width: 100%;
                max-width: none;
            }
        }
        
        @media (max-width: 576px) {
            .main-container {
                padding: 1rem 0.5rem;
            }
            
            .form-section {
                padding: 1rem;
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
                        <a class="nav-link active" href="{{ route('bmc.create') }}">BMC</a>
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

    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title">Buat Business Model Canvas</h1>
            <p class="page-subtitle">Isi informasi bisnis dan BMC Anda dengan lengkap untuk mendapatkan analisis yang akurat</p>
        </div>

        <form action="{{ route('bmc.store') }}" method="POST">
            @csrf
                    
            <!-- Business Information Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-building"></i>Informasi Bisnis
                </h3>
                        
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="owner_name" class="form-label">Nama Pemilik Usaha</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="business_name" class="form-label">Nama Usaha</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" required>
                    </div>
                </div>
                        
                <div class="mb-3">
                    <label for="business_description" class="form-label">Deskripsi Usaha</label>
                    <textarea class="form-control" id="business_description" name="business_description" rows="3" required></textarea>
                </div>
                        
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="location" class="form-label">Lokasi</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone_number" class="form-label">No. Telepon</label>
                        <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                </div>
                    </div>

            <!-- BMC Components -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-chart-line"></i>Business Model Canvas Components
                </h3>

                <div class="bmc-grid">
                    <!-- Customer Segments -->
                    <div class="bmc-component bmc-customer-segments">
                        <div class="bmc-title">
                            <i class="fas fa-users"></i>
                            Customer Segments
                        </div>
                        <div class="bmc-description">Siapa pelanggan target Anda?</div>
                        <div class="bmc-inputs" id="customer_segments">
                            <div class="bmc-input-item">
                                <input type="text" name="customer_segments[]" placeholder="Contoh: Orang yang sedang diet">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('customer_segments')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Value Propositions -->
                    <div class="bmc-component bmc-value-propositions">
                        <div class="bmc-title">
                            <i class="fas fa-gem"></i>
                            Value Propositions
                        </div>
                        <div class="bmc-description">Nilai unik apa yang Anda tawarkan?</div>
                        <div class="bmc-inputs" id="value_propositions">
                            <div class="bmc-input-item">
                                <input type="text" name="value_propositions[]" placeholder="Contoh: Produk sehat & rendah gula">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('value_propositions')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Channels -->
                    <div class="bmc-component bmc-channels">
                        <div class="bmc-title">
                            <i class="fas fa-broadcast-tower"></i>
                            Channels
                        </div>
                        <div class="bmc-description">Bagaimana Anda menjangkau pelanggan?</div>
                        <div class="bmc-inputs" id="channels">
                            <div class="bmc-input-item">
                                <input type="text" name="channels[]" placeholder="Contoh: Media sosial (Instagram & TikTok)">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('channels')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Customer Relationships -->
                    <div class="bmc-component bmc-customer-relationships">
                        <div class="bmc-title">
                            <i class="fas fa-handshake"></i>
                            Customer Relationships
                        </div>
                        <div class="bmc-description">Jenis hubungan apa yang Anda bangun?</div>
                        <div class="bmc-inputs" id="customer_relationships">
                            <div class="bmc-input-item">
                                <input type="text" name="customer_relationships[]" placeholder="Contoh: Layanan personal untuk custom order">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('customer_relationships')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Revenue Streams -->
                    <div class="bmc-component bmc-revenue-streams">
                        <div class="bmc-title">
                            <i class="fas fa-dollar-sign"></i>
                            Revenue Streams
                        </div>
                        <div class="bmc-description">Bagaimana bisnis Anda menghasilkan uang?</div>
                        <div class="bmc-inputs" id="revenue_streams">
                            <div class="bmc-input-item">
                                <input type="text" name="revenue_streams[]" placeholder="Contoh: Penjualan langsung ke konsumen">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('revenue_streams')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Key Resources -->
                    <div class="bmc-component bmc-key-resources">
                        <div class="bmc-title">
                            <i class="fas fa-tools"></i>
                            Key Resources
                        </div>
                        <div class="bmc-description">Sumber daya apa yang dibutuhkan?</div>
                        <div class="bmc-inputs" id="key_resources">
                            <div class="bmc-input-item">
                                <input type="text" name="key_resources[]" placeholder="Contoh: Dapur produksi & alat baking premium">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('key_resources')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Key Activities -->
                    <div class="bmc-component bmc-key-activities">
                        <div class="bmc-title">
                            <i class="fas fa-cogs"></i>
                            Key Activities
                        </div>
                        <div class="bmc-description">Aktivitas apa yang harus dilakukan?</div>
                        <div class="bmc-inputs" id="key_activities">
                            <div class="bmc-input-item">
                                <input type="text" name="key_activities[]" placeholder="Contoh: Produksi macaron rendah gula">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('key_activities')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Key Partnerships -->
                    <div class="bmc-component bmc-key-partnerships">
                        <div class="bmc-title">
                            <i class="fas fa-handshake"></i>
                            Key Partnerships
                        </div>
                        <div class="bmc-description">Siapa mitra strategis Anda?</div>
                        <div class="bmc-inputs" id="key_partnerships">
                            <div class="bmc-input-item">
                                <input type="text" name="key_partnerships[]" placeholder="Contoh: Supplier bahan baku">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('key_partnerships')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>

                    <!-- Cost Structure -->
                    <div class="bmc-component bmc-cost-structure">
                        <div class="bmc-title">
                            <i class="fas fa-calculator"></i>
                            Cost Structure
                        </div>
                        <div class="bmc-description">Biaya apa saja yang diperlukan?</div>
                        <div class="bmc-inputs" id="cost_structure">
                            <div class="bmc-input-item">
                                <input type="text" name="cost_structure[]" placeholder="Contoh: Biaya bahan baku premium">
                                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="bmc-add-btn" onclick="addBmcItem('cost_structure')">
                            <i class="fas fa-plus me-1"></i>Tambah
                        </button>
                    </div>
                </div>
            </div>

            <div class="btn-container">
                <a href="{{ route('bmc.landing') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="submit-btn">
                    <i class="fas fa-save"></i> Buat Business Model Canvas
                </button>
            </div>
        </form>
    </div>

    <script>
        function addBmcItem(containerId) {
            const container = document.getElementById(containerId);
            const newItem = document.createElement('div');
            newItem.className = 'bmc-input-item';
            newItem.innerHTML = `
                <input type="text" name="${containerId}[]" placeholder="Masukkan item baru">
                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(newItem);
            
            // Show remove buttons for all items in this container
            updateRemoveButtons(containerId);
        }

        function removeBmcItem(button) {
            const container = button.closest('.bmc-inputs');
            const containerId = container.id;
            button.closest('.bmc-input-item').remove();
            
            // Update remove buttons visibility
            updateRemoveButtons(containerId);
        }

        function updateRemoveButtons(containerId) {
            const container = document.getElementById(containerId);
            const items = container.querySelectorAll('.bmc-input-item');
            
            items.forEach((item, index) => {
                const removeBtn = item.querySelector('.bmc-remove-btn');
                if (items.length > 1) {
                    removeBtn.style.display = 'flex';
                } else {
                    removeBtn.style.display = 'none';
                }
            });
        }

        // Initialize remove buttons on page load
        document.addEventListener('DOMContentLoaded', function() {
            const containers = ['customer_segments', 'value_propositions', 'channels', 'customer_relationships', 
                              'revenue_streams', 'key_resources', 'key_activities', 'key_partnerships', 'cost_structure'];
            
            containers.forEach(containerId => {
                updateRemoveButtons(containerId);
            });
        });
    </script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
