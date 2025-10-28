@extends('layouts.app')
@section('title', 'Market Validation Analysis - Ideation')
@section('styles')
<style>
    body {
        background: linear-gradient(160deg, #4f46e5 0%, #7c3aed 45%, #a855f7 100%);
        font-family: 'Inter', 'Segoe UI', sans-serif;
        min-height: 100vh;
        color: #0f172a;
    }
    .mv-page {
        position: relative;
        padding: 3.5rem 0 4.5rem;
        min-height: 100vh;
    }
    .mv-page::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.18), transparent 55%),
                    radial-gradient(circle at 80% 15%, rgba(79,70,229,0.25), transparent 60%);
        opacity: 0.9;
        pointer-events: none;
    }
    .mv-container {
        position: relative;
        z-index: 2;
    }
    .mv-hero {
        text-align: center;
        color: #f8fafc;
        max-width: 760px;
        margin: 0 auto 2.5rem;
    }
    .mv-hero span {
        display: inline-block;
        font-size: 0.9rem;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: rgba(226,232,240,0.85);
    }
    .mv-hero h1 {
        font-weight: 700;
        font-size: 2.75rem;
        margin: 1.1rem 0 0.6rem;
        letter-spacing: -0.02em;
    }
    .mv-hero p {
        margin: 0;
        font-size: 1.05rem;
        color: rgba(226,232,240,0.85);
    }
    .mv-stepper {
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.18);
        border-radius: 28px;
        padding: 2.25rem;
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        box-shadow: 0 28px 50px rgba(15,23,42,0.25);
        color: #f8fafc;
    }
    .mv-stepper-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        font-size: 0.95rem;
        color: rgba(226,232,240,0.75);
    }
    .mv-stepper-line {
        position: relative;
        top: 65px;
        height: 4px;
        background: rgba(255,255,255,0.2);
        border-radius: 999px;
        overflow: hidden;
        margin-bottom: 2.2rem;
    }
    .mv-stepper-line-fill {
        position: absolute;
        inset: 0;
        width: 0;
        border-radius: 999px;
        transition: width 0.35s ease;
        background: linear-gradient(90deg, rgba(56,189,248,0.9), rgba(129,140,248,0.95));
    }
    .mv-steps {
        position: relative;
        display: grid;
        grid-template-columns: repeat(5, minmax(0, 1fr));
        gap: 1rem;
    }
    .mv-step {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.75rem;
        position: relative;
        cursor: pointer;
        transition: transform 0.25s ease, opacity 0.25s ease;
        opacity: 0.85;
    }
    .mv-step:hover {
        transform: translateY(-4px);
        opacity: 1;
    }
    .mv-step.is-active {
        opacity: 1;
    }
    .mv-step-icon {
        width: 58px;
        height: 58px;
        border-radius: 20px;
        background: rgba(255,255,255,0.18);
        border: 1px solid rgba(255,255,255,0.35);
        display: grid;
        place-items: center;
        font-size: 1.3rem;
        box-shadow: 0 18px 32px rgba(15,23,42,0.22);
        position: relative;
        transition: all 0.25s ease;
    }
    .mv-step.is-active .mv-step-icon {
        background: rgba(255,255,255,0.92);
        color: #312e81;
        transform: translateY(-3px);
    }
    .mv-step.is-complete .mv-step-icon {
        background: rgba(255,255,255,0.28);
        color: #14b8a6;
    }
    .mv-step-label {
        font-weight: 600;
        font-size: 0.92rem;
    }
    .mv-step-number {
        position: absolute;
        inset: auto auto -10px;
        background: rgba(255,255,255,0.2);
        color: rgba(241,245,249,0.92);
        padding: 3px 10px;
        font-size: 0.75rem;
        border-radius: 999px;
        backdrop-filter: blur(12px);
    }
    .mv-step.is-active .mv-step-number {
        background: linear-gradient(90deg, #4f46e5, #a855f7);
        color: #fff;
    }
    .mv-card {
        background: #f8fafc;
        border-radius: 28px;
        padding: 2.75rem;
        margin-top: 2.5rem;
        box-shadow: 0 36px 70px rgba(15,23,42,0.22);
        position: relative;
    }
    .mv-card-header {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 2rem;
        align-items: center;
    }
    .mv-card-heading small {
        display: block;
        color: #64748b;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 0.4rem;
    }
    .mv-card-heading h2 {
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: 0.35rem;
        color: #0f172a;
    }
    .mv-card-heading p {
        margin: 0;
        color: #475569;
        font-size: 1rem;
    }
    .mv-progress {
        width: 170px;
    }
    .mv-progress-label {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 0.4rem;
        margin-bottom: 0.35rem;
        font-weight: 600;
        color: #475569;
    }
    .mv-progress-track {
        width: 100%;
        height: 8px;
        border-radius: 999px;
        background: #e2e8f0;
        overflow: hidden;
    }
    .mv-progress-bar {
        height: 100%;
        border-radius: 999px;
        background: linear-gradient(90deg, #2563eb, #38bdf8);
        width: 0;
        transition: width 0.35s ease;
    }
    .mv-card-accent {
        width: 70px;
        height: 4px;
        border-radius: 999px;
        margin-top: -0.8rem;
        margin-bottom: 1.8rem;
    }
    .mv-section-title {
        font-weight: 700;
        font-size: 1.35rem;
        margin-bottom: 0.8rem;
        color: #111827;
        display: flex;
        align-items: center;
        gap: 0.65rem;
    }
    .mv-section-title i {
        font-size: 1.2rem;
        color: inherit;
    }
    .mv-section-subtitle {
        color: #64748b;
        margin-bottom: 1.8rem;
        font-size: 0.98rem;
    }
    .mv-knowledge {
        display: flex;
        gap: 1rem;
        background: linear-gradient(135deg, #fef3c7, #fde68a);
        border: 1px solid #fbbf24;
        border-radius: 18px;
        padding: 1.3rem 1.6rem;
        color: #92400e;
        margin-bottom: 2rem;
    }
    .mv-knowledge i {
        font-size: 1.4rem;
    }
    .mv-data-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.2rem;
        margin-bottom: 2.4rem;
    }
    .mv-data-card {
        background: #fff;
        border-radius: 18px;
        border: 1px solid #e2e8f0;
        padding: 1.4rem;
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        min-height: 175px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    .mv-data-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 35px rgba(15,23,42,0.08);
    }
    .mv-data-icon {
        width: 44px;
        height: 44px;
        border-radius: 14px;
        display: grid;
        place-items: center;
        font-size: 1.1rem;
        color: #fff;
        font-weight: 600;
    }
    .mv-data-card h4 {
        font-size: 1.05rem;
        font-weight: 600;
        margin: 0;
        color: #1f2937;
    }
    .mv-data-card p {
        margin: 0;
        font-size: 0.92rem;
        color: #64748b;
        flex: 1;
    }
    .mv-data-card a {
        font-weight: 600;
        color: #2563eb;
        text-decoration: none;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
    }
    .mv-tip-box {
        background: #f8fafc;
        border: 1px solid #dbeafe;
        border-radius: 18px;
        padding: 1.5rem;
        margin-bottom: 2.5rem;
    }
    .mv-tip-box h5 {
        margin: 0 0 1rem;
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-weight: 700;
        color: #1d4ed8;
    }
    .mv-tip-box ul {
        padding-left: 1.1rem;
        margin: 0;
        color: #475569;
        display: grid;
        gap: 0.45rem;
    }
    .mv-form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2.2rem;
    }
    .mv-form-group label {
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 0.45rem;
        display: block;
    }
    .mv-card .form-control {
        border-radius: 14px;
        border: 1px solid #dbe1f1;
        padding: 0.85rem 1.1rem;
        font-size: 0.95rem;
        background: #f8fafc;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .mv-card .form-control:focus {
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,0.12);
        background: #fff;
    }


    .mv-card textarea.form-control {
        min-height: 140px;
        resize: none;
    }

    .mv-input-adornment {
        position: relative;
    }
    .mv-input-adornment span {
        position: absolute;       
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #94a3b8;
        font-weight: 600;
        pointer-events: none;
    }
    .mv-input-adornment input {
        padding-left: 3rem;
    }

    .mv-input-adornment.m-right span {
        left: auto;
        right: 1rem;
        padding-left: 0;
    }

    .mv-input-adornment.m-right input {
        padding-left: 1.1rem;
        padding-right: 3rem;
    }

    .mv-input-adornment-rp {
    position: relative;
    display: inline-block;
    width: 100%;                
    }
    .mv-input-adornment-rp span {
    position: absolute;
    left: 10px;                 
    top: 50%;
    transform: translateY(-50%);
    color: #6b7280;
    pointer-events: none;       
    font-weight: 500;
    }

    .mv-input-adornment-rp input { 
        border-radius: 14px;
        border: 1px solid #dbe1f1;
        padding: 13px 13px 13px 30px;
        font-size: 0.95rem;
        background: #f8fafc;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
    }
    .mv-summary {
        border-radius: 18px;
        padding: 1.4rem 1.6rem;
        border: 1px solid;
        display: flex;
        flex-direction: column;
        gap: 0.4rem;
    }
    .mv-summary strong {
        font-size: 1.4rem;
    }
    .mv-summary span {
        color: #475569;
        font-size: 0.9rem;
    }
    .mv-summary.blue {
        background: #eef6ff;
        border-color: #c7ddff;
        color: #1e40af;
    }
    .mv-summary.orange {
        background: #fff4e5;
        border-color: #ffd7b5;
        color: #c2410c;
    }
    .mv-summary.green {
        background: #ecfdf3;
        border-color: #bbf7d0;
        color: #15803d;
    }
    .mv-reference {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(190px, 1fr));
        gap: 1.1rem;
        margin-bottom: 2rem;
    }
    .mv-reference-card {
        background: rgba(241,245,249,0.75);
        border: 1px solid #dbe3ef;
        border-radius: 18px;
        padding: 1.2rem 1.4rem;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
    }
    .mv-reference-card h6 {
        margin: 0;
        font-size: 0.9rem;
        font-weight: 600;
        color: #475569;
    }
    .mv-reference-card div {
        font-size: 1.1rem;
        font-weight: 700;
        color: #0f172a;
    }
    .mv-footer {
        margin-top: 2.5rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .mv-footer small {
        font-weight: 600;
        color: #64748b;
    }
    .mv-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
    }
    .mv-btn {
        border-radius: 999px;
        padding: 0.85rem 1.4rem;
        font-weight: 600;
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .mv-btn:hover {
        transform: translateY(-2px);
    }
    .mv-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    .mv-btn-secondary {
        background: #fff;
        border: 1px solid #cbd5f5;
        color: #475569;
        width: 46px;
        height: 46px;
        display: grid;
        place-items: center;
        padding: 0;
    }

    .mv-btn-secondary.small {
        width: auto;
        height: auto;
        padding: 0.55rem 1.1rem;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
    }
    .mv-btn-primary {
        color: #fff;
        box-shadow: 0 16px 32px rgba(15,23,42,0.16);
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
    }
    .mv-review-grid {
        display: grid;
        gap: 1.5rem;
        margin-bottom: 2.4rem;
    }
    .mv-review-card {
        border-radius: 20px;
        padding: 1.7rem;
        background: #eef2ff;
        border: 1px solid #d7dcff;
    }
    .mv-review-card h4 {
        margin-bottom: 1rem;
        font-size: 1.2rem;
        font-weight: 700;
        color: #312e81;
    }
    .mv-review-details {
        display: grid;
        gap: 0.65rem;
        color: #4338ca;
    }
    .mv-review-details span {
        display: flex;
        justify-content: space-between;
        font-weight: 600;
    }
    .mv-review-values {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 1rem;
    }
    .mv-review-pill {
        border-radius: 18px;
        padding: 1.1rem 1.3rem;
        font-weight: 700;
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
    }
    .mv-review-pill span {
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-block;
    }
    .mv-review-pill.tam {
        background: #fff1f2;
        color: #be123c;
    }
    .mv-review-pill.sam {
        background: #fff7ed;
        color: #c2410c;
    }
    .mv-review-pill.som {
        background: #f0fdf4;
        color: #15803d;
    }
    .mv-opportunity {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.6rem;
    }
    .mv-opportunity h4 {
        margin-bottom: 0.75rem;
        font-weight: 700;
        color: #0f172a;
    }
    .mv-opportunity p {
        margin: 0;
        color: #475569;
        font-size: 0.95rem;
    }
    .mv-dynamic-list {
        display: grid;
        gap: 0.75rem;
    }
    .mv-dynamic-item {
        position: relative;
    }
    .mv-dynamic-item button {
        position: absolute;
        right: 0.75rem;
        top: 0.75rem;
        border: none;
        background: none;
        color: #ef4444;
        font-weight: 700;
    }
    @media (max-width: 992px) {
        .mv-card {
            padding: 2.2rem;
        }
        .mv-stepper {
            padding: 1.8rem;
        }
    }
    @media (max-width: 768px) {
        .mv-hero h1 {
            font-size: 2.2rem;
        }
        .mv-stepper {
            border-radius: 22px;
        }
        .mv-stepper-line {
            margin-bottom: 1.6rem;
        }
        .mv-steps {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            row-gap: 1.6rem;
        }
        .mv-stepper-header {
            flex-direction: column;
            gap: 0.35rem;
        }
        .mv-card {
            padding: 1.9rem;
        }
        .mv-progress {
            width: 100%;
        }
        .mv-footer {
            flex-direction: column;
            align-items: flex-start;
        }
        .mv-actions {
            width: 100%;
            justify-content: space-between;
        }
        .mv-btn-secondary {
            width: 44px;
            height: 44px;
        }
        .mv-review-grid {
            gap: 1rem;
        }
    }

     /* Navigation Styles */
    .navbar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        box-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
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
</style>
@endsection
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
@section('content')
<div class="mv-page">
    <div class="container mv-container" x-data="mvWizard()" x-init="init()">
        <div class="mv-hero">
            <span>Market Validation Analysis</span>
            <h1>Analisis pasar yang komprehensif untuk validasi bisnis Anda</h1>
            <p>Ikuti langkah demi langkah untuk memetakan TAM, SAM, dan SOM.</p>
        </div>
        <div class="mv-stepper mb-4">
            <div class="mv-stepper-header">
                <div>Langkah <strong x-text="current"></strong> dari <strong x-text="steps.length"></strong></div>
                <div x-text="steps[current-1] ? steps[current-1].label : ''"></div>
            </div>
            <div class="mv-stepper-line">
                <div class="mv-stepper-line-fill" :style="{ width: progressWidth, background: progressGradient }"></div>
            </div>
            <div class="mv-steps">
                <template x-for="step in steps" :key="step.id">
                    <div class="mv-step" :class="{'is-active': current === step.id, 'is-complete': current > step.id}" @click="goTo(step.id)">
                        <div class="mv-step-icon">
                            <template x-if="current > step.id">
                                <i class="fa-solid fa-check"></i>
                            </template>
                            <template x-if="current === step.id">
                                <i :class="step.icon"></i>
                            </template>
                            <template x-if="current < step.id">
                                <i :class="step.icon"></i>
                            </template>
                            <span class="mv-step-number" x-text="step.id"></span>
                        </div>
                        <div class="mv-step-label" x-text="step.label"></div>
                    </div>
                </template>
            </div>
        </div>
        <form method="POST" action="{{ route('tam-sam-som.store') }}" x-ref="wizardForm" @submit.prevent="handleSubmit">
            @csrf
            <div class="mv-card">
                <div class="mv-card-header">
                    <div class="mv-card-heading">
                        <small x-text="'Langkah ' + current + ' dari ' + steps.length"></small>
                        <h2 x-text="steps[current-1] ? steps[current-1].title : ''"></h2>
                        <p x-text="steps[current-1] ? steps[current-1].subtitle : ''"></p>
                    </div>
                    <div class="mv-progress">
                        <div class="mv-progress-label">
                            <span x-text="progressLabel"></span>
                        </div>
                        <div class="mv-progress-track">
                            <div class="mv-progress-bar" :style="{width: progressWidth, background: progressGradient}"></div>
                        </div>
                    </div>
                </div>
                <div class="mv-card-accent" :style="{background: accentColor}"></div>
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger mb-3">{{ session('error') }}</div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success mb-3">{{ session('success') }}</div>
                @endif

                <div class="alert alert-warning mb-3" x-cloak x-show="stepError" x-text="stepError"></div>

                <div>
                    <template x-if="current === 1">
                        <div>
                            <div class="mv-section-title">
                                <i class="fa-solid fa-circle-info text-primary"></i>
                                Informasi Bisnis
                            </div>
                            <p class="mv-section-subtitle">Mulai dengan informasi dasar tentang bisnis Anda sebelum menghitung potensi pasar.</p>
                            <div class="mv-form-grid">
                                <div class="mv-form-group">
                                    <label for="business_name">Nama Bisnis</label>
                                    <input type="text" id="business_name" name="business_name" class="form-control" placeholder="Contoh: EduTech Platform" x-model="business.name" required>
                                </div>
                                <div class="mv-form-group">
                                    <label for="owner_name">Nama Pemilik</label>
                                    <input type="text" id="owner_name" name="owner_name" class="form-control" placeholder="Contoh: Ahmad Rizki" x-model="business.owner" required>
                                </div>
                                <div class="mv-form-group">
                                    <label for="industry">Industri</label>
                                    <select name="industry" class="form-control" x-model="business.industry" required>
                                        <option value="">Pilih Industri</option>
                                        <option value="Technology">Technology</option>
                                        <option value="Education Technology">Education Technology</option>
                                        <option value="Healthcare">Healthcare</option>
                                        <option value="Financial Services">Financial Services</option>
                                        <option value="E-commerce">E-commerce</option>
                                        <option value="Food & Beverage">Food & Beverage</option>
                                        <option value="Retail">Retail</option>
                                        <option value="Manufacturing">Manufacturing</option>
                                        <option value="Real Estate">Real Estate</option>
                                        <option value="Transportation & Logistics">Transportation & Logistics</option>
                                        <option value="Entertainment & Media">Entertainment & Media</option>
                                        <option value="Energy & Utilities">Energy & Utilities</option>
                                        <option value="Agriculture">Agriculture</option>
                                        <option value="Tourism & Hospitality">Tourism & Hospitality</option>
                                        <option value="Professional Services">Professional Services</option>
                                        <option value="Construction">Construction</option>
                                        <option value="Automotive">Automotive</option>
                                        <option value="Fashion & Beauty">Fashion & Beauty</option>
                                        <option value="Sports & Fitness">Sports & Fitness</option>
                                        <option value="Gaming">Gaming</option>
                                        <option value="Social Media">Social Media</option>
                                        <option value="Consulting">Consulting</option>
                                        <option value="Non-profit">Non-profit</option>
                                        <option value="Government">Government</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mv-form-group">
                                    <label for="location">Lokasi</label>
                                    <input type="text" id="location" name="location" class="form-control" placeholder="Contoh: Jakarta, Indonesia" x-model="business.location" required>
                                </div>
                            </div>
                        </div>
                    </template>
                                        <template x-if="current === 2">
                        <div>
                            <div class="mv-section-title" style="color:#b91c1c;">
                                <i class="fa-solid fa-chart-line"></i>
                                TAM - Total Addressable Market
                            </div>
                            <p class="mv-section-subtitle">Berapa besar total pasar jika 100% target audience membeli produk Anda?</p>
                            <div class="mv-knowledge">
                                <i class="fa-solid fa-circle-info"></i>
                                <div>
                                    <strong>Apa itu TAM?</strong>
                                    <div>TAM adalah total ukuran pasar yang tersedia untuk produk atau layanan Anda jika Anda mencapai 100% pangsa pasar.</div>
                                </div>
                            </div>
                            <h5 class="fw-semibold mb-3 text-uppercase" style="letter-spacing:0.08em;color:#b91c1c;">
                                Sumber Data untuk TAM
                            </h5>
                            <div class="mv-data-grid">
                                <template x-for="source in sources.tam" :key="source.title">
                                    <div class="mv-data-card">
                                        <div class="mv-data-icon" :style="{background: source.color}">
                                            <i :class="source.icon"></i>
                                        </div>
                                        <h4 x-text="source.title"></h4>
                                        <p x-text="source.description"></p>
                                        <a :href="source.url" target="_blank" rel="noopener">
                                            Kunjungi <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </div>
                                </template>
                            </div>
                            <div class="mv-tip-box">
                                <h5><i class="fa-solid fa-lightbulb"></i>Tips Menghitung TAM</h5>
                                <ul>
                                    <li>Identifikasi total populasi target pasar Anda secara menyeluruh.</li>
                                    <li>Hitung nilai rata-rata per transaksi atau per pelanggan.</li>
                                    <li>Kalkulasi jumlah pasar dengan nilai per unit untuk mendapatkan TAM.</li>
                                    <li>Gunakan data historis dan laporan industri terbaru sebagai acuan.</li>
                                </ul>
                            </div>
                            <div class="mv-form-grid">
                                <div class="mv-form-group" style="grid-column: 1 / -1;">
                                    <label for="tam_description">Deskripsi TAM</label>
                                    <textarea id="tam_description" name="tam_description" class="form-control" placeholder="Jelaskan total pasar yang dapat dialamatkan..." x-model="tam.description" required></textarea>
                                </div>
                                <div class="mv-form-group">
                                    <label for="tam_market_size">Jumlah Total Pasar</label>
                                    <input type="text" inputmode="numeric" id="tam_market_size" name="tam_market_size_raw" class="form-control" placeholder="0" x-model="tam.qty" @input="calc" data-format-thousand required>
                                </div>
                                <div class="mv-form-group">
                                    <label class="" for="tam_unit_value">Nilai per Unit</label>
                                    <div class="mv-input-adornment-rp">
                                        <span>Rp</span>
                                        <input type="text" inputmode="numeric" id="tam_unit_value" name="tam_unit_value" placeholder="0" x-model="tam.unit" @input="calc" data-format-thousand required>
                                    </div>
                                </div>
                                <div class="mv-form-group" style="grid-column: 1 / -1;">
                                    <div class="mv-summary blue">
                                        <span>Total Nilai TAM</span>
                                        <strong x-text="formatCurrency(tam.total)"></strong>
                                        <span>Jumlah Pasar x Nilai per Unit</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="current === 3">
                        <div>
                            <div class="mv-section-title" style="color:#ea580c;">
                                <i class="fa-solid fa-users"></i>
                                SAM - Serviceable Available Market
                            </div>
                            <p class="mv-section-subtitle">Bagian dari TAM yang dapat Anda layani berdasarkan model bisnis, lokasi, dan kemampuan operasional.</p>
                            <div class="mv-knowledge" style="background:linear-gradient(135deg,#fef3c7,#fde68a);border-color:#f59e0b;color:#92400e;">
                                <i class="fa-solid fa-circle-info"></i>
                                <div>
                                    <strong>Apa itu SAM?</strong>
                                    <div>SAM adalah segmen dari TAM yang dapat Anda layani dengan efektif sesuai kapabilitas distribusi serta ruang lingkup bisnis saat ini.</div>
                                </div>
                            </div>
                            <h5 class="fw-semibold mb-3 text-uppercase" style="letter-spacing:0.08em;color:#ea580c;">
                                Sumber Data untuk SAM
                            </h5>
                            <div class="mv-data-grid">
                                <template x-for="source in sources.sam" :key="source.title">
                                    <div class="mv-data-card">
                                        <div class="mv-data-icon" :style="{background: source.color}">
                                            <i :class="source.icon"></i>
                                        </div>
                                        <h4 x-text="source.title"></h4>
                                        <p x-text="source.description"></p>
                                        <a :href="source.url" target="_blank" rel="noopener">
                                            Kunjungi <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </div>
                                </template>
                            </div>
                            <div class="mv-tip-box" style="border-color:#fed7aa;">
                                <h5 style="color:#ea580c;"><i class="fa-solid fa-compass"></i>Tips Menentukan SAM</h5>
                                <ul>
                                    <li>Pertimbangkan jangkauan geografis operasional Anda saat ini.</li>
                                    <li>Sesuaikan analisis demografi dengan produk atau layanan.</li>
                                    <li>Evaluasi kapasitas produksi dan kemampuan distribusi.</li>
                                    <li>Gunakan data penetrasi teknologi atau estimasi realistis sejenis.</li>
                                </ul>
                            </div>
                            <div class="mv-reference">
                                <div class="mv-reference-card">
                                    <h6>Total Nilai TAM</h6>
                                    <div x-text="formatCurrency(tam.total)"></div>
                                </div>
                                <div class="mv-reference-card">
                                    <h6>Jumlah Pasar TAM</h6>
                                    <div x-text="formatNumber(tam.qty) + ' unit'"></div>
                                </div>
                                <div class="mv-reference-card">
                                    <h6>Nilai per Unit TAM</h6>
                                    <div x-text="formatCurrency(tam.unit)"></div>
                                </div>
                            </div>
                            <div class="mv-form-grid">
                                <div class="mv-form-group" style="grid-column: 1 / -1;">
                                    <label for="sam_description">Deskripsi SAM</label>
                                    <textarea id="sam_description" name="sam_description" class="form-control" placeholder="Jelaskan target pasar yang dapat Anda layani..." x-model="sam.description" required></textarea>
                                </div>
                                <div class="mv-form-group">
                                    <label for="sam_percentage">Persentase dari TAM</label>
                                    <div class="mv-input-adornment m-right">
                                        <input type="number" min="0" max="100" id="sam_percentage" name="sam_percentage" class="form-control" placeholder="0" x-model.number="sam.percentage" @input="calc" required>
                                        <span>%</span>
                                    </div>
                                </div>
                                <div class="mv-form-group" style="grid-column: 1 / -1;">
                                    <div class="mv-summary orange">
                                        <span>Total Nilai SAM</span>
                                        <strong x-text="formatCurrency(sam.total)"></strong>
                                        <span>TAM x Persentase SAM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="current === 4">
                        <div>
                            <div class="mv-section-title" style="color:#16a34a;">
                                <i class="fa-solid fa-bullseye"></i>
                                SOM - Serviceable Obtainable Market
                            </div>
                            <p class="mv-section-subtitle">Bagian dari SAM yang realistis dapat Anda raih dalam jangka waktu tertentu berdasarkan kompetisi dan strategi.</p>
                            <div class="mv-knowledge" style="background:linear-gradient(135deg,#dcfce7,#bbf7d0);border-color:#22c55e;color:#065f46;">
                                <i class="fa-solid fa-circle-info"></i>
                                <div>
                                    <strong>Apa itu SOM?</strong>
                                    <div>SOM adalah porsi realistis dari SAM yang dapat dicapai dalam jangka pendek menimbang kompetisi, anggaran, serta kapasitas eksekusi.</div>
                                </div>
                            </div>
                            <h5 class="fw-semibold mb-3 text-uppercase" style="letter-spacing:0.08em;color:#16a34a;">
                                Sumber Data untuk SOM
                            </h5>
                            <div class="mv-data-grid">
                                <template x-for="source in sources.som" :key="source.title">
                                    <div class="mv-data-card">
                                        <div class="mv-data-icon" :style="{background: source.color}">
                                            <i :class="source.icon"></i>
                                        </div>
                                        <h4 x-text="source.title"></h4>
                                        <p x-text="source.description"></p>
                                        <a :href="source.url" target="_blank" rel="noopener">
                                            Kunjungi <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                        </a>
                                    </div>
                                </template>
                            </div>
                            <div class="mv-tip-box" style="border-color:#bbf7d0;">
                                <h5 style="color:#16a34a;"><i class="fa-solid fa-leaf"></i>Tips Menentukan SOM</h5>
                                <ul>
                                    <li>Analisis market share kompetitor utama dan insight pelanggan.</li>
                                    <li>Evaluasi kapasitas produksi, penjualan, dan channel distribusi.</li>
                                    <li>Pertimbangkan budget marketing serta SLA layanan.</li>
                                    <li>Gunakan data historis pertumbuhan startup sejenis sebagai pembanding.</li>
                                </ul>
                            </div>
                            <div class="mv-reference">
                                <div class="mv-reference-card">
                                    <h6>Total Nilai SAM</h6>
                                    <div x-text="formatCurrency(sam.total)"></div>
                                </div>
                                <div class="mv-reference-card">
                                    <h6>Jumlah Pasar SAM</h6>
                                    <div x-text="formatNumber(sam.marketSize) + ' unit'"></div>
                                </div>
                                <div class="mv-reference-card">
                                    <h6>Persentase SAM</h6>
                                    <div x-text="formatNumber(sam.percentage) + '%'"></div>
                                </div>
                            </div>
                            <div class="mv-form-grid">
                                <div class="mv-form-group" style="grid-column: 1 / -1;">
                                    <label for="som_description">Deskripsi SOM</label>
                                    <textarea id="som_description" name="som_description" class="form-control" placeholder="Jelaskan pasar realistis yang dapat Anda peroleh..." x-model="som.description" required></textarea>
                                </div>
                                <div class="mv-form-group">
                                    <label for="som_percentage">Persentase dari SAM</label>
                                    <div class="mv-input-adornment m-right">
                                        <input type="number" min="0" max="100" id="som_percentage" name="som_percentage" class="form-control" placeholder="0" x-model.number="som.percentage" @input="calc" required>
                                        <span>%</span>
                                    </div>
                                </div>
                                <div class="mv-form-group" style="grid-column: 1 / -1;">
                                    <div class="mv-summary green">
                                        <span>Total Nilai SOM</span>
                                        <strong x-text="formatCurrency(som.total)"></strong>
                                        <span>SAM x Persentase SOM</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                    <template x-if="current === 5">
                        <div>
                            <div class="mv-section-title" style="color:#7c3aed;">
                                <i class="fa-solid fa-clipboard-check"></i>
                                Review &amp; Ringkasan
                            </div>
                            <p class="mv-section-subtitle">Tinjau kembali semua informasi yang telah Anda masukkan sebelum menyelesaikan analisis Market Validation.</p>
                            <div class="mv-review-grid">
                                <div class="mv-review-card">
                                    <h4>Info Bisnis</h4>
                                    <div class="mv-review-details">
                                        <span><span>Nama:</span> <span x-text="business.name || '-'"></span></span>
                                        <span><span>Pemilik:</span> <span x-text="business.owner || '-'"></span></span>
                                        <span><span>Industri:</span> <span x-text="business.industry || '-'"></span></span>
                                        <span><span>Lokasi:</span> <span x-text="business.location || '-'"></span></span>
                                    </div>
                                </div>
                                <div class="mv-review-values">
                                    <div class="mv-review-pill tam">
                                        <span>TAM</span>
                                        <strong x-text="formatCurrency(tam.total)"></strong>
                                    </div>
                                    <div class="mv-review-pill sam">
                                        <span>SAM (<span x-text="formatNumber(sam.percentage)"></span>%)</span>
                                        <strong x-text="formatCurrency(sam.total)"></strong>
                                    </div>
                                    <div class="mv-review-pill som">
                                        <span>SOM (<span x-text="formatNumber(som.percentage)"></span>%)</span>
                                        <strong x-text="formatCurrency(som.total)"></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>
                <div class="mv-footer">
                    <small x-text="'Langkah ' + current + ' dari ' + steps.length"></small>
                    <div class="mv-actions">
                        <button type="button" class="mv-btn mv-btn-secondary" @click="prev" :disabled="current === 1">
                            <i class="fa-solid fa-arrow-left"></i>
                        </button>
                        <button type="button" class="mv-btn mv-btn-primary" :style="{background: buttonGradient}" @click="next" x-show="current < steps.length">
                            Selanjutnya <i class="fa-solid fa-arrow-right"></i>
                        </button>
                        <button type="submit" class="mv-btn mv-btn-primary" :style="{background: buttonGradient}" x-show="current === steps.length">
                            Selesai <i class="fa-solid fa-check"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" name="business_name" :value="stringValue(business.name)">
                <input type="hidden" name="owner_name" :value="stringValue(business.owner)">
                <input type="hidden" name="industry" :value="stringValue(business.industry)">
                <input type="hidden" name="location" :value="stringValue(business.location)">
                <input type="hidden" name="tam_description" :value="stringValue(tam.description)">
                <input type="hidden" name="tam_market_size_raw" :value="numericValue(tam.qty)">
                <input type="hidden" name="tam_unit_value" :value="numericValue(tam.unit)">
                <input type="hidden" name="tam_value" :value="numericValue(tam.total)">
                <input type="hidden" name="sam_description" :value="stringValue(sam.description)">
                <input type="hidden" name="sam_percentage" :value="numericValue(sam.percentage)">
                <input type="hidden" name="sam_market_size" :value="numericValue(sam.marketSize)">
                <input type="hidden" name="sam_value" :value="numericValue(sam.total)">
                <input type="hidden" name="som_description" :value="stringValue(som.description)">
                <input type="hidden" name="som_percentage" :value="numericValue(som.percentage)">
                <input type="hidden" name="som_market_size" :value="numericValue(som.marketSize)">
                <input type="hidden" name="som_value" :value="numericValue(som.total)">
                <template x-for="(assumption, index) in marketAssumptions" :key="'assumption-' + index">
                    <input type="hidden" name="market_assumptions[]" :value="stringValue(assumption)">
                </template>
                <template x-for="(projection, index) in growthProjections" :key="'projection-' + index">
                    <input type="hidden" name="growth_projections[]" :value="stringValue(projection)">
                </template>
            </div>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function mvWizard(defaults = {}) {
        const toNumber = (value) => {
            if (typeof value === 'number') {
                return Number.isFinite(value) ? value : 0;
            }
            if (typeof value === 'string') {
                const trimmed = value.trim();
                if (!trimmed) {
                    return 0;
                }
                let normalized = trimmed.replace(/[^0-9,.-]/g, '');
                const idThousandPattern = /^-?\d{1,3}(\.\d{3})*(,\d+)?$/;
                const plainCommaDecimalPattern = /^-?\d+(,\d+)?$/;
                if (idThousandPattern.test(normalized)) {
                    normalized = normalized.replace(/\./g, '').replace(',', '.');
                } else if (plainCommaDecimalPattern.test(normalized)) {
                    normalized = normalized.replace(',', '.');
                }
                const number = Number(normalized);
                return Number.isFinite(number) ? number : 0;
            }
            const number = Number(value);
            return Number.isFinite(number) ? number : 0;
        };

        const clampPercentage = (value) => {
            if (value === '' || value === null || (typeof value === 'string' && value.trim() === '')) {
                return '';
            }
            const numeric = toNumber(value);
            if (!Number.isFinite(numeric)) {
                return 0;
            }
            if (numeric < 0) {
                return 0;
            }
            if (numeric > 100) {
                return 100;
            }
            return numeric;
        };

        const sanitizeArray = (value) => {
            if (!Array.isArray(value)) {
                return [''];
            }
            const mapped = value.map((item) => (item ?? '').toString());
            return mapped.length ? mapped : [''];
        };

        const getString = (value) => (value ?? '').toString();
        const trim = (value) => (value ?? '').toString().trim();

        const businessDefaults = defaults.business || {};
        const tamDefaults = defaults.tam || {};
        const samDefaults = defaults.sam || {};
        const somDefaults = defaults.som || {};

        return {
            current: toNumber(defaults.current) || 1,
            steps: [
                { id: 1, label: 'Info Bisnis', title: 'Langkah 1 dari 5 - Info Bisnis', subtitle: 'Mulai dengan informasi dasar tentang bisnis Anda.', icon: 'fa-solid fa-circle-info' },
                { id: 2, label: 'TAM', title: 'Langkah 2 dari 5 - TAM', subtitle: 'Hitung total pasar potensial secara menyeluruh.', icon: 'fa-solid fa-chart-line' },
                { id: 3, label: 'SAM', title: 'Langkah 3 dari 5 - SAM', subtitle: 'Identifikasi pasar yang dapat Anda layani saat ini.', icon: 'fa-solid fa-users' },
                { id: 4, label: 'SOM', title: 'Langkah 4 dari 5 - SOM', subtitle: 'Persempit pada target realistis yang dapat dicapai.', icon: 'fa-solid fa-bullseye' },
                { id: 5, label: 'Review', title: 'Langkah 5 dari 5 - Review', subtitle: 'Tinjau ulang semua input sebelum menyelesaikan.', icon: 'fa-solid fa-clipboard-check' }
            ],
            business: {
                name: getString(businessDefaults.name),
                owner: getString(businessDefaults.owner),
                industry: getString(businessDefaults.industry),
                location: getString(businessDefaults.location)
            },
            tam: {
                description: getString(tamDefaults.description),
                qty: toNumber(tamDefaults.qty),
                unit: toNumber(tamDefaults.unit),
                total: toNumber(tamDefaults.total)
            },
            sam: {
                description: getString(samDefaults.description),
                percentage: samDefaults.percentage === '' ? '' : toNumber(samDefaults.percentage),
                marketSize: toNumber(samDefaults.marketSize),
                total: toNumber(samDefaults.total)
            },
            som: {
                description: getString(somDefaults.description),
                percentage: somDefaults.percentage === '' ? '' : toNumber(somDefaults.percentage),
                marketSize: toNumber(somDefaults.marketSize),
                total: toNumber(somDefaults.total)
            },
            marketAssumptions: sanitizeArray(defaults.marketAssumptions),
            growthProjections: sanitizeArray(defaults.growthProjections),
            stepError: '',
            sources: {
                tam: [
                    { title: 'BPS', description: 'Data demografi dan ekonomi nasional terbaru.', url: 'https://www.bps.go.id', color: 'linear-gradient(135deg,#2563eb,#3b82f6)', icon: 'fa-solid fa-building-columns' },
                    { title: 'Kemenperin', description: 'Data sektor industri dan manufaktur Indonesia.', url: 'https://kemenperin.go.id', color: 'linear-gradient(135deg,#1d4ed8,#22d3ee)', icon: 'fa-solid fa-industry' },
                    { title: 'Statista', description: 'Basis data statistik global dan riset pasar.', url: 'https://www.statista.com', color: 'linear-gradient(135deg,#db2777,#f97316)', icon: 'fa-solid fa-chart-pie' },
                    { title: 'We Are Social', description: 'Laporan digital dan tren media sosial tahunan.', url: 'https://wearesocial.com', color: 'linear-gradient(135deg,#7c3aed,#c084fc)', icon: 'fa-solid fa-share-nodes' },
                    { title: 'Google Trends', description: 'Analisis volume pencarian dan minat pasar.', url: 'https://trends.google.com', color: 'linear-gradient(135deg,#0f172a,#38bdf8)', icon: 'fa-solid fa-magnifying-glass-chart' },
                    { title: 'Asosiasi Industri', description: 'Data khusus industri melalui asosiasi terkait.', url: 'https://kemenperin.go.id/daftar-api', color: 'linear-gradient(135deg,#ea580c,#f97316)', icon: 'fa-solid fa-network-wired' }
                ],
                sam: [
                    { title: 'Data Geografis BPS', description: 'Populasi dan ekonomi per provinsi/kota.', url: 'https://www.bps.go.id', color: 'linear-gradient(135deg,#2563eb,#60a5fa)', icon: 'fa-solid fa-map-location-dot' },
                    { title: 'APJII Internet Report', description: 'Penetrasi internet dan demografi digital.', url: 'https://apjii.or.id', color: 'linear-gradient(135deg,#059669,#34d399)', icon: 'fa-solid fa-wifi' },
                    { title: 'E-commerce Indonesia', description: 'Perilaku belanja dan penetrasi e-commerce.', url: 'https://idn-media.com', color: 'linear-gradient(135deg,#f97316,#fb923c)', icon: 'fa-solid fa-cart-shopping' },
                    { title: 'Data Pendidikan', description: 'Statistik pendidikan dan literasi digital.', url: 'https://pusdatin.kemdikbud.go.id', color: 'linear-gradient(135deg,#7c3aed,#a855f7)', icon: 'fa-solid fa-graduation-cap' },
                    { title: 'McKinsey Indonesia', description: 'Laporan ekonomi dan konsumen Indonesia.', url: 'https://www.mckinsey.com/id', color: 'linear-gradient(135deg,#1e293b,#0ea5e9)', icon: 'fa-solid fa-briefcase' },
                    { title: 'Survei Konsumen', description: 'Data Ipsos, Nielsen, dan Roy Morgan.', url: 'https://www.nielsen.com/id', color: 'linear-gradient(135deg,#b91c1c,#ef4444)', icon: 'fa-solid fa-person-circle-check' }
                ],
                som: [
                    { title: 'Google Search Console', description: 'Analisis kompetitor dan kata kunci populer.', url: 'https://search.google.com/search-console', color: 'linear-gradient(135deg,#2563eb,#22d3ee)', icon: 'fa-solid fa-chart-column' },
                    { title: 'SimilarWeb', description: 'Analisis traffic dan market share kompetitor.', url: 'https://www.similarweb.com', color: 'linear-gradient(135deg,#059669,#10b981)', icon: 'fa-solid fa-globe' },
                    { title: 'Crunchbase', description: 'Database startup dan pendanaan kompetitor.', url: 'https://www.crunchbase.com', color: 'linear-gradient(135deg,#7c3aed,#c084fc)', icon: 'fa-solid fa-seedling' },
                    { title: 'Tech in Asia', description: 'Berita industri dan perkembangan kompetitor.', url: 'https://www.techinasia.com', color: 'linear-gradient(135deg,#dc2626,#f97316)', icon: 'fa-solid fa-newspaper' },
                    { title: 'Socialbakers', description: 'Analitik engagement dan audiens sosial.', url: 'https://www.socialbakers.com', color: 'linear-gradient(135deg,#4f46e5,#6366f1)', icon: 'fa-solid fa-users-gear' },
                    { title: 'Market Research Reports', description: 'Laporan Frost & Sullivan, Gartner, lainnya.', url: 'https://www.gartner.com', color: 'linear-gradient(135deg,#0f172a,#3f6212)', icon: 'fa-solid fa-file-chart-column' }
                ]
            },
            accentColors: {
                1: '#3b82f6',
                2: '#ef4444',
                3: '#f97316',
                4: '#22c55e',
                5: '#8b5cf6'
            },
            buttonGradientsMap: {
                1: 'linear-gradient(90deg,#2563eb,#38bdf8)',
                2: 'linear-gradient(90deg,#ef4444,#f97316)',
                3: 'linear-gradient(90deg,#f97316,#facc15)',
                4: 'linear-gradient(90deg,#22c55e,#0ea5e9)',
                5: 'linear-gradient(90deg,#8b5cf6,#ec4899)'
            },
            progressGradientMap: {
                1: 'linear-gradient(90deg,#2563eb,#38bdf8)',
                2: 'linear-gradient(90deg,#ef4444,#fb7185)',
                3: 'linear-gradient(90deg,#f59e0b,#f97316)',
                4: 'linear-gradient(90deg,#22c55e,#14b8a6)',
                5: 'linear-gradient(90deg,#8b5cf6,#a855f7)'
            },
            stringValue(value) {
                return (value ?? '').toString().trim();
            },
            numericValue(value) {
                const raw = this.stringValue(value);
                if (!raw.length) {
                    return '';
                }
                const numeric = toNumber(raw);
                return Number.isFinite(numeric) ? numeric : '';
            },
            init() {
                if (this.current < 1) {
                    this.current = 1;
                }
                if (this.current > this.steps.length) {
                    this.current = this.steps.length;
                }
                this.calc();
            },
            next() {
                this.calc();
                if (!this.validateStep(this.current)) {
                    return;
                }
                if (this.current < this.steps.length) {
                    this.current += 1;
                    this.stepError = '';
                    this.scrollToCard();
                }
            },
            prev() {
                if (this.current > 1) {
                    this.current -= 1;
                    this.stepError = '';
                    this.scrollToCard();
                }
            },
            goTo(stepId) {
                if (stepId === this.current || stepId < 1 || stepId > this.steps.length) {
                    return;
                }
                this.calc();
                if (stepId > this.current) {
                    for (let step = this.current; step < stepId; step += 1) {
                        if (!this.validateStep(step)) {
                            return;
                        }
                    }
                }
                this.current = stepId;
                this.stepError = '';
                this.scrollToCard();
            },
            handleSubmit() {
                this.calc();
                for (let step = 1; step <= this.steps.length; step += 1) {
                    if (!this.validateStep(step, true)) {
                        this.current = step;
                        this.scrollToCard();
                        return;
                    }
                }
                this.stepError = '';
                this.$refs.wizardForm.submit();
            },
            calc() {
                const qty = toNumber(this.tam.qty);
                const unit = toNumber(this.tam.unit);
                this.tam.total = qty > 0 && unit > 0 ? Math.round(qty * unit) : 0;

                const samPct = clampPercentage(this.sam.percentage);
                this.sam.percentage = samPct;
                const samRatio = typeof samPct === 'number' ? samPct / 100 : 0;
                this.sam.marketSize = qty > 0 ? Math.round(qty * samRatio) : 0;
                this.sam.total = this.tam.total > 0 ? Math.round(this.tam.total * samRatio) : 0;

                const somPct = clampPercentage(this.som.percentage);
                this.som.percentage = somPct;
                const somRatio = typeof somPct === 'number' ? somPct / 100 : 0;
                this.som.marketSize = this.sam.marketSize > 0 ? Math.round(this.sam.marketSize * somRatio) : 0;
                this.som.total = this.sam.total > 0 ? Math.round(this.sam.total * somRatio) : 0;
            },
            validateStep(step, silent = false) {
                const errors = [];

                switch (step) {
                    case 1:
                        if (!trim(this.business.name)) errors.push('Nama bisnis wajib diisi.');
                        if (!trim(this.business.owner)) errors.push('Nama pemilik wajib diisi.');
                        if (!trim(this.business.industry)) errors.push('Industri wajib diisi.');
                        if (!trim(this.business.location)) errors.push('Lokasi wajib diisi.');
                        break;
                    case 2:
                        if (!trim(this.tam.description)) errors.push('Deskripsi TAM wajib diisi.');
                        if (toNumber(this.tam.qty) <= 0) errors.push('Jumlah total pasar harus lebih dari 0.');
                        if (toNumber(this.tam.unit) <= 0) errors.push('Nilai per unit TAM harus lebih dari 0.');
                        break;
                    case 3:
                        if (!trim(this.sam.description)) errors.push('Deskripsi SAM wajib diisi.');
                        if (this.tam.total <= 0) errors.push('Lengkapi data TAM terlebih dahulu.');
                        if (this.sam.percentage === '' || this.sam.percentage === null) {
                            errors.push('Persentase SAM wajib diisi.');
                        } else {
                            const samPctValue = toNumber(this.sam.percentage);
                            if (samPctValue < 0 || samPctValue > 100) {
                                errors.push('Persentase SAM harus berada di antara 0 hingga 100.');
                            }
                        }
                        break;
                    case 4:
                        if (!trim(this.som.description)) errors.push('Deskripsi SOM wajib diisi.');
                        if (this.sam.total <= 0) errors.push('Lengkapi data SAM terlebih dahulu.');
                        if (this.som.percentage === '' || this.som.percentage === null) {
                            errors.push('Persentase SOM wajib diisi.');
                        } else {
                            const somPctValue = toNumber(this.som.percentage);
                            if (somPctValue < 0 || somPctValue > 100) {
                                errors.push('Persentase SOM harus berada di antara 0 hingga 100.');
                            }
                        }
                        break;
                    default:
                        break;
                }

                if (errors.length) {
                    if (!silent || step === this.current) {
                        this.stepError = errors[0];
                    }
                    return false;
                }

                if (!silent && step === this.current) {
                    this.stepError = '';
                }

                return true;
            },
            addAssumption() {
                this.marketAssumptions.push('');
            },
            removeAssumption(index) {
                if (this.marketAssumptions.length > 1) {
                    this.marketAssumptions.splice(index, 1);
                } else {
                    this.marketAssumptions[0] = '';
                }
            },
            addGrowth() {
                this.growthProjections.push('');
            },
            removeGrowth(index) {
                if (this.growthProjections.length > 1) {
                    this.growthProjections.splice(index, 1);
                } else {
                    this.growthProjections[0] = '';
                }
            },
            formatCurrency(value) {
                const number = toNumber(value);
                return 'Rp ' + number.toLocaleString('id-ID');
            },
            formatNumber(value) {
                const number = toNumber(value);
                return number.toLocaleString('id-ID');
            },
            get progressLabel() {
                return Math.round((this.current / this.steps.length) * 100) + '%';
            },
            get progressWidth() {
                return (this.current / this.steps.length) * 100 + '%';
            },
            get accentColor() {
                return this.accentColors[this.current] || '#6366f1';
            },
            get buttonGradient() {
                return this.buttonGradientsMap[this.current] || this.buttonGradientsMap[1];
            },
            get progressGradient() {
                return this.progressGradientMap[this.current] || this.progressGradientMap[1];
            },
            scrollToCard() {
                const top = document.querySelector('.mv-card');
                if (top) {
                    top.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }
        };
    }

    document.addEventListener('DOMContentLoaded', () => {
    const formatter = new Intl.NumberFormat('id-ID');

    document.querySelectorAll('[data-format-thousand]').forEach((input) => {
        const setCaret = (el, digitIndex) => {
            if (!el.setSelectionRange) return;
            if (digitIndex <= 0) {
                el.setSelectionRange(0, 0);
                return;
            }
            let caret = 0;
            let digitsSeen = 0;
            while (caret < el.value.length) {
                if (/\d/.test(el.value[caret])) {
                    digitsSeen += 1;
                    if (digitsSeen === digitIndex) {
                        caret += 1;
                        break;
                    }
                }
                caret += 1;
            }
            el.setSelectionRange(caret, caret);
        };

        const formatValue = (el) => {
            const selectionStart = el.selectionStart ?? el.value.length;
            const digitsLeft = el.value.slice(0, selectionStart).replace(/\D/g, '').length;
            const numeric = el.value.replace(/\D/g, '');

            if (!numeric) {
                el.value = '';
                return setCaret(el, 0);
            }

            el.value = formatter.format(Number(numeric));
            setCaret(el, digitsLeft);
        };

        input.addEventListener('input', () => formatValue(input));
        input.addEventListener('blur', () => formatValue(input));

        input.form?.addEventListener('submit', () => {
            input.value = input.value.replace(/\D/g, '');
        });

        formatValue(input);
    });
});
</script>
@endsection
