<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_config')->insert([
            'text_slider1' => 'KAMI ADALAH SEBUAH PERUSAHAAN SEPATU DAN EXPORTIR',
            'text_slider2' => 'Menjadi produsen sepatu yang kredibel dan terkemuka diseluruh dunia',
            'text_slogan' => 'Kepuasan Pelanggan Tujuan Kami',
            'text_pembukaan' => 'PT. Widaya Inti Plasma memproduksi beragam jenis sepatu mulai dari sepatu olahraga injeksi, sepatu olahraga cementing dan sandal.',
            'telp_office' => '+6231-7886582',
            'email_marketing' => 'marketing@widayaintiplasma.com'
        ]);
    }
}
