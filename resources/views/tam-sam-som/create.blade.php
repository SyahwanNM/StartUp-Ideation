@extends('layouts.head')

@section('title', 'Buat TAM SAM SOM - Ideation')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-container {
        padding: 2rem 0;
        min-height: 100vh;
    }

    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 3rem;
        margin: 2rem auto;
        max-width: 1000px;
    }

    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-title {
        color: #2d3748;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        color: #718096;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .tam-sam-som-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 2rem;
        margin: 2rem 0;
    }

    .tam-card, .sam-card, .som-card {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 2rem;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .tam-card {
        border-color: #e53e3e;
        background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
    }

    .sam-card {
        border-color: #3182ce;
        background: linear-gradient(135deg, #bee3f8 0%, #90cdf4 100%);
    }

    .som-card {
        border-color: #38a169;
        background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-align: center;
    }

    .card-subtitle {
        font-size: 0.9rem;
        color: #4a5568;
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2d3748;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-control.large {
        min-height: 120px;
        resize: vertical;
    }

    .currency-input {
        position: relative;
    }

    .currency-symbol {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #4a5568;
        font-weight: 600;
    }

    .currency-input .form-control {
        padding-left: 2.5rem;
    }

    .btn {
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-secondary {
        background: #e2e8f0;
        color: #4a5568;
    }

    .btn-secondary:hover {
        background: #cbd5e0;
        transform: translateY(-2px);
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    .alert {
        padding: 1rem 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }

    .alert-danger {
        background: #fed7d7;
        color: #c53030;
        border: 1px solid #feb2b2;
    }

    .alert-success {
        background: #c6f6d5;
        color: #2f855a;
        border: 1px solid #9ae6b4;
    }

    .dynamic-inputs {
        margin-top: 1rem;
    }

    .input-group {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        align-items: center;
    }

    .btn-add {
        background: #48bb78;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }

    .btn-remove {
        background: #f56565;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 5px;
        font-size: 0.8rem;
        min-width: 30px;
    }

    @media (max-width: 768px) {
        .tam-sam-som-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .form-container {
            margin: 1rem;
            padding: 2rem;
        }
        
        .page-title {
            font-size: 2rem;
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
                        <a class="nav-link" href="{{ route('bmc.create') }}">Buat BMC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('tam-sam-som.create') }}">TAM SAM SOM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('financial-projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="container">
            <div class="form-container">
                <div class="page-header">
                    <h1 class="page-title">Buat TAM SAM SOM</h1>
                    <p class="page-subtitle">
                        Analisis Total Addressable Market, Serviceable Addressable Market, dan Serviceable Obtainable Market untuk bisnis Anda
                    </p>
                </div>

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

                <form method="POST" action="{{ route('tam-sam-som.store') }}">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Pemilik</label>
                                <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Bisnis</label>
                                <input type="text" name="business_name" class="form-control" value="{{ old('business_name') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Industri</label>
                                <input type="text" name="industry" class="form-control" value="{{ old('industry') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Lokasi</label>
                                <input type="text" name="location" class="form-control" value="{{ old('location') }}" required>
                            </div>
                        </div>
                    </div>

                    <!-- TAM SAM SOM Analysis -->
                    <div class="tam-sam-som-grid">
                        <!-- TAM -->
                        <div class="tam-card">
                            <h3 class="card-title" style="color: #c53030;">TAM</h3>
                            <p class="card-subtitle">Total Addressable Market</p>
                            
                            <div class="form-group">
                                <label class="form-label">Deskripsi TAM</label>
                                <textarea name="tam_description" class="form-control large" placeholder="Jelaskan total pasar yang dapat dialamatkan..." required>{{ old('tam_description') }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Nilai TAM (IDR)</label>
                                <div class="currency-input">
                                    <span class="currency-symbol">Rp</span>
                                    <input type="number" name="tam_value" class="form-control" value="{{ old('tam_value') }}" min="0" step="1000" required>
                                </div>
                            </div>
                        </div>

                        <!-- SAM -->
                        <div class="sam-card">
                            <h3 class="card-title" style="color: #2b6cb0;">SAM</h3>
                            <p class="card-subtitle">Serviceable Addressable Market</p>
                            
                            <div class="form-group">
                                <label class="form-label">Deskripsi SAM</label>
                                <textarea name="sam_description" class="form-control large" placeholder="Jelaskan pasar yang dapat dilayani..." required>{{ old('sam_description') }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Nilai SAM (IDR)</label>
                                <div class="currency-input">
                                    <span class="currency-symbol">Rp</span>
                                    <input type="number" name="sam_value" class="form-control" value="{{ old('sam_value') }}" min="0" step="1000" required>
                                </div>
                            </div>
                        </div>

                        <!-- SOM -->
                        <div class="som-card">
                            <h3 class="card-title" style="color: #2f855a;">SOM</h3>
                            <p class="card-subtitle">Serviceable Obtainable Market</p>
                            
                            <div class="form-group">
                                <label class="form-label">Deskripsi SOM</label>
                                <textarea name="som_description" class="form-control large" placeholder="Jelaskan pasar yang dapat diperoleh..." required>{{ old('som_description') }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Nilai SOM (IDR)</label>
                                <div class="currency-input">
                                    <span class="currency-symbol">Rp</span>
                                    <input type="number" name="som_value" class="form-control" value="{{ old('som_value') }}" min="0" step="1000" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Asumsi Pasar</label>
                                <div id="market-assumptions">
                                    <div class="input-group">
                                        <input type="text" name="market_assumptions[]" class="form-control" placeholder="Masukkan asumsi pasar...">
                                        <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-add" onclick="addMarketAssumption()">
                                    <i class="fas fa-plus"></i> Tambah Asumsi
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Proyeksi Pertumbuhan</label>
                                <div id="growth-projections">
                                    <div class="input-group">
                                        <input type="text" name="growth_projections[]" class="form-control" placeholder="Masukkan proyeksi pertumbuhan...">
                                        <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-add" onclick="addGrowthProjection()">
                                    <i class="fas fa-plus"></i> Tambah Proyeksi
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('bmc.landing') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan TAM SAM SOM
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addMarketAssumption() {
            const container = document.getElementById('market-assumptions');
            const newInput = document.createElement('div');
            newInput.className = 'input-group';
            newInput.innerHTML = `
                <input type="text" name="market_assumptions[]" class="form-control" placeholder="Masukkan asumsi pasar...">
                <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
            `;
            container.appendChild(newInput);
        }

        function addGrowthProjection() {
            const container = document.getElementById('growth-projections');
            const newInput = document.createElement('div');
            newInput.className = 'input-group';
            newInput.innerHTML = `
                <input type="text" name="growth_projections[]" class="form-control" placeholder="Masukkan proyeksi pertumbuhan...">
                <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
            `;
            container.appendChild(newInput);
        }

        function removeInput(button) {
            button.parentElement.remove();
        }

        // Format currency input
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                // Add thousand separators for display (optional)
                // You can implement this if needed
            });
        });
    </script>
</body>
</html>
