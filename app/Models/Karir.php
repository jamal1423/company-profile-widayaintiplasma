<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karir extends Model
{
    use HasFactory;

    protected $table = 'tbl_karir';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'deskripsi'
    ];
}
