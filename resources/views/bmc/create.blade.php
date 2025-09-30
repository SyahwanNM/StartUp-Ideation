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

                <!-- Customer Segments -->
                <div class="mb-4">
                    <label class="form-label">1. Customer Segments (Segmen Pelanggan)</label>
                    <p class="text-muted small mb-3">Siapa pelanggan target Anda?</p>
                    <div id="customer_segments">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="customer_segments[]" placeholder="Contoh: Orang yang sedang diet">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('customer_segments')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Value Propositions -->
                <div class="mb-4">
                    <label class="form-label">2. Value Propositions (Proposisi Nilai)</label>
                    <p class="text-muted small mb-3">Nilai unik apa yang Anda tawarkan?</p>
                    <div id="value_propositions">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="value_propositions[]" placeholder="Contoh: Produk sehat & rendah gula">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('value_propositions')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Channels -->
                <div class="mb-4">
                    <label class="form-label">3. Channels (Saluran)</label>
                    <p class="text-muted small mb-3">Bagaimana Anda menjangkau pelanggan?</p>
                    <div id="channels">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="channels[]" placeholder="Contoh: Media sosial (Instagram & TikTok)">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('channels')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Customer Relationships -->
                <div class="mb-4">
                    <label class="form-label">4. Customer Relationships (Hubungan Pelanggan)</label>
                    <p class="text-muted small mb-3">Jenis hubungan apa yang Anda bangun?</p>
                    <div id="customer_relationships">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="customer_relationships[]" placeholder="Contoh: Layanan personal untuk custom order">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('customer_relationships')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Revenue Streams -->
                <div class="mb-4">
                    <label class="form-label">5. Revenue Streams (Arus Pendapatan)</label>
                    <p class="text-muted small mb-3">Bagaimana bisnis Anda menghasilkan uang?</p>
                    <div id="revenue_streams">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="revenue_streams[]" placeholder="Contoh: Penjualan langsung ke konsumen">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('revenue_streams')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Key Resources -->
                <div class="mb-4">
                    <label class="form-label">6. Key Resources (Sumber Daya Utama)</label>
                    <p class="text-muted small mb-3">Sumber daya apa yang dibutuhkan?</p>
                    <div id="key_resources">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="key_resources[]" placeholder="Contoh: Dapur produksi & alat baking premium">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('key_resources')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Key Activities -->
                <div class="mb-4">
                    <label class="form-label">7. Key Activities (Aktivitas Utama)</label>
                    <p class="text-muted small mb-3">Aktivitas apa yang harus dilakukan?</p>
                    <div id="key_activities">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="key_activities[]" placeholder="Contoh: Produksi macaron rendah gula">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('key_activities')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Key Partnerships -->
                <div class="mb-4">
                    <label class="form-label">8. Key Partnerships (Kemitraan Utama)</label>
                    <p class="text-muted small mb-3">Siapa mitra strategis Anda?</p>
                    <div id="key_partnerships">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="key_partnerships[]" placeholder="Contoh: Supplier bahan baku">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('key_partnerships')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
                </div>

                <!-- Cost Structure -->
                <div class="mb-4">
                    <label class="form-label">9. Cost Structure (Struktur Biaya)</label>
                    <p class="text-muted small mb-3">Biaya apa saja yang diperlukan?</p>
                    <div id="cost_structure">
                        <div class="bmc-input">
                            <input type="text" class="form-control" name="cost_structure[]" placeholder="Contoh: Biaya bahan baku premium">
                        </div>
                    </div>
                    <button type="button" class="btn add-item-btn" onclick="addItem('cost_structure')">
                        <i class="fas fa-plus me-1"></i>Tambah Item
                    </button>
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
        function addItem(containerId) {
            const container = document.getElementById(containerId);
            const newItem = document.createElement('div');
            newItem.className = 'bmc-input';
            newItem.innerHTML = `
                <div class="d-flex">
                    <input type="text" class="form-control me-2" name="${containerId}[]" placeholder="Masukkan item baru">
                    <button type="button" class="btn remove-item-btn" onclick="removeItem(this)">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            `;
            container.appendChild(newItem);
        }

        function removeItem(button) {
            button.closest('.bmc-input').remove();
        }
    </script>
</body>
</html>
