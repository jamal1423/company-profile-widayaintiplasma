<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $table = 'tbl_url_sosmed';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_sosmed',
        'url',
        'userlog',
    ];
}
