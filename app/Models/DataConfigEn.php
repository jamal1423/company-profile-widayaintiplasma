<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataConfigEn extends Model
{
    use HasFactory;
    protected $table = 'tbl_config_en';
    protected $primaryKey = 'id';

    protected $fillable = [
        'text_slider1',
        'text_slider2',
        'text_slogan',
        'text_pembukaan',
        'telp_office',
        'email_marketing'
    ];
}
