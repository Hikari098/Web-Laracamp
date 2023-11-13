<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBootcamp extends Model
{
    use HasFactory;

    protected $table = 'kategori_bootcamps';

    protected $fillable = [
        'kategori',
        'slug',
    ];
}
