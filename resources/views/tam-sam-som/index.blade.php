@extends('layouts.head')

@section('title', 'Daftar Market Validation - Ideation')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        border: none;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
    }

    .main-container {
        padding: 2rem 0;
        min-height: calc(100vh - 76px);
    }

    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .page-subtitle {
        font-size: 1.2rem;
        color: #6c757d;
        margin-bottom: 2rem;
    }

    .search-section {
        background: white;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .search-form {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .search-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .search-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .search-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .create-btn {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: none;
    }

    .create-btn:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(40, 167, 69, 0.3);
    }

    .tam-sam-som-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    .tam-sam-som-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }

    .tam-sam-som-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.15);
    }

    .card-header {
        margin-bottom: 1.5rem;
    }

    .business-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .business-owner {
        color: #718096;
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .business-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #4a5568;
        font-size: 0.9rem;
    }

    .meta-item i {
        color: #667eea;
    }

    .tam-sam-som-summary {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .summary-item {
        text-align: center;
        padding: 1rem;
        border-radius: 10px;
        border-left: 4px solid;
    }

    .tam-item {
        border-left-color: #e53e3e;
        background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
    }

    .sam-item {
        border-left-color: #3182ce;
        background: linear-gradient(135deg, #bee3f8 0%, #90cdf4 100%);
    }

    .som-item {
        border-left-color: #38a169;
        background: linear-gradient(135deg, #c6f6d5 0%, #9ae6b4 100%);
    }

    .summary-label {
        font-size: 0.8rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 0.25rem;
    }

    .summary-value {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.25rem;
    }

    .tam-item .summary-value {
        color: #c53030;
    }

    .sam-item .summary-value {
        color: #2b6cb0;
    }

    .som-item .summary-value {
        color: #2f855a;
    }

    .summary-detail {
        font-size: 0.75rem;
        color: #6b7280;
    }

    .card-actions {
        display: flex;
        gap: 0.5rem;
        justify-content: space-between;
    }

    .action-btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }

    .action-btn.primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .action-btn.secondary {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
    }

    .action-btn.danger {
        background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        color: white;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 2rem;
        color: white;
    }

    .empty-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .empty-subtitle {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 2rem;
    }

    .pagination {
        justify-content: center;
        margin-top: 2rem;
    }

    .page-link {
        color: #667eea;
        border-color: #e2e8f0;
        padding: 0.5rem 1rem;
    }

    .page-link:hover {
        color: #764ba2;
        background-color: #f8f9fa;
        border-color: #667eea;
    }

    .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-color: #667eea;
    }

    @media (max-width: 768px) {
        .tam-sam-som-grid {
            grid-template-columns: 1fr;
        }
        
        .tam-sam-som-summary {
            grid-template-columns: 1fr;
        }
        
        .search-form {
            flex-direction: column;
        }
        
        .card-actions {
            flex-direction: column;
        }
    }
</style>
@endsection

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('bmc.landing') }}">
                <i class="fas fa-lightbulb me-2"></i>
                Ideation
            </a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link text-white" href="{{ route('bmc.landing') }}">
                    <i class="fas fa-home me-1"></i>
                    Beranda
                </a>
                <a class="nav-link text-white" href="{{ route('tam-sam-som.create') }}">
                    <i class="fas fa-plus me-1"></i>
                    TAM SAM SOM
                </a>
            </div>
        </div>
    </nav>

    <div class="container main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Market Validation</h1>
            <p class="page-subtitle">Kelola dan lihat semua analisis Total Addressable Market, Serviceable Addressable Market, dan Serviceable Obtainable Market</p>
        </div>

        <!-- Search Section -->
        <div class="search-section">
            <form method="GET" action="{{ route('tam-sam-som.index') }}" class="search-form">
                <input type="text" name="search" class="search-input" 
                       placeholder="Cari berdasarkan nama bisnis, pemilik, industri, atau lokasi..." 
                       value="{{ request('search') }}">
                <button type="submit" class="search-btn">
                    <i class="fas fa-search me-1"></i>
                    Cari
                </button>
                <a href="{{ route('tam-sam-som.create') }}" class="create-btn">
                    <i class="fas fa-plus"></i>
                    Buat Market Validation
                </a>
            </form>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- TAM SAM SOM Grid -->
        @if($tamSamSoms->count() > 0)
            <div class="tam-sam-som-grid">
                @foreach($tamSamSoms as $tamSamSom)
                    <div class="tam-sam-som-card">
                        <div class="card-header">
                            <h3 class="business-name">{{ $tamSamSom->business_name }}</h3>
                            <p class="business-owner">{{ $tamSamSom->owner_name }}</p>
                            <div class="business-meta">
                                <span class="meta-item">
                                    <i class="fas fa-industry"></i>
                                    {{ $tamSamSom->industry }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $tamSamSom->location }}
                                </span>
                                <span class="meta-item">
                                    <i class="fas fa-calendar"></i>
                                    {{ $tamSamSom->created_at->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="tam-sam-som-summary">
                            <div class="summary-item tam-item">
                                <div class="summary-label">TAM</div>
                                <div class="summary-value">Rp {{ number_format($tamSamSom->tam_value, 0, ',', '.') }}</div>
                                <div class="summary-detail">{{ number_format($tamSamSom->tam_market_size, 0, ',', '.') }} konsumen</div>
                            </div>
                            <div class="summary-item sam-item">
                                <div class="summary-label">SAM ({{ $tamSamSom->sam_percentage }}%)</div>
                                <div class="summary-value">Rp {{ number_format($tamSamSom->sam_value, 0, ',', '.') }}</div>
                                <div class="summary-detail">{{ number_format($tamSamSom->sam_market_size, 0, ',', '.') }} konsumen</div>
                            </div>
                            <div class="summary-item som-item">
                                <div class="summary-label">SOM ({{ $tamSamSom->som_percentage }}%)</div>
                                <div class="summary-value">Rp {{ number_format($tamSamSom->som_value, 0, ',', '.') }}</div>
                                <div class="summary-detail">{{ number_format($tamSamSom->som_market_size, 0, ',', '.') }} konsumen</div>
                            </div>
                        </div>

                        <div class="card-actions">
                            <a href="{{ route('tam-sam-som.show', $tamSamSom->id) }}" class="action-btn primary">
                                <i class="fas fa-eye"></i>
                                Lihat Detail
                            </a>
                            <a href="{{ route('tam-sam-som.download', ['format' => 'pdf', 'id' => $tamSamSom->id]) }}" 
                               class="action-btn secondary" target="_blank">
                                <i class="fas fa-download"></i>
                                Download
                            </a>
                            <form method="POST" action="{{ route('tam-sam-som.destroy', $tamSamSom->id) }}" class="d-inline" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus TAM SAM SOM ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn danger">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            {{ $tamSamSoms->links() }}
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3 class="empty-title">Belum ada Market Validation</h3>
                <p class="empty-subtitle">
                    @if(request('search'))
                        Tidak ada Market Validation yang sesuai dengan pencarian "{{ request('search') }}"
                    @else
                        Belum ada analisis Market Validation yang dibuat. Mulai buat yang pertama!
                    @endif
                </p>
                <a href="{{ route('tam-sam-som.create') }}" class="create-btn">
                    <i class="fas fa-plus"></i>
                    Buat Market Validation Pertama
                </a>
            </div>
        @endif
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

