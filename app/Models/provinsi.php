<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['kode_provinsi','nama_provinsi'];
    public $timestamps = true;
    protected $table = "provinsis";
    
    public function kota() {
        return $this->hasMany('App\Models\kota','id_kota');
    }
}
