@extends('layouts.head')

@section('title', 'Buat Financial Projection - Ideation')

@section('styles')
<style>
    body {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-container {
        padding: 2rem 0;
        min-height: 100vh;
    }

    .form-container {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        padding: 3rem;
        margin: 2rem auto;
        max-width: 1200px;
    }

    .page-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .page-title {
        color: #2d3748;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .page-subtitle {
        color: #718096;
        font-size: 1.1rem;
        margin-bottom: 2rem;
    }

    .section-title {
        color: #2d3748;
        font-size: 1.5rem;
        font-weight: 600;
        margin: 2rem 0 1rem 0;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e2e8f0;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #2d3748;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 10px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: white;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .projection-table {
        background: #f8f9fa;
        border-radius: 15px;
        padding: 2rem;
        margin: 2rem 0;
        overflow-x: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0;
    }

    .table th {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 1rem;
        text-align: center;
        font-weight: 600;
        border: none;
    }

    .table th:first-child {
        border-radius: 10px 0 0 0;
    }

    .table th:last-child {
        border-radius: 0 10px 0 0;
    }

    .table td {
        padding: 0.75rem;
        text-align: center;
        border-bottom: 1px solid #e2e8f0;
        background: white;
    }

    .table td input {
        border: 1px solid #e2e8f0;
        border-radius: 5px;
        padding: 0.5rem;
        text-align: center;
        width: 100%;
    }

    .table td input:focus {
        border-color: #667eea;
        outline: none;
    }

    .currency-input {
        position: relative;
    }

    .currency-symbol {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #4a5568;
        font-weight: 600;
    }

    .currency-input .form-control {
        padding-left: 2.5rem;
    }

    .btn {
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        transition: all 0.3s ease;
        cursor: pointer;
        font-size: 1rem;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
    }

    .btn-secondary {
        background: #e2e8f0;
        color: #4a5568;
    }

    .btn-secondary:hover {
        background: #cbd5e0;
        transform: translateY(-2px);
    }

    .btn-add {
        background: #48bb78;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-top: 0.5rem;
    }

    .btn-remove {
        background: #f56565;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 5px;
        font-size: 0.8rem;
        min-width: 30px;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #e2e8f0;
    }

    .alert {
        padding: 1rem 1.5rem;
        border-radius: 10px;
        margin-bottom: 1.5rem;
    }

    .alert-danger {
        background: #fed7d7;
        color: #c53030;
        border: 1px solid #feb2b2;
    }

    .alert-success {
        background: #c6f6d5;
        color: #2f855a;
        border: 1px solid #9ae6b4;
    }

    .input-group {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        align-items: center;
    }

    .summary-card {
        background: linear-gradient(135deg, #e6fffa 0%, #b2f5ea 100%);
        border-radius: 15px;
        padding: 2rem;
        margin: 2rem 0;
        text-align: center;
    }

    .summary-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 1rem;
    }

    .summary-value {
        font-size: 2rem;
        font-weight: 700;
        color: #38a169;
    }

    @media (max-width: 768px) {
        .form-container {
            margin: 1rem;
            padding: 2rem;
        }
        
        .page-title {
            font-size: 2rem;
        }

        .projection-table {
            padding: 1rem;
        }
    }
</style>
@endsection

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
                        <a class="nav-link" href="{{ route('bmc.create') }}">Buat BMC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tam-sam-som.create') }}">TAM SAM SOM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('financial-projection.create') }}">Financial Projection</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container">
        <div class="container">
            <div class="form-container">
                <div class="page-header">
                    <h1 class="page-title">Buat Financial Projection</h1>
                    <p class="page-subtitle">
                        Proyeksi keuangan untuk merencanakan dan menganalisis performa finansial bisnis Anda
                    </p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('financial-projection.store') }}">
                    @csrf
                    
                    <!-- Basic Information -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Pemilik</label>
                                <input type="text" name="owner_name" class="form-control" value="{{ old('owner_name') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Nama Bisnis</label>
                                <input type="text" name="business_name" class="form-control" value="{{ old('business_name') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Periode Proyeksi (Tahun)</label>
                                <select name="projection_period" class="form-control" id="projectionPeriod" required>
                                    <option value="">Pilih Periode</option>
                                    <option value="1" {{ old('projection_period') == '1' ? 'selected' : '' }}>1 Tahun</option>
                                    <option value="3" {{ old('projection_period') == '3' ? 'selected' : '' }}>3 Tahun</option>
                                    <option value="5" {{ old('projection_period') == '5' ? 'selected' : '' }}>5 Tahun</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Mata Uang</label>
                                <select name="currency" class="form-control" required>
                                    <option value="IDR" {{ old('currency') == 'IDR' ? 'selected' : '' }}>IDR (Rupiah)</option>
                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD (Dollar)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Investasi Awal</label>
                                <div class="currency-input">
                                    <span class="currency-symbol">Rp</span>
                                    <input type="number" name="initial_investment" class="form-control" value="{{ old('initial_investment') }}" min="0" step="1000" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Projections -->
                    <h3 class="section-title">
                        <i class="fas fa-chart-line text-success"></i> Proyeksi Pendapatan
                    </h3>
                    <div class="projection-table">
                        <table class="table" id="revenueTable">
                            <thead>
                                <tr>
                                    <th>Sumber Pendapatan</th>
                                    <th>Tahun 1</th>
                                    <th>Tahun 2</th>
                                    <th>Tahun 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="revenue_sources[]" placeholder="Contoh: Penjualan Produk" value="{{ old('revenue_sources.0') }}"></td>
                                    <td><input type="number" name="revenue_projections[0][year_1]" placeholder="0" min="0" step="1000" value="{{ old('revenue_projections.0.year_1') }}"></td>
                                    <td><input type="number" name="revenue_projections[0][year_2]" placeholder="0" min="0" step="1000" value="{{ old('revenue_projections.0.year_2') }}"></td>
                                    <td><input type="number" name="revenue_projections[0][year_3]" placeholder="0" min="0" step="1000" value="{{ old('revenue_projections.0.year_3') }}"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-add" onclick="addRevenueRow()">
                            <i class="fas fa-plus"></i> Tambah Sumber Pendapatan
                        </button>
                    </div>

                    <!-- Expense Projections -->
                    <h3 class="section-title">
                        <i class="fas fa-chart-line text-danger"></i> Proyeksi Pengeluaran
                    </h3>
                    <div class="projection-table">
                        <table class="table" id="expenseTable">
                            <thead>
                                <tr>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Tahun 1</th>
                                    <th>Tahun 2</th>
                                    <th>Tahun 3</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="expense_types[]" placeholder="Contoh: Biaya Operasional" value="{{ old('expense_types.0') }}"></td>
                                    <td><input type="number" name="expense_projections[0][year_1]" placeholder="0" min="0" step="1000" value="{{ old('expense_projections.0.year_1') }}"></td>
                                    <td><input type="number" name="expense_projections[0][year_2]" placeholder="0" min="0" step="1000" value="{{ old('expense_projections.0.year_2') }}"></td>
                                    <td><input type="number" name="expense_projections[0][year_3]" placeholder="0" min="0" step="1000" value="{{ old('expense_projections.0.year_3') }}"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-add" onclick="addExpenseRow()">
                            <i class="fas fa-plus"></i> Tambah Jenis Pengeluaran
                        </button>
                    </div>

                    <!-- Assumptions -->
                    <h3 class="section-title">
                        <i class="fas fa-lightbulb text-warning"></i> Asumsi & Catatan
                    </h3>
                    <div class="form-group">
                        <label class="form-label">Asumsi Proyeksi</label>
                        <div id="assumptions">
                            <div class="input-group">
                                <input type="text" name="assumptions[]" class="form-control" placeholder="Contoh: Pertumbuhan pasar 10% per tahun">
                                <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-add" onclick="addAssumption()">
                            <i class="fas fa-plus"></i> Tambah Asumsi
                        </button>
                    </div>

                    <!-- Summary -->
                    <div class="summary-card">
                        <div class="summary-title">Proyeksi Net Profit Tahun 1</div>
                        <div class="summary-value" id="netProfitSummary">Rp 0</div>
                        <small class="text-muted">*Akan dihitung otomatis berdasarkan input Anda</small>
                    </div>

                    <div class="form-actions">
                        <a href="{{ route('bmc.landing') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Financial Projection
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let revenueRowCount = 1;
        let expenseRowCount = 1;

        function addRevenueRow() {
            const tbody = document.querySelector('#revenueTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" name="revenue_sources[]" placeholder="Sumber pendapatan baru"></td>
                <td><input type="number" name="revenue_projections[${revenueRowCount}][year_1]" placeholder="0" min="0" step="1000"></td>
                <td><input type="number" name="revenue_projections[${revenueRowCount}][year_2]" placeholder="0" min="0" step="1000"></td>
                <td><input type="number" name="revenue_projections[${revenueRowCount}][year_3]" placeholder="0" min="0" step="1000"></td>
            `;
            tbody.appendChild(newRow);
            revenueRowCount++;
        }

        function addExpenseRow() {
            const tbody = document.querySelector('#expenseTable tbody');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="text" name="expense_types[]" placeholder="Jenis pengeluaran baru"></td>
                <td><input type="number" name="expense_projections[${expenseRowCount}][year_1]" placeholder="0" min="0" step="1000"></td>
                <td><input type="number" name="expense_projections[${expenseRowCount}][year_2]" placeholder="0" min="0" step="1000"></td>
                <td><input type="number" name="expense_projections[${expenseRowCount}][year_3]" placeholder="0" min="0" step="1000"></td>
            `;
            tbody.appendChild(newRow);
            expenseRowCount++;
        }

        function addAssumption() {
            const container = document.getElementById('assumptions');
            const newInput = document.createElement('div');
            newInput.className = 'input-group';
            newInput.innerHTML = `
                <input type="text" name="assumptions[]" class="form-control" placeholder="Masukkan asumsi...">
                <button type="button" class="btn-remove" onclick="removeInput(this)">×</button>
            `;
            container.appendChild(newInput);
        }

        function removeInput(button) {
            button.parentElement.remove();
        }

        // Calculate net profit summary
        function calculateNetProfit() {
            let totalRevenue = 0;
            let totalExpense = 0;

            // Sum revenue year 1
            document.querySelectorAll('input[name*="revenue_projections"][name*="year_1"]').forEach(input => {
                totalRevenue += parseFloat(input.value) || 0;
            });

            // Sum expense year 1
            document.querySelectorAll('input[name*="expense_projections"][name*="year_1"]').forEach(input => {
                totalExpense += parseFloat(input.value) || 0;
            });

            const netProfit = totalRevenue - totalExpense;
            document.getElementById('netProfitSummary').textContent = 
                'Rp ' + netProfit.toLocaleString('id-ID');
        }

        // Add event listeners for real-time calculation
        document.addEventListener('input', function(e) {
            if (e.target.type === 'number') {
                calculateNetProfit();
            }
        });

        // Update table columns based on projection period
        document.getElementById('projectionPeriod').addEventListener('change', function() {
            const period = parseInt(this.value);
            updateTableColumns(period);
        });

        function updateTableColumns(period) {
            // This function would update the table structure based on selected period
            // For now, we'll keep it simple with 3 years max
        }
    </script>
</body>
</html>
