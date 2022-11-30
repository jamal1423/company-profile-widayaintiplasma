<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'jamal',
            'nama' => 'Mochammad Jamal',
            'password' => bcrypt('jamal123456'),
            'hak_akses' => 'Administrator'
        ]);

        DB::table('users')->insert([
            'username' => 'jamal2',
            'nama' => 'Moch. Jamal',
            'password' => bcrypt('jamal123456'),
            'hak_akses' => 'Administrator'
        ]);
    }
}
