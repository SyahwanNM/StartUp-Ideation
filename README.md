# Ideation - BMC Generator

Website untuk membuat Business Model Canvas (BMC) secara online dengan mudah. Aplikasi ini memungkinkan pengguna untuk mengisi 9 komponen BMC dan menghasilkan template yang dapat di-download dalam format PDF atau gambar.

## Fitur Utama

### 🎯 Untuk Pengguna
- **Landing Page Informatif**: Penjelasan lengkap tentang Business Model Canvas dan 9 komponennya
- **Form Input yang Mudah**: Interface yang user-friendly untuk mengisi data bisnis dan BMC
- **Template BMC Profesional**: Generate BMC dengan layout yang rapi dan profesional
- **Download Multiple Format**: Download BMC dalam format PDF atau gambar
- **Responsive Design**: Tampilan yang optimal di desktop dan mobile

### 🔧 Untuk Admin
- **Dashboard Admin**: Melihat semua BMC yang telah dibuat
- **Histori Lengkap**: Data bisnis dan BMC dari semua pengguna
- **Statistik**: Jumlah BMC total, mingguan, dan bulanan

## 9 Komponen Business Model Canvas

1. **Customer Segments** - Segmen pelanggan target
2. **Value Propositions** - Proposisi nilai yang ditawarkan
3. **Channels** - Saluran untuk menjangkau pelanggan
4. **Customer Relationships** - Jenis hubungan dengan pelanggan
5. **Revenue Streams** - Sumber pendapatan bisnis
6. **Key Resources** - Sumber daya utama yang dibutuhkan
7. **Key Activities** - Aktivitas utama bisnis
8. **Key Partnerships** - Kemitraan strategis
9. **Cost Structure** - Struktur biaya bisnis

## Teknologi yang Digunakan

- **Backend**: Laravel 11
- **Frontend**: Blade Templates, Bootstrap 5
- **Database**: SQLite
- **PDF Generation**: DomPDF
- **Styling**: Custom CSS dengan Bootstrap

## Instalasi

1. Clone repository ini
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Setup database:
   ```bash
   php artisan migrate
   ```

5. Jalankan server:
   ```bash
   php artisan serve
   ```

## Struktur Database

### Tabel `businesses`
- `id` - Primary key
- `owner_name` - Nama pemilik usaha
- `business_name` - Nama usaha
- `business_description` - Deskripsi usaha
- `location` - Lokasi usaha
- `phone_number` - Nomor telepon
- `created_at`, `updated_at` - Timestamps

### Tabel `bmc_data`
- `id` - Primary key
- `business_id` - Foreign key ke tabel businesses
- `customer_segments` - JSON array
- `value_propositions` - JSON array
- `channels` - JSON array
- `customer_relationships` - JSON array
- `revenue_streams` - JSON array
- `key_resources` - JSON array
- `key_activities` - JSON array
- `key_partnerships` - JSON array
- `cost_structure` - JSON array
- `created_at`, `updated_at` - Timestamps

## Routing

### Public Routes
- `GET /` - Landing page
- `GET /create` - Form input BMC
- `POST /store` - Simpan BMC
- `GET /show/{id}` - Tampilkan BMC
- `GET /download/pdf/{id}` - Download PDF
- `GET /download/image/{id}` - Download gambar

### Admin Routes
- `GET /admin` - Dashboard admin
- `GET /admin/show/{id}` - Detail BMC di admin

## Cara Penggunaan

1. **Buat BMC Baru**:
   - Akses halaman utama Ideation
   - Klik "Buat BMC Sekarang"
   - Isi informasi bisnis
   - Isi 9 komponen BMC
   - Submit form

2. **Lihat BMC**:
   - Setelah submit, Anda akan diarahkan ke halaman BMC
   - BMC ditampilkan dalam format grid 3x3
   - Dapat download PDF atau gambar

3. **Admin Dashboard**:
   - Akses `/admin` untuk melihat semua BMC
   - Klik "Lihat Detail" untuk melihat BMC lengkap

## Screenshots

### Landing Page
- Hero section dengan penjelasan BMC
- 9 komponen BMC dengan ikon dan deskripsi
- Call-to-action yang menarik

### Form Input
- Form informasi bisnis
- 9 section untuk komponen BMC
- Dynamic form untuk menambah/menghapus item

### BMC Display
- Grid layout 3x3 yang rapi
- Warna yang berbeda untuk setiap komponen
- Informasi bisnis di atas BMC

### Admin Dashboard
- Statistik BMC
- List semua BMC dengan informasi bisnis
- Link ke detail BMC

## Kontribusi

1. Fork repository
2. Buat feature branch
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## Lisensi

MIT License - lihat file LICENSE untuk detail.

## Kontak

Untuk pertanyaan atau saran, silakan buat issue di repository ini.