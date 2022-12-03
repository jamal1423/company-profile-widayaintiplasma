<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsEn extends Model
{
    use HasFactory;
    protected $table = 'tbl_about_us_en';
    protected $primaryKey = 'id';

    protected $fillable = [
        'deskripsi',
        'visi',
        'misi',
        'foto'
    ];
}
