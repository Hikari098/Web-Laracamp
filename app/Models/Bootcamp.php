<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bootcamp extends Model
{
    use HasFactory;

    protected $table = "bootcamps";

    protected $fillable = [
        'kategori_id',
        'mentor_id',
        'nama',
        'slug',
        'harga',
        'deskripsi',
        'thumbnail',
        'kuota',
        'status',
    ];

    public function kategori(){
        return $this->belongsTo(KategoriBootcamp::class,'kategori_id', 'id');
    }

    public function mentor(){
        return $this->belongsTo(User::class,'mentor_id','id');
    }
}
