// Global variables
let businessData = {};
let bmcData = {};

// DOM Elements
const businessForm = document.getElementById('businessForm');
const bmcForm = document.getElementById('bmcForm');
const businessInfoForm = document.getElementById('business-info-form');
const bmcFormSection = document.getElementById('bmc-form');
const bmcTemplate = document.getElementById('bmc-template');

// Event Listeners
document.addEventListener('DOMContentLoaded', function() {
    // Business form submission
    businessForm.addEventListener('submit', handleBusinessFormSubmit);
    
    // BMC form submission
    bmcForm.addEventListener('submit', handleBmcFormSubmit);
    
    // Back button
    document.getElementById('backBtn').addEventListener('click', goBackToBusinessForm);
    
    // Download buttons
    document.getElementById('downloadImage').addEventListener('click', downloadAsImage);
    document.getElementById('downloadPDF').addEventListener('click', downloadAsPDF);
    
    // Edit BMC button
    document.getElementById('editBmc').addEventListener('click', editBmc);
});

// Handle business form submission
function handleBusinessFormSubmit(e) {
    e.preventDefault();
    
    // Get form data
    const formData = new FormData(businessForm);
    businessData = {
        ownerName: formData.get('ownerName'),
        businessName: formData.get('businessName'),
        businessDescription: formData.get('businessDescription'),
        location: formData.get('location'),
        phone: formData.get('phone')
    };
    
    // Validate form
    if (validateBusinessForm()) {
        showBmcForm();
    }
}

// Handle BMC form submission
function handleBmcFormSubmit(e) {
    e.preventDefault();
    
    // Get BMC form data
    const formData = new FormData(bmcForm);
    bmcData = {
        customerSegments: formData.get('customerSegments'),
        valuePropositions: formData.get('valuePropositions'),
        channels: formData.get('channels'),
        customerRelationships: formData.get('customerRelationships'),
        revenueStreams: formData.get('revenueStreams'),
        keyResources: formData.get('keyResources'),
        keyActivities: formData.get('keyActivities'),
        keyPartnerships: formData.get('keyPartnerships'),
        costStructure: formData.get('costStructure')
    };
    
    // Validate BMC form
    if (validateBmcForm()) {
        generateBmcTemplate();
    }
}

// Validate business form
function validateBusinessForm() {
    const requiredFields = ['ownerName', 'businessName', 'businessDescription', 'location', 'phone'];
    let isValid = true;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!businessData[field] || businessData[field].trim() === '') {
            showError(input, 'Field ini wajib diisi');
            isValid = false;
        } else {
            clearError(input);
        }
    });
    
    // Validate phone number
    const phonePattern = /^[\+]?[0-9\s\-\(\)]{10,}$/;
    if (businessData.phone && !phonePattern.test(businessData.phone)) {
        showError(document.getElementById('phone'), 'Format nomor telepon tidak valid');
        isValid = false;
    }
    
    return isValid;
}

// Validate BMC form
function validateBmcForm() {
    const requiredFields = [
        'customerSegments', 'valuePropositions', 'channels', 
        'customerRelationships', 'revenueStreams', 'keyResources',
        'keyActivities', 'keyPartnerships', 'costStructure'
    ];
    let isValid = true;
    
    requiredFields.forEach(field => {
        const input = document.getElementById(field);
        if (!bmcData[field] || bmcData[field].trim() === '') {
            showError(input, 'Field ini wajib diisi');
            isValid = false;
        } else {
            clearError(input);
        }
    });
    
    return isValid;
}

// Show error message
function showError(input, message) {
    clearError(input);
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    errorDiv.style.fontSize = '14px';
    errorDiv.style.marginTop = '5px';
    input.parentNode.appendChild(errorDiv);
    input.style.borderColor = '#e53e3e';
}

// Clear error message
function clearError(input) {
    const existingError = input.parentNode.querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }
    input.style.borderColor = '#e2e8f0';
}

