<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jumlahKasus extends Model
{
    use HasFactory;

    protected $table = "jumlah_Kasuses"; //sesuiankan dengan table di db
    
    public function rw() {
        return $this->belongsTo('App\Models\rw','id_rw');
    }

}
