<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
          onerror="this.onerror=null;this.href='{{ asset('assets/css/bootstrap.min.css') }}';">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"
          onerror="this.onerror=null;this.href='{{ asset('assets/css/fontawesome.min.css') }}';">
    <style>
        body {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 3rem;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }
        
        .error-icon {
            font-size: 5rem;
            color: #f39c12;
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }
        
        .error-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .error-message {
            font-size: 1.1rem;
            color: #7f8c8d;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .btn-home {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(243, 156, 18, 0.4);
        }
        
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(243, 156, 18, 0.6);
            color: white;
        }
        
        .btn-login {
            background: transparent;
            border: 2px solid #f39c12;
            color: #f39c12;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-login:hover {
            background: #f39c12;
            color: white;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .error-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #6c757d;
        }
        
        @media (max-width: 768px) {
            .error-container {
                padding: 2rem;
                margin: 1rem;
            }
            
            .error-title {
                font-size: 2rem;
            }
            
            .btn-login {
                margin-left: 0;
                margin-top: 10px;
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-icon">
            <i class="fas fa-lock"></i>
        </div>
        
        <h1 class="error-title">403</h1>
        
        <p class="error-message">
            <strong>Akses Ditolak</strong><br>
            Maaf, Anda tidak memiliki izin untuk mengakses halaman ini. 
            Silakan login dengan akun yang sesuai atau hubungi administrator.
        </p>
        
        <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
            <a href="{{ route('bmc.landing') }}" class="btn-home">
                <i class="fas fa-home me-2"></i>Kembali ke Beranda
            </a>
            <a href="{{ route('admin.login') }}" class="btn-login">
                <i class="fas fa-sign-in-alt me-2"></i>Login Admin
            </a>
        </div>
        
        @if(config('app.debug'))
        <div class="error-details">
            <strong>Debug Info:</strong><br>
            URL: {{ request()->url() }}<br>
            Method: {{ request()->method() }}<br>
            Time: {{ now()->format('Y-m-d H:i:s') }}
        </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            onerror="this.onerror=null;this.src='{{ asset('assets/js/bootstrap.bundle.min.js') }}';"></script>
</body>
</html>
