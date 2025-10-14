<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Validation - {{ $data['business_name'] ?? 'Ideation' }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--gray-50);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            padding: 0;
            font-size: 14px;
        }

        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* Header */
        .header {
            background: var(--primary);
            text-align: center;
            margin-bottom: 3rem;
            padding: 3rem 1rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
            z-index: 1;
        }

        .header > * {
            position: relative;
            z-index: 2;
        }

        .header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .header p {
            font-size: 1.125rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .header .generation-info {
            background: rgba(255,255,255,0.15);
            border-radius: var(--radius-lg);
            padding: 1rem 1.5rem;
            margin-top: 1.5rem;
            backdrop-filter: blur(15px);
            display: inline-block;
            border: 1px solid rgba(255,255,255,0.2);
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

        /* Main Content */
        .main-content {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        /* Concentric Circles */
        .circles-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 3rem 0;
            position: relative;
        }

        .concentric-circles {
            position: relative;
            width: 450px;
            height: 450px;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .circle:hover {
            transform: scale(1.05);
        }

        /* TAM Circle - Outer */
        .tam-circle {
            width: 450px;
            height: 450px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 8px 32px rgba(102, 126, 234, 0.3);
            z-index: 1;
        }

        .tam-circle .circle-value {
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1.1rem;
            font-weight: 800;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            max-width: 200px;
            line-height: 1.2;
        }

        .tam-circle .circle-label {
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 0.4rem 1.2rem;
            border-radius: 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
            font-weight: 700;
            color: #667eea;
            font-size: 1rem;
            border: 2px solid rgba(102, 126, 234, 0.3);
            backdrop-filter: blur(10px);
        }

        /* SAM Circle - Middle */
        .sam-circle {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            box-shadow: 0 6px 24px rgba(72, 187, 120, 0.3);
            top: 75px;
            left: 75px;
            z-index: 2;
        }

        .sam-circle .circle-value {
            position: absolute;
            top: 15px;
            left: 50%;
            transform: translateX(-50%);
            color: white;
            font-size: 1rem;
            font-weight: 800;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            max-width: 150px;
            line-height: 1.2;
        }

        .sam-circle .circle-label {
            position: absolute;
            top: 35px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 0.4rem 1.2rem;
            border-radius: 20px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
            font-weight: 700;
            color: #48bb78;
            font-size: 1rem;
            border: 2px solid rgba(72, 187, 120, 0.3);
            backdrop-filter: blur(10px);
        }

        /* SOM Circle - Inner */
        .som-circle {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.3);
            top: 150px;
            left: 150px;
            z-index: 3;
        }

        .som-circle .circle-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 0.8rem;
            font-weight: 800;
            text-align: center;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            max-width: 100px;
            line-height: 1.1;
        }

        .som-circle .circle-label {
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.95);
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.2);
            font-weight: 700;
            color: #2c3e50;
            font-size: 0.8rem;
            border: 2px solid rgba(44, 62, 80, 0.3);
            backdrop-filter: blur(10px);
        }

        /* Market Cards */
        .market-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .market-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .market-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.12);
        }

        .market-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            border-radius: 20px 20px 0 0;
        }

        .market-card.tam::before {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .market-card.sam::before {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
        }

        .market-card.som::before {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
        }

        .card-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: var(--radius);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }

        .market-card.tam .card-icon {
            background: var(--primary);
        }

        .market-card.sam .card-icon {
            background: var(--success);
        }

        .market-card.som .card-icon {
            background: var(--secondary);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--gray-900);
            margin: 0;
        }

        .card-value {
            font-size: 2rem;
            font-weight: 700;
            margin: 1rem 0;
            color: var(--gray-900);
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .market-card.tam .card-value {
            color: #667eea;
        }

        .market-card.sam .card-value {
            color: #48bb78;
        }

        .market-card.som .card-value {
            color: #2c3e50;
        }

        .card-description {
            color: #4a5568;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Market Penetration Analysis */
        .penetration-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            border-radius: 20px;
            padding: 2.5rem;
            margin-top: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .penetration-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .penetration-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .penetration-item {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .penetration-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .penetration-label {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .penetration-value {
            font-size: 2rem;
            font-weight: 800;
            color: #2c3e50;
        }

        /* Business Info */
        .business-info {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .info-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
        }

        .info-content h6 {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }

        .info-content p {
            font-size: 1rem;
            color: #2c3e50;
            font-weight: 600;
            margin: 0;
        }

        /* Actions */
        .actions {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .actions h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .actions p {
            color: #6b7280;
            margin-bottom: 2rem;
            font-size: 1rem;
        }

        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            border: none;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #48bb78 0%, #38a169 100%);
            color: white;
        }

        .btn-info {
            background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
            color: white;
        }

        .btn-secondary {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            text-align: center;
            padding: 2rem 1rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            border-radius: 20px;
        }

        /* Print Styles - Optimized for A4 */
        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            body {
                background: white !important;
                padding: 0 !important;
                margin: 0 !important;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important;
                font-size: 10px !important;
                line-height: 1.3 !important;
                width: 100% !important;
                height: 100% !important;
            }

            .container-main {
                padding: 0 !important;
                margin: 0 !important;
                max-width: none !important;
                background: white !important;
                width: 100% !important;
            }

            /* Header - Compact */
            .header {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                color: white !important;
                padding: 1rem !important;
                margin: 0 0 1rem 0 !important;
                page-break-inside: avoid;
                border-radius: 8px !important;
            }

            .header h1 {
                font-size: 1.5rem !important;
                margin: 0 0 0.3rem 0 !important;
                font-weight: 700 !important;
                text-align: center !important;
            }

            .header p {
                font-size: 0.9rem !important;
                margin: 0 !important;
                text-align: center !important;
                opacity: 0.9 !important;
            }

            .header .generation-info {
                background: rgba(255,255,255,0.15) !important;
                color: white !important;
                border: 1px solid rgba(255,255,255,0.2) !important;
                padding: 0.3rem 0.8rem !important;
                font-size: 0.7rem !important;
                border-radius: 15px !important;
                text-align: center !important;
                margin-top: 0.5rem !important;
                display: inline-block !important;
            }

            /* Business Info - Compact */
            .business-info {
                margin: 0 0 0.5rem 0 !important;
                padding: 0.5rem !important;
                background: #f8fafc !important;
                page-break-inside: avoid;
                border-radius: 8px !important;
                border: 1px solid #e5e7eb !important;
            }

            .info-grid {
                display: grid !important;
                grid-template-columns: repeat(4, 1fr) !important;
                gap: 0.5rem !important;
            }

            .info-item {
                padding: 0.3rem !important;
                background: white !important;
                border-radius: 6px !important;
                border: 1px solid #e5e7eb !important;
                text-align: center !important;
            }

            .info-content h6 {
                font-size: 0.6rem !important;
                margin-bottom: 0.2rem !important;
            }

            .info-content p {
                font-size: 0.8rem !important;
                margin: 0 !important;
            }

            /* Main Content - Compact Layout */
            .main-content {
                background: white !important;
                padding: 0.5rem !important;
                margin: 0 0 0.5rem 0 !important;
                page-break-inside: avoid;
                border-radius: 8px !important;
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                gap: 2rem !important;
            }

            /* Circles - Left Side */
            .circles-container {
                display: flex !important;
                justify-content: center !important;
                align-items: center !important;
                margin: 0 !important;
                flex: 0 0 auto !important;
            }

            .concentric-circles {
                width: 200px !important;
                height: 200px !important;
                margin: 0 !important;
            }

            .tam-circle {
                width: 200px !important;
                height: 200px !important;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                border: 2px solid white !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
            }

            .tam-circle .circle-value {
                display: none !important;
            }

            .tam-circle .circle-label {
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                background: white !important;
                color: #667eea !important;
                font-weight: 700 !important;
                border: 1px solid #667eea !important;
                padding: 0.2rem 0.8rem !important;
                border-radius: 15px !important;
                font-size: 0.7rem !important;
            }

            .sam-circle {
                width: 140px !important;
                height: 140px !important;
                top: 30px !important;
                left: 30px !important;
                background: linear-gradient(135deg, #48bb78 0%, #38a169 100%) !important;
                border: 2px solid white !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
            }

            .sam-circle .circle-value {
                display: none !important;
            }

            .sam-circle .circle-label {
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                background: white !important;
                color: #48bb78 !important;
                font-weight: 700 !important;
                border: 1px solid #48bb78 !important;
                padding: 0.2rem 0.8rem !important;
                border-radius: 15px !important;
                font-size: 0.7rem !important;
            }

            .som-circle {
                width: 80px !important;
                height: 80px !important;
                top: 60px !important;
                left: 60px !important;
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%) !important;
                border: 2px solid white !important;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1) !important;
            }

            .som-circle .circle-value {
                display: none !important;
            }

            .som-circle .circle-label {
                top: 50% !important;
                left: 50% !important;
                transform: translate(-50%, -50%) !important;
                background: white !important;
                color: #2c3e50 !important;
                font-weight: 700 !important;
                border: 1px solid #2c3e50 !important;
                padding: 0.2rem 0.6rem !important;
                border-radius: 12px !important;
                font-size: 0.6rem !important;
            }

            /* Market Cards - Right Side */
            .market-cards {
                display: flex !important;
                flex-direction: column !important;
                gap: 0.8rem !important;
                margin: 0 !important;
                flex: 0 0 auto !important;
                max-width: 300px !important;
            }

            .market-card {
                background: white !important;
                border: 2px solid #e5e7eb !important;
                border-radius: 8px !important;
                padding: 0.8rem !important;
                page-break-inside: avoid;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05) !important;
            }

            .market-card.tam::before {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                height: 3px !important;
            }

            .market-card.sam::before {
                background: linear-gradient(135deg, #48bb78 0%, #38a169 100%) !important;
                height: 3px !important;
            }

            .market-card.som::before {
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%) !important;
                height: 3px !important;
            }

            .card-header {
                margin-bottom: 0.5rem !important;
            }

            .card-title {
                font-size: 0.9rem !important;
                margin: 0 !important;
            }

            .card-value {
                font-size: 1.2rem !important;
                font-weight: 800 !important;
                margin: 0.5rem 0 !important;
            }

            .market-card.tam .card-value {
                color: #667eea !important;
            }

            .market-card.sam .card-value {
                color: #48bb78 !important;
            }

            .market-card.som .card-value {
                color: #2c3e50 !important;
            }

            .card-description {
                font-size: 0.7rem !important;
                line-height: 1.3 !important;
            }

            /* Penetration Section - Full Width */
            .penetration-section {
                background: #f8fafc !important;
                border: 1px solid #e5e7eb !important;
                border-radius: 8px !important;
                padding: 0.5rem !important;
                margin-top: 0.5rem !important;
                page-break-inside: avoid;
                width: 100% !important;
            }

            .penetration-title {
                font-size: 0.9rem !important;
                margin-bottom: 0.5rem !important;
            }

            .penetration-grid {
                display: grid !important;
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 0.5rem !important;
            }

            .penetration-item {
                background: white !important;
                border: 1px solid #e5e7eb !important;
                border-radius: 6px !important;
                padding: 0.5rem !important;
                text-align: center !important;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
            }

            .penetration-label {
                font-size: 0.7rem !important;
                margin-bottom: 0.3rem !important;
            }

            .penetration-value {
                font-size: 1.2rem !important;
                font-weight: 800 !important;
                color: #2c3e50 !important;
            }

            .actions {
                display: none !important;
            }

            .footer {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
                color: white !important;
                margin: 0 !important;
                padding: 0.8rem !important;
                page-break-inside: avoid;
                font-size: 0.7rem !important;
                text-align: center !important;
                border-radius: 8px !important;
            }

            @page {
                margin: 0.8cm;
                size: A4;
            }
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .main-content {
                padding: 2.5rem;
            }
            
            .market-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .header {
                padding: 1rem 0;
                text-align: center;
            }
            
            .header h1 {
                font-size: 1.75rem;
            }
            
            .header p {
                font-size: 1rem;
            }

            .main-content {
                padding: 1.5rem;
            }

            .concentric-circles {
                width: 300px;
                height: 300px;
            }

            .tam-circle {
                width: 300px;
                height: 300px;
            }

            .tam-circle .circle-value {
                font-size: 1rem;
                max-width: 150px;
                top: 12px;
            }

            .tam-circle .circle-label {
                top: 30px;
            }

            .sam-circle {
                width: 200px;
                height: 200px;
                top: 50px;
                left: 50px;
            }

            .sam-circle .circle-value {
                font-size: 0.9rem;
                max-width: 120px;
                top: 12px;
            }

            .sam-circle .circle-label {
                top: 30px;
            }

            .som-circle {
                width: 100px;
                height: 100px;
                top: 100px;
                left: 100px;
            }

            .som-circle .circle-value {
                font-size: 0.7rem;
                max-width: 80px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .som-circle .circle-label {
                top: 15px;
            }

            .market-cards {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .penetration-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .header h1 {
                font-size: 1.5rem;
            }
            
            .header p {
                font-size: 0.875rem;
            }

            .main-content {
                padding: 1rem;
            }

            .concentric-circles {
                width: 250px;
                height: 250px;
            }

            .tam-circle {
                width: 250px;
                height: 250px;
            }

            .tam-circle .circle-value {
                font-size: 0.9rem;
                max-width: 120px;
                top: 10px;
            }

            .tam-circle .circle-label {
                top: 25px;
            }

            .sam-circle {
                width: 170px;
                height: 170px;
                top: 40px;
                left: 40px;
            }

            .sam-circle .circle-value {
                font-size: 0.8rem;
                max-width: 100px;
                top: 10px;
            }

            .sam-circle .circle-label {
                top: 25px;
            }

            .som-circle {
                width: 80px;
                height: 80px;
                top: 85px;
                left: 85px;
            }

            .som-circle .circle-value {
                font-size: 0.6rem;
                max-width: 60px;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }

            .som-circle .circle-label {
                top: 12px;
            }

            .card-value {
                font-size: 2rem;
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
                        <a class="nav-link active" href="{{ route('tam-sam-som.create') }}">Market Validation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-main">
        <!-- Header -->
        <div class="header">
            <h1>Market Validation Analysis</h1>
            <p>{{ $data['business_name'] ?? 'Business Analysis' }}</p>
            <div class="generation-info">
                <i class="fas fa-calendar-alt me-2"></i>
                Generated on {{ date('d F Y, H:i') }} WIB
            </div>
        </div>

        <!-- Business Info -->
        <div class="business-info">
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div class="info-content">
                        <h6>Business Name</h6>
                        <p>{{ $data['business_name'] ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="info-content">
                        <h6>Owner</h6>
                        <p>{{ $data['owner_name'] ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-industry"></i>
                    </div>
                    <div class="info-content">
                        <h6>Industry</h6>
                        <p>{{ $data['industry'] ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-content">
                        <h6>Location</h6>
                        <p>{{ $data['location'] ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Concentric Circles -->
                    <div class="circles-container">
                <div class="concentric-circles">
                    <!-- TAM Circle -->
                    <div class="circle tam-circle">
                            <div class="circle-label">TAM</div>
                        <div class="circle-value">Rp {{ number_format($data['tam_value'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    
                    <!-- SAM Circle -->
                    <div class="circle sam-circle">
                            <div class="circle-label">SAM</div>
                        <div class="circle-value">Rp {{ number_format($data['sam_value'] ?? 0, 0, ',', '.') }}</div>
                    </div>
                    
                    <!-- SOM Circle -->
                    <div class="circle som-circle">
                            <div class="circle-label">SOM</div>
                        <div class="circle-value">Rp {{ number_format($data['som_value'] ?? 0, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
                
            <!-- Market Cards -->
            <div class="market-cards">
                <!-- TAM Card -->
                <div class="market-card tam">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="card-title">Total Available Market</h3>
                    </div>
                    <div class="card-value">Rp {{ number_format($data['tam_value'] ?? 0, 0, ',', '.') }}</div>
                    <p class="card-description">{{ $data['tam_description'] ?? 'Total Addressable Market' }}</p>
                    </div>
                    
                <!-- SAM Card -->
                <div class="market-card sam">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="card-title">Serviceable Available Market</h3>
                    </div>
                    <div class="card-value">Rp {{ number_format($data['sam_value'] ?? 0, 0, ',', '.') }}</div>
                    <p class="card-description">{{ $data['sam_description'] ?? 'Serviceable Addressable Market' }}</p>
                    </div>
                    
                <!-- SOM Card -->
                <div class="market-card som">
                    <div class="card-header">
                        <div class="card-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3 class="card-title">Serviceable Obtainable Market</h3>
                        </div>
                    <div class="card-value">Rp {{ number_format($data['som_value'] ?? 0, 0, ',', '.') }}</div>
                    <p class="card-description">{{ $data['som_description'] ?? 'Serviceable Obtainable Market' }}</p>
                </div>
            </div>
        </div>

        <!-- Market Penetration Analysis -->
        <div class="penetration-section">
                <h3 class="penetration-title">
                    <i class="fas fa-chart-pie"></i>
                    Analisis Penetrasi Pasar
                </h3>
                <div class="penetration-grid">
                    <div class="penetration-item">
                        <div class="penetration-label">SAM dari TAM</div>
                        <div class="penetration-value">
                            @if(isset($data['tam_value']) && $data['tam_value'] > 0)
                                {{ number_format((($data['sam_value'] ?? 0) / $data['tam_value']) * 100, 1) }}%
                            @else
                                0%
                        @endif
            </div>
            </div>
                    <div class="penetration-item">
                        <div class="penetration-label">SOM dari SAM</div>
                        <div class="penetration-value">
                            @if(isset($data['sam_value']) && $data['sam_value'] > 0)
                                {{ number_format((($data['som_value'] ?? 0) / $data['sam_value']) * 100, 1) }}%
                            @else
                                0%
            @endif
        </div>
                    </div>
                    <div class="penetration-item">
                        <div class="penetration-label">SOM dari TAM</div>
                        <div class="penetration-value">
                            @if(isset($data['tam_value']) && $data['tam_value'] > 0)
                                {{ number_format((($data['som_value'] ?? 0) / $data['tam_value']) * 100, 1) }}%
                            @else
                                0%
        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="actions">
            <h3>Download Analysis</h3>
            <p>Pilih format download yang Anda inginkan</p>
            @if(config('app.debug'))
                <small class="text-muted">Debug: ID = {{ $data['id'] ?? 'null' }}</small>
            @endif
            <div class="btn-group">
                @if(isset($data['id']) && $data['id'])
                    <button onclick="downloadPDF()" class="btn btn-primary">
                        <i class="fas fa-file-pdf"></i> Download PDF
                    </button>
                @else
                    <button onclick="alert('Data Market Validation tidak ditemukan. Silakan refresh halaman atau buat Market Validation baru.')" class="btn btn-primary" disabled>
                        <i class="fas fa-file-pdf"></i> Download PDF
                    </button>
                @endif
                <button onclick="downloadAsImage('png')" class="btn btn-success">
                    <i class="fas fa-file-image"></i> Download PNG
                </button>
                <button onclick="downloadAsImage('jpg')" class="btn btn-info">
                    <i class="fas fa-file-image"></i> Download JPG
                </button>
                <button onclick="printDocument()" class="btn btn-secondary">
                    <i class="fas fa-print"></i> Print Document
                </button>
            </div>
            
            <div class="btn-group">
                <a href="{{ route('tam-sam-som.create') }}" class="btn btn-success">
                    <i class="fas fa-plus"></i> Buat Market Validation Baru
                </a>
                <a href="{{ route('bmc.landing') }}" class="btn btn-secondary">
                    <i class="fas fa-home"></i> Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p><strong>Ideation Platform</strong> - Business Strategy Platform</p>
            <p>Dokumen ini dibuat secara otomatis oleh sistem Ideation</p>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // PDF Download Function
        function downloadPDF() {
            if (typeof window.jspdf === 'undefined') {
                alert('Library jsPDF tidak tersedia. Silakan refresh halaman dan coba lagi.');
                return;
            }
            
            const body = document.body;
            const actions = document.querySelector('.actions');
            
            if (actions) actions.style.display = 'none';
            
            setTimeout(() => {
                html2canvas(body, {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    width: body.scrollWidth,
                    height: body.scrollHeight,
                    scrollX: 0,
                    scrollY: 0,
                    windowWidth: 1200,
                    windowHeight: body.scrollHeight
                }).then(canvas => {
                    if (actions) actions.style.display = 'block';
                    
                    const { jsPDF } = window.jspdf;
                    const pdf = new jsPDF('p', 'mm', 'a4');
                    
                    const imgWidth = 210;
                    const pageHeight = 295;
                    const imgHeight = (canvas.height * imgWidth) / canvas.width;
                    let heightLeft = imgHeight;
                    
                    const imgData = canvas.toDataURL('image/png', 1.0);
                    let position = 0;
                    
                    pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                    
                    while (heightLeft >= 0) {
                        position = heightLeft - imgHeight;
                        pdf.addPage();
                        pdf.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                        heightLeft -= pageHeight;
                    }
                    
                    const businessName = '{{ $data['business_name'] ?? 'Document' }}';
                    const date = '{{ date('Y-m-d') }}';
                    pdf.save(`TAM-SAM-SOM-${businessName.replace(/[^a-zA-Z0-9]/g, '-')}-${date}.pdf`);
                    
                }).catch(error => {
                    console.error('Error generating PDF:', error);
                    if (actions) actions.style.display = 'block';
                    alert('Terjadi kesalahan saat membuat PDF: ' + error.message);
                });
            }, 200);
        }

        // Download Functions
        function downloadAsImage(format) {
            const body = document.body;
            const actions = document.querySelector('.actions');
            
            if (actions) actions.style.display = 'none';
            
            setTimeout(() => {
                html2canvas(body, {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    width: body.scrollWidth,
                    height: body.scrollHeight,
                    scrollX: 0,
                    scrollY: 0,
                    windowWidth: 1200,
                    windowHeight: body.scrollHeight
                }).then(canvas => {
                    if (actions) actions.style.display = 'block';
                    
                    const link = document.createElement('a');
                    const businessName = '{{ $data['business_name'] ?? 'Document' }}';
                    const date = '{{ date('Y-m-d') }}';
                    link.download = `TAM-SAM-SOM-${businessName.replace(/[^a-zA-Z0-9]/g, '-')}-${date}.${format}`;
                    
                    if (format === 'png') {
                        link.href = canvas.toDataURL('image/png', 1.0);
                    } else if (format === 'jpg') {
                        link.href = canvas.toDataURL('image/jpeg', 0.95);
                    }
                    
                    link.click();
                }).catch(error => {
                    console.error('Error generating image:', error);
                    if (actions) actions.style.display = 'block';
                    alert('Terjadi kesalahan saat membuat gambar. Silakan coba lagi.');
                });
            }, 200);
        }

        function printDocument() {
            const actions = document.querySelector('.actions');
            
            if (actions) actions.style.display = 'none';
            
            window.print();
            
            setTimeout(() => {
                if (actions) actions.style.display = 'block';
            }, 1000);
        }

        // Print event handlers
        window.addEventListener('beforeprint', function() {
            const actions = document.querySelector('.actions');
            if (actions) actions.style.display = 'none';
        });

        window.addEventListener('afterprint', function() {
            const actions = document.querySelector('.actions');
            if (actions) actions.style.display = 'block';
        });
    </script>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>