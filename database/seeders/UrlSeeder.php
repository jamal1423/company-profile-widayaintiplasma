<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_url_sosmed')->insert([
            'nama_sosmed' => 'Facebook',
            'url' => 'https://facebook.com/widayaintiplasma',
            'userlog' => 'jamal'
        ]);
        DB::table('tbl_url_sosmed')->insert([
            'nama_sosmed' => 'Instagram',
            'url' => 'https://instagram.com/widayaintiplasma',
            'userlog' => 'jamal'
        ]);
        DB::table('tbl_url_sosmed')->insert([
            'nama_sosmed' => 'Twitter',
            'url' => 'https://twitter.com/widayaintiplasma',
            'userlog' => 'jamal'
        ]);
    }
}
