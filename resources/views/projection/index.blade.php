<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Financial Projection - Ideation</title>
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

        body {
            background: var(--gray-50);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--gray-800);
            font-size: 14px;
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
            color: var(--gray-900);
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            font-size: 1.125rem;
            color: var(--gray-600);
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

        .projection-card {
            background: white;
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            transition: var(--transition);
        }

        .projection-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .projection-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .projection-meta {
            color: var(--gray-600);
            font-size: 0.875rem;
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
            padding: 0.75rem;
            background: var(--gray-50);
            border-radius: var(--radius);
            border: 1px solid var(--gray-200);
        }

        .stat-value {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-900);
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--gray-600);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-success {
            background: var(--success);
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-danger {
            background: var(--danger);
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .btn-danger:hover {
            background: #dc2626;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-warning {
            background: var(--warning);
            border: none;
            padding: 0.625rem 1.25rem;
            border-radius: var(--radius);
            font-weight: 500;
            font-size: 0.875rem;
            transition: var(--transition);
        }

        .btn-warning:hover {
            background: #d97706;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--gray-600);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-400);
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .projection-card {
                padding: 1.5rem;
            }
            
            .projection-stats {
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
            
            .projection-card {
                padding: 1rem;
                margin-bottom: 1rem;
            }
            
            .projection-title {
                font-size: 1.25rem;
            }
            
            .projection-stats {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            
            .stat-item {
                padding: 0.75rem;
            }
            
            .stat-value {
                font-size: 1.25rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.75rem;
            }
            
            .btn {
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
            
            .projection-card {
                padding: 0.75rem;
            }
            
            .projection-title {
                font-size: 1.125rem;
            }
            
            .stat-value {
                font-size: 1rem;
            }
            
            .stat-label {
                font-size: 0.75rem;
            }
            
            .btn {
                padding: 0.625rem 1rem;
                font-size: 0.8rem;
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

    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Daftar Financial Projection</h1>
            <p class="page-subtitle">Kelola dan lihat semua Financial Projection yang telah dibuat</p>
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
                <h3>Belum Ada Financial Projection</h3>
                <p>Mulai buat Financial Projection pertama Anda untuk merencanakan pertumbuhan bisnis.</p>
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

