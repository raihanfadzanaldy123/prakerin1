<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class provinsi extends Model
{
    use HasFactory;

    protected $table = "provinsis";

    public function kota() {
        return $this->hasMany('App/kota','id_kota');
    }
}
