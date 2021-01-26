<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    use HasFactory;

    protected $table = "rws";
    
    public function kelurahan() {
        return $this->belongsTo('App\Models\kelurahan','id_kelurahan');
    }

    public function jumlahKasus() {
        return $this->hasMany('App\jumlahKasus','id_jumlahKasus');
        
    }
}
