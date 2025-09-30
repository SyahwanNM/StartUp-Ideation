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
            }
            .bmc-box h6 {
                font-size: 10px !important;
                margin-bottom: 3mm !important;
                padding-bottom: 2mm !important;
                border-bottom: 1px solid #ddd !important;
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
            
            .btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
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
        .download-buttons {
            text-align: center;
            margin: 30px 0;
        }
        .download-btn {
            background: linear-gradient(45deg, #28a745, #20c997);
            border: none;
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            margin: 0 10px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            color: white;
        }
        .download-btn.pdf {
            background: linear-gradient(45deg, #dc3545, #e74c3c);
        }
        .download-btn.jpg {
            background: linear-gradient(45deg, #28a745, #20c997);
        }
        .download-btn.png {
            background: linear-gradient(45deg, #fd7e14, #ffc107);
        }
        .download-btn.print {
            background: linear-gradient(45deg, #6c757d, #495057);
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
            background: linear-gradient(45deg, #28a745, #20c997);
        }
        .notification.error {
            background: linear-gradient(45deg, #dc3545, #e74c3c);
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
</head>
<body data-date="{{ now()->format('d M Y H:i') }}">
    <div class="container py-5">
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

        <!-- Download Buttons -->
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
            `;
            
            // Clone and append business info
            const businessInfoCloneImg = businessInfo.cloneNode(true);
            wrapper.appendChild(businessInfoCloneImg);
            
            // Clone and append BMC container
            const bmcContainerCloneImg = bmcContainer.cloneNode(true);
            wrapper.appendChild(bmcContainerCloneImg);
            
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
            `;
            
            // Clone and append business info
            const businessInfoCloneImg = businessInfo.cloneNode(true);
            wrapper.appendChild(businessInfoCloneImg);
            
            // Clone and append BMC container
            const bmcContainerCloneImg = bmcContainer.cloneNode(true);
            wrapper.appendChild(bmcContainerCloneImg);
            
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
        
        // Function to print BMC directly - Simple approach
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
            
            // Create simple and attractive print content
            const printContent = `
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Print BMC</title>
                    <style>
                        body {
                            font-family: 'Segoe UI', Arial, sans-serif;
                            margin: 0;
                            padding: 15mm;
                            font-size: 11px;
                            line-height: 1.4;
                            color: #333;
                        }
                        
                        .print-header {
                            text-align: center;
                            background: #2c3e50;
                            color: white;
                            padding: 10mm;
                            margin: -15mm -15mm 10mm -15mm;
                            font-size: 18px;
                            font-weight: bold;
                            border-bottom: 3px solid #3498db;
                        }
                        
                        .business-section {
                            background: #ecf0f1;
                            padding: 8mm;
                            margin-bottom: 8mm;
                            border-left: 5px solid #3498db;
                            border-radius: 5px;
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
                        }
                        
                        .bmc-title {
                            background: #34495e;
                            color: white;
                            padding: 6mm;
                            text-align: center;
                            font-size: 16px;
                            font-weight: bold;
                        }
                        
                        
                        .bmc-grid {
                            display: grid;
                            grid-template-columns: 1fr 1fr 1fr;
                            grid-template-rows: 1fr 1fr 1fr;
                            gap: 1px;
                            background: #2c3e50;
                            padding: 1px;
                        }
                        
                        .bmc-box {
                            background: white;
                            padding: 4mm;
                            border: 1px solid #bdc3c7;
                            font-size: 9px;
                            min-height: 30mm;
                        }
                        
                        .bmc-box h6 {
                            font-size: 11px;
                            font-weight: bold;
                            margin: 0 0 3mm 0;
                            color: #2c3e50;
                            background: #ecf0f1;
                            padding: 2mm;
                            border-radius: 3px;
                            border-left: 4px solid #3498db;
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
                            border-radius: 0 3px 3px 0;
                        }
                        
                        .bmc-box li:last-child {
                            border-bottom: none;
                        }
                        
                        .print-footer {
                            text-align: center;
                            background: #34495e;
                            color: white;
                            padding: 4mm;
                            margin: 8mm -15mm -15mm -15mm;
                            font-size: 9px;
                            border-top: 3px solid #3498db;
                        }
                        
                        @page {
                            size: A4;
                            margin: 0;
                        }
                    </style>
                </head>
                <body>
                    <div class="print-header">💡 IDEATION - BUSINESS MODEL CANVAS</div>
                    ${businessInfo}
                    <div class="bmc-wrapper">
                        <div class="bmc-title">Business Model Canvas</div>
                        ${bmcContainer}
                    </div>
                    <div class="print-footer">📄 Generated: ${new Date().toLocaleDateString('id-ID', { 
                        day: '2-digit', 
                        month: 'short', 
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    })} | 🏢 Professional Business Model Canvas</div>
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
