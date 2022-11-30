<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFotoAbout extends Model
{
    use HasFactory;

    protected $table = 'tbl_home_about_foto';
    protected $primaryKey = 'id';

    protected $fillable = [
        'deskripsi',
        'foto'
    ];
}
