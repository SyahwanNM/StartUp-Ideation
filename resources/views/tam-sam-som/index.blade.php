@extends('layouts.head')

@section('title', 'Daftar Market Validation - Ideation')

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

    .navbar {
        background: var(--primary);
        box-shadow: var(--shadow-sm);
        border: none;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.25rem;
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
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 1rem;
        letter-spacing: -0.025em;
    }

    .page-subtitle {
        font-size: 1.125rem;
        color: var(--gray-600);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .search-section {
        background: white;
        border-radius: var(--radius-lg);
        padding: 1.5rem;
        margin-bottom: 2rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
    }

    .search-form {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .search-input {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius);
        font-size: 0.875rem;
        transition: var(--transition);
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }

    .search-btn {
        background: var(--primary);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius);
        font-weight: 500;
        font-size: 0.875rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .search-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .create-btn {
        background: var(--success);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: var(--radius);
        text-decoration: none;
        font-weight: 500;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: var(--transition);
        border: none;
    }

    .create-btn:hover {
        color: white;
        background: #059669;
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
    }

    .tam-sam-som-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .tam-sam-som-card {
        background: white;
        border-radius: var(--radius-xl);
        padding: 1.5rem;
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
        transition: var(--transition);
    }

    .tam-sam-som-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .card-header {
        margin-bottom: 1.5rem;
    }

    .business-name {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 0.5rem;
    }

    .business-owner {
        color: var(--gray-600);
        font-size: 0.875rem;
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
        color: var(--gray-600);
        font-size: 0.75rem;
    }

    .meta-item i {
        color: var(--primary);
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
        border-radius: var(--radius);
        border-left: 3px solid;
        background: var(--gray-50);
    }

    .tam-item {
        border-left-color: var(--danger);
        background: var(--gray-50);
    }

    .sam-item {
        border-left-color: var(--info);
        background: var(--gray-50);
    }

    .som-item {
        border-left-color: var(--success);
        background: var(--gray-50);
    }

    .summary-label {
        font-size: 0.75rem;
        font-weight: 500;
        color: var(--gray-600);
        margin-bottom: 0.25rem;
    }

    .summary-value {
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .tam-item .summary-value {
        color: var(--danger);
    }

    .sam-item .summary-value {
        color: var(--info);
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
        padding: 0.5rem 0.75rem;
        border: none;
        border-radius: var(--radius);
        font-weight: 500;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: var(--transition);
        font-size: 0.75rem;
    }

    .action-btn.primary {
        background: var(--primary);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .action-btn.secondary {
        background: var(--secondary);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .action-btn.danger {
        background: var(--danger);
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: var(--shadow-md);
        color: white;
    }

    .empty-state {
        text-align: center;
        padding: 3rem 2rem;
        background: white;
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        border: 1px solid var(--gray-200);
    }

    .empty-icon {
        width: 64px;
        height: 64px;
        background: var(--primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        font-size: 1.5rem;
        color: white;
    }

    .empty-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 0.5rem;
    }

    .empty-subtitle {
        font-size: 0.875rem;
        color: var(--gray-600);
        margin-bottom: 2rem;
    }

    .pagination {
        justify-content: center;
        margin-top: 2rem;
    }

    .page-link {
        color: var(--primary);
        border-color: var(--gray-300);
        padding: 0.5rem 1rem;
    }

    .page-link:hover {
        color: var(--primary-dark);
        background-color: var(--gray-50);
        border-color: var(--primary);
    }

    .page-item.active .page-link {
        background: var(--primary);
        border-color: var(--primary);
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .tam-sam-som-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .tam-sam-som-summary {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 768px) {
        .main-container {
            padding: 1rem 0.5rem;
        }
        
        .page-header {
            padding: 1rem 0;
            text-align: center;
        }
        
        .page-title {
            font-size: 1.75rem;
        }
        
        .page-subtitle {
            font-size: 1rem;
        }
        
        .tam-sam-som-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
        
        .tam-sam-som-summary {
            grid-template-columns: 1fr;
            gap: 0.75rem;
        }
        
        .search-form {
            flex-direction: column;
            gap: 1rem;
        }
        
        .search-input {
            width: 100%;
        }
        
        .card-actions {
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .action-btn {
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
        .main-container {
            padding: 0.5rem;
        }
        
        .page-title {
            font-size: 1.5rem;
        }
        
        .page-subtitle {
            font-size: 0.875rem;
        }
        
        .tam-sam-som-card {
            padding: 1rem;
        }
        
        .business-name {
            font-size: 1.125rem;
        }
        
        .business-owner {
            font-size: 0.875rem;
        }
        
        .summary-value {
            font-size: 1.25rem;
        }
        
        .summary-label {
            font-size: 0.75rem;
        }
        
        .action-btn {
            padding: 0.625rem 1rem;
            font-size: 0.8rem;
        }
    }
</style>
@endsection

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
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

