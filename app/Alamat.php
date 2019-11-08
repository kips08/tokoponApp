<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $primaryKey = 'id_alamat';

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'id_user',
        'label',
        'alamat',
        'kota',
        'provinsi',
        'kodepos'
    ];

    public function users(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
