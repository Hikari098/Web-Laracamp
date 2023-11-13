<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'title',
        'slug',
        'tags',
        'img_artikel',
        'artikel'
    ];
 

    // buat bikin relasi antar table (menghubungkan, gampang dibaca)
    public function tag(){
        return $this->belongsTo(Tags::class, 'tags', 'id');
    }

}
