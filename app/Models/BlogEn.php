<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class BlogEn extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'tbl_berita_en';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'slug',
        'deskripsi',
        'tglBerita',
        'foto',
        'userlog'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
