<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'tbl_produk';
    protected $primaryKey = 'id';

    protected $fillable =[
        'artikel',
        'tipe_produk',
        'jenis_produk',
        'foto',
        'userlog'
    ];
}
