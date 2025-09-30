<!-- Bootstrap JS with fallback -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        onerror="this.onerror=null;this.src='{{ asset('assets/js/bootstrap.bundle.min.js') }}';"></script>

<!-- html2canvas with fallback -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        onerror="this.onerror=null;this.src='{{ asset('assets/js/html2canvas.min.js') }}';"></script>

<!-- jsPDF with fallback -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"
        onerror="this.onerror=null;this.src='{{ asset('assets/js/jspdf.umd.min.js') }}';"></script>

<!-- Additional Scripts -->
@yield('scripts')
