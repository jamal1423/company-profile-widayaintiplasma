<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'tbl_home_slider';
    protected $primaryKey = 'id';

    protected $fillable = [
        'deskripsi',
        'foto'
    ];
}
