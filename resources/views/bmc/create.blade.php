<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Business Model Canvas - Ideation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4338ca;
            --primary-light: #a5b4fc;
            --green-start: #22c55e;
            --green-end: #16a34a;
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --shadow-card: 0 34px 60px rgba(15, 23, 42, 0.28);
            --shadow-component: 0 20px 36px rgba(79, 70, 229, 0.16);
            --radius-xl: 32px;
            --radius-lg: 24px;
            --radius-md: 18px;
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

        button, input, select, textarea {
            font-family: inherit;
        }

        a {
            text-decoration: none;
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

        .bmc-container {
            position: relative;
            z-index: 1;
            max-width: 1100px;
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
            border-radius: var(--radius-md);
            display: grid;
            place-items: center;
            font-size: 1.4rem;
            color: #4338ca;
            background: linear-gradient(145deg, rgba(99, 102, 241, 0.15), rgba(129, 140, 248, 0.28));
            box-shadow: 0 20px 32px rgba(79, 70, 229, 0.25);
        }

        .bmc-section-icon.business {
            color: #1d4ed8;
            background: linear-gradient(145deg, rgba(59, 130, 246, 0.15), rgba(147, 197, 253, 0.35));
            box-shadow: 0 18px 28px rgba(59, 130, 246, 0.22);
        }

        .bmc-section-title {
            margin: 0;
            font-size: 1.55rem;
            font-weight: 700;
            color: #1f2937;
        }

        .bmc-section-subtitle {
            margin: 0.35rem 0 0;
            color: #64748b;
            font-size: 0.97rem;
        }

        .bmc-info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.5rem;
        }

        .bmc-field {
            display: flex;
            flex-direction: column;
        }

        .bmc-field label {
            font-size: 0.95rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.55rem;
        }

        .bmc-field input,
        .bmc-field select,
        .bmc-field textarea {
            width: 100%;
            border: 1px solid rgba(148, 163, 184, 0.35);
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.92);
            padding: 0.9rem 1.1rem;
            font-size: 0.97rem;
            color: #1f2937;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .bmc-field textarea {
            min-height: 120px;
            resize: none;
        }

        .bmc-field input:focus,
        .bmc-field select:focus,
        .bmc-field textarea:focus {
            outline: none;
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
        }

        .bmc-field select {
            appearance: none;
            background-position: calc(100% - 22px) calc(50% - 4px), calc(100% - 17px) calc(50% - 4px);
            background-size: 6px 6px, 6px 6px;
            background-repeat: no-repeat;
        }

        .bmc-field--full {
            grid-column: span 2;
        }

        .bmc-divider {
            height: 1px;
            background: rgba(148, 163, 184, 0.38);
            margin: 2.75rem 0;
        }

        .bmc-components-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .bmc-component {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.98), rgba(248, 250, 252, 0.88));
            border-radius: var(--radius-lg);
            padding: 1.75rem;
            border: 2px solid rgba(99, 102, 241, 0.1);
            box-shadow: var(--shadow-component);
            display: flex;
            flex-direction: column;
            gap: 1.15rem;
            min-height: 260px;
        }

        .bmc-title {
            display: flex;
            align-items: center;
            gap: 0.9rem;
        }

        .bmc-title-icon {
            width: 55px;
            height: 44px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            font-size: 1.25rem;
            background: rgba(99, 102, 241, 0.12);
            color: #4338ca;
        }

        .bmc-title-text {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1f2937;
        }

        .bmc-description {
            margin: 0.3rem 0 0;
            font-size: 0.92rem;
            color: rgba(71, 85, 105, 0.9);
        }

        .bmc-hint {
            margin: 0;
            font-size: 0.85rem;
            color: rgba(71, 85, 105, 0.75);
            background: rgba(148, 163, 184, 0.12);
            padding: 0.65rem 0.85rem;
            border-radius: 14px;
        }

        .bmc-inputs {
            display: flex;
            flex-direction: column;
            gap: 0.85rem;
        }

        .bmc-input-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .bmc-input-item input {
            width: 100%;
            border: 1px solid rgba(148, 163, 184, 0.35);
            flex: 1;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.85rem 1.05rem;
            font-size: 0.95rem;
            color: #1f2937;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .bmc-input-item input:focus {
            border-color: rgba(99, 102, 241, 0.45);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.12);
            outline: none;
        }

        .bmc-input-item input::placeholder {
            color: rgba(100, 116, 139, 0.65);
        }

        .bmc-remove-btn {
            width: 36px;
            height: 36px;
            border-radius: 12px;
            background: rgba(99, 102, 241, 0.12);
            color: #4338ca;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .bmc-remove-btn:hover {
            background: rgba(79, 70, 229, 0.22);
            transform: translateY(-1px);
        }

        .bmc-add-btn {
            align-self: flex-start;
            display: inline-flex;
            align-items: center;
            gap: 0.55rem;
            padding: 0.7rem 1.4rem;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #f8fafc;
            font-size: 0.93rem;
            font-weight: 600;
            box-shadow: 0 16px 30px rgba(79, 70, 229, 0.24);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .bmc-add-btn i {
            font-size: 0.9rem;
        }

        .bmc-add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px rgba(79, 70, 229, 0.28);
        }

        .bmc-customer-segments {
            border-color: rgba(236, 72, 153, 0.45);
            box-shadow: 0 20px 35px rgba(236, 72, 153, 0.16);
        }

        .bmc-customer-segments .bmc-title-icon {
            background: rgba(236, 72, 153, 0.16);
            color: #be185d;
        }

        .bmc-value-propositions {
            border-color: rgba(250, 204, 21, 0.55);
            box-shadow: 0 20px 35px rgba(250, 204, 21, 0.18);
        }

        .bmc-value-propositions .bmc-title-icon {
            background: rgba(250, 204, 21, 0.18);
            color: #b45309;
        }

        .bmc-channels {
            border-color: rgba(34, 197, 94, 0.55);
            box-shadow: 0 20px 35px rgba(34, 197, 94, 0.18);
        }

        .bmc-channels .bmc-title-icon {
            background: rgba(34, 197, 94, 0.18);
            color: #15803d;
        }

        .bmc-customer-relationships {
            border-color: rgba(129, 140, 248, 0.55);
            box-shadow: 0 20px 35px rgba(129, 140, 248, 0.2);
        }

        .bmc-customer-relationships .bmc-title-icon {
            background: rgba(129, 140, 248, 0.18);
            color: #4f46e5;
        }

        .bmc-revenue-streams {
            border-color: rgba(6, 182, 212, 0.55);
            box-shadow: 0 20px 35px rgba(6, 182, 212, 0.18);
        }

        .bmc-revenue-streams .bmc-title-icon {
            background: rgba(6, 182, 212, 0.18);
            color: #0e7490;
        }

        .bmc-key-resources {
            border-color: rgba(245, 158, 11, 0.55);
            box-shadow: 0 20px 35px rgba(245, 158, 11, 0.17);
        }

        .bmc-key-resources .bmc-title-icon {
            background: rgba(245, 158, 11, 0.18);
            color: #b45309;
        }

        .bmc-key-activities {
            border-color: rgba(34, 197, 94, 0.55);
            box-shadow: 0 20px 35px rgba(34, 197, 94, 0.18);
        }

        .bmc-key-activities .bmc-title-icon {
            background: rgba(34, 197, 94, 0.18);
            color: #15803d;
        }

        .bmc-key-partnerships {
            border-color: rgba(59, 130, 246, 0.55);
            box-shadow: 0 20px 35px rgba(59, 130, 246, 0.18);
        }

        .bmc-key-partnerships .bmc-title-icon {
            background: rgba(59, 130, 246, 0.18);
            color: #1d4ed8;
        }

        .bmc-cost-structure {
            border-color: rgba(248, 113, 113, 0.55);
            box-shadow: 0 20px 35px rgba(248, 113, 113, 0.18);
        }

        .bmc-cost-structure .bmc-title-icon {
            background: rgba(248, 113, 113, 0.18);
            color: #b91c1c;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            margin-top: 3rem;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            padding: 0.85rem 1.8rem;
            border-radius: 999px;
            border: 1px solid rgba(148, 163, 184, 0.35);
            background: rgba(255, 255, 255, 0.95);
            color: #475569;
            font-weight: 600;
            transition: border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .back-btn:hover {
            border-color: rgba(99, 102, 241, 0.45);
            color: #4338ca;
            transform: translateY(-1px);
        }

        .submit-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.95rem 2.6rem;
            border-radius: 999px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.98rem;
            color: #f8fafc;
            background: linear-gradient(135deg, var(--green-start), var(--green-end));
            box-shadow: 0 24px 38px rgba(34, 197, 94, 0.28);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 26px 42px rgba(16, 185, 129, 0.32);
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

        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-link {
                padding: 0.75rem 1rem;
            }
        }
        
        @media (max-width: 1024px) {
            .bmc-shell {
                padding: 2.25rem;
            }
        }

        @media (max-width: 768px) {
            .bmc-page {
                padding: 2.5rem 0 3rem;
            }

            .bmc-shell {
                padding: 2rem;
                border-radius: 26px;
            }

            .bmc-info-grid {
                grid-template-columns: 1fr;
            }

            .bmc-field--full {
                grid-column: span 1;
            }

            .bmc-components-grid {
                grid-template-columns: 1fr;
            }

            .btn-container {
                flex-direction: column;
                align-items: stretch;
            }

            .back-btn,
            .submit-btn {
                justify-content: center;
                width: 100%;
            }
        }

        @media (max-width: 540px) {
            .bmc-container {
                padding: 0 1rem;
            }

            .bmc-shell {
                padding: 1.65rem;
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
    <div class="bmc-page">
        <div class="bmc-container">
            <div class="bmc-hero">
                <span>Business Model Canvas</span>
                <h1>Buat Business Model Canvas</h1>
                <p>Isi informasi bisnis dan BMC Anda dengan lengkap untuk mendapatkan analisis yang akurat.</p>
            </div>

            <div class="bmc-shell">
                <form action="{{ route('bmc.store') }}" method="POST">
                    @csrf

                    <div class="bmc-section">
                        <div class="bmc-section-header">
                            <div class="bmc-section-icon business">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <h2 class="bmc-section-title">Informasi Bisnis</h2>
                                <p class="bmc-section-subtitle">Masukkan detail dasar usaha untuk memulai Business Model Canvas Anda.</p>
                            </div>
                        </div>

                        <div class="bmc-info-grid">
                            <div class="bmc-field">
                                <label for="owner_name">Nama Pemilik Usaha</label>
                                <input type="text" id="owner_name" name="owner_name" required>
                            </div>
                            <div class="bmc-field">
                                <label for="business_name">Nama Usaha</label>
                                <input type="text" id="business_name" name="business_name" required>
                            </div>
                            <div class="bmc-field bmc-field--full">
                                <label for="business_description">Deskripsi Usaha</label>
                                <textarea id="business_description" name="business_description" rows="3" required></textarea>
                            </div>
                            <div class="bmc-field">
                                <label for="industry">Industri</label>
                                <select id="industry" name="industry" required>
                                    <option value="">Pilih Industri</option>
                                    <option value="Food &amp; Beverage">Food &amp; Beverage</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="Education">Education</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Manufacturing">Manufacturing</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Services">Services</option>
                                    <option value="Agriculture">Agriculture</option>
                                    <option value="Transportation">Transportation</option>
                                    <option value="Real Estate">Real Estate</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Energy">Energy</option>
                                    <option value="Other">Lainnya</option>
                                </select>
                            </div>
                            <div class="bmc-field">
                                <label for="location">Lokasi</label>
                                <input type="text" id="location" name="location" required>
                            </div>
                            <div class="bmc-field">
                                <label for="phone_number">No. Telepon</label>
                                <input type="tel" id="phone_number" name="phone_number" required>
                            </div>
                        </div>
                    </div>

                    <div class="bmc-divider"></div>

                    <div class="bmc-section">
                        <div class="bmc-section-header">
                            <div class="bmc-section-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            <div>
                                <h2 class="bmc-section-title">Business Model Canvas Components</h2>
                                <p class="bmc-section-subtitle">Susun setiap blok BMC agar model bisnis terlihat menyeluruh dan terstruktur.</p>
                            </div>
                        </div>

                        <div class="bmc-components-grid">
                            <div class="bmc-component bmc-customer-segments">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-users"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Customer Segments</div>
                                        <div class="bmc-description">Siapa pelanggan target Anda?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Orang yang sedang diet sehat atau komunitas gym.</p>
                                <div class="bmc-inputs" id="customer_segments">
                                    <div class="bmc-input-item">
                                        <input type="text" name="customer_segments[]" placeholder="Contoh: Orang yang sedang diet">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('customer_segments')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-value-propositions">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-gem"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Value Propositions</div>
                                        <div class="bmc-description">Nilai unik apa yang Anda tawarkan?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Produk sehat &amp; rendah gula tanpa mengorbankan rasa.</p>
                                <div class="bmc-inputs" id="value_propositions">
                                    <div class="bmc-input-item">
                                        <input type="text" name="value_propositions[]" placeholder="Contoh: Produk sehat & rendah gula">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('value_propositions')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-channels">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-broadcast-tower"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Channels</div>
                                        <div class="bmc-description">Bagaimana Anda menjangkau pelanggan?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Media sosial, marketplace, dan event komunitas.</p>
                                <div class="bmc-inputs" id="channels">
                                    <div class="bmc-input-item">
                                        <input type="text" name="channels[]" placeholder="Contoh: Media sosial (Instagram & TikTok)">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('channels')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-customer-relationships">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-heart"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Customer Relationships</div>
                                        <div class="bmc-description">Bagaimana Anda menjaga hubungan pelanggan?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Layanan personal, program loyalitas, atau support 24/7.</p>
                                <div class="bmc-inputs" id="customer_relationships">
                                    <div class="bmc-input-item">
                                        <input type="text" name="customer_relationships[]" placeholder="Contoh: Layanan personal untuk custom order">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('customer_relationships')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-revenue-streams">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-coins"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Revenue Streams</div>
                                        <div class="bmc-description">Bagaimana bisnis Anda mendapatkan pendapatan?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Penjualan langsung, subscription, atau lisensi.</p>
                                <div class="bmc-inputs" id="revenue_streams">
                                    <div class="bmc-input-item">
                                        <input type="text" name="revenue_streams[]" placeholder="Contoh: Penjualan langsung ke konsumen">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('revenue_streams')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-key-resources">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-cubes"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Key Resources</div>
                                        <div class="bmc-description">Sumber daya penting apa yang Anda miliki?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Tim ahli, teknologi, atau fasilitas produksi.</p>
                                <div class="bmc-inputs" id="key_resources">
                                    <div class="bmc-input-item">
                                        <input type="text" name="key_resources[]" placeholder="Contoh: Dapur produksi & alat baking premium">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('key_resources')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-key-activities">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-tasks"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Key Activities</div>
                                        <div class="bmc-description">Aktivitas utama apa yang harus dilakukan?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Produksi, pemasaran digital, atau riset pasar.</p>
                                <div class="bmc-inputs" id="key_activities">
                                    <div class="bmc-input-item">
                                        <input type="text" name="key_activities[]" placeholder="Contoh: Produksi macaron rendah gula">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('key_activities')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-key-partnerships">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-handshake"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Key Partnerships</div>
                                        <div class="bmc-description">Siapa mitra strategis Anda?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Supplier bahan baku, jasa logistik, atau mitra distribusi.</p>
                                <div class="bmc-inputs" id="key_partnerships">
                                    <div class="bmc-input-item">
                                        <input type="text" name="key_partnerships[]" placeholder="Contoh: Supplier bahan baku">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('key_partnerships')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>

                            <div class="bmc-component bmc-cost-structure">
                                <div class="bmc-title">
                                    <span class="bmc-title-icon"><i class="fas fa-calculator"></i></span>
                                    <div>
                                        <div class="bmc-title-text">Cost Structure</div>
                                        <div class="bmc-description">Biaya utama apa yang dikeluarkan?</div>
                                    </div>
                                </div>
                                <p class="bmc-hint">Contoh: Biaya bahan baku, sewa lokasi, atau gaji tim.</p>
                                <div class="bmc-inputs" id="cost_structure">
                                    <div class="bmc-input-item">
                                        <input type="text" name="cost_structure[]" placeholder="Contoh: Biaya bahan baku premium">
                                        <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)" style="display: none;">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <button type="button" class="bmc-add-btn" onclick="addBmcItem('cost_structure')">
                                    <i class="fas fa-plus"></i>
                                    Tambah
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="btn-container">
                        <a href="{{ route('bmc.landing') }}" class="back-btn">
                            <i class="fas fa-arrow-left"></i>
                            Kembali
                        </a>
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>
                            Buat Business Model Canvas
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addBmcItem(containerId) {
            const container = document.getElementById(containerId);
            const newItem = document.createElement('div');
            newItem.className = 'bmc-input-item';
            newItem.innerHTML = `
                <input type="text" name="${containerId}[]" placeholder="Masukkan item baru">
                <button type="button" class="bmc-remove-btn" onclick="removeBmcItem(this)">
                    <i class="fas fa-times"></i>
                </button>
            `;
            container.appendChild(newItem);
            updateRemoveButtons(containerId);
        }

        function removeBmcItem(button) {
            const container = button.closest('.bmc-inputs');
            const containerId = container.id;
            button.closest('.bmc-input-item').remove();
            updateRemoveButtons(containerId);
        }

        function updateRemoveButtons(containerId) {
            const container = document.getElementById(containerId);
            const items = container.querySelectorAll('.bmc-input-item');
            items.forEach((item) => {
                const removeBtn = item.querySelector('.bmc-remove-btn');
                if (items.length > 1) {
                    removeBtn.style.display = 'flex';
                } else {
                    removeBtn.style.display = 'none';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const containers = [
                'customer_segments',
                'value_propositions',
                'channels',
                'customer_relationships',
                'revenue_streams',
                'key_resources',
                'key_activities',
                'key_partnerships',
                'cost_structure'
            ];

            containers.forEach(updateRemoveButtons);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
