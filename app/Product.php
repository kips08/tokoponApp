<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'merk',
        'model',
        'tipe',
        'soc_nama',
        'soc_tipe',
        'ram',
        'rom',
        'deskripsi',
        'harga',
        'stok'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
