<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Model Canvas - {{ $business->business_name }} | Ideation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" onerror="this.onerror=null;this.src='{{ asset('assets/js/html2canvas.min.js') }}';"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" onerror="this.onerror=null;this.src='{{ asset('assets/js/jspdf.umd.min.js') }}';"></script>
    <style id="bmc-style">
        :root {
            --primary: #6366f1;
            --primary-dark: #4338ca;
            --primary-light: #a5b4fc;
            --green-start: #22c55e;
            --green-end: #16a34a;
            --teal: #0e7490;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --shadow-card: 0 34px 60px rgba(15, 23, 42, 0.28);
            --shadow-component: 0 20px 36px rgba(79, 70, 229, 0.16);
            --shadow-md: 0 18px 28px rgba(15, 23, 42, 0.16);
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 18px;
            --radius-sm: 14px;
        }

        *, *::before, *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', 'Segoe UI', sans-serif;
            line-height: 1.5;
            background: linear-gradient(160deg, #4f46e5 0%, #7c3aed 45%, #a855f7 100%);
            color: #0f172a;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .bmc-page {
            position: relative;
            min-height: 100vh;
            padding: 3.5rem 0 4.5rem;
        }

        .bmc-page::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.18), transparent 55%),
                        radial-gradient(circle at 80% 15%, rgba(79, 70, 229, 0.25), transparent 60%);
            opacity: 0.85;
            pointer-events: none;
        }

        .page-wrapper {
            position: relative;
            z-index: 1;
            max-width: 1480px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }

        .bmc-hero {
            text-align: center;
            color: #f8fafc;
            max-width: 760px;
            margin: 0 auto 2.5rem;
        }

        .bmc-hero span {
            display: inline-block;
            font-size: 0.9rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: rgba(226, 232, 240, 0.85);
        }

        .bmc-hero h1 {
            font-size: 2.75rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin: 1.1rem 0 0.6rem;
        }

        .bmc-hero p {
            margin: 0;
            font-size: 1.05rem;
            color: rgba(226, 232, 240, 0.8);
        }

        .global-alert {
            position: relative;
            z-index: 2;
            max-width: 560px;
            margin: 0 auto 1.5rem;
            padding: 0.9rem 1.15rem;
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            gap: 0.65rem;
            font-weight: 500;
            background: #16a34a;
            color: #f8fafc;
            border: 1px solid #15803d;
            box-shadow: var(--shadow-component);
        }

        .global-alert.success i {
            color: #bbf7d0;
        }

        .bmc-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2.75rem;
        }

        .bmc-action-btn {
            border: none;
            background: linear-gradient(135deg, var(--btn-start, var(--primary)) 0%, var(--btn-end, var(--primary-dark)) 100%);
            color: #ffffff;
            padding: 0.85rem 1.6rem;
            border-radius: 999px;
            font-weight: 600;
            font-size: 0.95rem;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            cursor: pointer;
            box-shadow: var(--shadow-component);
            transition: transform 0.2s ease, box-shadow 0.2s ease, filter 0.2s ease;
            letter-spacing: 0.01em;
        }

        .bmc-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-card);
            filter: brightness(1.03);
        }

        .bmc-action-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .bmc-action-btn--jpg {
            --btn-start: #6366f1;
            --btn-end: #4338ca;
        }

        .bmc-action-btn--png {
            --btn-start: #22c55e;
            --btn-end: #16a34a;
        }

        .bmc-action-btn--pdf {
            --btn-start: #f97316;
            --btn-end: #ea580c;
        }

        .bmc-action-btn--print {
            --btn-start: #0ea5e9;
            --btn-end: #0284c7;
        }

        .bmc-action-btn .spinner-border {
            width: 1rem;
            height: 1rem;
        }

        .bmc-shell {
            background: rgba(248, 250, 252, 0.96);
            border-radius: var(--radius-xl);
            padding: 3rem 3.25rem;
            box-shadow: var(--shadow-card);
            border: 1px solid rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
        }

        .bmc-section {
            margin-bottom: 3rem;
        }

        .bmc-section:last-of-type {
            margin-bottom: 0;
        }

        .bmc-section-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.75rem;
        }

        .bmc-section-icon {
            width: 56px;
            height: 56px;
            border-radius: 18px;
            background: rgba(99, 102, 241, 0.18);
            color: var(--primary-dark);
            display: grid;
            place-items: center;
            font-size: 1.4rem;
        }

        .bmc-section-title {
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: -0.01em;
            margin: 0;
            color: #0f172a;
        }

        .bmc-section-description {
            margin: 0.25rem 0 0;
            font-size: 0.97rem;
            color: rgba(71, 85, 105, 0.85);
        }

        .business-info {
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.98), rgba(241, 245, 249, 0.92));
            border-radius: var(--radius-lg);
            border: 1px solid rgba(148, 163, 184, 0.32);
            padding: 2.2rem;
            box-shadow: var(--shadow-component);
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.25rem;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 20px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            padding: 1.3rem 1.4rem;
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.08);
            display: flex;
            flex-direction: column;
            gap: 0.45rem;
        }

        .info-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--slate-500);
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .info-value {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 600;
            color: #0f172a;
        }

        .info-link {
            color: var(--primary);
        }

        .info-link:hover {
            text-decoration: underline;
        }

        .info-description {
            background: rgba(255, 255, 255, 0.96);
            border-radius: 20px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            padding: 1.5rem 1.75rem;
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.08);
        }

        .info-description p {
            margin: 0;
            color: var(--slate-600);
            font-size: 0.98rem;
            line-height: 1.6;
        }

        .bmc-canvas {
            background: rgba(255, 255, 255, 0.9);
            border-radius: var(--radius-lg);
            border: 1px solid rgba(148, 163, 184, 0.25);
            padding: 2rem;
            box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.6);
        }

        .bmc-components-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1.25rem;
            align-items: stretch;
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .bmc-components-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 992px) and (max-width: 1199px) {
            .bmc-components-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (min-width: 1200px) {
            .bmc-components-grid {
                grid-template-columns: repeat(10, minmax(0, 1fr));
                grid-auto-rows: minmax(210px, auto);
            }

            .bmc-key-partnerships {
                grid-column: 1 / span 2;
                grid-row: 1 / span 2;
            }

            .bmc-key-activities {
                grid-column: 3 / span 2;
                grid-row: 1 / span 1;
            }

            .bmc-key-resources {
                grid-column: 3 / span 2;
                grid-row: 2 / span 1;
            }

            .bmc-value-propositions {
                grid-column: 5 / span 2;
                grid-row: 1 / span 2;
            }

            .bmc-customer-relationships {
                grid-column: 7 / span 2;
                grid-row: 1 / span 1;
            }

            .bmc-channels {
                grid-column: 7 / span 2;
                grid-row: 2 / span 1;
            }

            .bmc-customer-segments {
                grid-column: 9 / span 2;
                grid-row: 1 / span 2;
            }

            .bmc-cost-structure {
                grid-column: 1 / span 5;
                grid-row: 3 / span 1;
            }

            .bmc-revenue-streams {
                grid-column: 6 / span 5;
                grid-row: 3 / span 1;
            }
        }

        .bmc-component {
            --accent: #6366f1;
            --accent-soft: rgba(99, 102, 241, 0.12);
            background: rgba(255, 255, 255, 0.95);
            border-radius: 22px;
            padding: 1.45rem;
            border: 1px solid rgba(99, 102, 241, 0.14);
            box-shadow: 0 24px 40px rgba(15, 23, 42, 0.14);
            display: flex;
            flex-direction: column;
            gap: 1.15rem;
            min-height: 0;
            height: 100%;
            position: relative;
        }

        .bmc-title {
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
        }

        .bmc-title-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 1.2rem;
            background: var(--accent-soft);
            color: var(--accent);
        }

        .bmc-title-meta {
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }

        .bmc-title-text {
            font-size: 1.04rem;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .bmc-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.65rem;
            flex: 1;
        }

        .bmc-list li {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.22);
            border-left: 4px solid var(--accent);
            border-radius: 16px;
            padding: 0.75rem 0.95rem 0.75rem 1.6rem;
            color: #1f2937;
            font-size: 0.94rem;
            line-height: 1.45;
            position: relative;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .bmc-list li::before {
            content: '';
            position: absolute;
            top: 0.92rem;
            left: 0.8rem;
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.08);
        }

        .bmc-list li:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 24px rgba(15, 23, 42, 0.12);
        }

        .bmc-list li.bmc-empty {
            justify-content: center;
            text-align: center;
            font-weight: 500;
            color: var(--slate-500);
            background: rgba(148, 163, 184, 0.12);
        }

        .bmc-list li.bmc-empty::before {
            display: none;
        }

        .bmc-customer-segments {
            --accent: #ec4899;
            --accent-soft: rgba(236, 72, 153, 0.18);
            border-color: rgba(236, 72, 153, 0.32);
            background: linear-gradient(135deg, rgba(236, 72, 153, 0.08), rgba(236, 72, 153, 0.02));
            box-shadow: 0 20px 35px rgba(236, 72, 153, 0.14);
        }

        .bmc-value-propositions {
            --accent: #f59e0b;
            --accent-soft: rgba(245, 158, 11, 0.18);
            border-color: rgba(245, 158, 11, 0.32);
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.08), rgba(245, 158, 11, 0.02));
            box-shadow: 0 20px 35px rgba(245, 158, 11, 0.16);
        }

        .bmc-channels {
            --accent: #22c55e;
            --accent-soft: rgba(34, 197, 94, 0.18);
            border-color: rgba(34, 197, 94, 0.3);
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.08), rgba(34, 197, 94, 0.02));
            box-shadow: 0 20px 35px rgba(34, 197, 94, 0.16);
        }

        .bmc-customer-relationships {
            --accent: #8b5cf6;
            --accent-soft: rgba(139, 92, 246, 0.18);
            border-color: rgba(139, 92, 246, 0.32);
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.08), rgba(139, 92, 246, 0.02));
            box-shadow: 0 20px 35px rgba(139, 92, 246, 0.18);
        }

        .bmc-revenue-streams {
            --accent: #6366f1;
            --accent-soft: rgba(99, 102, 241, 0.18);
            border-color: rgba(99, 102, 241, 0.3);
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.08), rgba(99, 102, 241, 0.02));
            box-shadow: 0 20px 35px rgba(99, 102, 241, 0.16);
        }

        .bmc-key-resources {
            --accent: #0ea5e9;
            --accent-soft: rgba(14, 165, 233, 0.18);
            border-color: rgba(14, 165, 233, 0.3);
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.08), rgba(14, 165, 233, 0.02));
            box-shadow: 0 20px 35px rgba(14, 165, 233, 0.18);
        }

        .bmc-key-activities {
            --accent: #f97316;
            --accent-soft: rgba(249, 115, 22, 0.18);
            border-color: rgba(249, 115, 22, 0.3);
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.08), rgba(249, 115, 22, 0.02));
            box-shadow: 0 20px 35px rgba(249, 115, 22, 0.16);
        }

        .bmc-key-partnerships {
            --accent: #14b8a6;
            --accent-soft: rgba(20, 184, 166, 0.18);
            border-color: rgba(20, 184, 166, 0.3);
            background: linear-gradient(135deg, rgba(20, 184, 166, 0.08), rgba(20, 184, 166, 0.02));
            box-shadow: 0 20px 35px rgba(20, 184, 166, 0.16);
        }

        .bmc-cost-structure {
            --accent: #ef4444;
            --accent-soft: rgba(239, 68, 68, 0.18);
            border-color: rgba(239, 68, 68, 0.3);
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.08), rgba(239, 68, 68, 0.02));
            box-shadow: 0 20px 35px rgba(239, 68, 68, 0.16);
        }

        .bmc-footer-actions {
            margin-top: 3rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 1rem;
        }

        .action-link {
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding: 0.85rem 1.65rem;
            border-radius: 16px;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
        }

        .action-link i {
            font-size: 1rem;
        }

        .action-link--edit {
            background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);
            color: #ffffff;
            box-shadow: var(--shadow-component);
        }

        .action-link--duplicate {
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: #ffffff;
            box-shadow: var(--shadow-component);
        }

        .action-link--back {
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(255, 255, 255, 0.95);
            color: #475569;
            box-shadow: none;
        }

        .action-link--back:hover {
            border-color: rgba(99, 102, 241, 0.45);
            color: #4338ca;
        }

        .action-link:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-card);
        }

        .notification {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 9999;
            padding: 0.85rem 1.25rem;
            border-radius: var(--radius-sm);
            font-weight: 500;
            color: #ffffff;
            background: linear-gradient(135deg, #4338ca 0%, #6366f1 100%);
            box-shadow: var(--shadow-md);
            animation: slideIn 0.3s ease forwards;
        }

        .notification.success {
            background: linear-gradient(135deg, #16a34a 0%, #22c55e 100%);
        }

        .notification.error {
            background: linear-gradient(135deg, #dc2626 0%, #f87171 100%);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @media (max-width: 992px) {
            .bmc-shell {
                padding: 2.5rem 2.25rem;
            }
        }

        @media (max-width: 768px) {
            .bmc-page {
                padding: 2.5rem 0 3.25rem;
            }

            .bmc-hero h1 {
                font-size: 2.3rem;
            }

            .bmc-actions {
                flex-direction: column;
            }

            .bmc-action-btn {
                width: 100%;
                justify-content: center;
            }

            .bmc-shell {
                padding: 2.1rem 1.85rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .bmc-components-grid {
                grid-template-columns: 1fr;
            }

            .bmc-footer-actions {
                flex-direction: column;
            }

            .action-link {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .page-wrapper {
                padding: 0 1rem;
            }

            .bmc-shell {
                padding: 1.75rem 1.5rem;
            }

            .bmc-section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .bmc-section-title {
                font-size: 1.3rem;
            }

            .bmc-hero span {
                font-size: 0.8rem;
            }

            .bmc-hero h1 {
                font-size: 2rem;
            }

            .notification {
                left: 50%;
                right: auto;
                transform: translateX(-50%);
            }
        }

        /* Navigation Styles */
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            box-shadow: var(--shadow-sm);
            border: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: white !important;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            transition: var(--transition);
            padding: 0.5rem 1rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-light) !important;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            color: var(--primary-light) !important;
            font-weight: 600;
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
                        <a class="nav-link active" href="{{ route('bmc.create') }}">BMC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tam-sam-som.create') }}">Market Validation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    @php
        $bmcData = $business->bmcData;
        $phoneForLink = preg_replace('/[^0-9+]/', '', $business->phone_number ?? '');
    @endphp
    <div class="bmc-page">
        @if (session('success'))
            <div class="global-alert success">
                <i class="fas fa-check-circle"></i>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="page-wrapper">
            <div class="bmc-hero">
                <span>Business Model Canvas</span>
                <h1>{{ $business->business_name }}</h1>
                <p>Visualisasi kanvas bisnis untuk {{ $business->owner_name }}</p>
            </div>

            <div class="bmc-actions">
                <button type="button" class="bmc-action-btn bmc-action-btn--jpg" onclick="downloadAsImage(this, 'jpg')">
                    <i class="fas fa-camera-retro"></i>
                    <span>Download JPG</span>
                </button>
                <button type="button" class="bmc-action-btn bmc-action-btn--png" onclick="downloadAsImage(this, 'png')">
                    <i class="fas fa-image"></i>
                    <span>Download PNG</span>
                </button>
                <button type="button" class="bmc-action-btn bmc-action-btn--pdf" onclick="downloadAsPDF(this)">
                    <i class="fas fa-file-pdf"></i>
                    <span>Download PDF</span>
                </button>
                <button type="button" class="bmc-action-btn bmc-action-btn--print" onclick="printBMC(this)">
                    <i class="fas fa-print"></i>
                    <span>Print BMC</span>
                </button>
            </div>

            <div class="bmc-shell">
                <section class="bmc-section">
                    <div class="bmc-section-header">
                        <span class="bmc-section-icon">
                            <i class="fas fa-briefcase"></i>
                        </span>
                        <div>
                            <h2 class="bmc-section-title">Informasi Bisnis</h2>
                            <p class="bmc-section-description">Detail singkat mengenai profil usaha Anda.</p>
                        </div>
                    </div>

                    <div class="business-info">
                        <div class="info-grid">
                            <div class="info-card">
                                <span class="info-label">Nama Pemilik Usaha</span>
                                <p class="info-value">{{ $business->owner_name }}</p>
                            </div>
                            <div class="info-card">
                                <span class="info-label">Nama Bisnis</span>
                                <p class="info-value">{{ $business->business_name }}</p>
                            </div>
                            <div class="info-card">
                                <span class="info-label">Industri</span>
                                <p class="info-value">{{ $business->industry }}</p>
                            </div>
                            <div class="info-card">
                                <span class="info-label">Lokasi</span>
                                <p class="info-value">{{ $business->location }}</p>
                            </div>
                            <div class="info-card">
                                <span class="info-label">Kontak</span>
                                <p class="info-value">
                                    @if ($phoneForLink)
                                        <a href="tel:{{ $phoneForLink }}" class="info-link">{{ $business->phone_number }}</a>
                                    @else
                                        {{ $business->phone_number ?? '-' }}
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="info-description">
                            <span class="info-label">Deskripsi Bisnis</span>
                            <p>{!! nl2br(e($business->business_description)) !!}</p>
                        </div>
                    </div>
                </section>

                <section class="bmc-section">
                    <div class="bmc-section-header">
                        <span class="bmc-section-icon">
                            <i class="fas fa-th-large"></i>
                        </span>
                        <div>
                            <h2 class="bmc-section-title">Business Model Canvas</h2>
                            <p class="bmc-section-description">Sembilan blok kanvas yang merepresentasikan model bisnis Anda.</p>
                        </div>
                    </div>

                    <div class="bmc-canvas">
                        <div class="bmc-components-grid">
                            @php
                                $components = [
                                    [
                                        'key' => 'key_partnerships',
                                        'title' => 'Key Partnerships',
                                        'class' => 'bmc-key-partnerships',
                                        'icon' => 'fas fa-handshake',
                                        'description' => 'Siapa mitra strategis Anda?'
                                    ],
                                    [
                                        'key' => 'key_activities',
                                        'title' => 'Key Activities',
                                        'class' => 'bmc-key-activities',
                                        'icon' => 'fas fa-tasks',
                                        'description' => 'Aktivitas utama apa yang harus dilakukan?'
                                    ],
                                    [
                                        'key' => 'key_resources',
                                        'title' => 'Key Resources',
                                        'class' => 'bmc-key-resources',
                                        'icon' => 'fas fa-box-open',
                                        'description' => 'Sumber daya utama apa yang dibutuhkan?'
                                    ],
                                    [
                                        'key' => 'value_propositions',
                                        'title' => 'Value Propositions',
                                        'class' => 'bmc-value-propositions',
                                        'icon' => 'fas fa-gem',
                                        'description' => 'Nilai apa yang Anda tawarkan kepada pelanggan?'
                                    ],
                                    [
                                        'key' => 'customer_relationships',
                                        'title' => 'Customer Relationships',
                                        'class' => 'bmc-customer-relationships',
                                        'icon' => 'fas fa-heart',
                                        'description' => 'Bagaimana Anda membangun hubungan dengan pelanggan?'
                                    ],
                                    [
                                        'key' => 'channels',
                                        'title' => 'Channels',
                                        'class' => 'bmc-channels',
                                        'icon' => 'fas fa-share-alt',
                                        'description' => 'Saluran apa yang digunakan untuk menjangkau pelanggan?'
                                    ],
                                    [
                                        'key' => 'customer_segments',
                                        'title' => 'Customer Segments',
                                        'class' => 'bmc-customer-segments',
                                        'icon' => 'fas fa-users',
                                        'description' => 'Siapa pelanggan utama Anda?'
                                    ],
                                    [
                                        'key' => 'cost_structure',
                                        'title' => 'Cost Structure',
                                        'class' => 'bmc-cost-structure',
                                        'icon' => 'fas fa-calculator',
                                        'description' => 'Biaya utama apa yang diperlukan?'
                                    ],
                                    [
                                        'key' => 'revenue_streams',
                                        'title' => 'Revenue Streams',
                                        'class' => 'bmc-revenue-streams',
                                        'icon' => 'fas fa-coins',
                                        'description' => 'Bagaimana bisnis menghasilkan pendapatan?'
                                    ],
                                ];
                            @endphp

                            @foreach ($components as $component)
                                @php
                                    $items = collect(data_get($bmcData, $component['key'], []))
                                        ->filter(function ($item) {
                                            if (is_string($item)) {
                                                return trim($item) !== '';
                                            }
                                            return !is_null($item);
                                        })
                                        ->values();
                                @endphp
                                <div class="bmc-component {{ $component['class'] }}">
                                    <div class="bmc-title">
                                        <span class="bmc-title-icon">
                                            <i class="{{ $component['icon'] }}"></i>
                                        </span>
                                        <div class="bmc-title-meta">
                                            <div class="bmc-title-text">{{ $component['title'] }}</div>
                                        </div>
                                    </div>

                                    <ul class="bmc-list">
                                        @forelse ($items as $item)
                                            <li>{{ $item }}</li>
                                        @empty
                                            <li class="bmc-empty">Belum ada data yang ditambahkan.</li>
                                        @endforelse
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>

            <div class="bmc-footer-actions">
                <a href="{{ route('bmc.edit', $business->id) }}" class="action-link action-link--edit">
                    <i class="fas fa-edit"></i>
                    <span>Edit BMC</span>
                </a>
                <a href="{{ route('bmc.duplicate', $business->id) }}" class="action-link action-link--duplicate">
                    <i class="fas fa-copy"></i>
                    <span>Duplicate BMC</span>
                </a>
                <a href="{{ route('bmc.landing') }}" class="action-link action-link--back">
                    <i class="fas fa-arrow-left"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </div>

    @php
        $businessMeta = [
            'name' => $business->business_name,
            'owner' => $business->owner_name,
            'location' => $business->location ?? '-',
        ];
    @endphp

    <script>
        const businessMeta = {!! json_encode($businessMeta, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) !!};

        const styleSource = document.getElementById('bmc-style');

        function slugify(value) {
            return value
                .toString()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .replace(/[^a-zA-Z0-9]+/g, '_')
                .replace(/^_+|_+$/g, '')
                .toLowerCase();
        }

        function setProcessingState(button, isProcessing, message) {
            if (!button) {
                return;
            }

            if (isProcessing) {
                button.dataset.originalLabel = button.innerHTML;
                button.disabled = true;
                const label = message || 'Memproses...';
                button.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span>${label}</span>`;
            } else {
                button.disabled = false;
                if (button.dataset.originalLabel) {
                    button.innerHTML = button.dataset.originalLabel;
                    delete button.dataset.originalLabel;
                }
            }
        }

        function createExportWrapper() {
            const businessInfo = document.querySelector('.business-info');
            const bmcCanvas = document.querySelector('.bmc-canvas');

            if (!businessInfo || !bmcCanvas) {
                showNotification('Konten BMC tidak ditemukan untuk diekspor.', 'error');
                return null;
            }

            const staging = document.createElement('div');
            staging.style.position = 'absolute';
            staging.style.left = '-9999px';
            staging.style.top = '0';
            staging.style.width = '1100px';

            const wrapper = document.createElement('div');
            wrapper.style.background = '#ffffff';
            wrapper.style.padding = '36px';
            wrapper.style.borderRadius = '28px';
            wrapper.style.boxShadow = '0 30px 60px rgba(15, 23, 42, 0.18)';
            wrapper.style.width = 'inherit';
            wrapper.style.boxSizing = 'border-box';
            wrapper.style.fontFamily = `'Inter', 'Segoe UI', sans-serif`;
            wrapper.style.color = '#0f172a';

            const header = document.createElement('div');
            header.style.textAlign = 'center';
            header.style.marginBottom = '24px';
            header.innerHTML = `
                <div style="font-size:13px; letter-spacing:0.18em; text-transform:uppercase; font-weight:600; color:#6366f1; margin-bottom:6px;">Ideation</div>
                <h1 style="font-size:26px; margin:0; font-weight:700;">Business Model Canvas</h1>
                <p style="margin:6px 0 0; color:#475569; font-size:14px;">${businessMeta.name}</p>
                <div style="display:flex; justify-content:center; gap:16px; margin-top:12px; font-size:12px; color:#94a3b8;">
                    <span>${new Date().toLocaleDateString('id-ID')}</span>
                    <span>${businessMeta.owner}</span>
                    <span>${businessMeta.location}</span>
                </div>
            `;

            const infoClone = businessInfo.cloneNode(true);
            infoClone.style.marginBottom = '24px';

            const canvasClone = bmcCanvas.cloneNode(true);

            const footer = document.createElement('div');
            footer.style.marginTop = '24px';
            footer.style.textAlign = 'center';
            footer.style.fontSize = '12px';
            footer.style.color = '#94a3b8';
            footer.style.letterSpacing = '0.08em';
            footer.style.textTransform = 'uppercase';
            footer.textContent = 'Generated by Ideation';

            wrapper.appendChild(header);
            wrapper.appendChild(infoClone);
            wrapper.appendChild(canvasClone);
            wrapper.appendChild(footer);

            staging.appendChild(wrapper);
            document.body.appendChild(staging);

            return { staging, wrapper };
        }

        function cleanupStaging(staging) {
            if (staging && staging.parentNode) {
                staging.parentNode.removeChild(staging);
            }
        }

        function downloadAsPDF(button) {
            const exportNodes = createExportWrapper();
            if (!exportNodes) {
                return;
            }

            const { staging, wrapper } = exportNodes;
            setProcessingState(button, true, 'Menyiapkan PDF...');

            html2canvas(wrapper, {
                scale: 2,
                useCORS: true,
                backgroundColor: '#ffffff',
                logging: false
            }).then(canvas => {
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('landscape', 'mm', 'a4');

                const pageWidth = pdf.internal.pageSize.getWidth();
                const pageHeight = pdf.internal.pageSize.getHeight();
                const margin = 12;

                let imgWidth = pageWidth - margin * 2;
                let imgHeight = (canvas.height * imgWidth) / canvas.width;

                if (imgHeight > pageHeight - margin * 2) {
                    const scaleFactor = (pageHeight - margin * 2) / imgHeight;
                    imgWidth *= scaleFactor;
                    imgHeight *= scaleFactor;
                }

                const x = (pageWidth - imgWidth) / 2;
                const y = (pageHeight - imgHeight) / 2;
                const imgData = canvas.toDataURL('image/png');

                pdf.addImage(imgData, 'PNG', x, y, imgWidth, imgHeight);
                pdf.save(`BMC_${slugify(businessMeta.name)}.pdf`);
                showNotification('PDF berhasil diunduh!', 'success');
            }).catch(error => {
                console.error('PDF export error:', error);
                showNotification('Gagal mengunduh PDF. Silakan coba lagi.', 'error');
            }).finally(() => {
                setProcessingState(button, false);
                cleanupStaging(staging);
            });
        }

        function downloadAsImage(button, format) {
            const exportNodes = createExportWrapper();
            if (!exportNodes) {
                return;
            }

            const { staging, wrapper } = exportNodes;
            const label = format === 'png' ? 'Menyiapkan PNG...' : 'Menyiapkan JPG...';
            setProcessingState(button, true, label);

            html2canvas(wrapper, {
                scale: 2,
                useCORS: true,
                backgroundColor: '#ffffff',
                logging: false
            }).then(canvas => {
                const mime = format === 'png' ? 'image/png' : 'image/jpeg';
                const dataUrl = canvas.toDataURL(mime, 0.92);
                const link = document.createElement('a');
                link.href = dataUrl;
                link.download = `BMC_${slugify(businessMeta.name)}.${format}`;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                showNotification('Berkas berhasil diunduh!', 'success');
            }).catch(error => {
                console.error('Image export error:', error);
                showNotification('Gagal mengunduh gambar. Silakan coba lagi.', 'error');
            }).finally(() => {
                setProcessingState(button, false);
                cleanupStaging(staging);
            });
        }

        function printBMC(button) {
            const exportNodes = createExportWrapper();
            if (!exportNodes) {
                return;
            }

            const { staging, wrapper } = exportNodes;
            setProcessingState(button, true, 'Menyiapkan cetak...');

            const printWindow = window.open('', '_blank');
            if (!printWindow) {
                showNotification('Popup diblokir. Izinkan popup untuk mencetak.', 'error');
                setProcessingState(button, false);
                cleanupStaging(staging);
                return;
            }

            const styleContent = styleSource ? styleSource.innerHTML : '';

            printWindow.document.write(`
                <!DOCTYPE html>
                <html lang="id">
                <head>
                    <meta charset="UTF-8">
                    <title>Print BMC - ${businessMeta.name}</title>
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
                    <style>${styleContent}</style>
                    <style>
                        body { background: #ffffff !important; padding: 40px; }
                        .bmc-page { padding: 0; }
                        .page-wrapper { max-width: 100%; padding: 0; }
                        .bmc-shell { box-shadow: none; border: none; }
                        .notification { display: none !important; }
                    </style>
                </head>
                <body>
                    ${wrapper.outerHTML}
                </body>
                </html>
            `);

            printWindow.document.close();
            printWindow.focus();

            const finalize = () => {
                setProcessingState(button, false);
                cleanupStaging(staging);
            };

            printWindow.onload = () => {
                printWindow.print();
                setTimeout(() => {
                    printWindow.close();
                    finalize();
                }, 400);
            };

            printWindow.onerror = () => {
                showNotification('Gagal menyiapkan tampilan cetak.', 'error');
                finalize();
            };

            setTimeout(() => finalize(), 3000);
        }

        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type || ''}`.trim();
            notification.textContent = message;

            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 2800);
        }
    </script>
</body>
</html>
