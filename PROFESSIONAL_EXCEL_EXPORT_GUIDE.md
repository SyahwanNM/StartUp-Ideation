# Panduan Export Excel Profesional

## 🚀 **FITUR EXPORT EXCEL PROFESIONAL**

Berdasarkan analisis file CSV yang Anda kirimkan, saya telah membuat sistem export Excel yang mirip dengan struktur dan design yang menarik serta profesional.

### 📊 **STRUKTUR EXCEL (9 SHEET)**

#### **1. Deskripsi Usaha**
- Nama usaha dan deskripsi
- Domisili dan cakupan
- Model usaha dan jumlah karyawan
- Nama direktur dan link website

#### **2. Sumber Permodalan**
- Modal awal pendiri (equity)
- Pinjaman modal (loan)
- Investasi pihak luar
- Target proyeksi dan pertumbuhan per tahun

#### **3. Asset**
- Daftar aset yang dibeli
- Harga perolehan per aset
- Depresiasi bulanan
- Total nilai aset

#### **4. Produk**
- Nama produk dan harga jual
- Total penjualan bulanan
- Persentase keuntungan
- Total penjualan bulan 1

#### **5. HPP (Harga Pokok Penjualan)**
- Bahan baku per produk
- Biaya per unit dan total
- Kemasan dan tenaga kerja langsung
- Total HPP per produk

#### **6. Fixed Cost**
- Daftar biaya tetap
- Nominal per biaya
- Total fixed cost

#### **7. Variable Cost**
- Daftar biaya variabel
- Persentase dari pendapatan
- Total variable cost

#### **8. Proyeksi Bulanan**
- Data bulanan lengkap (48 bulan untuk 4 tahun)
- Pendapatan, biaya, dan profit per bulan
- Profit margin dan kumulatif profit
- Color coding untuk profit (hijau = positif, merah = negatif)

#### **9. Ringkasan Tahunan**
- Total pendapatan per tahun
- Total biaya dan profit per tahun
- Rata-rata bulanan per tahun
- Status profitable/loss per tahun

## 🎨 **DESIGN PROFESIONAL**

