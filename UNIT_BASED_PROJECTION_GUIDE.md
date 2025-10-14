# Panduan Sistem Proyeksi Keuangan Berbasis Unit

## Overview

Sistem proyeksi keuangan berbasis unit adalah pengembangan dari sistem proyeksi keuangan yang sudah ada. Sistem ini memungkinkan user untuk membuat proyeksi keuangan berdasarkan penjualan produk dalam unit, bukan berdasarkan pendapatan nominal.

## Fitur Utama

### 1. Input Data Bisnis
- **Nama Bisnis**: Nama usaha yang akan diproyeksikan
- **Total Unit Terjual Bulan Pertama**: Jumlah unit produk yang terjual di bulan pertama
- **Durasi Proyeksi**: 1-5 tahun
- **Growth Rate Tahunan**: Growth rate yang berbeda untuk setiap tahun

### 2. Manajemen Produk
- **Nama Produk**: Nama produk yang dijual
- **Harga Jual per Unit**: Harga jual setiap unit produk
- **Persentase Distribusi**: Persentase penjualan dari total unit terjual
- **Bahan Baku**: Daftar bahan baku dengan harga per unit dan jumlah yang dibutuhkan

### 3. Perhitungan Otomatis
- **HPP (Harga Pokok Penjualan)**: Dihitung dari total bahan baku per produk
- **Laba Kotor**: Harga jual - HPP
- **Margin Laba Kotor**: Persentase laba kotor terhadap harga jual
- **Unit Terjual per Bulan**: Dihitung berdasarkan growth rate bulanan
- **Pendapatan per Bulan**: Unit terjual × harga jual per produk

### 4. Komponen Biaya
- **Biaya Tetap**: Biaya yang tidak berubah setiap bulan
- **Biaya Variabel**: Biaya yang berubah berdasarkan persentase pendapatan
- **Gaji Karyawan**: Dengan periode kerja yang dapat diatur
- **Depresiasi Aset**: Dihitung berdasarkan umur aset
- **Bunga Pinjaman**: Dihitung berdasarkan pinjaman modal

## Struktur Database

### Tabel `projections`
```sql
- id (bigint, primary key)
- business_name (varchar)
- baseline_units_sold (int) -- Unit terjual bulan pertama
- product_distribution (json) -- Distribusi produk (optional)
- projection_years (int)
- fixed_costs (json)
- variable_costs (json)
- employees (json)
- assets (json)
- yearly_growth_rates (json)
- funding_sources (json)
- projections_data (json)
- created_at (timestamp)
- updated_at (timestamp)
```

### Tabel `products`
```sql
- id (bigint, primary key)
- projection_id (bigint, foreign key)
- name (varchar)
- selling_price (decimal)
- sales_percentage (decimal) -- Persentase dari total penjualan
- created_at (timestamp)
- updated_at (timestamp)
```

### Tabel `raw_materials`
```sql
- id (bigint, primary key)
- product_id (bigint, foreign key)
- name (varchar)
- cost_per_unit (decimal)
- quantity (decimal) -- Jumlah per unit produk
- created_at (timestamp)
- updated_at (timestamp)
```

## Rumus Perhitungan

### 1. Growth Rate Bulanan
```
Monthly Growth Rate = (1 + Annual Growth Rate)^(1/12) - 1
```

### 2. Unit Terjual per Bulan
```
Units Sold Month n = Baseline Units × (1 + Monthly Growth Rate)^(n-1)
```

### 3. Unit Terjual per Produk
```
Product Units = Total Units × (Product Percentage / 100)
```

### 4. HPP per Produk
```
HPP = Σ(Raw Material Cost per Unit × Quantity)
```

### 5. Pendapatan per Produk
```
Revenue = Product Units × Selling Price
```

### 6. Laba Kotor per Produk
```
Gross Profit = Revenue - (Product Units × HPP)
```

### 7. Margin Laba Kotor
```
Gross Profit Margin = (Gross Profit / Revenue) × 100%
```

## Cara Penggunaan

### 1. Akses Form
- Buka halaman utama
- Pilih "Proyeksi Keuangan" → "Berdasarkan Unit Produk"
- Atau langsung akses: `/projection/create-unit`

### 2. Isi Data Bisnis
- Masukkan nama bisnis
- Tentukan total unit terjual bulan pertama
- Pilih durasi proyeksi (1-5 tahun)
- Isi growth rate tahunan untuk setiap tahun

### 3. Tambah Produk
- Klik "Tambah Produk"
- Isi nama produk, harga jual, dan persentase distribusi
- Tambah bahan baku dengan harga per unit dan jumlah
- Pastikan total persentase distribusi = 100%

