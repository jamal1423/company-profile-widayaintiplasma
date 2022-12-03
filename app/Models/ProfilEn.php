<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilEn extends Model
{
    use HasFactory;

    protected $table = 'tbl_profil_en';
    protected $primaryKey = 'id';

    protected $guarded = 'id';
}