// Show BMC form
function showBmcForm() {
    businessInfoForm.style.display = 'none';
    bmcFormSection.style.display = 'block';
    bmcTemplate.style.display = 'none';
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Go back to business form
function goBackToBusinessForm() {
    bmcFormSection.style.display = 'none';
    businessInfoForm.style.display = 'block';
    bmcTemplate.style.display = 'none';
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Generate BMC template
function generateBmcTemplate() {
    // Update template with business data
    document.getElementById('template-business-name').textContent = businessData.businessName;
    document.getElementById('template-owner-name').textContent = businessData.ownerName;
    document.getElementById('template-location').textContent = businessData.location;
    document.getElementById('template-phone').textContent = businessData.phone;
    
    // Update template with BMC data
    document.getElementById('template-customer-segments').textContent = bmcData.customerSegments;
    document.getElementById('template-value-propositions').textContent = bmcData.valuePropositions;
    document.getElementById('template-channels').textContent = bmcData.channels;
    document.getElementById('template-customer-relationships').textContent = bmcData.customerRelationships;
    document.getElementById('template-revenue-streams').textContent = bmcData.revenueStreams;
    document.getElementById('template-key-resources').textContent = bmcData.keyResources;
    document.getElementById('template-key-activities').textContent = bmcData.keyActivities;
    document.getElementById('template-key-partnerships').textContent = bmcData.keyPartnerships;
    document.getElementById('template-cost-structure').textContent = bmcData.costStructure;
    
    // Show template
    bmcFormSection.style.display = 'none';
    bmcTemplate.style.display = 'block';
    
    // Scroll to template
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Edit BMC
function editBmc() {
    bmcTemplate.style.display = 'none';
    bmcFormSection.style.display = 'block';
    
    // Pre-fill form with existing data
    Object.keys(bmcData).forEach(key => {
        const input = document.getElementById(key);
        if (input) {
            input.value = bmcData[key];
        }
    });
    
    // Scroll to top
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Download as Image
async function downloadAsImage() {
    const button = document.getElementById('downloadImage');
    const originalText = button.textContent;
    
    try {
        button.innerHTML = '<span class="loading"></span> Generating Image...';
        button.disabled = true;
        
        const canvas = await html2canvas(document.getElementById('bmc-template'), {
            backgroundColor: '#ffffff',
            scale: 2,
            useCORS: true,
            allowTaint: true,
            width: 1200,
            height: 800
        });
        
        // Create download link
        const link = document.createElement('a');
        link.download = `${businessData.businessName}_BMC.png`;
        link.href = canvas.toDataURL('image/png');
        link.click();
        
        showSuccessMessage('BMC berhasil diunduh sebagai gambar!');
        
    } catch (error) {
        console.error('Error generating image:', error);
        showErrorMessage('Gagal mengunduh gambar. Silakan coba lagi.');
    } finally {
        button.textContent = originalText;
        button.disabled = false;
    }
}

// Download as PDF
async function downloadAsPDF() {
    const button = document.getElementById('downloadPDF');
    const originalText = button.textContent;
    
    try {
        button.innerHTML = '<span class="loading"></span> Generating PDF...';
        button.disabled = true;
        
        // Generate canvas
        const canvas = await html2canvas(document.getElementById('bmc-template'), {
            backgroundColor: '#ffffff',
            scale: 2,
            useCORS: true,
            allowTaint: true,
            width: 1200,
            height: 800
        });
        
        // Create PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: 'a4'
        });
        
        const imgData = canvas.toDataURL('image/png');
        const imgWidth = 297; // A4 width in mm
        const imgHeight = (canvas.height * imgWidth) / canvas.width;
        
        pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight);
        pdf.save(`${businessData.businessName}_BMC.pdf`);
        
        showSuccessMessage('BMC berhasil diunduh sebagai PDF!');
        
    } catch (error) {
        console.error('Error generating PDF:', error);
        showErrorMessage('Gagal mengunduh PDF. Silakan coba lagi.');
    } finally {
        button.textContent = originalText;
        button.disabled = false;
    }
}

// Show success message
function showSuccessMessage(message) {
    const existingMessage = document.querySelector('.success-message');
    if (existingMessage) {
        existingMessage.remove();
    }
    
    const successDiv = document.createElement('div');
    successDiv.className = 'success-message';
    successDiv.textContent = message;
    
    const container = document.querySelector('.container');
    container.insertBefore(successDiv, container.firstChild);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (successDiv.parentNode) {
            successDiv.remove();
        }
    }, 5000);
}

