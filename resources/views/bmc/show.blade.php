<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Model Canvas - {{ $business->business_name }} | Ideation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- html2canvas with fallback -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
            onerror="this.onerror=null;this.src='{{ asset('assets/js/html2canvas.min.js') }}';"></script>
    
    <!-- jsPDF with fallback -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"
            onerror="this.onerror=null;this.src='{{ asset('assets/js/jspdf.umd.min.js') }}';"></script>
    <style>
        /* Print Styles */
        @media print {
            /* Reset all styles for print */
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            body { 
                margin: 0; 
                padding: 5mm;
                font-size: 10px;
                line-height: 1.2;
            }
            .no-print { display: none !important; }
            .download-buttons { display: none !important; }
            .btn { display: none !important; }
            
            /* Add header like PDF */
            body::before {
                content: "💡 Ideation - Business Model Canvas Generator";
                display: block;
                text-align: center;
                background: #667eea;
                color: white;
                padding: 8mm;
                margin-bottom: 5mm;
                font-size: 14px;
                font-weight: bold;
            }
            
            /* Business Info Print Styles */
            .business-info {
                padding: 8mm !important;
                margin-bottom: 5mm !important;
                font-size: 10px !important;
            }
            .business-info h3 {
                font-size: 14px !important;
                margin-bottom: 3mm !important;
            }
            .business-info p {
                margin: 1.5mm 0 !important;
                font-size: 9px !important;
            }
            
            /* BMC Container Print Styles */
            .bmc-container {
                margin: 0 !important;
                box-shadow: none !important;
                border-radius: 0 !important;
            }
            
            /* BMC Header Print Styles */
            .bmc-header {
                padding: 6mm !important;
                font-size: 11px !important;
            }
            .bmc-header h2 {
                font-size: 14px !important;
                margin: 0 !important;
            }
            .bmc-header p {
                font-size: 10px !important;
                margin: 1mm 0 0 0 !important;
            }
            
            /* BMC Grid Print Styles */
            .bmc-grid {
                display: grid !important;
                grid-template-columns: 1fr 1fr 1fr !important;
                grid-template-rows: 1fr 1fr 1fr !important;
                gap: 2px !important;
                padding: 2px !important;
                background: #333 !important;
                border: 2px solid #333 !important;
                width: 100% !important;
                height: auto !important;
            }
            
            /* BMC Box Print Styles */
            .bmc-box {
                padding: 4mm !important;
                min-height: 28mm !important;
                font-size: 8px !important;
                border: 1px solid #333 !important;
                background: white !important;
                position: relative !important;
            }
            
            .bmc-box::before {
                content: '' !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                height: 2px !important;
                background: #333 !important;
            }
            
            .bmc-box h6 {
                font-size: 10px !important;
                margin-bottom: 3mm !important;
                padding-bottom: 2mm !important;
                border-bottom: 1px solid #ddd !important;
                color: #2c3e50 !important;
                font-weight: bold !important;
            }
            .bmc-box li {
                padding: 1.5mm 2mm !important;
                margin: 1mm 0 !important;
                font-size: 7px !important;
                border-bottom: 0.5px solid #eee !important;
                position: relative !important;
                background: #f8f9fa !important;
                border-radius: 0 !important;
                color: #495057 !important;
                border-left: 2px solid #ddd !important;
            }
            .bmc-box li:last-child {
                border-bottom: none !important;
            }
            
            /* Force print styles to override regular styles */
            .bmc-box {
                padding: 4mm !important;
                min-height: 28mm !important;
                font-size: 8px !important;
                border: 1px solid #333 !important;
                background: white !important;
                display: flex !important;
                flex-direction: column !important;
            }
            
            .bmc-box h6 {
                font-size: 10px !important;
                margin-bottom: 3mm !important;
                padding-bottom: 2mm !important;
                border-bottom: 1px solid #ddd !important;
                color: #495057 !important;
                font-weight: bold !important;
            }
            
            .bmc-box li {
                padding: 1.5mm 2mm !important;
                margin: 1mm 0 !important;
                font-size: 7px !important;
                border-bottom: 0.5px solid #eee !important;
                position: relative !important;
                background: #f8f9fa !important;
                border-radius: 0 !important;
                color: #495057 !important;
            }
            
            /* Ensure grid layout is preserved */
            .bmc-container {
                width: 100% !important;
                max-width: none !important;
            }
            
            /* Make sure each box is properly sized */
            .bmc-box:nth-child(1) { grid-column: 1; grid-row: 1; }
            .bmc-box:nth-child(2) { grid-column: 2; grid-row: 1; }
            .bmc-box:nth-child(3) { grid-column: 3; grid-row: 1; }
            .bmc-box:nth-child(4) { grid-column: 1; grid-row: 2; }
            .bmc-box:nth-child(5) { grid-column: 2; grid-row: 2; }
            .bmc-box:nth-child(6) { grid-column: 3; grid-row: 2; }
            .bmc-box:nth-child(7) { grid-column: 1; grid-row: 3; }
            .bmc-box:nth-child(8) { grid-column: 2; grid-row: 3; }
            .bmc-box:nth-child(9) { grid-column: 3; grid-row: 3; }
            
            /* Add footer like PDF */
            body::after {
                content: "Generated on " attr(data-date) " | Professional Business Model Canvas";
                display: block;
                text-align: center;
                background: #f8f9fa;
                color: #666;
                padding: 4mm;
                margin-top: 5mm;
                font-size: 8px;
                border: 1px solid #ddd;
            }
            
            /* Force single page */
            @page {
                size: A4;
                margin: 5mm;
            }
            
            /* Override any conflicting styles */
            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            
            /* Ensure print styles take precedence */
            .bmc-box h6 {
                font-size: 10px !important;
                margin-bottom: 3mm !important;
                padding-bottom: 2mm !important;
                border-bottom: 1px solid #ddd !important;
                color: #495057 !important;
                font-weight: bold !important;
            }
            
            .bmc-box ul {
                list-style: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }
        }
        
        /* Responsive Design */
        @media (max-width: 1200px) {
            .bmc-grid {
                gap: 10px;
                margin: 1.5rem;
            }
            .bmc-box {
                padding: 1.25rem;
                min-height: 180px;
            }
        }
        
        @media (max-width: 992px) {
            .bmc-grid {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: repeat(5, 1fr);
                gap: 10px;
            }
            
            .bmc-box:nth-child(1) { grid-column: 1; grid-row: 1; }
            .bmc-box:nth-child(2) { grid-column: 2; grid-row: 1; }
            .bmc-box:nth-child(3) { grid-column: 1; grid-row: 2; }
            .bmc-box:nth-child(4) { grid-column: 2; grid-row: 2; }
            .bmc-box:nth-child(5) { grid-column: 1; grid-row: 3; }
            .bmc-box:nth-child(6) { grid-column: 2; grid-row: 3; }
            .bmc-box:nth-child(7) { grid-column: 1; grid-row: 4; }
            .bmc-box:nth-child(8) { grid-column: 2; grid-row: 4; }
            .bmc-box:nth-child(9) { grid-column: 1; grid-row: 5; }
            
            .bmc-box {
                min-height: 160px;
                padding: 1rem;
            }
            .bmc-box h6 {
                font-size: 1rem;
                margin-bottom: 0.75rem;
            }
            .bmc-box li {
                font-size: 0.85rem;
                padding: 0.4rem 0.6rem;
            }
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }
            
            .bmc-header {
                padding: 20px;
            }
            
            .bmc-header h2 {
                font-size: 1.5rem;
            }
            
            .bmc-header p {
                font-size: 0.9rem;
            }
            
            .business-info {
                padding: 15px;
                margin-bottom: 20px;
            }
            
            .business-info h3 {
                font-size: 1.2rem;
            }
            
            .business-info p {
                font-size: 0.9rem;
            }
            
            .bmc-grid {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(9, 1fr);
                gap: 10px;
                margin: 1rem;
            }
            
            .bmc-box:nth-child(1) { grid-column: 1; grid-row: 1; }
            .bmc-box:nth-child(2) { grid-column: 1; grid-row: 2; }
            .bmc-box:nth-child(3) { grid-column: 1; grid-row: 3; }
            .bmc-box:nth-child(4) { grid-column: 1; grid-row: 4; }
            .bmc-box:nth-child(5) { grid-column: 1; grid-row: 5; }
            .bmc-box:nth-child(6) { grid-column: 1; grid-row: 6; }
            .bmc-box:nth-child(7) { grid-column: 1; grid-row: 7; }
            .bmc-box:nth-child(8) { grid-column: 1; grid-row: 8; }
            .bmc-box:nth-child(9) { grid-column: 1; grid-row: 9; }
            
            .bmc-box {
                min-height: 140px;
                padding: 1rem;
            }
            
            .bmc-box h6 {
                font-size: 0.9rem;
                margin-bottom: 0.5rem;
            }
            
            .bmc-box li {
                font-size: 0.8rem;
                padding: 0.4rem 0.6rem;
                margin: 0.25rem 0;
            }
            
            .download-buttons {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .bmc-header {
                padding: 15px;
            }
            
            .bmc-header h2 {
                font-size: 1.3rem;
            }
            
            .bmc-header p {
                font-size: 0.8rem;
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
            
            .bmc-grid {
                margin: 0.5rem;
                gap: 8px;
            }
            
            .bmc-box {
                min-height: 120px;
                padding: 0.75rem;
            }
            
            .bmc-box h6 {
                font-size: 0.85rem;
                margin-bottom: 0.4rem;
            }
            
            .bmc-box li {
                font-size: 0.75rem;
                padding: 0.3rem 0.5rem;
                margin: 0.2rem 0;
            }
            
            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }
        
        .bmc-container {
            background: white;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            border: 1px solid var(--gray-200);
        }
        .bmc-header {
            background: var(--primary);
            color: white;
            padding: 2rem;
            text-align: center;
        }
        
        /* BMC Grid Layout */
        .bmc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr;
            gap: 1rem;
            margin: 2rem;
            max-width: 1000px;
            margin-left: auto;
            margin-right: auto;
        }

        .bmc-box {
            background: white;
            border: 2px solid var(--gray-200);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            min-height: 200px;
            display: flex;
            flex-direction: column;
        }

        .bmc-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .bmc-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--primary);
        }

        /* Specific component colors */
        .bmc-box:nth-child(1) {
            border-color: var(--danger);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(1)::before {
            background: var(--danger);
        }

        .bmc-box:nth-child(2) {
            border-color: var(--warning);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(2)::before {
            background: var(--warning);
        }

        .bmc-box:nth-child(3) {
            border-color: var(--success);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(3)::before {
            background: var(--success);
        }

        .bmc-box:nth-child(4) {
            border-color: var(--primary);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(4)::before {
            background: var(--primary);
        }

        .bmc-box:nth-child(5) {
            border-color: var(--info);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(5)::before {
            background: var(--info);
        }

        .bmc-box:nth-child(6) {
            border-color: var(--warning);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(6)::before {
            background: var(--warning);
        }

        .bmc-box:nth-child(7) {
            border-color: var(--success);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(7)::before {
            background: var(--success);
        }

        .bmc-box:nth-child(8) {
            border-color: var(--secondary);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(8)::before {
            background: var(--secondary);
        }

        .bmc-box:nth-child(9) {
            border-color: var(--danger);
            background: var(--gray-50);
        }
        .bmc-box:nth-child(9)::before {
            background: var(--danger);
        }

        .bmc-box h6 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .bmc-box ul {
            list-style: none;
            padding: 0;
            margin: 0;
            flex: 1;
        }

        .bmc-box li {
            background: white;
            border: 1px solid var(--gray-300);
            border-radius: var(--radius);
            padding: 0.5rem 0.75rem;
            margin-bottom: 0.5rem;
            transition: var(--transition);
            font-size: 0.875rem;
            color: var(--gray-700);
        }

        .bmc-box li:hover {
            border-color: var(--primary);
            background: white;
            transform: translateX(2px);
        }
        .business-info {
            background: var(--gray-50);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid var(--gray-200);
        }
        .download-buttons {
            text-align: center;
            margin: 2rem 0;
        }
        .download-btn {
            background: var(--success);
            border: none;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius);
            margin: 0 0.5rem;
            text-decoration: none;
            display: inline-block;
            transition: var(--transition);
            font-size: 0.875rem;
            font-weight: 500;
        }
        .download-btn:hover {
            background: #059669;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
            color: white;
        }
        .download-btn.pdf {
            background: var(--danger);
        }
        .download-btn.jpg {
            background: var(--success);
        }
        .download-btn.png {
            background: var(--warning);
        }
        .download-btn.print {
            background: var(--secondary);
        }
        
        /* Footer Styles */
        .footer {
            background: var(--gray-900);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
            border-top: 3px solid var(--primary);
        }
        
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }
        
        .footer-brand {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        
        .footer-brand h4 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
        }
        
        .footer-brand p {
            color: var(--gray-400);
            font-size: 0.875rem;
        }

        /* Page Header */
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 1rem;
            letter-spacing: -0.025em;
        }

        .page-subtitle {
            font-size: 1.125rem;
            color: var(--gray-600);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
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
        
        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }
        
        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
            font-size: 0.9rem;
        }
        
        .footer-links a:hover {
            color: #3498db;
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 1rem;
            border-top: 1px solid #34495e;
            color: #95a5a6;
            font-size: 0.85rem;
        }
        
        /* Professional Elements */
        .professional-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .professional-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }
        
        .professional-header-content {
            position: relative;
            z-index: 1;
        }
        
        .professional-logo {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .professional-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }
        
        .professional-subtitle {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 1rem;
        }
        
        .professional-meta {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .professional-meta span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .watermark {
            position: absolute;
            bottom: 20px;
            right: 20px;
            color: rgba(0,0,0,0.1);
            font-size: 0.8rem;
            font-weight: 600;
            transform: rotate(-45deg);
            pointer-events: none;
            z-index: 1;
        }
        
        .bmc-container {
            position: relative;
        }
        
        .bmc-container::after {
            content: 'Generated by Ideation - Professional Business Model Canvas';
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 0.7rem;
            color: rgba(0,0,0,0.3);
            font-weight: 500;
            pointer-events: none;
        }
        
        /* Download Enhancement */
        .download-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 15px;
            padding: 2rem;
            margin: 2rem 0;
            text-align: center;
            border: 1px solid #dee2e6;
        }
        
        .download-section h4 {
            color: #2c3e50;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .download-section p {
            color: #6c757d;
            margin-bottom: 1.5rem;
        }
        
        .download-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .download-btn {
            min-width: 150px;
            position: relative;
            overflow: hidden;
        }
        
        .download-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .download-btn:hover::before {
            left: 100%;
        }
        
        /* Print Professional Styles */
        @media print {
            .footer {
                display: none !important;
            }
            
            .professional-header {
                background: #2c3e50 !important;
                color: white !important;
                padding: 15mm !important;
                margin: -15mm -15mm 10mm -15mm !important;
            }
            
            .professional-logo {
                font-size: 24px !important;
            }
            
            .professional-title {
                font-size: 20px !important;
            }
            
            .professional-subtitle {
                font-size: 12px !important;
            }
            
            .professional-meta {
                font-size: 10px !important;
            }
            
            .watermark {
                position: fixed !important;
                bottom: 10mm !important;
                right: 10mm !important;
                font-size: 8px !important;
                color: rgba(0,0,0,0.2) !important;
            }
            
            .bmc-container::after {
                content: 'Generated by Ideation - Professional Business Model Canvas' !important;
                position: fixed !important;
                bottom: 5mm !important;
                right: 5mm !important;
                font-size: 6px !important;
                color: rgba(0,0,0,0.3) !important;
            }
        }
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 15px 25px;
            border-radius: 25px;
            color: white;
            font-weight: 600;
            animation: slideIn 0.3s ease;
        }
        .notification.success {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        }
        .notification.error {
            background: linear-gradient(135deg, #dc3545 0%, #e74c3c 100%);
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body data-date="{{ now()->format('d M Y H:i') }}">
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

    <div class="container py-5">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">Business Model Canvas</h1>
            <p class="page-subtitle">{{ $business->business_name }}</p>
        </div>

        <!-- Business Information -->
        <div class="business-info">
            <h3 class="text-primary mb-3">
                <i class="fas fa-building me-2"></i>Informasi Bisnis
            </h3>
            <div class="row">
                <div class="col-md-8">
                    <p><strong>Nama Pemilik:</strong> {{ $business->owner_name }}</p>
                    <p><strong>Nama Usaha:</strong> {{ $business->business_name }}</p>
                    <p><strong>Deskripsi:</strong> {{ $business->business_description }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Lokasi:</strong> {{ $business->location }}</p>
                    <p><strong>Telepon:</strong> {{ $business->phone_number }}</p>
                </div>
            </div>
        </div>

        <!-- BMC Canvas -->
        <div class="bmc-container">
            <div class="professional-header">
                <div class="professional-header-content">
                    <div class="professional-logo">💡</div>
                    <h2 class="professional-title">Business Model Canvas</h2>
                    <p class="professional-subtitle">{{ $business->business_name }}</p>
                    <div class="professional-meta">
                        <span><i class="fas fa-calendar"></i> {{ now()->format('d M Y') }}</span>
                        <span><i class="fas fa-user"></i> {{ $business->owner_name }}</span>
                        <span><i class="fas fa-map-marker-alt"></i> {{ $business->location }}</span>
                    </div>
                </div>
                <div class="watermark">IDEATION</div>
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

        <!-- Download Section -->
        <div class="download-section">
            <h4><i class="fas fa-download me-2"></i>Download Business Model Canvas</h4>
            <p>Download BMC Anda dalam berbagai format untuk presentasi, dokumentasi, atau berbagi dengan tim</p>
            <div class="download-buttons">
                <button onclick="downloadAsImage('jpg')" class="download-btn jpg">
                    <i class="fas fa-camera me-2"></i>Download JPG
                </button>
                <button onclick="downloadAsImage('png')" class="download-btn png">
                    <i class="fas fa-image me-2"></i>Download PNG
                </button>
                <button onclick="downloadAsPDF()" class="download-btn pdf">
                    <i class="fas fa-file-pdf me-2"></i>Download PDF
                </button>
                <button onclick="printBMC(); return false;" class="download-btn print">
                    <i class="fas fa-print me-2"></i>Print BMC
                </button>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="text-center">
            <a href="{{ route('bmc.edit', $business->id) }}" class="btn btn-warning me-3">
                <i class="fas fa-edit me-2"></i>Edit BMC
            </a>
            <a href="{{ route('bmc.duplicate', $business->id) }}" class="btn btn-info me-3">
                <i class="fas fa-copy me-2"></i>Duplicate BMC
            </a>
            <a href="{{ route('bmc.landing') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-brand">
                <h4><i class="fas fa-lightbulb me-2"></i>Ideation</h4>
                <p>Platform profesional untuk mengembangkan ide bisnis Anda dengan Business Model Canvas</p>
            </div>
            <div class="footer-links">
                <a href="{{ route('bmc.landing') }}">Beranda</a>
                <a href="{{ route('bmc.create') }}">Buat BMC</a>
                <a href="{{ route('tam-sam-som.create') }}">Market Validation</a>
                <a href="{{ route('projection.create') }}">Financial Projection</a>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Ideation. Dibuat dengan ❤️ untuk pengusaha Indonesia</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Function to download BMC as PDF
        function downloadAsPDF() {
            // Include both business info and BMC container
            const businessInfo = document.querySelector('.business-info');
            const bmcContainer = document.querySelector('.bmc-container');
            const businessName = '{{ $business->business_name }}';
            
            // Create a wrapper element to include both sections
            const wrapper = document.createElement('div');
            wrapper.style.cssText = `
                background: white;
                padding: 20px;
                max-width: 1200px;
                margin: 0 auto;
                position: relative;
            `;
            
            // Add professional header
            const professionalHeader = document.createElement('div');
            professionalHeader.style.cssText = `
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
                color: white;
                padding: 20px;
                text-align: center;
                margin-bottom: 20px;
                border-radius: 10px;
                position: relative;
                overflow: hidden;
            `;
            professionalHeader.innerHTML = `
                <div style="font-size: 24px; margin-bottom: 10px;">💡</div>
                <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 5px;">Business Model Canvas</h2>
                <p style="font-size: 14px; margin-bottom: 15px; opacity: 0.9;">${businessName}</p>
                <div style="display: flex; justify-content: center; gap: 20px; font-size: 12px; opacity: 0.8;">
                    <span>📅 ${new Date().toLocaleDateString('id-ID')}</span>
                    <span>👤 {{ $business->owner_name }}</span>
                    <span>📍 {{ $business->location }}</span>
                </div>
                <div style="position: absolute; bottom: 10px; right: 10px; font-size: 10px; opacity: 0.3; transform: rotate(-45deg);">IDEATION</div>
            `;
            wrapper.appendChild(professionalHeader);
            
            // Clone and append business info
            const businessInfoCloneImg = businessInfo.cloneNode(true);
            wrapper.appendChild(businessInfoCloneImg);
            
            // Clone and append BMC container
            const bmcContainerCloneImg = bmcContainer.cloneNode(true);
            wrapper.appendChild(bmcContainerCloneImg);
            
            // Add professional footer
            const professionalFooter = document.createElement('div');
            professionalFooter.style.cssText = `
                text-align: center;
                margin-top: 20px;
                padding: 15px;
                background: #f8f9fa;
                border-radius: 10px;
                font-size: 12px;
                color: #6c757d;
                border-top: 2px solid #3498db;
            `;
            professionalFooter.innerHTML = `
                <p style="margin: 0; font-weight: 600;">Generated by Ideation - Professional Business Model Canvas</p>
                <p style="margin: 5px 0 0 0; font-size: 10px;">Platform profesional untuk mengembangkan ide bisnis Anda</p>
            `;
            wrapper.appendChild(professionalFooter);
            
            // Temporarily add to body for rendering
            wrapper.style.position = 'absolute';
            wrapper.style.left = '-9999px';
            wrapper.style.top = '0';
            document.body.appendChild(wrapper);
            
            // Debug: Check if wrapper has content
            console.log('Wrapper content:', wrapper.innerHTML);
            console.log('Wrapper dimensions:', wrapper.offsetWidth, 'x', wrapper.offsetHeight);
            
            // Show loading state
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating PDF...';
            button.disabled = true;
            
            // Apply compact styling to wrapper (don't override position)
            wrapper.style.background = 'white';
            wrapper.style.padding = '10px';
            wrapper.style.maxWidth = '1000px';
            wrapper.style.margin = '0 auto';
            wrapper.style.fontSize = '12px';
            
            // Make business info more compact
            const businessInfoElement = wrapper.querySelector('.business-info');
            if (businessInfoElement) {
                businessInfoElement.style.padding = '10px';
                businessInfoElement.style.marginBottom = '10px';
                businessInfoElement.style.fontSize = '10px';
            }
            
            // Make BMC container more compact
            const bmcContainerElement = wrapper.querySelector('.bmc-container');
            if (bmcContainerElement) {
                bmcContainerElement.style.maxWidth = '100%';
                bmcContainerElement.style.margin = '0';
            }
            
            // Make BMC grid more compact
            const bmcGrid = wrapper.querySelector('.bmc-grid');
            if (bmcGrid) {
                bmcGrid.style.gap = '1px';
                bmcGrid.style.padding = '1px';
            }
            
            // Make BMC boxes more compact
            const bmcBoxes = wrapper.querySelectorAll('.bmc-box');
            bmcBoxes.forEach(box => {
                box.style.padding = '8px';
                box.style.minHeight = '80px';
                box.style.fontSize = '9px';
            });
            
            // Make BMC box headers more compact
            const bmcHeaders = wrapper.querySelectorAll('.bmc-box h6');
            bmcHeaders.forEach(header => {
                header.style.fontSize = '10px';
                header.style.marginBottom = '5px';
                header.style.paddingBottom = '3px';
            });
            
            // Make BMC box lists more compact
            const bmcLists = wrapper.querySelectorAll('.bmc-box li');
            bmcLists.forEach(li => {
                li.style.padding = '3px 6px';
                li.style.margin = '2px 0';
                li.style.fontSize = '8px';
            });

            // Wait a bit for styling to apply
            setTimeout(() => {
                console.log('Starting html2canvas with wrapper:', wrapper);
                console.log('Wrapper dimensions after styling:', wrapper.offsetWidth, 'x', wrapper.offsetHeight);
                
                html2canvas(wrapper, {
                    backgroundColor: '#ffffff',
                    scale: 1.5, // Reduced scale for stability
                    useCORS: true,
                    allowTaint: true,
                    logging: true,
                    width: wrapper.offsetWidth,
                    height: wrapper.offsetHeight,
                    scrollX: 0,
                    scrollY: 0,
                    dpi: 300,
                    foreignObjectRendering: false, // Disable for stability
                    imageTimeout: 5000,
                    removeContainer: true
                }).then(canvas => {
                // Create PDF using jsPDF
                const { jsPDF } = window.jspdf;
                const pdf = new jsPDF('landscape', 'mm', 'a4');
                
                // A4 dimensions in mm
                const pageWidth = 297; // A4 width
                const pageHeight = 210; // A4 height
                
                // Calculate image dimensions to fit entire page
                const imgWidth = pageWidth - 10; // 5mm margin on each side
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                
                // Force fit to single page
                let finalWidth = imgWidth;
                let finalHeight = imgHeight;
                
                // If too tall, scale down proportionally
                if (imgHeight > pageHeight - 10) {
                    const scaleFactor = (pageHeight - 10) / imgHeight;
                    finalWidth = imgWidth * scaleFactor;
                    finalHeight = imgHeight * scaleFactor;
                }
                
                // Center the image
                const xOffset = (pageWidth - finalWidth) / 2;
                const yOffset = (pageHeight - finalHeight) / 2;
                
                const imgData = canvas.toDataURL('image/png');
                pdf.addImage(imgData, 'PNG', xOffset, yOffset, finalWidth, finalHeight);
                
                // Download PDF
                pdf.save(`BMC_${businessName.replace(/[^a-zA-Z0-9]/g, '_')}.pdf`);
                
                // Reset button
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Clean up wrapper
                document.body.removeChild(wrapper);
                
                // Show success message
                showNotification('✅ PDF berhasil diunduh!', 'success');
            }).catch(error => {
                console.error('Error generating PDF:', error);
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Clean up wrapper on error
                if (document.body.contains(wrapper)) {
                    document.body.removeChild(wrapper);
                }
                
                // Show detailed error message
                let errorMessage = '❌ Gagal mengunduh PDF';
                if (error.message) {
                    errorMessage += ': ' + error.message;
                }
                showNotification(errorMessage, 'error');
            });
            }, 100); // 100ms delay for styling to apply
        }

        // Function to download BMC as image
        function downloadAsImage(format) {
            // Include both business info and BMC container
            const businessInfo = document.querySelector('.business-info');
            const bmcContainer = document.querySelector('.bmc-container');
            const businessName = '{{ $business->business_name }}';
            
            // Create a wrapper element to include both sections
            const wrapper = document.createElement('div');
            wrapper.style.cssText = `
                background: white;
                padding: 20px;
                max-width: 1200px;
                margin: 0 auto;
                position: relative;
            `;
            
            // Add professional header
            const professionalHeader = document.createElement('div');
            professionalHeader.style.cssText = `
                background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
                color: white;
                padding: 20px;
                text-align: center;
                margin-bottom: 20px;
                border-radius: 10px;
                position: relative;
                overflow: hidden;
            `;
            professionalHeader.innerHTML = `
                <div style="font-size: 24px; margin-bottom: 10px;">💡</div>
                <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 5px;">Business Model Canvas</h2>
                <p style="font-size: 14px; margin-bottom: 15px; opacity: 0.9;">${businessName}</p>
                <div style="display: flex; justify-content: center; gap: 20px; font-size: 12px; opacity: 0.8;">
                    <span>📅 ${new Date().toLocaleDateString('id-ID')}</span>
                    <span>👤 {{ $business->owner_name }}</span>
                    <span>📍 {{ $business->location }}</span>
                </div>
                <div style="position: absolute; bottom: 10px; right: 10px; font-size: 10px; opacity: 0.3; transform: rotate(-45deg);">IDEATION</div>
            `;
            wrapper.appendChild(professionalHeader);
            
            // Clone and append business info
            const businessInfoCloneImg = businessInfo.cloneNode(true);
            wrapper.appendChild(businessInfoCloneImg);
            
            // Clone and append BMC container
            const bmcContainerCloneImg = bmcContainer.cloneNode(true);
            wrapper.appendChild(bmcContainerCloneImg);
            
            // Add professional footer
            const professionalFooter = document.createElement('div');
            professionalFooter.style.cssText = `
                text-align: center;
                margin-top: 20px;
                padding: 15px;
                background: #f8f9fa;
                border-radius: 10px;
                font-size: 12px;
                color: #6c757d;
                border-top: 2px solid #3498db;
            `;
            professionalFooter.innerHTML = `
                <p style="margin: 0; font-weight: 600;">Generated by Ideation - Professional Business Model Canvas</p>
                <p style="margin: 5px 0 0 0; font-size: 10px;">Platform profesional untuk mengembangkan ide bisnis Anda</p>
            `;
            wrapper.appendChild(professionalFooter);
            
            // Temporarily add to body for rendering
            wrapper.style.position = 'absolute';
            wrapper.style.left = '-9999px';
            wrapper.style.top = '0';
            document.body.appendChild(wrapper);
            
            // Show loading state
            const button = event.target;
            const originalText = button.innerHTML;
            button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Generating...';
            button.disabled = true;
            
            // Wait a bit for styling to apply
            setTimeout(() => {
                console.log('Starting html2canvas for image with wrapper:', wrapper);
                
                html2canvas(wrapper, {
                    backgroundColor: '#ffffff',
                    scale: 1.5, // Reduced scale for stability
                    useCORS: true,
                    allowTaint: true,
                    logging: true,
                    width: wrapper.offsetWidth,
                    height: wrapper.offsetHeight,
                    dpi: 300,
                    foreignObjectRendering: false, // Disable for stability
                    imageTimeout: 5000,
                    removeContainer: true
                }).then(canvas => {
                // Create download link
                const link = document.createElement('a');
                link.download = `BMC_${businessName.replace(/[^a-zA-Z0-9]/g, '_')}.${format}`;
                
                if (format === 'jpg') {
                    link.href = canvas.toDataURL('image/jpeg', 1.0); // Maximum quality
                } else {
                    link.href = canvas.toDataURL('image/png'); // PNG is lossless
                }
                
                // Trigger download
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                
                // Reset button
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Clean up wrapper
                document.body.removeChild(wrapper);
                
                // Show success message
                showNotification('✅ Download berhasil!', 'success');
            }).catch(error => {
                console.error('Error generating image:', error);
                button.innerHTML = originalText;
                button.disabled = false;
                
                // Clean up wrapper on error
                if (document.body.contains(wrapper)) {
                    document.body.removeChild(wrapper);
                }
                
                // Show detailed error message
                let errorMessage = '❌ Gagal mengunduh gambar';
                if (error.message) {
                    errorMessage += ': ' + error.message;
                }
                showNotification(errorMessage, 'error');
            });
            }, 100); // 100ms delay for styling to apply
        }

        // Function to show notification
        function showNotification(message, type) {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Remove notification after 3 seconds
            setTimeout(() => {
                notification.style.animation = 'slideIn 0.3s ease reverse';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }
        
        // Function to print BMC directly - Using same design as show
        function printBMC(event) {
            // Prevent default behavior
            if (event) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            // Create a new window for print
            const printWindow = window.open('', '_blank');
            
            // Get the content
            const businessInfo = document.querySelector('.business-info').outerHTML;
            const bmcContainer = document.querySelector('.bmc-container').outerHTML;
            
            // Create print content with same design as show page
            const printContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print BMC - {{ $business->business_name }}</title>
                    <style>
                        body {
                            font-family: 'Segoe UI', Arial, sans-serif;
                            margin: 0;
                            padding: 15mm;
                            font-size: 11px;
                            line-height: 1.4;
                            color: #333;
                            background: white;
                        }
                        
                        .print-header {
                            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
                            color: white;
                            padding: 15mm;
                            margin: -15mm -15mm 10mm -15mm;
                            text-align: center;
                            position: relative;
                            overflow: hidden;
                        }
                        
                        .print-header::before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.1"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.1"/><circle cx="50" cy="10" r="0.5" fill="white" opacity="0.1"/><circle cx="10" cy="60" r="0.5" fill="white" opacity="0.1"/><circle cx="90" cy="40" r="0.5" fill="white" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
                            opacity: 0.3;
                        }
                        
                        .print-header-content {
                            position: relative;
                            z-index: 1;
                        }
                        
                        .print-logo {
                            font-size: 24px;
                            margin-bottom: 5mm;
                        }
                        
                        .print-title {
                            font-size: 20px;
                            font-weight: bold;
                            margin-bottom: 3mm;
                        }
                        
                        .print-subtitle {
                            font-size: 14px;
                            margin-bottom: 5mm;
                            opacity: 0.9;
                        }
                        
                        .print-meta {
                            display: flex;
                            justify-content: center;
                            gap: 10mm;
                            font-size: 10px;
                            opacity: 0.8;
                        }
                        
                        .print-watermark {
                            position: absolute;
                            bottom: 5mm;
                            right: 5mm;
                            font-size: 8px;
                            opacity: 0.3;
                            transform: rotate(-45deg);
                        }
                        
                        .business-section {
                            background: #f8f9fa;
                            padding: 8mm;
                            margin-bottom: 8mm;
                            border-radius: 5px;
                            border-left: 5px solid #3498db;
                        }
                        
                        .business-section h3 {
                            color: #2c3e50;
                            font-size: 16px;
                            margin: 0 0 5mm 0;
                            border-bottom: 2px solid #3498db;
                            padding-bottom: 2mm;
                        }
                        
                        .business-section p {
                            margin: 2mm 0;
                            font-size: 10px;
                        }
                        
                        .bmc-wrapper {
                            border: 3px solid #2c3e50;
                            border-radius: 8px;
                            overflow: hidden;
                            position: relative;
                        }
                        
                        .bmc-wrapper::after {
                            content: 'Generated by Ideation - Professional Business Model Canvas';
                            position: absolute;
                            bottom: 2mm;
                            right: 2mm;
                            font-size: 6px;
                            color: rgba(0,0,0,0.3);
                            font-weight: 500;
                        }
                        
                        .bmc-grid {
                            display: grid;
                            grid-template-columns: 1fr 1fr 1fr;
                            grid-template-rows: 1fr 1fr 1fr;
                            gap: 2px;
                            background: #2c3e50;
                            padding: 2px;
                        }
                        
                        .bmc-box {
                            background: white;
                            padding: 4mm;
                            border: 1px solid #2c3e50;
                            font-size: 9px;
                            min-height: 30mm;
                            position: relative;
                        }
                        
                        .bmc-box::before {
                            content: '';
                            position: absolute;
                            top: 0;
                            left: 0;
                            right: 0;
                            height: 2px;
                            background: #2c3e50;
                        }
                        
                        .bmc-box:nth-child(1) { border-color: #e74c3c; }
                        .bmc-box:nth-child(1)::before { background: #e74c3c; }
                        .bmc-box:nth-child(2) { border-color: #f39c12; }
                        .bmc-box:nth-child(2)::before { background: #f39c12; }
                        .bmc-box:nth-child(3) { border-color: #27ae60; }
                        .bmc-box:nth-child(3)::before { background: #27ae60; }
                        .bmc-box:nth-child(4) { border-color: #9b59b6; }
                        .bmc-box:nth-child(4)::before { background: #9b59b6; }
                        .bmc-box:nth-child(5) { border-color: #3498db; }
                        .bmc-box:nth-child(5)::before { background: #3498db; }
                        .bmc-box:nth-child(6) { border-color: #e67e22; }
                        .bmc-box:nth-child(6)::before { background: #e67e22; }
                        .bmc-box:nth-child(7) { border-color: #1abc9c; }
                        .bmc-box:nth-child(7)::before { background: #1abc9c; }
                        .bmc-box:nth-child(8) { border-color: #34495e; }
                        .bmc-box:nth-child(8)::before { background: #34495e; }
                        .bmc-box:nth-child(9) { border-color: #e91e63; }
                        .bmc-box:nth-child(9)::before { background: #e91e63; }
                        
                        .bmc-box h6 {
                            font-size: 11px;
                            font-weight: bold;
                            margin: 0 0 3mm 0;
                            color: #2c3e50;
                            display: flex;
                            align-items: center;
                            gap: 2mm;
                        }
                        
                        .bmc-box ul {
                            list-style: none;
                            padding: 0;
                            margin: 0;
                        }
                        
                        .bmc-box li {
                            background: #f8f9fa;
                            margin: 1mm 0;
                            padding: 2mm;
                            border-left: 3px solid #3498db;
                            font-size: 8px;
                            color: #2c3e50;
                            border-radius: 0 2px 2px 0;
                        }
                        
                        .bmc-box li:last-child {
                            border-bottom: none;
                        }
                        
                        .print-footer {
                            text-align: center;
                            background: #f8f9fa;
                            color: #6c757d;
                            padding: 4mm;
                            margin: 8mm -15mm -15mm -15mm;
                            font-size: 9px;
                            border-top: 2px solid #3498db;
                        }
                        
                        @page {
                            size: A4;
                            margin: 0;
                        }
                    </style>
                </head>
                <body>
                    <div class="print-header">
                        <div class="print-header-content">
                            <div class="print-logo">💡</div>
                            <h1 class="print-title">Business Model Canvas</h1>
                            <p class="print-subtitle">{{ $business->business_name }}</p>
                            <div class="print-meta">
                                <span>📅 ${new Date().toLocaleDateString('id-ID')}</span>
                                <span>👤 {{ $business->owner_name }}</span>
                                <span>📍 {{ $business->location }}</span>
                            </div>
                        </div>
                        <div class="print-watermark">IDEATION</div>
                    </div>
                    ${businessInfo}
                    <div class="bmc-wrapper">
                        ${bmcContainer}
                    </div>
                    <div class="print-footer">
                        <p style="margin: 0; font-weight: 600;">Generated by Ideation - Professional Business Model Canvas</p>
                        <p style="margin: 2mm 0 0 0; font-size: 8px;">Platform profesional untuk mengembangkan ide bisnis Anda</p>
                    </div>
                </body>
                </html>
            `;
            
            // Write content to new window
            printWindow.document.write(printContent);
            printWindow.document.close();
            
            // Wait for content to load, then print
            printWindow.onload = function() {
                setTimeout(() => {
                    printWindow.print();
                    // Don't close immediately, let user see the print dialog
                }, 100);
            };
            
            // Handle errors
            printWindow.onerror = function() {
                alert('Error opening print window. Please try again.');
                printWindow.close();
            };
        }
    </script>
</body>
</html>