### 4. Konfigurasi Biaya
- Tambah biaya tetap (nominal bulanan)
- Tambah biaya variabel (persentase dari pendapatan)
- Tambah karyawan dengan periode kerja
- Tambah aset dengan depresiasi
- Tambah sumber pendanaan

### 5. Generate Proyeksi
- Klik "Generate Proyeksi Keuangan"
- Sistem akan menghitung proyeksi bulanan
- Tampilkan hasil dengan grafik dan tabel

## Output Proyeksi

### 1. Ringkasan Bulanan
- Unit terjual per bulan
- Pendapatan total per bulan
- HPP total per bulan
- Laba kotor per bulan
- Biaya tetap, variabel, gaji, depresiasi, bunga
- Laba bersih per bulan

### 2. Breakdown Produk
- Unit terjual per produk per bulan
- Pendapatan per produk per bulan
- HPP per produk per bulan
- Laba kotor per produk per bulan
- Margin laba kotor per produk

### 3. Ringkasan Tahunan
- Total pendapatan per tahun
- Total biaya per tahun
- Laba bersih per tahun
- Rata-rata laba bulanan per tahun

### 4. Grafik Visualisasi
- Grafik pendapatan vs biaya
- Grafik unit terjual
- Grafik laba bersih

## Export dan Print

### 1. Export Excel
- Download data proyeksi dalam format Excel
- Multiple sheet dengan data lengkap
- Formatting profesional

### 2. Print Laporan
- Print laporan profesional
- Format A4 dengan header dan footer
- Optimized untuk printing

## Validasi Data

### 1. Validasi Form
- Nama bisnis wajib diisi
- Unit terjual bulan pertama minimal 1
- Durasi proyeksi 1-5 tahun
- Growth rate tahunan 0-100%
- Persentase distribusi produk harus 100%
- Harga jual dan HPP harus positif

### 2. Validasi Produk
- Minimal 1 produk
- Setiap produk minimal 1 bahan baku
- Persentase distribusi total = 100%

## Keunggulan Sistem Unit-Based

### 1. Lebih Realistis
- Berdasarkan penjualan aktual produk
- Mempertimbangkan HPP yang sebenarnya
- Analisis margin per produk

### 2. Lebih Detail
- Breakdown per produk
- Analisis bahan baku
- Tracking unit terjual

### 3. Lebih Akurat
- Perhitungan HPP yang tepat
- Margin laba yang realistis
- Proyeksi yang lebih dapat diandalkan

### 4. Lebih Fleksibel
- Multiple produk dengan distribusi berbeda
- Growth rate yang berbeda per tahun
- Manajemen bahan baku yang detail

## Perbedaan dengan Sistem Revenue-Based

| Aspek | Revenue-Based | Unit-Based |
|-------|---------------|------------|
| Input Utama | Pendapatan bulanan | Unit terjual + harga produk |
| Perhitungan HPP | Tidak ada | Otomatis dari bahan baku |
| Analisis Produk | Tidak ada | Detail per produk |
| Margin Analysis | Tidak ada | Margin per produk |
| Realism | Sedang | Tinggi |
| Complexity | Rendah | Sedang |

## Troubleshooting

### 1. Error "Total persentase distribusi harus 100%"
- Pastikan total persentase semua produk = 100%
- Gunakan desimal jika perlu (misal: 60.5% + 39.5%)

### 2. Error "Minimal 1 produk"
- Tambah minimal 1 produk dengan bahan baku

### 3. Error "HPP tidak valid"
- Pastikan harga bahan baku dan jumlah > 0
- Gunakan format desimal yang benar

### 4. Error "Growth rate tidak valid"
- Pastikan growth rate 0-100%
- Isi growth rate untuk semua tahun proyeksi

## Support dan Maintenance

### 1. Log Error
- Cek `storage/logs/laravel.log` untuk error detail
- Error akan dicatat dengan timestamp dan stack trace

### 2. Database Maintenance
- Backup database secara berkala
- Monitor ukuran tabel `projections_data`

### 3. Performance
- Sistem dioptimasi untuk proyeksi hingga 5 tahun
- Caching untuk perhitungan yang kompleks

## Update dan Upgrade

### 1. Version Control
- Semua perubahan dicatat dalam git
- Migration untuk update database

### 2. Backward Compatibility
- Sistem lama tetap berfungsi
- Data lama dapat diakses

### 3. Future Enhancements
- Multiple currency support
- Advanced reporting
- API integration
- Mobile app support

---

**Dibuat oleh**: AI Assistant  
**Tanggal**: 15 Januari 2025  
**Versi**: 1.0.0

