<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_about_us')->insert([
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos officiis expedita quo harum. Nam enim laboriosam doloremque magnam necessitatibus, vel tempore alias est eveniet beatae officia reiciendis autem voluptatum mollitia saepe. Illum a animi cupiditate eveniet deserunt distinctio assumenda tempore rem accusantium asperiores ab commodi officiis sequi ullam corrupti laudantium numquam nulla nemo voluptate, harum consectetur sit perspiciatis accusamus illo. Fugit deleniti vitae molestiae fuga facere, qui sint, nihil in tenetur voluptatibus expedita sequi reiciendis provident veniam eum? Eaque deserunt explicabo, expedita asperiores accusamus earum doloremque facere repellat eum reiciendis tempore sint, atque labore? Inventore minima nobis adipisci quibusdam ratione.',
            'visi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, et!',
            'misi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, et!',
            'foto' => 'image.jpg'
        ]);
    }
}
