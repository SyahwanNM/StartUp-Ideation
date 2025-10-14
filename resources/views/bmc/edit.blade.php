<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Business Model Canvas - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .form-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }
        .section-title {
            color: #495057;
            font-weight: bold;
            margin-bottom: 20px;
            border-bottom: 3px solid #667eea;
            padding-bottom: 10px;
        }
        .bmc-input {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }
        .bmc-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .add-item-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
        }
        .add-item-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .remove-item-btn {
            background: #dc3545;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
        }
        .submit-btn {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
        }
        .delete-btn {
            background: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%);
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .form-section {
                padding: 20px;
                margin-bottom: 20px;
            }
            
            .section-title {
                font-size: 1.2rem;
                margin-bottom: 15px;
            }
            
            .bmc-input {
                padding: 12px;
                margin-bottom: 12px;
            }
            
            .add-item-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
            
            .remove-item-btn {
                padding: 4px 8px;
                font-size: 0.7rem;
            }
            
            .submit-btn {
                padding: 12px 30px;
                font-size: 1rem;
                width: 100%;
                margin-bottom: 10px;
            }
            
            .delete-btn {
                padding: 8px 20px;
                font-size: 0.9rem;
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .container {
                padding: 0 15px;
            }
            
            .form-section {
                padding: 15px;
                margin-bottom: 15px;
            }
            
            .section-title {
                font-size: 1.1rem;
                margin-bottom: 12px;
            }
            
            .bmc-input {
                padding: 10px;
                margin-bottom: 10px;
            }
            
            .add-item-btn {
                padding: 6px 12px;
                font-size: 0.8rem;
            }
            
            .remove-item-btn {
                padding: 3px 6px;
                font-size: 0.6rem;
            }
            
            .submit-btn {
                padding: 10px 25px;
                font-size: 0.9rem;
            }
            
            .delete-btn {
                padding: 6px 15px;
                font-size: 0.8rem;
            }
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            font-size: 1.125rem;
            color: #6c757d;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
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

    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <!-- Page Header -->
                <div class="page-header">
                    <h1 class="page-title">Edit Business Model Canvas</h1>
                    <p class="page-subtitle">Perbarui informasi bisnis dan BMC Anda</p>
                </div>

                <form action="{{ route('bmc.update', $business->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Business Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-building me-2"></i>Informasi Bisnis
                        </h3>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="owner_name" class="form-label">Nama Pemilik Usaha</label>
                                <input type="text" class="form-control" id="owner_name" name="owner_name" value="{{ $business->owner_name }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="business_name" class="form-label">Nama Usaha</label>
                                <input type="text" class="form-control" id="business_name" name="business_name" value="{{ $business->business_name }}" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="business_description" class="form-label">Deskripsi Usaha</label>
                            <textarea class="form-control" id="business_description" name="business_description" rows="3" required>{{ $business->business_description }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label for="industry" class="form-label">Industri</label>
                            <select class="form-select" id="industry" name="industry" required>
                                <option value="">Pilih Industri</option>
                                <option value="Food & Beverage" {{ $business->industry == 'Food & Beverage' ? 'selected' : '' }}>Food & Beverage</option>
                                <option value="Technology" {{ $business->industry == 'Technology' ? 'selected' : '' }}>Technology</option>
                                <option value="Fashion" {{ $business->industry == 'Fashion' ? 'selected' : '' }}>Fashion</option>
                                <option value="Healthcare" {{ $business->industry == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                                <option value="Education" {{ $business->industry == 'Education' ? 'selected' : '' }}>Education</option>
                                <option value="Finance" {{ $business->industry == 'Finance' ? 'selected' : '' }}>Finance</option>
                                <option value="Manufacturing" {{ $business->industry == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                                <option value="Retail" {{ $business->industry == 'Retail' ? 'selected' : '' }}>Retail</option>
                                <option value="Services" {{ $business->industry == 'Services' ? 'selected' : '' }}>Services</option>
                                <option value="Agriculture" {{ $business->industry == 'Agriculture' ? 'selected' : '' }}>Agriculture</option>
                                <option value="Transportation" {{ $business->industry == 'Transportation' ? 'selected' : '' }}>Transportation</option>
                                <option value="Real Estate" {{ $business->industry == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                <option value="Entertainment" {{ $business->industry == 'Entertainment' ? 'selected' : '' }}>Entertainment</option>
                                <option value="Energy" {{ $business->industry == 'Energy' ? 'selected' : '' }}>Energy</option>
                                <option value="Other" {{ $business->industry == 'Other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="location" class="form-label">Lokasi</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ $business->location }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone_number" class="form-label">No. Telepon</label>
                                <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ $business->phone_number }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- BMC Components -->
                    <div class="form-section">
                        <h3 class="section-title">
                            <i class="fas fa-chart-line me-2"></i>Business Model Canvas Components
                        </h3>

                        <!-- Customer Segments -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">1. Customer Segments (Segmen Pelanggan)</label>
                            <p class="text-muted small">Siapa pelanggan target Anda?</p>
                            <div id="customer_segments">
                                @foreach($business->bmcData->customer_segments as $segment)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="customer_segments[]" value="{{ $segment }}" placeholder="Contoh: Orang yang sedang diet">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('customer_segments')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Value Propositions -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">2. Value Propositions (Proposisi Nilai)</label>
                            <p class="text-muted small">Nilai unik apa yang Anda tawarkan?</p>
                            <div id="value_propositions">
                                @foreach($business->bmcData->value_propositions as $value)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="value_propositions[]" value="{{ $value }}" placeholder="Contoh: Produk sehat & rendah gula">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('value_propositions')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Channels -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">3. Channels (Saluran)</label>
                            <p class="text-muted small">Bagaimana Anda menjangkau pelanggan?</p>
                            <div id="channels">
                                @foreach($business->bmcData->channels as $channel)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="channels[]" value="{{ $channel }}" placeholder="Contoh: Media sosial (Instagram & TikTok)">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('channels')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Customer Relationships -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">4. Customer Relationships (Hubungan Pelanggan)</label>
                            <p class="text-muted small">Jenis hubungan apa yang Anda bangun?</p>
                            <div id="customer_relationships">
                                @foreach($business->bmcData->customer_relationships as $relationship)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="customer_relationships[]" value="{{ $relationship }}" placeholder="Contoh: Layanan personal untuk custom order">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('customer_relationships')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Revenue Streams -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">5. Revenue Streams (Arus Pendapatan)</label>
                            <p class="text-muted small">Bagaimana bisnis Anda menghasilkan uang?</p>
                            <div id="revenue_streams">
                                @foreach($business->bmcData->revenue_streams as $revenue)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="revenue_streams[]" value="{{ $revenue }}" placeholder="Contoh: Penjualan langsung ke konsumen">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('revenue_streams')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Key Resources -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">6. Key Resources (Sumber Daya Utama)</label>
                            <p class="text-muted small">Sumber daya apa yang dibutuhkan?</p>
                            <div id="key_resources">
                                @foreach($business->bmcData->key_resources as $resource)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="key_resources[]" value="{{ $resource }}" placeholder="Contoh: Dapur produksi & alat baking premium">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('key_resources')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Key Activities -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">7. Key Activities (Aktivitas Utama)</label>
                            <p class="text-muted small">Aktivitas apa yang harus dilakukan?</p>
                            <div id="key_activities">
                                @foreach($business->bmcData->key_activities as $activity)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="key_activities[]" value="{{ $activity }}" placeholder="Contoh: Produksi macaron rendah gula">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('key_activities')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Key Partnerships -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">8. Key Partnerships (Kemitraan Utama)</label>
                            <p class="text-muted small">Siapa mitra strategis Anda?</p>
                            <div id="key_partnerships">
                                @foreach($business->bmcData->key_partnerships as $partnership)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="key_partnerships[]" value="{{ $partnership }}" placeholder="Contoh: Supplier bahan baku">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('key_partnerships')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>

                        <!-- Cost Structure -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">9. Cost Structure (Struktur Biaya)</label>
                            <p class="text-muted small">Biaya apa saja yang diperlukan?</p>
                            <div id="cost_structure">
                                @foreach($business->bmcData->cost_structure as $cost)
                                    <div class="bmc-input">
                                        <input type="text" class="form-control" name="cost_structure[]" value="{{ $cost }}" placeholder="Contoh: Biaya bahan baku premium">
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn add-item-btn" onclick="addItem('cost_structure')">
                                <i class="fas fa-plus me-1"></i>Tambah Item
                            </button>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn submit-btn me-3">
                            <i class="fas fa-save me-2"></i>Perbarui BMC
                        </button>
                        <a href="{{ route('bmc.show', $business->id) }}" class="btn btn-outline-secondary me-3">
                            <i class="fas fa-eye me-2"></i>Lihat BMC
                        </a>
                        <a href="#" class="delete-btn" onclick="confirmDelete()">
                            <i class="fas fa-trash me-2"></i>Hapus BMC
                        </a>
                    </div>
                </form>

                <!-- Delete Form -->
                <form id="delete-form" action="{{ route('bmc.destroy', $business->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
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

        function confirmDelete() {
            if (confirm('Apakah Anda yakin ingin menghapus BMC ini? Tindakan ini tidak dapat dibatalkan.')) {
                document.getElementById('delete-form').submit();
            }
        }
    </script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
