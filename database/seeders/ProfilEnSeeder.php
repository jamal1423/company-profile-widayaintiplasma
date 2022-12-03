<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilEnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_profil_en')->insert([
            'nama_perusahaan' => 'PT. Widaya Inti Plasma',
            'lokasi' => 'Jl. Industri Bringin Bendo No. 8, Taman, Sidoarjo',
            'kodepos' => '61257',
            'provinsi' => 'Jawa Timur (East Java)',
            'negara' => 'Indonesia',
            'telp' => '+6281 651 0992, +6285 101 538209',
            'fax' => '+62 31 7886584',
            'website' => 'www.widayaintiplasma.com',
            'email' => 'marketing@widayaintiplasma.com',
            'kontak' => 'Mr. Vincent B Soetanto (Marketing) (+6281 651 0992 , +6285 101 538209)',
            'tahun_didirikan' => '1994, Privately Owned, Listed',
            'sektor_bisnis' => 'Footwear Manufacturer and Exporter',
            'bahasa' => 'Indonesia and English',
            'produk_utama' => 'Shoes and  Sandals',
            'merek' => 'Trekkers and Based On Inquiry',
            'volume' => '1 Million pairs / year',
            'spesifikasi' => 'Injection Shoes, Cement Shoes, PVC and Eva Sandals',
            'komposisi_bahan' => 'PVC, PU, Canvas and Mesh',
            'harga_jangka' => 'Approx 3.50 - 5.00 / pairs. FOB Surabaya - Indonesia',
            'minimum_order' => '6000 pairs',
            'validitas_harga' => 'Negotiable',
            'proses_manufaktur' => 'Cutting, Stitching, Injecting and Assembling',
            'tenaga_kerja' => '200 - 300 persons',
            'pendapatan_ekspor' => '20%',
            'tujuan_ekspor' => 'Europe, Middle East, Asia Pacific, Africa',
            'jns_bisnis_lain' => 'Export Import'
        ]);
    }
}
