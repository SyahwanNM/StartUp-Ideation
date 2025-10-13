<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: #f8f9fa !important;
            transform: translateY(-1px);
        }
        
        .main-container {
            max-width: 1400px;
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
        
        /* Stats Overview */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }
        
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.3);
        }
        
        .stat-icon.bmc {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .stat-icon.market {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }
        
        .stat-icon.financial {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
        }
        
        .stat-icon.total {
            background: linear-gradient(135deg, #9f7aea 0%, #805ad5 100%);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 1rem;
            color: #6c757d;
            font-weight: 600;
        }
        
        /* History Sections */
        .history-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
        }
        
        .section-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8f9fa;
        }
        
        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        
        .section-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }
        
        .section-icon.bmc {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .section-icon.market {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }
        
        .section-icon.financial {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
        }
        
        .export-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            color: white;
        }
        
        /* Data Tables */
        .data-table {
            background: #f8f9fa;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #e9ecef;
        }
        
        .table {
            margin: 0;
        }
        
        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 1rem;
        }
        
        .table tbody td {
            padding: 1rem;
            border-bottom: 1px solid #e9ecef;
            vertical-align: middle;
        }
        
        .table tbody tr:hover {
            background: rgba(102, 126, 234, 0.05);
        }
        
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        
        /* Status Badges */
        .status-badge {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-completed {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }
        
        .status-pending {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
        }
        
        /* Action Buttons */
        .action-btn {
            padding: 0.4rem 0.8rem;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }
        
        .action-btn.view {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
        }
        
        .action-btn.delete {
            background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
            color: white;
        }
        
        .action-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            color: white;
        }
        
        /* Search and Filter */
        .search-container {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            border: 1px solid #e9ecef;
        }
        
        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            outline: none;
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: #6c757d;
        }
        
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }
        
        .empty-state h4 {
            margin-bottom: 0.5rem;
            color: #495057;
        }
        
        /* Business Description */
        .business-description {
            max-width: 200px;
            font-size: 0.9rem;
            color: #6c757d;
            line-height: 1.4;
        }

        /* Value Cell Styling */
        .value-cell {
            text-align: center;
        }

        .value-cell strong {
            color: #2c3e50;
            font-size: 0.9rem;
        }

        .value-cell small {
            font-size: 0.75rem;
            color: #6c757d;
        }

        /* Percentage Badge */
        .percentage-badge {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            min-width: 40px;
            text-align: center;
        }

        /* Payback Cell */
        .payback-cell {
            text-align: center;
        }

        .payback-badge {
            background: linear-gradient(135deg, #ed8936 0%, #dd6b20 100%);
            color: white;
            padding: 0.3rem 0.6rem;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            min-width: 60px;
            text-align: center;
        }

        /* Enhanced Table Styling */
        .table td {
            vertical-align: middle;
            padding: 0.8rem;
        }

        .table th {
            font-weight: 600;
            font-size: 0.9rem;
            padding: 1rem 0.8rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .section-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }
            
            .table-responsive {
                font-size: 0.9rem;
            }

            .business-description {
                max-width: 150px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('admin.index') }}">
                <i class="fas fa-chart-line me-2"></i>
                Ideation Admin
            </a>
            <div class="navbar-nav ms-auto">
                        <a class="nav-link" href="{{ route('bmc.landing') }}">
                    <i class="fas fa-home me-1"></i>
                    Beranda
                        </a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white p-0">
                        <i class="fas fa-sign-out-alt me-1"></i>
                        Logout
                            </button>
                        </form>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Admin Dashboard</h1>
            <p class="page-subtitle">Kelola dan pantau semua data BMC, Market Validation, dan Financial Projection</p>
        </div>

        <!-- Stats Overview -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon bmc">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <div class="stat-number">{{ $businesses->count() }}</div>
                <div class="stat-label">Business Model Canvas</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon market">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number">{{ $tamSamSomHistory->count() }}</div>
                <div class="stat-label">Market Validation</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon financial">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number">{{ $projections->count() }}</div>
                <div class="stat-label">Proyeksi Keuangan</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon total">
                    <i class="fas fa-database"></i>
                </div>
                <div class="stat-number">{{ $businesses->count() + $tamSamSomHistory->count() + $projections->count() }}</div>
                <div class="stat-label">Total Data</div>
            </div>
        </div>

        <!-- Search and Export -->
        <div class="search-container">
            <form method="GET" action="{{ route('admin.index') }}">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control search-input" 
                               placeholder="Cari berdasarkan nama bisnis, owner, atau lokasi..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-2"></i>
                            Cari
                            </button>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.exportAll') }}" class="btn btn-success w-100">
                            <i class="fas fa-download me-2"></i>
                            Export Semua Data
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <!-- Business Model Canvas History -->
        <div class="history-section">
            <div class="section-header">
                <h2 class="section-title">
                    <div class="section-icon bmc">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    Business Model Canvas
                </h2>
                <a href="{{ route('admin.export') }}" class="export-btn">
                    <i class="fas fa-download"></i>
                    Export Data
                </a>
                    </div>
                    
            @if($businesses->count() > 0)
                <div class="data-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Bisnis</th>
                                <th>Owner</th>
                                <th>Industri</th>
                                <th>Lokasi</th>
                                <th>Deskripsi Bisnis</th>
                                <th>Tanggal Dibuat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($businesses as $business)
                            <tr>
                                <td>
                                    <strong>{{ $business->business_name }}</strong>
                                </td>
                                <td>{{ $business->owner_name }}</td>
                                <td>{{ $business->industry }}</td>
                                <td>{{ $business->location }}</td>
                                <td>
                                    <div class="business-description">
                                        {{ Str::limit($business->business_description, 100) }}
                                    </div>
                                </td>
                                <td>{{ $business->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <span class="status-badge status-completed">Selesai</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.show', $business->id) }}" class="action-btn view">
                            <i class="fas fa-eye"></i>
                                        Lihat
                        </a>
                        <form method="POST" action="{{ route('admin.destroy', $business->id) }}" class="d-inline" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                                        <button type="submit" class="action-btn delete">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @else
            <div class="empty-state">
                    <i class="fas fa-chart-pie"></i>
                    <h4>Belum ada data BMC</h4>
                    <p>Data Business Model Canvas akan muncul di sini setelah dibuat oleh pengguna.</p>
            </div>
        @endif
    </div>

        <!-- Market Validation History -->
        <div class="history-section">
            <div class="section-header">
                <h2 class="section-title">
                    <div class="section-icon market">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    Market Validation (TAM SAM SOM)
                </h2>
    </div>

            @if($tamSamSomHistory->count() > 0)
                <div class="data-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Bisnis</th>
                                <th>Owner</th>
                                <th>Industri</th>
                                <th>Lokasi</th>
                                <th>TAM Value</th>
                                <th>SAM Value</th>
                                <th>SOM Value</th>
                                <th>SAM %</th>
                                <th>SOM %</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
            @foreach($tamSamSomHistory as $tamSamSom)
                            <tr>
                                <td>
                                    <strong>{{ $tamSamSom->business_name ?? 'N/A' }}</strong>
                                </td>
                                <td>{{ $tamSamSom->owner_name }}</td>
                                <td>{{ $tamSamSom->industry }}</td>
                                <td>{{ $tamSamSom->location }}</td>
                                <td>
                                    <div class="value-cell">
                                        <strong>Rp {{ number_format($tamSamSom->tam_value, 0, ',', '.') }}</strong>
                                        <small class="text-muted d-block">{{ number_format($tamSamSom->tam_market_size, 0, ',', '.') }} units</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="value-cell">
                                        <strong>Rp {{ number_format($tamSamSom->sam_value, 0, ',', '.') }}</strong>
                                        <small class="text-muted d-block">{{ number_format($tamSamSom->sam_market_size, 0, ',', '.') }} units</small>
                                    </div>
                                </td>
                                <td>
                                    <div class="value-cell">
                                        <strong>Rp {{ number_format($tamSamSom->som_value, 0, ',', '.') }}</strong>
                                        <small class="text-muted d-block">{{ number_format($tamSamSom->som_market_size, 0, ',', '.') }} units</small>
                                    </div>
                                </td>
                                <td>
                                    <span class="percentage-badge">{{ $tamSamSom->sam_percentage }}%</span>
                                </td>
                                <td>
                                    <span class="percentage-badge">{{ $tamSamSom->som_percentage }}%</span>
                                </td>
                                <td>{{ $tamSamSom->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <a href="{{ route('tam-sam-som.show', $tamSamSom->id) }}" class="action-btn view">
                                        <i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                            </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-chart-line"></i>
                    <h4>Belum ada data Market Validation</h4>
                    <p>Data TAM SAM SOM akan muncul di sini setelah dibuat oleh pengguna.</p>
                        </div>
            @endif
                    </div>
                    
            
        <!-- New Financial Projection Section -->
        <div class="history-section">
            <div class="section-header">
                <h2 class="section-title">
                    <div class="section-icon financial">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    Proyeksi Keuangan Baru
                </h2>
                <a href="{{ route('projection.index') }}" class="export-btn">
                    <i class="fas fa-list"></i>
                    Lihat Semua
                </a>
                    </div>
                    
            @if($projections->count() > 0)
                <div class="data-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Bisnis</th>
                                <th>Revenue Awal</th>
                                <th>Tingkat Pertumbuhan</th>
                                <th>Durasi Proyeksi</th>
                                <th>Biaya Tetap</th>
                                <th>Karyawan</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projections as $projection)
                            <tr>
                                <td>
                                    <strong>{{ $projection->business_name }}</strong>
                                </td>
                                <td>
                                    <div class="value-cell">
                                        <strong>Rp {{ number_format($projection->baseline_revenue, 0, ',', '.') }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success">{{ $projection->annual_growth_rate }}%</span>
                                </td>
                                <td>
                                    <span class="badge bg-info">{{ $projection->projection_years }} Tahun</span>
                                </td>
                                <td>
                                    <div class="value-cell">
                                        <strong>{{ count($projection->fixed_costs) }} Item</strong>
                                        <small class="text-muted d-block">
                                            Total: Rp {{ number_format(array_sum(array_column($projection->fixed_costs, 'amount')), 0, ',', '.') }}
                                        </small>
                                    </div>
                                </td>
                                <td>
                                    <div class="value-cell">
                                        <strong>{{ count($projection->employees) }} Karyawan</strong>
                                        @if(count($projection->employees) > 0)
                                        <small class="text-muted d-block">
                                            Total: Rp {{ number_format(array_sum(array_column($projection->employees, 'salary')), 0, ',', '.') }}/bulan
                                        </small>
                                        @endif
                                    </div>
                                </td>
                                <td>{{ $projection->created_at->format('d M Y, H:i') }}</td>
                                <td>
                                    <a href="{{ route('projection.show', $projection->id) }}" class="action-btn view">
                            <i class="fas fa-eye"></i>
                                        Lihat
                                    </a>
                                    <a href="{{ route('projection.edit', $projection->id) }}" class="action-btn edit">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('projection.destroy', $projection->id) }}" class="d-inline" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyeksi ini?')">
                            @csrf
                            @method('DELETE')
                                        <button type="submit" class="action-btn delete">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @else
            <div class="empty-state">
                    <i class="fas fa-chart-line"></i>
                    <h4>Belum ada data Proyeksi Keuangan</h4>
                    <p>Data proyeksi keuangan akan muncul di sini setelah dibuat oleh pengguna.</p>
                </div>
            @endif
            </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>