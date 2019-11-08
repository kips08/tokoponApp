<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $primaryKey = 'id_order';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'tgl_pesan',
        'id_cart',
        'invoice',
        'ekspedisi',
        'no_resi',
        'total',
        'status_bayar',
        'status_kirim'
    ];
}
