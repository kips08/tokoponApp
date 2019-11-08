<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailorder extends Model
{
    //
    protected $primaryKey = 'id_detail';
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'id_cart',
        'id_product',
        'jumlah',
        'harga',
        'sub_total'
    ];
}
