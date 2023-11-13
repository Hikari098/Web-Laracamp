<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'kategori_id',
        'nama_produk',
        'slug',
        'harga',
        'deskripsi',
        'image',

    ];
    public function kategori(){
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
}
