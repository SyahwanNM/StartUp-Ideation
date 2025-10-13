<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Validation - {{ $data['business_name'] ?? 'Document' }}</title>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #2c3e50;
            line-height: 1.6;
            background: white;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1rem;
            opacity: 0.9;
        }

        .generation-info {
            background: rgba(255,255,255,0.2);
            border-radius: 10px;
            padding: 10px 15px;
            margin-top: 15px;
            display: inline-block;
            font-size: 0.9rem;
        }

        /* Business Info */
        .business-info {
            background: #f8fafc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            border: 1px solid #e2e8f0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-label {
            font-size: 0.8rem;
            color: #718096;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 1rem;
            color: #2d3748;
            font-weight: 600;
        }

        /* Market Cards */
        .market-section {
            margin-bottom: 30px;
        }

        .market-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .market-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            border: 2px solid #e2e8f0;
            position: relative;
        }

        .market-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            border-radius: 10px 10px 0 0;
        }

        .market-card.tam::before {
            background: #ef4444;
        }

        .market-card.sam::before {
            background: #3b82f6;
        }

        .market-card.som::before {
            background: #10b981;
        }

        .market-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
            padding: 5px 10px;
            border-radius: 15px;
            display: inline-block;
        }

        .market-card.tam .market-label {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
        }

        .market-card.sam .market-label {
            color: #3b82f6;
            background: rgba(59, 130, 246, 0.1);
        }

        .market-card.som .market-label {
            color: #10b981;
            background: rgba(16, 185, 129, 0.1);
        }

        .market-title {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .market-value {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            padding-left: 10px;
        }

        .market-value::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 70%;
            border-radius: 2px;
        }

        .market-card.tam .market-value {
            color: #ef4444;
        }

        .market-card.tam .market-value::before {
            background: #ef4444;
        }

        .market-card.sam .market-value {
            color: #3b82f6;
        }

        .market-card.sam .market-value::before {
            background: #3b82f6;
        }

        .market-card.som .market-value {
            color: #10b981;
        }

        .market-card.som .market-value::before {
            background: #10b981;
        }

        .market-meta {
            display: flex;
            gap: 15px;
            padding: 10px;
            border-radius: 8px;
            margin-top: 10px;
            background: #f8fafc;
        }

        .meta-item {
            flex: 1;
            text-align: center;
        }

        .meta-label {
            font-size: 0.7rem;
            color: #718096;
            margin-bottom: 3px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .meta-value {
            font-size: 0.9rem;
            font-weight: 700;
            color: #2d3748;
        }

        .market-desc {
            font-size: 0.8rem;
            color: #4a5568;
            line-height: 1.5;
            margin-top: 10px;
            padding: 10px;
            background: #f8fafc;
            border-radius: 8px;
            border-left: 3px solid #e2e8f0;
        }

        /* Additional Info */
        .additional-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-box {
            background: white;
            border-radius: 10px;
            padding: 20px;
            border: 1px solid #e2e8f0;
        }

        .info-box h4 {
            font-size: 1rem;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-box ul {
            list-style: none;
            padding: 0;
        }

        .info-box li {
            padding: 8px 0;
            border-bottom: 1px solid #f0f4f8;
            font-size: 0.85rem;
            color: #4a5568;
            line-height: 1.5;
            position: relative;
            padding-left: 15px;
        }

        .info-box li:before {
            content: '•';
            position: absolute;
            left: 0;
            color: #667eea;
            font-weight: bold;
        }

        .info-box li:last-child {
            border-bottom: none;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .footer p {
            margin: 5px 0;
            font-size: 0.9rem;
        }

        /* Print Styles */
        @media print {
            body {
                background: white !important;
                padding: 0 !important;
            }
            
            .container {
                max-width: none !important;
                margin: 0 !important;
            }
            
            .market-cards {
                break-inside: avoid;
            }
            
            .market-card {
                break-inside: avoid;
                page-break-inside: avoid;
            }
            
            .info-box {
                break-inside: avoid;
                page-break-inside: avoid;
            }
            
            @page {
                margin: 1cm;
                size: A4;
            }
        }

        /* Auto-trigger print */
        @media screen {
            body {
                animation: fadeIn 0.3s ease-in;
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1>Market Validation Analysis</h1>
            <p>Market Size Analysis & Opportunity Assessment</p>
            <div class="generation-info">
                📅 Generated on {{ date('d F Y, H:i') }} WIB
            </div>
        </div>

        <!-- Business Info -->
        <div class="business-info">
            <div class="info-grid">
                <div class="info-item">
                    <div>
                        <div class="info-label">Business Name</div>
                        <div class="info-value">{{ $data['business_name'] ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <div>
                        <div class="info-label">Owner</div>
                        <div class="info-value">{{ $data['owner_name'] ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <div>
                        <div class="info-label">Industry</div>
                        <div class="info-value">{{ $data['industry'] ?? 'N/A' }}</div>
                    </div>
                </div>
                <div class="info-item">
                    <div>
                        <div class="info-label">Location</div>
                        <div class="info-value">{{ $data['location'] ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Market Cards -->
        <div class="market-section">
            <div class="market-cards">
                <!-- TAM -->
                <div class="market-card tam">
                    <div class="market-label">TAM</div>
                    <h3 class="market-title">Total Addressable Market</h3>
                    <div class="market-value">Rp {{ number_format($data['tam_value'] ?? 0, 0, ',', '.') }}</div>
                    <div class="market-meta">
                        <div class="meta-item">
                            <div class="meta-label">Market Size</div>
                            <div class="meta-value">{{ number_format($data['tam_market_size'] ?? 0, 0, ',', '.') }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Unit Value</div>
                            <div class="meta-value">Rp {{ number_format($data['tam_unit_value'] ?? 0, 0, ',', '.') }}</div>
                        </div>
                    </div>
                    <p class="market-desc">{{ $data['tam_description'] ?? 'Seluruh pasar yang tersedia untuk produk atau layanan tanpa batasan geografis atau segmentasi.' }}</p>
                </div>

                <!-- SAM -->
                <div class="market-card sam">
                    <div class="market-label">SAM</div>
                    <h3 class="market-title">Serviceable Addressable Market</h3>
                    <div class="market-value">Rp {{ number_format($data['sam_value'] ?? 0, 0, ',', '.') }}</div>
                    <div class="market-meta">
                        <div class="meta-item">
                            <div class="meta-label">Market Size</div>
                            <div class="meta-value">{{ number_format($data['sam_market_size'] ?? 0, 0, ',', '.') }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Percentage</div>
                            <div class="meta-value">{{ $data['sam_percentage'] ?? 0 }}%</div>
                        </div>
                    </div>
                    <p class="market-desc">{{ $data['sam_description'] ?? 'Bagian dari TAM yang dapat dijangkau dengan model bisnis dan kapabilitas saat ini.' }}</p>
                </div>

                <!-- SOM -->
                <div class="market-card som">
                    <div class="market-label">SOM</div>
                    <h3 class="market-title">Serviceable Obtainable Market</h3>
                    <div class="market-value">Rp {{ number_format($data['som_value'] ?? 0, 0, ',', '.') }}</div>
                    <div class="market-meta">
                        <div class="meta-item">
                            <div class="meta-label">Market Size</div>
                            <div class="meta-value">{{ number_format($data['som_market_size'] ?? 0, 0, ',', '.') }}</div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-label">Percentage</div>
                            <div class="meta-value">{{ $data['som_percentage'] ?? 0 }}%</div>
                        </div>
                    </div>
                    <p class="market-desc">{{ $data['som_description'] ?? 'Target pasar realistis yang dapat dicapai dalam jangka waktu tertentu dengan sumber daya yang ada.' }}</p>
                </div>
            </div>
        </div>

        <!-- Additional Info -->
        @if(!empty($data['market_assumptions']) || !empty($data['growth_projections']))
        <div class="additional-info">
            @if(!empty($data['market_assumptions']))
            <div class="info-box">
                <h4>💡 Market Assumptions</h4>
                <ul>
                    @foreach($data['market_assumptions'] as $assumption)
                        @if(!empty($assumption))
                        <li>{{ $assumption }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif

            @if(!empty($data['growth_projections']))
            <div class="info-box">
                <h4>📈 Growth Projections</h4>
                <ul>
                    @foreach($data['growth_projections'] as $projection)
                        @if(!empty($projection))
                        <li>{{ $projection }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p><strong>Ideation Platform</strong> - Business Strategy Platform</p>
            <p>Dokumen ini dibuat secara otomatis oleh sistem Ideation</p>
        </div>
    </div>

    <script>
        // Auto-trigger print dialog when page loads
        window.addEventListener('load', function() {
            // Small delay to ensure page is fully rendered
            setTimeout(function() {
                window.print();
                
                // Close window after print dialog (for popup windows)
                window.addEventListener('afterprint', function() {
                    setTimeout(function() {
                        window.close();
                    }, 1000);
                });
            }, 500);
        });
    </script>
</body>
</html>


