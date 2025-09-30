<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error - Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
          onerror="this.onerror=null;this.href='{{ asset('assets/css/bootstrap.min.css') }}';">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"
          onerror="this.onerror=null;this.href='{{ asset('assets/css/fontawesome.min.css') }}';">
    <style>
        body {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
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
            color: #e74c3c;
            margin-bottom: 1rem;
            animation: shake 0.5s ease-in-out infinite alternate;
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
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.4);
        }
        
        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 107, 107, 0.6);
            color: white;
        }
        
        .btn-refresh {
            background: transparent;
            border: 2px solid #ff6b6b;
            color: #ff6b6b;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            margin-left: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-refresh:hover {
            background: #ff6b6b;
            color: white;
        }
        
        @keyframes shake {
            0% { transform: translateX(0); }
            100% { transform: translateX(5px); }
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
            
            .btn-refresh {
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
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        
        <h1 class="error-title">500</h1>
        
        <p class="error-message">
            <strong>Server Error</strong><br>
            Terjadi kesalahan pada server. Tim kami telah diberitahu dan sedang memperbaiki masalah ini. 
            Silakan coba lagi dalam beberapa saat.
        </p>
        
        <div class="d-flex flex-column flex-md-row justify-content-center gap-2">
            <a href="{{ route('bmc.landing') }}" class="btn-home">
                <i class="fas fa-home me-2"></i>Kembali ke Beranda
            </a>
            <a href="javascript:location.reload()" class="btn-refresh">
                <i class="fas fa-redo me-2"></i>Coba Lagi
            </a>
        </div>
        
        @if(config('app.debug'))
        <div class="error-details">
            <strong>Debug Info:</strong><br>
            Error: {{ $exception->getMessage() ?? 'Unknown error' }}<br>
            File: {{ $exception->getFile() ?? 'Unknown file' }}<br>
            Line: {{ $exception->getLine() ?? 'Unknown line' }}<br>
            Time: {{ now()->format('Y-m-d H:i:s') }}
        </div>
        @endif
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            onerror="this.onerror=null;this.src='{{ asset('assets/js/bootstrap.bundle.min.js') }}';"></script>
</body>
</html>
