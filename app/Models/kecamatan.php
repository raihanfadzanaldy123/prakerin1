<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    use HasFactory;

    protected $table = "kecamatans";
        
    public function kota() {
        return $this->belongsTo('App/kota','id_kota');
    }

    public function kelurahan() {
        return $this->hasMany('App/kelurahan','id_kelurahan');
        
    }
}
