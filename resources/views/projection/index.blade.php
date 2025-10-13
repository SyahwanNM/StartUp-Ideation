<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyeksi Keuangan - Ideation</title>
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

        .projection-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }

        .projection-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .projection-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .projection-meta {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .projection-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .stat-item {
            text-align: center;
            padding: 0.5rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .stat-value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #2c3e50;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #6c757d;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-danger {
            background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-warning {
            background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 193, 7, 0.3);
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            color: #dee2e6;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .projection-stats {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .action-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Daftar Proyeksi Keuangan</h1>
            <p class="page-subtitle">Kelola dan lihat semua proyeksi keuangan yang telah dibuat</p>
            <div class="mt-3">
                <a href="{{ route('projection.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Buat Proyeksi Baru
                </a>
                <a href="{{ route('bmc.landing') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- Alerts -->
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

        <!-- Projections List -->
        @if($projections->count() > 0)
            <div class="row">
                @foreach($projections as $projection)
                    <div class="col-lg-6">
                        <div class="projection-card">
                            <div class="projection-title">{{ $projection->business_name }}</div>
                            <div class="projection-meta">
                                <i class="fas fa-calendar me-1"></i>
                                Dibuat: {{ $projection->created_at->format('d M Y, H:i') }}
                                <span class="mx-2">•</span>
                                <i class="fas fa-clock me-1"></i>
                                {{ $projection->projection_years }} Tahun
                            </div>
                            
                            <div class="projection-stats">
                                <div class="stat-item">
                                    <div class="stat-value">Rp {{ number_format($projection->baseline_revenue, 0, ',', '.') }}</div>
                                    <div class="stat-label">Baseline Revenue</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">{{ $projection->annual_growth_rate }}%</div>
                                    <div class="stat-label">Growth Rate</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">{{ number_format($projection->monthly_growth_rate_percentage, 2) }}%</div>
                                    <div class="stat-label">Monthly Growth</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">{{ $projection->total_months }}</div>
                                    <div class="stat-label">Total Bulan</div>
                                </div>
                            </div>

                            <div class="action-buttons">
                                <a href="{{ route('projection.show', $projection->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-eye me-1"></i>
                                    Lihat
                                </a>
                                <a href="{{ route('projection.edit', $projection->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit me-1"></i>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('projection.destroy', $projection->id) }}" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyeksi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash me-1"></i>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $projections->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-chart-line"></i>
                <h3>Belum Ada Proyeksi Keuangan</h3>
                <p>Mulai buat proyeksi keuangan pertama Anda untuk merencanakan pertumbuhan bisnis.</p>
                <a href="{{ route('projection.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>
                    Buat Proyeksi Pertama
                </a>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

