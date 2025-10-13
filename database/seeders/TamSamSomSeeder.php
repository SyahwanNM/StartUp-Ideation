<?php

namespace Database\Seeders;

use App\Models\TamSamSom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamSamSomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TamSamSom::create([
            'business_name' => 'EduTech Platform',
            'owner_name' => 'Ahmad Rizki',
            'industry' => 'Education Technology',
            'location' => 'Jakarta, Indonesia',
            'tam_description' => 'Total market mencakup seluruh pelajar dan mahasiswa di Indonesia yang membutuhkan platform pembelajaran online',
            'tam_market_size' => 50000000,
            'tam_unit_value' => 200000,
            'tam_value' => 10000000000000,
            'sam_description' => 'Pasar yang dapat dilayani fokus pada pelajar SMA dan mahasiswa di kota-kota besar dengan akses internet stabil',
            'sam_percentage' => 25,
            'sam_market_size' => 12500000,
            'sam_value' => 2500000000000,
            'som_description' => 'Pasar yang dapat diperoleh berdasarkan kapasitas marketing dan teknologi yang dimiliki saat ini',
            'som_percentage' => 8,
            'som_market_size' => 1000000,
            'som_value' => 200000000000,
            'market_assumptions' => [
                'Penetrasi internet di Indonesia terus meningkat',
                'Tren pembelajaran online semakin diterima masyarakat',
                'Dukungan pemerintah untuk digitalisasi pendidikan'
            ],
            'growth_projections' => [
                'Pertumbuhan 25% per tahun selama 3 tahun ke depan',
                'Ekspansi ke kota tier 2 dan tier 3',
                'Pengembangan fitur AI dan personalisasi pembelajaran'
            ]
        ]);

        TamSamSom::create([
            'business_name' => 'FinTech Lending',
            'owner_name' => 'Sari Dewi',
            'industry' => 'Financial Technology',
            'location' => 'Surabaya, Indonesia',
            'tam_description' => 'Total market meliputi seluruh UMKM di Indonesia yang membutuhkan akses pembiayaan untuk pengembangan usaha',
            'tam_market_size' => 64000000,
            'tam_unit_value' => 50000000,
            'tam_value' => 3200000000000000,
            'sam_description' => 'Pasar yang dapat dilayani fokus pada UMKM yang sudah memiliki rekam jejak bisnis dan akses digital',
            'sam_percentage' => 15,
            'sam_market_size' => 9600000,
            'sam_value' => 480000000000000,
            'som_description' => 'Pasar yang dapat diperoleh berdasarkan kapasitas lending dan risk assessment yang dimiliki',
            'som_percentage' => 5,
            'som_market_size' => 480000,
            'som_value' => 24000000000000,
            'market_assumptions' => [
                'Inklusi keuangan terus ditingkatkan pemerintah',
                'UMKM semakin melek digital dan teknologi',
                'Regulasi fintech semakin mendukung inovasi'
            ],
            'growth_projections' => [
                'Pertumbuhan portfolio 40% per tahun',
                'Ekspansi ke segmen mikro dan korporasi kecil',
                'Integrasi dengan ekosistem e-commerce'
            ]
        ]);

        TamSamSom::create([
            'business_name' => 'AgriTech Solutions',
            'owner_name' => 'Budi Santoso',
            'industry' => 'Agriculture Technology',
            'location' => 'Yogyakarta, Indonesia',
            'tam_description' => 'Total market mencakup seluruh petani di Indonesia yang dapat memanfaatkan teknologi untuk meningkatkan produktivitas',
            'tam_market_size' => 33000000,
            'tam_unit_value' => 5000000,
            'tam_value' => 165000000000000,
            'sam_description' => 'Pasar yang dapat dilayani fokus pada petani dengan lahan > 0.5 ha dan akses ke teknologi dasar',
            'sam_percentage' => 20,
            'sam_market_size' => 6600000,
            'sam_value' => 33000000000000,
            'som_description' => 'Pasar yang dapat diperoleh melalui kemitraan dengan koperasi dan distributor pupuk/benih',
            'som_percentage' => 12,
            'som_market_size' => 792000,
            'som_value' => 3960000000000,
            'market_assumptions' => [
                'Adopsi teknologi pertanian semakin meningkat',
                'Dukungan pemerintah untuk modernisasi pertanian',
                'Kesadaran petani akan efisiensi dan produktivitas'
            ],
            'growth_projections' => [
                'Pertumbuhan adopsi 30% per tahun',
                'Ekspansi ke komoditas hortikultura dan perikanan',
                'Pengembangan platform marketplace hasil panen'
            ]
        ]);
    }
}