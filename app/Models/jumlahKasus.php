<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jumlahKasus extends Model
{
    use HasFactory;

    protected $table = "jumlahKasuses";
    
    public function rw() {
        return $this->belongsTo('App/rw','id_rw');
    }

}
