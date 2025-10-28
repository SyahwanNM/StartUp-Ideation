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
            --bg-gradient: linear-gradient(160deg, #4f46e5 0%, #7c3aed 45%, #a855f7 100%);
            --hero-gradient: linear-gradient(135deg, #4f46e5 0%, #7c3aed 45%, #a855f7 100%);
            --surface: rgba(255, 255, 255, 0.94);
            --surface-soft: rgba(255, 255, 255, 0.86);
            --surface-light: rgba(255, 255, 255, 0.78);
            --border: rgba(148, 163, 184, 0.25);
            --shadow-lg: 0 28px 55px rgba(15, 23, 42, 0.22);
            --shadow-md: 0 18px 38px rgba(15, 23, 42, 0.16);
            --shadow-sm: 0 10px 24px rgba(15, 23, 42, 0.12);
            --text-dark: #0f172a;
            --text-muted: rgba(15, 23, 42, 0.65);
            --tam-gradient: linear-gradient(135deg, #7c3aed 0%, #8b5cf6 100%);
            --sam-gradient: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            --som-gradient: linear-gradient(135deg, #0ea5e9 0%, #38bdf8 100%);
            --progress-bg: rgba(241, 245, 249, 0.75);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            position: relative;
            min-height: 100vh;
            background: var(--bg-gradient);
            font-family: 'Inter', 'Segoe UI', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            font-size: 16px;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background:
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.16), transparent 55%),
                radial-gradient(circle at 80% 15%, rgba(59,130,246,0.25), transparent 60%);
            pointer-events: none;
            z-index: 1;
        }

        .container-main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 4rem 1.25rem 3rem;
            position: relative;
            z-index: 2;
        }

        .page-wrapper {
            display: flex;
            flex-direction: column;
            gap: 2.5rem;
        }
         /* Navigation Styles */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            border: none;
            position: relative;
            z-index: 3;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.5rem 1rem;
        }

        .navbar-nav .nav-link:hover {
            color: #a5b4fc !important;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            color: #a5b4fc !important;
            font-weight: 600;
        }

        .hero-card {
            background: var(--hero-gradient);
            border-radius: 32px;
            padding: 3.25rem 3rem;
            box-shadow: var(--shadow-lg);
            position: relative;
            color: #f8fafc;
            overflow: hidden;
        }

        .hero-card::after {
            content: '';
            position: absolute;
            top: -120px;
            right: -80px;
            width: 320px;
            height: 320px;
            background: radial-gradient(circle, rgba(255,255,255,0.22) 0%, transparent 65%);
            filter: blur(2px);
        }

        .hero-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            padding: 0.55rem 1.1rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.16);
            font-size: 0.85rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            font-weight: 600;
        }

        .hero-card h1 {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 0.8rem;
            letter-spacing: -0.02em;
        }

        .hero-card p {
            margin: 0;
            font-size: 1.05rem;
            color: rgba(241,245,249,0.88);
        }

        .hero-download {
            margin-top: 2.2rem;
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.6rem 1.2rem;
            border-radius: 999px;
            background: rgba(255,255,255,0.16);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .info-strip {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
        }

        .info-item {
            background: var(--surface);
            border-radius: 22px;
            padding: 1.2rem 1.4rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
            backdrop-filter: blur(14px);
        }

        .info-icon {
            width: 52px;
            height: 52px;
            border-radius: 18px;
            background: rgba(99,102,241,0.16);
            display: grid;
            place-items: center;
            font-size: 1.3rem;
            color: #4338ca;
        }

        .info-content span {
            display: block;
            font-size: 0.75rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--text-muted);
        }

        .info-content strong {
            font-size: 1.05rem;
            color: var(--text-dark);
        }

        .market-visual-card {
            background: var(--surface);
            border-radius: 30px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-lg);
            padding: 2.6rem 2.4rem;
            backdrop-filter: blur(16px);
        }

        .visual-header {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 600;
            color: var(--text-muted);
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-size: 0.85rem;
            margin-bottom: 1.6rem;
        }

        .visual-header i {
            color: #facc15;
        }
       .circles-wrapper{
        display:flex;
        justify-content:center;
        margin-bottom:2.4rem;
        position:relative;
        }

        .concentric-circles{
        position: relative;            /* <= penting */
        width: clamp(280px, 42vw, 420px);
        aspect-ratio: 1 / 1;           /* jaga tetap kotak */
        /* jika tidak pakai aspect-ratio, biarkan height sama seperti width */
        /* height: clamp(280px, 42vw, 420px); */
        }

        .circle{
        position:absolute;
        border-radius:50%;
        box-shadow:0 18px 35px rgba(76,29,149,0.25);
        transition:transform 0.3s ease, box-shadow 0.3s ease, filter 0.3s ease;
        will-change:transform,filter;
        cursor:pointer;
        }

        .circles-wrapper .circle:hover,
        .circles-wrapper .circle:focus-visible{
        transform:scale(1.05);
        filter:brightness(1.08);
        box-shadow:0 26px 55px rgba(15,23,42,0.28);
        outline:3px solid rgba(255,255,255,0.25);
        outline-offset:4px;
        }

        .tam-circle {
            inset: 0;
            background: var(--tam-gradient);
            z-index: 1;
        }

        .sam-circle {
            inset: 15%;
            background: var(--sam-gradient);
            box-shadow: 0 14px 30px rgba(5, 150, 105, 0.28);
            z-index: 2;
        }

        .som-circle {
            inset: 35%;
            background: var(--som-gradient);
            box-shadow: 0 12px 26px rgba(14, 165, 233, 0.28);
            z-index: 3;
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
        }

        .circle-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 4;
        }

        .circle-text-block {
            position: absolute;
            left: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.12rem;
            transform: translate(-50%, -50%);
            text-align: center;
            color: rgba(248, 250, 252, 0.95);
        }

        .circle-text-block .label {
            font-size: clamp(0.6rem, 0.9vw, 0.8rem);
            letter-spacing: 0.14em;
            text-transform: uppercase;
            font-weight: 600;
        }

        .circle-text-block .value {
            font-size: clamp(0.85rem, 1.8vw, 1.3rem);
            font-weight: 800;
            white-space: nowrap;
            max-width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .circle-text-block.tam {
            top: 8%;
            width: 74%;
            color: rgba(239, 246, 255, 0.92);
        }

        .circle-text-block.sam {
            top: 28%;
            width: 52%;
            color: rgba(236, 253, 245, 0.96);
        }

        .circle-text-block.sam .value {
            font-size: clamp(0.78rem, 1.55vw, 1.18rem);
        }

        .circle-text-block.som {
            top: 50%;
            width: 30%;
            color: rgba(240, 249, 255, 0.98);
        }

        .circle-text-block.som .value {
            font-size: clamp(0.7rem, 1.2vw, 1rem);
        }

        .market-visual-card {
            position: relative;
        }

        .text-hint {
            position: absolute;
            top: 1rem;
            right: 1.2rem;
            background: rgba(30, 41, 59, 0.72);
            color: #f8fafc;
            padding: 0.5rem 0.75rem;
            border-radius: 12px;
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0;
            transform: translateY(-6px);
            pointer-events: none;
            transition: opacity 0.25s ease, transform 0.25s ease;
        }

        .text-hint span {
            font-weight: 700;
        }

        .text-hint.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .circles-wrapper .circle-tooltip {
            position: relative;
            transition: transform 0.3s ease, filter 0.3s ease;
            cursor: pointer;
        }

        .circles-wrapper .circle-tooltip:hover,
        .circles-wrapper .circle-tooltip:focus-visible {
            transform: translateY(-4px);
            filter: brightness(1.05);
        }


        .summary-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.6rem;
        }

        .summary-card {
            background: var(--surface-soft);
            border-radius: 24px;
            padding: 1.6rem;
            border: 1px solid rgba(148, 163, 184, 0.25);
            box-shadow: 0 20px 45px rgba(15, 23, 42, 0.12);
            position: relative;
            overflow: hidden;
        }

        .summary-card.tam {
            border-color: rgba(125, 129, 242, 0.45);
        }

        .summary-card.sam {
            border-color: rgba(34, 197, 94, 0.35);
        }

        .summary-card.som {
            border-color: rgba(14, 165, 233, 0.35);
        }

        .summary-card::after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 4px;
            border-radius: 24px 24px 0 0;
            background: rgba(148, 163, 184, 0.35);
        }

        .summary-card.tam::after {
            background: var(--tam-gradient);
        }

        .summary-card.sam::after {
            background: var(--sam-gradient);
        }

        .summary-card.som::after {
            background: var(--som-gradient);
        }

        .summary-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: rgba(99,102,241,0.12);
            color: #4f46e5;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .summary-card.sam .summary-icon {
            background: rgba(34,197,94,0.16);
            color: #15803d;
        }

        .summary-card.som .summary-icon {
            background: rgba(14,165,233,0.16);
            color: #0c4a6e;
        }

        .summary-card h4 {
            font-size: 1.05rem;
            margin-bottom: 0.6rem;
            font-weight: 600;
        }

        .summary-value {
            font-size: 1.65rem;
            font-weight: 800;
            margin-bottom: 0.4rem;
        }

        .summary-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .penetration-card {
            background: var(--surface);
            border-radius: 30px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-md);
            padding: 2.4rem;
            backdrop-filter: blur(16px);
        }

        .penetration-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .penetration-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: rgba(15, 23, 42, 0.08);
            display: grid;
            place-items: center;
            font-size: 1.3rem;
            color: #1e293b;
        }

        .penetration-details h3 {
            font-size: 1.35rem;
            font-weight: 700;
            margin: 0;
        }

        .penetration-details p {
            margin: 0.3rem 0 0;
            color: var(--text-muted);
        }

        .penetration-metrics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.4rem;
        }

        .metric-card {
            background: var(--surface-soft);
            border-radius: 22px;
            padding: 1.4rem 1.5rem;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-sm);
        }

        .metric-label {
            font-size: 0.85rem;
            letter-spacing: 0.12em;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        .metric-value {
            font-size: 2rem;
            font-weight: 800;
            margin: 0.5rem 0 0.75rem;
        }

        .metric-bar {
            height: 8px;
            background: var(--progress-bg);
            border-radius: 999px;
            overflow: hidden;
            margin-bottom: 0.75rem;
        }

        .metric-bar span {
            display: block;
            height: 100%;
            border-radius: 999px;
        }

        .metric-bar.sam span {
            background: var(--sam-gradient);
        }

        .metric-bar.som-sam span {
            background: var(--som-gradient);
        }

        .metric-bar.som-tam span {
            background: var(--tam-gradient);
        }

        .metric-desc {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        .download-card {
            background: var(--surface);
            border-radius: 30px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow-lg);
            padding: 2.6rem 2.4rem;
            text-align: center;
            backdrop-filter: blur(16px);
        }

        .download-card h3 {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 0.6rem;
        }

        .download-card p {
            color: var(--text-muted);
            margin-bottom: 1.6rem;
        }

        .mv-btn-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1.4rem;
        }

        .mv-btn {
            padding: 0.85rem 1.7rem;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 600;
            font-size: 0.95rem;
            color: #fff;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            text-decoration: none;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease, filter 0.25s ease;
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.2);
        }

        .mv-btn:hover {
            transform: translateY(-3px);
            filter: brightness(1.05);
            box-shadow: 0 24px 48px rgba(15, 23, 42, 0.22);
        }

        .mv-btn:disabled {
            opacity: 0.55;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .mv-btn-primary { background: var(--tam-gradient); }
        .mv-btn-teal { background: var(--sam-gradient); }
        .mv-btn-amber { background: linear-gradient(135deg, #f97316 0%, #facc15 100%); }
        .mv-btn-slate { background: linear-gradient(135deg, #1f2937 0%, #475569 100%); }
        .mv-btn-emerald { background: linear-gradient(135deg, #22c55e 0%, #0ea5e9 100%); }
        .mv-btn-magenta { background: linear-gradient(135deg, #ec4899 0%, #8b5cf6 100%); }

        .footer {
            text-align: center;
            color: rgba(248,250,252,0.85);
            padding: 2rem 1rem;
            border-radius: 24px;
            background: linear-gradient(135deg, #6366f1 0%, #7c3aed 100%);
            box-shadow: var(--shadow-sm);
        }
        @media (max-width: 992px) {
            .hero-card {
                padding: 2.6rem 2.2rem;
            }
            .hero-card h1 {
                font-size: 2.2rem;
            }
            .info-item {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 768px) {
            .container-main {
                padding: 3rem 1rem 2rem;
            }
            .hero-card {
                padding: 2.2rem 1.8rem;
            }
            .hero-card h1 {
                font-size: 1.9rem;
            }
            .hero-top {
                flex-direction: column;
                align-items: flex-start;
            }
            .circles-wrapper {
                margin-bottom: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .info-strip {
                grid-template-columns: 1fr;
            }
            .summary-cards {
                grid-template-columns: 1fr;
            }
            .penetration-metrics {
                grid-template-columns: 1fr;
            }
            .mv-btn {
                width: 100%;
                justify-content: center;
            }
        }

        @page {
            size: A4;
            margin: 12mm 10mm;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            html,
            body {
                width: 100% !important;
                height: auto !important;
                background: #fff !important;
            }

            body {
                padding: 0 !important;
                margin: 0 !important;
            }

            body::before {
                display: none !important;
            }

            nav.navbar,
            .download-card,
            .actions,
            .mv-btn-group {
                display: none !important;
            }

            .container-main {
                max-width: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }

            .page-wrapper {
                gap: 1.5rem !important;
            }

            .page-wrapper > div {
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }

            .info-strip,
            .summary-cards,
            .penetration-metrics {
                grid-template-columns: repeat(2, minmax(0, 1fr)) !important;
            }

            .summary-card,
            .info-item,
            .metric-card {
                break-inside: avoid !important;
                page-break-inside: avoid !important;
            }

            .market-visual-card {
                break-before: page !important;
                page-break-before: always !important;
                margin-top: 0 !important;
            }

            .hero-card,
            .info-item,
            .market-visual-card,
            .penetration-card {
                box-shadow: none !important;
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

    @php
        $tamValue = (float) ($data['tam_value'] ?? 0);
        $samValue = (float) ($data['sam_value'] ?? 0);
        $somValue = (float) ($data['som_value'] ?? 0);
        $tamMarketSize = (int) ($data['tam_market_size'] ?? 0);
        $samMarketSize = (int) ($data['sam_market_size'] ?? 0);
        $somMarketSize = (int) ($data['som_market_size'] ?? 0);

        $samShare = $tamValue > 0 ? round(($samValue / max($tamValue, 1)) * 100, 1) : 0;
        $somShareSam = $samValue > 0 ? round(($somValue / max($samValue, 1)) * 100, 1) : 0;
        $somShareTam = $tamValue > 0 ? round(($somValue / max($tamValue, 1)) * 100, 1) : 0;

        $samPercentage = isset($data['sam_percentage']) ? round((float) $data['sam_percentage'], 1) : $samShare;
        $somPercentage = isset($data['som_percentage']) ? round((float) $data['som_percentage'], 1) : $somShareSam;
    @endphp

    <div class="container-main">
        <div class="page-wrapper">
            <div class="hero-card">
                <div class="hero-top">
                    <span class="hero-badge"><i class="fa-solid fa-bolt"></i> Market Validation</span>
                </div>
                <h1>Market Validation Analysis</h1>
                <p>Analisis pasar komprehensif untuk memetakan TAM, SAM, dan SOM bisnis Anda.</p>
                <div class="hero-download">
                    <i class="fa-solid fa-clock"></i>
                    Generated on {{ date('d F Y, H:i') }} WIB
                </div>
            </div>

            <div class="info-strip">
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="info-content">
                        <span>Nama Bisnis</span>
                        <strong>{{ $data['business_name'] ?? 'Tidak diketahui' }}</strong>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-user"></i></div>
                    <div class="info-content">
                        <span>Pemilik</span>
                        <strong>{{ $data['owner_name'] ?? 'Tidak diketahui' }}</strong>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-industry"></i></div>
                    <div class="info-content">
                        <span>Industri</span>
                        <strong>{{ $data['industry'] ?? 'Tidak diketahui' }}</strong>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                    <div class="info-content">
                        <span>Lokasi</span>
                        <strong>{{ $data['location'] ?? 'Tidak diketahui' }}</strong>
                    </div>
                </div>
            </div>

            <div class="market-visual-card">
                <div class="visual-header">
                    <i class="fa-solid fa-bullseye"></i>
                    TAM / SAM / SOM overview
                </div>
                <div class="circles-wrapper">
                    <div class="concentric-circles">
                            <div class="circle tam-circle">
                                
                            </div>
                            <div class="circle sam-circle">
                                
                            </div>
                            <div class="circle som-circle">
                                
                            </div>
                            <div class="circle-overlay" aria-hidden="true">
                                <div class="circle-text-block tam">
                                    <span class="label">TAM</span>
                                    <span class="value">Rp {{ number_format($tamValue, 0, ',', '.') }}</span>
                                </div>
                                <div class="circle-text-block sam">
                                    <span class="label">SAM</span>
                                    <span class="value">Rp {{ number_format($samValue, 0, ',', '.') }}</span>
                                </div>
                                <div class="circle-text-block som">
                                    <span class="label">SOM</span>
                                    <span class="value">Rp {{ number_format($somValue, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            </div>
                    </div>
                <div class="summary-cards">
                    <div class="summary-card tam">
                        <div class="summary-icon"><i class="fa-solid fa-chart-pie"></i></div>
                        <h4>Total Available Market</h4>
                        <div class="summary-value">Rp {{ number_format($tamValue, 0, ',', '.') }}</div>
                        <p class="summary-desc">Potensi maksimal pasar global yang dapat dijangkau oleh produk atau layanan Anda.</p>
                        <p class="summary-desc mb-0">Perkiraan populasi: {{ number_format($tamMarketSize, 0, ',', '.') }} prospek.</p>
                    </div>
                    <div class="summary-card sam">
                        <div class="summary-icon"><i class="fa-solid fa-users"></i></div>
                        <h4>Serviceable Available Market</h4>
                        <div class="summary-value">Rp {{ number_format($samValue, 0, ',', '.') }}</div>
                        <p class="summary-desc">Segmentasi pasar yang dapat dilayani sesuai distribusi, kanal, dan positioning Anda.</p>
                        <p class="summary-desc mb-0">Porsi pasar: {{ number_format($samPercentage, 1, ',', '.') }}% | Estimasi pelanggan {{ number_format($samMarketSize, 0, ',', '.') }}.</p>
                    </div>
                    <div class="summary-card som">
                        <div class="summary-icon"><i class="fa-solid fa-bullseye"></i></div>
                        <h4>Serviceable Obtainable Market</h4>
                        <div class="summary-value">Rp {{ number_format($somValue, 0, ',', '.') }}</div>
                        <p class="summary-desc">Target realistis yang dapat dicapai dengan strategi dan sumber daya saat ini.</p>
                        <p class="summary-desc mb-0">Porsi pasar: {{ number_format($somPercentage, 1, ',', '.') }}% | Estimasi pelanggan {{ number_format($somMarketSize, 0, ',', '.') }}.</p>
                    </div>
                </div>
            </div>
            <div class="penetration-card">
                <div class="penetration-header">
                    <div class="penetration-icon"><i class="fa-solid fa-chart-line"></i></div>
                    <div class="penetration-details">
                        <h3>Analisis Penetrasi Pasar</h3>
                        <p>Menggambarkan perjalanan pencapaian pasar dari total potensi hingga target spesifik.</p>
                    </div>
                </div>
                <div class="penetration-metrics">
                    <div class="metric-card">
                        <span class="metric-label">SAM dari TAM</span>
                        <div class="metric-value">{{ number_format($samShare, 1, ',', '.') }}%</div>
                        <div class="metric-bar sam"><span style="width: {{ min($samShare, 100) }}%"></span></div>
                        <p class="metric-desc">Persentase pasar potensial yang siap Anda layani secara efektif.</p>
                    </div>
                    <div class="metric-card">
                        <span class="metric-label">SOM dari SAM</span>
                        <div class="metric-value">{{ number_format($somShareSam, 1, ',', '.') }}%</div>
                        <div class="metric-bar som-sam"><span style="width: {{ min($somShareSam, 100) }}%"></span></div>
                        <p class="metric-desc">Target penyerapan pasar realistis berdasarkan kapasitas internal.</p>
                    </div>
                    <div class="metric-card">
                        <span class="metric-label">SOM dari TAM</span>
                        <div class="metric-value">{{ number_format($somShareTam, 1, ',', '.') }}%</div>
                        <div class="metric-bar som-tam"><span style="width: {{ min($somShareTam, 100) }}%"></span></div>
                        <p class="metric-desc">Kontribusi target realistis dibandingkan potensi pasar maksimal.</p>
                    </div>
                </div>
            </div>

            <div class="download-card actions">
                <h3>Download Analysis</h3>
                <p>Pilih format yang Anda perlukan untuk dibagikan kepada tim atau investor.</p>
                @if(config('app.debug'))
                    <small class="text-muted d-block mb-3">Debug: ID = {{ $data['id'] ?? 'null' }}</small>
                @endif
                <div class="mv-btn-group">
                    @if(isset($data['id']) && $data['id'])
                        <button onclick="downloadPDF()" class="mv-btn mv-btn-primary"><i class="fa-solid fa-file-pdf"></i> Download PDF</button>
                    @else
                        <button class="mv-btn mv-btn-primary" disabled><i class="fa-solid fa-file-pdf"></i> Download PDF</button>
                    @endif
                    <button onclick="downloadAsImage('png')" class="mv-btn mv-btn-teal"><i class="fa-solid fa-image"></i> Download PNG</button>
                    <button onclick="downloadAsImage('jpg')" class="mv-btn mv-btn-amber"><i class="fa-solid fa-image"></i> Download JPG</button>
                    <button onclick="printDocument()" class="mv-btn mv-btn-slate"><i class="fa-solid fa-print"></i> Print Document</button>
                </div>
                <div class="mv-btn-group">
                    <a href="{{ route('tam-sam-som.create') }}" class="mv-btn mv-btn-emerald"><i class="fa-solid fa-paper-plane"></i> Buat Market Validation Baru</a>
                    <a href="{{ route('bmc.landing') }}" class="mv-btn mv-btn-magenta"><i class="fa-solid fa-house"></i> Kembali ke Beranda</a>
                </div>
            </div>

            <div class="footer">
                <strong>Ideation Platform</strong> - Business Strategy Companion<br>
                Dokumen ini dihasilkan secara otomatis oleh sistem Ideation.
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        lucide.createIcons();

        const businessName = @json($data['business_name'] ?? 'Document');
        const exportDate = @json(date('Y-m-d'));

        const CAPTURE_DELAY = 200;
        const CANVAS_PADDING = 60;

        function restoreActions(actions, previousDisplay) {
            if (actions) {
                actions.style.display = previousDisplay !== null ? previousDisplay : '';
            }
        }

        async function captureExportCanvas() {
            const target = document.querySelector('.page-wrapper');

            if (!target) {
                throw new Error('Bagian konten utama tidak ditemukan.');
            }

            await new Promise(resolve => setTimeout(resolve, CAPTURE_DELAY));

            const canvas = await html2canvas(target, {
                scale: 2,
                useCORS: true,
                allowTaint: true,
                backgroundColor: '#ffffff',
                scrollX: 0,
                scrollY: 0,
                width: target.scrollWidth,
                height: target.scrollHeight,
                windowWidth: target.scrollWidth,
                windowHeight: target.scrollHeight
            });

            if (!CANVAS_PADDING) {
                return canvas;
            }

            const paddedCanvas = document.createElement('canvas');
            paddedCanvas.width = canvas.width + CANVAS_PADDING * 2;
            paddedCanvas.height = canvas.height + CANVAS_PADDING * 2;

            const context = paddedCanvas.getContext('2d');
            context.fillStyle = '#ffffff';
            context.fillRect(0, 0, paddedCanvas.width, paddedCanvas.height);
            context.drawImage(canvas, CANVAS_PADDING, CANVAS_PADDING);

            return paddedCanvas;
        }

        async function downloadPDF() {
            if (typeof window.jspdf === 'undefined') {
                alert('Library jsPDF tidak tersedia. Silakan refresh halaman dan coba lagi.');
                return;
            }

            const actions = document.querySelector('.actions');
            const previousDisplay = actions ? actions.style.display : null;

            if (actions) actions.style.display = 'none';

            try {
                const canvas = await captureExportCanvas();
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');

                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = pdf.internal.pageSize.getHeight();
                const horizontalMargin = 8;
                const verticalMargin = 12;
                const usableWidth = pdfWidth - horizontalMargin * 2;
                const usableHeight = pdfHeight - verticalMargin * 2;
                const scale = Math.min(usableWidth / canvas.width, usableHeight / canvas.height, 1);
                const renderWidth = canvas.width * scale;
                const renderHeight = canvas.height * scale;
                const offsetX = Math.max(horizontalMargin, (pdfWidth - renderWidth) / 2);
                const offsetY = Math.max(verticalMargin, (pdfHeight - renderHeight) / 2);
                const imgData = canvas.toDataURL('image/png', 1.0);
                pdf.addImage(imgData, 'PNG', offsetX, offsetY, renderWidth, renderHeight);

                pdf.save(`TAM-SAM-SOM-${businessName.replace(/[^a-zA-Z0-9]/g, '-')}-${exportDate}.pdf`);
            } catch (error) {
                console.error('Error generating PDF:', error);
                alert('Terjadi kesalahan saat membuat PDF: ' + error.message);
            } finally {
                restoreActions(actions, previousDisplay);
            }
        }

        async function downloadAsImage(format) {
            const actions = document.querySelector('.actions');
            const previousDisplay = actions ? actions.style.display : null;

            if (actions) actions.style.display = 'none';

            try {
                const canvas = await captureExportCanvas();
                const mimeType = format === 'jpg' ? 'image/jpeg' : 'image/png';
                const quality = format === 'jpg' ? 0.95 : 1.0;

                const link = document.createElement('a');
                link.download = `TAM-SAM-SOM-${businessName.replace(/[^a-zA-Z0-9]/g, '-')}-${exportDate}.${format}`;
                link.href = canvas.toDataURL(mimeType, quality);
                link.click();
            } catch (error) {
                console.error('Error generating image:', error);
                alert('Terjadi kesalahan saat membuat gambar. Silakan coba lagi.');
            } finally {
                restoreActions(actions, previousDisplay);
            }
        }

        function printDocument() {
            const actions = document.querySelector('.actions');

            if (actions) actions.style.display = 'none';

            window.print();

            setTimeout(() => {
                if (actions) actions.style.display = 'block';
            }, 1000);
        }

        window.addEventListener('beforeprint', function() {
            const actions = document.querySelector('.actions');
            if (actions) actions.style.display = 'none';
        });

        window.addEventListener('afterprint', function() {
            const actions = document.querySelector('.actions');
            if (actions) actions.style.display = 'block';
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






