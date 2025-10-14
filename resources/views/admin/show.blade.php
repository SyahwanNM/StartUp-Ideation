<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail BMC - {{ $business->business_name }} | Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
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
        .bmc-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        .bmc-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .bmc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            gap: 2px;
            background: #e9ecef;
            padding: 2px;
        }
        .bmc-box {
            background: white;
            padding: 20px;
            min-height: 200px;
            display: flex;
            flex-direction: column;
        }
        .bmc-box h6 {
            color: #495057;
            font-weight: bold;
            margin-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }
        .bmc-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .bmc-box li {
            background: #f8f9fa;
            margin: 5px 0;
            padding: 8px 12px;
            border-radius: 20px;
            font-size: 0.9rem;
            color: #495057;
        }
        .business-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
        }
        .back-btn {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .bmc-grid {
                gap: 1px;
            }
            .bmc-box {
                padding: 15px;
                min-height: 180px;
            }
        }
        
        @media (max-width: 992px) {
            .bmc-grid {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto;
            }
            .bmc-box {
                min-height: 160px;
                padding: 12px;
            }
            .bmc-box h6 {
                font-size: 0.9rem;
                margin-bottom: 10px;
            }
            .bmc-box li {
                font-size: 0.8rem;
                padding: 6px 10px;
            }
        }
        
        @media (max-width: 768px) {
            .main-container {
                padding: 1rem 0.5rem;
            }
            
            .admin-header {
                padding: 1rem 0;
                margin-bottom: 1rem;
                text-align: center;
            }
            
            .admin-header h1 {
                font-size: 1.75rem;
            }
            
            .admin-header p {
                font-size: 1rem;
            }
            
            .bmc-header {
                padding: 1rem;
            }
            
            .bmc-header h2 {
                font-size: 1.5rem;
            }
            
            .bmc-header p {
                font-size: 0.9rem;
            }
            
            .business-info {
                padding: 1rem;
                margin-bottom: 1rem;
            }
            
            .business-info h3 {
                font-size: 1.2rem;
            }
            
            .business-info p {
                font-size: 0.9rem;
            }
            
            .bmc-grid {
                grid-template-columns: 1fr;
                gap: 2px;
            }
            
            .bmc-box {
                min-height: 140px;
                padding: 15px;
            }
            
            .bmc-box h6 {
                font-size: 0.85rem;
                margin-bottom: 8px;
            }
            
            .bmc-box li {
                font-size: 0.75rem;
                padding: 5px 8px;
                margin: 3px 0;
            }
            
            .back-btn {
                width: 100%;
                text-align: center;
                margin-top: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .main-container {
                padding: 0.5rem;
            }
            
            .admin-header {
                padding: 0.75rem 0;
            }
            
            .admin-header h1 {
                font-size: 1.5rem;
            }
            
            .admin-header p {
                font-size: 0.875rem;
            }
            
            .bmc-header {
                padding: 0.75rem;
            }
            
            .bmc-header h2 {
                font-size: 1.25rem;
            }
            
            .bmc-header p {
                font-size: 0.875rem;
            }
            
            .business-info {
                padding: 12px;
            }
            
            .business-info h3 {
                font-size: 1.1rem;
            }
            
            .business-info p {
                font-size: 0.85rem;
            }
            
            .bmc-box {
                min-height: 120px;
                padding: 12px;
            }
            
            .bmc-box h6 {
                font-size: 0.8rem;
                margin-bottom: 6px;
            }
            
            .bmc-box li {
                font-size: 0.7rem;
                padding: 4px 6px;
                margin: 2px 0;
            }
            
            .back-btn {
                padding: 8px 20px;
                font-size: 0.9rem;
            }
            
            .navbar-nav {
                text-align: center;
            }
            
            .navbar-nav .nav-link {
                padding: 0.75rem 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="{{ route('admin.index') }}">
                <i class="fas fa-lightbulb me-2"></i>Ideation Admin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bmc.landing') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="admin-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="mb-0">
                        <i class="fas fa-eye me-3"></i>Detail Business Model Canvas
                    </h1>
                    <p class="mb-0">{{ $business->business_name }}</p>
                </div>
                <div class="col-md-4 text-end">
                    <a href="{{ route('admin.index') }}" class="back-btn">
                        <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Business Information -->
        <div class="business-info">
            <h3 class="text-primary mb-3">
                <i class="fas fa-building me-2"></i>Informasi Bisnis
            </h3>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama Pemilik:</strong> {{ $business->owner_name }}</p>
                    <p><strong>Nama Usaha:</strong> {{ $business->business_name }}</p>
                    <p><strong>Dibuat:</strong> {{ $business->created_at->format('d M Y H:i') }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Lokasi:</strong> {{ $business->location }}</p>
                    <p><strong>Telepon:</strong> {{ $business->phone_number }}</p>
                    <p><strong>Terakhir Diupdate:</strong> {{ $business->updated_at->format('d M Y H:i') }}</p>
                </div>
            </div>
            <p><strong>Deskripsi:</strong> {{ $business->business_description }}</p>
        </div>

        <!-- BMC Canvas -->
        <div class="bmc-container">
            <div class="bmc-header">
                <h2 class="mb-0">Business Model Canvas</h2>
                <p class="mb-0">{{ $business->business_name }}</p>
            </div>
            
            <div class="bmc-grid">
                <!-- Row 1 -->
                <div class="bmc-box">
                    <h6><i class="fas fa-users text-primary me-2"></i>Customer Segments</h6>
                    <ul>
                        @foreach($business->bmcData->customer_segments as $segment)
                            <li>{{ $segment }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bmc-box">
                    <h6><i class="fas fa-gem text-warning me-2"></i>Value Propositions</h6>
                    <ul>
                        @foreach($business->bmcData->value_propositions as $value)
                            <li>{{ $value }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bmc-box">
                    <h6><i class="fas fa-broadcast-tower text-info me-2"></i>Channels</h6>
                    <ul>
                        @foreach($business->bmcData->channels as $channel)
                            <li>{{ $channel }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Row 2 -->
                <div class="bmc-box">
                    <h6><i class="fas fa-handshake text-success me-2"></i>Customer Relationships</h6>
                    <ul>
                        @foreach($business->bmcData->customer_relationships as $relationship)
                            <li>{{ $relationship }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bmc-box">
                    <h6><i class="fas fa-dollar-sign text-success me-2"></i>Revenue Streams</h6>
                    <ul>
                        @foreach($business->bmcData->revenue_streams as $revenue)
                            <li>{{ $revenue }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bmc-box">
                    <h6><i class="fas fa-key text-purple me-2"></i>Key Resources</h6>
                    <ul>
                        @foreach($business->bmcData->key_resources as $resource)
                            <li>{{ $resource }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Row 3 -->
                <div class="bmc-box">
                    <h6><i class="fas fa-tasks text-info me-2"></i>Key Activities</h6>
                    <ul>
                        @foreach($business->bmcData->key_activities as $activity)
                            <li>{{ $activity }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bmc-box">
                    <h6><i class="fas fa-handshake text-warning me-2"></i>Key Partnerships</h6>
                    <ul>
                        @foreach($business->bmcData->key_partnerships as $partnership)
                            <li>{{ $partnership }}</li>
                        @endforeach
                    </ul>
                </div>
                
                <div class="bmc-box">
                    <h6><i class="fas fa-calculator text-danger me-2"></i>Cost Structure</h6>
                    <ul>
                        @foreach($business->bmcData->cost_structure as $cost)
                            <li>{{ $cost }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
