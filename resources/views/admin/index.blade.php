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
        
        .stat-icon i {
            font-size: 1.5rem;
            color: white;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            font-size: 0.9rem;
            color: #6c757d;
            font-weight: 500;
        }
        
        .search-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
        }
        
        .search-input {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafbfc;
        }
        
        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
            background: white;
        }
        
        .search-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .search-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        
        .business-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }
        
        .business-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }
        
        .business-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .business-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        
        .business-owner {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }
        
        .business-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .info-item i {
            color: #667eea;
            width: 16px;
        }
        
        .business-actions {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .action-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        
        .action-btn.secondary {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
        }
        
        .action-btn.secondary:hover {
            box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
        }
        
        .action-btn.success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }
        
        .action-btn.success:hover {
            box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
        }
        
        .action-btn.danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
        }
        
        .action-btn.danger:hover {
            box-shadow: 0 6px 20px rgba(231, 76, 60, 0.4);
        }
        
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .empty-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .empty-icon i {
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
            margin-bottom: 0;
        }
        
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .business-info {
                grid-template-columns: 1fr;
            }
            
            .business-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand text-white" href="{{ route('admin.index') }}">
                <i class="fas fa-shield-alt me-2"></i>
                Admin Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">
                            <i class="fas fa-home me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.export') }}">
                            <i class="fas fa-download me-1"></i>Export Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bmc.landing') }}">
                            <i class="fas fa-eye me-1"></i>Lihat Website
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white p-0">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="page-header">
            <h1 class="page-title">Admin Dashboard</h1>
            <p class="page-subtitle">Kelola dan pantau semua Business Model Canvas yang telah dibuat</p>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="stat-number">{{ $businesses->count() }}</div>
                <div class="stat-label">Total BMC</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <div class="stat-number">{{ $businesses->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                <div class="stat-label">BMC Minggu Ini</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-number">{{ $businesses->where('created_at', '>=', now()->subDays(30))->count() }}</div>
                <div class="stat-label">BMC Bulan Ini</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-day"></i>
                </div>
                <div class="stat-number">{{ $businesses->where('created_at', '>=', now()->subDay())->count() }}</div>
                <div class="stat-label">BMC Hari Ini</div>
            </div>
        </div>

        <!-- Search Form -->
        <div class="search-card">
            <form method="GET" action="{{ route('admin.index') }}">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" 
                               class="form-control search-input" 
                               name="search" 
                               placeholder="Cari berdasarkan nama usaha, pemilik, atau lokasi..." 
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex gap-2">
                            <button class="btn search-btn" type="submit">
                                <i class="fas fa-search me-1"></i>Cari
                            </button>
                            @if(request('search'))
                                <a href="{{ route('admin.index') }}" class="btn action-btn secondary">
                                    <i class="fas fa-times me-1"></i>Reset
                                </a>
                            @endif
                            <a href="{{ route('admin.export', request()->query()) }}" class="btn action-btn success">
                                <i class="fas fa-file-excel me-1"></i>Export
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Business List -->
        @if($businesses->count() > 0)
            @foreach($businesses as $business)
                <div class="business-card">
                    <div class="business-header">
                        <div>
                            <h3 class="business-title">{{ $business->business_name }}</h3>
                            <p class="business-owner">
                                <i class="fas fa-user me-2"></i>{{ $business->owner_name }}
                            </p>
                        </div>
                        <div class="text-end">
                            <p class="text-muted small mb-0">
                                <i class="fas fa-calendar me-1"></i>
                                {{ $business->created_at->format('d M Y H:i') }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="business-info">
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>{{ $business->location }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <span>{{ $business->phone_number }}</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-building"></i>
                            <span>{{ Str::limit($business->business_description, 50) }}</span>
                        </div>
                    </div>
                    
                    <div class="business-actions">
                        <a href="{{ route('admin.show', $business->id) }}" class="action-btn">
                            <i class="fas fa-eye"></i>
                            Lihat Detail
                        </a>
                        <a href="{{ route('bmc.show', $business->id) }}" class="action-btn secondary" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            Lihat BMC
                        </a>
                        <a href="{{ route('bmc.edit', $business->id) }}" class="action-btn success">
                            <i class="fas fa-edit"></i>
                            Edit BMC
                        </a>
                        <form method="POST" action="{{ route('admin.destroy', $business->id) }}" class="d-inline" 
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus BMC ini?')">
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
        @else
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="empty-title">Belum ada Business Model Canvas</h3>
                <p class="empty-subtitle">
                    @if(request('search'))
                        Tidak ada BMC yang sesuai dengan pencarian "{{ request('search') }}"
                    @else
                        Belum ada BMC yang dibuat oleh pengguna
                    @endif
                </p>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