// Show error message
function showErrorMessage(message) {
    const existingMessage = document.querySelector('.error-message');
    if (existingMessage) {
        existingMessage.remove();
    }
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    
    const container = document.querySelector('.container');
    container.insertBefore(errorDiv, container.firstChild);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (errorDiv.parentNode) {
            errorDiv.remove();
        }
    }, 5000);
}

// Utility function to format text for display
function formatTextForDisplay(text) {
    if (!text) return '';
    
    // Split by line breaks and create bullet points
    const lines = text.split('\n').filter(line => line.trim() !== '');
    return lines.map(line => `• ${line.trim()}`).join('\n');
}

// Add some sample data for testing (optional)
function loadSampleData() {
    if (window.location.search.includes('sample=true')) {
        // Fill business form with sample data
        document.getElementById('ownerName').value = 'Ahmad Wijaya';
        document.getElementById('businessName').value = 'Macaron Sehat Nusantara';
        document.getElementById('businessDescription').value = 'Bisnis macaron sehat dengan rasa khas Nusantara, rendah gula dan premium';
        document.getElementById('location').value = 'Jakarta Selatan';
        document.getElementById('phone').value = '081234567890';
        
        // Fill BMC form with sample data
        document.getElementById('customerSegments').value = 'Orang yang sedang diet\nOrang tua yang mencari camilan sehat\nEvent organizer yang butuh hampers sehat premium\nOrang tua yang mencari camilan sehat untuk anaknya';
        document.getElementById('valuePropositions').value = 'Macaron sehat & rendah gula\nDessert rasa nusantara\nPackaging premium\nCustom order (event healthy catering, wedding hampers sehat)';
        document.getElementById('channels').value = 'Delivery app (GoFood, GrabFood, ShopeeFood)\nToko Offline\nMedia sosial (Instagram & TikTok)';
        document.getElementById('customerRelationships').value = 'Edukasi konsumen tentang manfaat camilan sehat\nLayanan personal untuk penawaran custom (rasa, warna, packaging)\nReview & testimoni pelanggan yang menjanjikan hidup sehat\nInteraksi aktif di media sosial dengan tema healthy lifestyle';
        document.getElementById('revenueStreams').value = 'Kerja sama B2C loyalitas dalam bentuk retention rate (pertumbuhan pembeli)\nKerja sama B2B (kerjasama dengan gofood, shopee food)';
        document.getElementById('keyResources').value = 'Dapur produksi & alat baking premium\nChef yang paham dessert sehat\nMedia sosial\nResep eksklusif \'low sugar Nusantara fusion\'';
        document.getElementById('keyActivities').value = 'Produksi macaron rendah gula dengan rasa khas Nusantara (pandan, klepon, dll)\nR&D untuk mengembangkan varian sehat (gluten-free, dairy-free opsional)\nEdukasi konsumen tentang manfaat camilan sehat\nBranding & promosi digital dengan fokus pada healthy lifestyle\nPengemasan higienis & premium';
        document.getElementById('keyPartnerships').value = 'Supplier bahan baku\nPercetakan untuk packaging\nPlatform delivery (GoFood, GrabFood, ShopeeFood)';
        document.getElementById('costStructure').value = 'Biaya bahan baku premium (natural sweetener, almond flour)\nBiaya produksi (tenaga kerja & alat baking)\nBiaya mitra (gofood, shopeefood)\nBiaya marketing\nSertifikasi halal';
    }
}

// Load sample data if requested
document.addEventListener('DOMContentLoaded', loadSampleData);
