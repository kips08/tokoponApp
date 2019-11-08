<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $primaryKey = 'id_cart';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = ['id_user'];
}