### **Color Scheme**
- **Deskripsi Usaha**: Biru (#2E86AB)
- **Sumber Permodalan**: Merah Muda (#A23B72)
- **Target Usaha**: Orange (#F18F01)
- **Asset**: Hijau Tua (#2D5016)
- **Produk**: Coklat (#8B4513)
- **HPP**: Merah (#DC143C)
- **Fixed Cost**: Orange Merah (#FF6347)
- **Variable Cost**: Hijau (#32CD32)
- **Proyeksi Bulanan**: Ungu (#4B0082)
- **Ringkasan Tahunan**: Abu-abu Tua (#2F4F4F)

### **Formatting**
- **Header**: Background berwarna dengan teks putih
- **Border**: Garis tipis untuk semua cell
- **Alignment**: Center untuk header, left untuk data
- **Font**: Bold untuk header, normal untuk data
- **Row Height**: 20px untuk semua baris
- **Column Width**: Disesuaikan dengan konten

## 📋 **CARA MENGGUNAKAN**

### **Download Excel Profesional**
1. Buka halaman hasil proyeksi: `http://127.0.0.1:8000/projection/show/113`
2. Klik tombol **"Laporan Profesional"** (biru)
3. File akan terdownload dengan format: `Laporan_Proyeksi_Keuangan_[Nama_Bisnis]_[Tanggal].xlsx`

### **Perbedaan dengan Export Biasa**
- **Export Biasa**: 4 sheet dengan data terstruktur
- **Export Profesional**: 9 sheet dengan format mirip CSV yang Anda kirimkan

## 🔧 **TECHNICAL DETAILS**

### **Route**
```php
Route::get('/export-professional/{id}', [ProjectionController::class, 'exportProfessional'])
    ->name('projection.export.professional');
```

### **Controller Method**
```php
public function exportProfessional($id)
{
    $projection = Projection::findOrFail($id);
    $fileName = 'Laporan_Proyeksi_Keuangan_' . str_replace(' ', '_', $projection->business_name) . '_' . date('Y-m-d_H-i-s') . '.xlsx';
    return Excel::download(new ProfessionalProjectionExport($projection), $fileName);
}
```

### **Export Class**
```php
class ProfessionalProjectionExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Deskripsi Usaha' => new BusinessDescriptionSheet($this->projection),
            'Sumber Permodalan' => new FundingSourceSheet($this->projection),
            'Asset' => new AssetSheet($this->projection),
            'Produk' => new ProductSheet($this->projection),
            'HPP' => new HPPSheet($this->projection),
            'Fixed Cost' => new FixedCostSheet($this->projection),
            'Variable Cost' => new VariableCostSheet($this->projection),
            'Proyeksi Bulanan' => new MonthlyProjectionSheet($this->projection),
            'Ringkasan Tahunan' => new YearlySummarySheet($this->projection),
        ];
    }
}
```

## 🎯 **FITUR KHUSUS**

### **1. Format Mirip CSV**
- Struktur data yang sama dengan CSV yang Anda kirimkan
- Layout yang konsisten di semua sheet
- Nomor urut dan kategori yang jelas

### **2. Color Coding**
- **Profit Positif**: Background hijau muda
- **Profit Negatif**: Background merah muda
- **Status Profitable**: Background hijau
- **Status Loss**: Background merah

### **3. Professional Styling**
- Header dengan background berwarna
- Border untuk semua cell
- Font yang konsisten
- Spacing yang tepat

### **4. Data Lengkap**
- Semua data dari proyeksi keuangan
- Perhitungan yang akurat
- Format mata uang yang konsisten
- Persentase yang tepat

## 📊 **CONTOH OUTPUT**

### **Sheet 1: Deskripsi Usaha**
```
1. DESKRIPSI USAHA
1 | Nama Usaha | Bakery & Cafe "Sweet Dreams" | | 3 | Domisili | Bandung
2 | Deskripsi Usaha | Bakery & Cafe "Sweet Dreams" | | 4 | Cakupan | Nasional
```

### **Sheet 2: Sumber Permodalan**
```
2. SUMBER PERMODALAN                   3. TARGET USAHA
1 | Modal Awal Pendiri | IDR 50,000,000 | Mandiri | IDR 50,000,000 | | Target proyeksi (bulan) | | | | | 48
2 | Pinjaman Modal | IDR 40,000,000 | Investor | IDR 40,000,000 | | Pertumbuhan tahun 1 | | | | | 20%
```

### **Sheet 8: Proyeksi Bulanan**
```
9. PROYEKSI BULANAN
Bulan | Tahun | Pendapatan | Biaya Tetap | Biaya Variabel | Payroll | Depresiasi | Bunga Pinjaman | Total Biaya | Profit | Profit Margin | Kumulatif Profit
1 | 1 | IDR 15,000,000 | IDR 10,200,000 | IDR 1,200,000 | IDR 6,000,000 | IDR 166,667 | IDR 333,333 | IDR 17,900,000 | IDR -2,900,000 | -19.33% | IDR -2,900,000
```

## 🚀 **BENEFITS**

### **Untuk User**
- ✅ Format yang familiar (mirip CSV yang dikirimkan)
- ✅ Design yang menarik dan profesional
- ✅ Data lengkap dan terstruktur
- ✅ Mudah dibaca dan dipahami

### **Untuk Bisnis**
- ✅ Laporan terlihat profesional
- ✅ Format standar perusahaan
- ✅ Data terorganisir dengan baik
- ✅ Mudah dibagikan ke stakeholder

## 🎉 **KESIMPULAN**

Export Excel Profesional telah dibuat dengan:
- **9 Sheet** yang mencakup semua aspek bisnis
- **Design menarik** dengan color scheme yang konsisten
- **Format mirip CSV** yang Anda kirimkan
- **Data lengkap** dari sistem proyeksi keuangan
- **Styling profesional** untuk presentasi

**Fitur Export Excel Profesional siap digunakan!** 🚀




